<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document;

use Owl\Component\Core\Factory\Document\Params\DocumentParamsInterface;
use Mpdf\Mpdf;
use Twig\Environment;

class PdfDocumentFactory implements DocumentFactoryInterface
{
    private Environment $templatingEngine;

    public function __construct(
        Environment $templatingEngine
    ) {
        $this->templatingEngine = $templatingEngine;
    }

    public function createDocument(DocumentParamsInterface $params = null): DocumentInterface
    {
        return new PdfDocument(new Mpdf($params->getOptionsGenerator()), $this->templatingEngine, $params);
    }
}
