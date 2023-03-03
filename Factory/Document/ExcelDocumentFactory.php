<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document;

use Owl\Component\Core\Builder\ExcelBuilderInterface;
use Owl\Component\Core\Exception\InvalidDocumentConfigurationException;
use Owl\Component\Core\Factory\Document\Params\DocumentParamsInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ExcelDocumentFactory implements DocumentFactoryInterface
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function createDocument(DocumentParamsInterface $params = null): DocumentInterface
    {
        if (!$params->getBuilder()) {
            throw new InvalidDocumentConfigurationException('Please set excel builder in config');
        }

        return new ExcelDocument(
            $this->container->get('translator'),
            new Spreadsheet(),
            $this->createWriter($params->getWriter()),
            $this->getBuilder($params->getBuilder()),
            $params
        );
    }

    private function createWriter(string $writer): string
    {
        if($writer === 'xls') {
            return Xls::class;
        }

        return Xlsx::class;
    }

    private function getBuilder(string $builder): ExcelBuilderInterface
    {
        if($this->container->has($builder)) {
            return $this->container->get($builder);
        }

        return new $builder;
    }
}
