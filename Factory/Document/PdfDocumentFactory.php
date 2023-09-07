<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document;

use Owl\Component\Core\Factory\Document\Params\DocumentParamsInterface;
use Mpdf\Mpdf;
use Owl\Component\Core\Factory\Document\Params\PdfDocumentParams;
use Owl\Component\Core\Factory\Document\Params\PdfDocumentParamsInterface;
use Twig\Environment;

class PdfDocumentFactory implements DocumentFactoryInterface
{
    private Environment $templatingEngine;

    public function __construct(
        Environment $templatingEngine
    ) {
        $this->templatingEngine = $templatingEngine;
    }

    /**
     * @param PdfDocumentParamsInterface & DocumentParamsInterface $params
     * 
     * @return PdfDocument
     */
    public function createDocument(DocumentParamsInterface $params = null): DocumentInterface
    {
        return new PdfDocument(new Mpdf($params->getOptionsGenerator()), $this->templatingEngine, $params);
    }
}
