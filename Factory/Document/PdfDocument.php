<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document;

use Mpdf\Mpdf;
use Owl\Component\Core\Factory\Document\Params\PdfDocumentParams;
use Twig\Environment;

class PdfDocument implements DocumentInterface
{
    public function __construct(
        private Mpdf $pdfGenerator,
        private Environment $templatingEngine,
        private PdfDocumentParams $params,
    ) {
    }

    public function generateResponse(string $filename, array $data = [])
    {
        if ($this->params->getFooterTemplate()) {
            $this->pdfGenerator->SetHTMLFooter(
                $this->templatingEngine->render($this->params->getFooterTemplate()),
            );
        }

        $this->pdfGenerator->WriteHTML(
            $this->templatingEngine->render($this->params->getTemplate(), $data),
        );

        return $this->pdfGenerator->Output($filename, 'D');
    }
}
