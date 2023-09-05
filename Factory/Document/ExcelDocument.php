<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document;

use Owl\Component\Core\Builder\ExcelBuilderInterface;
use Owl\Component\Core\Factory\Document\Params\DocumentParamsInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Contracts\Translation\TranslatorInterface;

class ExcelDocument implements DocumentInterface
{
    public function __construct(
        private TranslatorInterface $translator,
        private Spreadsheet $excelGenerator,
        private string $classWriter,
        private ExcelBuilderInterface $builder,
        private DocumentParamsInterface $params
    ) {}

    /**
     * @return StreamedResponse
     */
    public function generateResponse(string $filename, array $data = [])
    {
        $content = $this->builder->build($this->excelGenerator, $this->translator, $data);
        $classWriter = $this->classWriter;

        $writer = new $classWriter($content);

        $response =  new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );

        $this->setHeaders($response, $filename.'.'.$this->getFilesExtension($writer));
        
        return $response;
    }

    private function setHeaders(StreamedResponse $response, string $filename): void
    {
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$filename.'"');
        $response->headers->set('Cache-Control','max-age=0');
    }

    private function getFilesExtension(IWriter $writer): string
    {
        if($writer instanceof Xls) {
            return 'xls';
        }

        return 'xlsx';
    }
}