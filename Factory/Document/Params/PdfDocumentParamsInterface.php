<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document\Params;

use Twig\TemplateWrapper;

interface PdfDocumentParamsInterface
{
    /**
     * @psalm-return array{tempDir: string,...}
     */
    public function getOptionsGenerator(): array;

    public function getTemplate(): string;

    public function getFooterTemplate(): TemplateWrapper|string;

    public function getTempDir(): string;
}