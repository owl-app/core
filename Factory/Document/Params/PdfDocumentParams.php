<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document\Params;

use Twig\TemplateWrapper;

final class PdfDocumentParams extends AbstractDocumentParams implements PdfDocumentParamsInterface
{
    protected array $optionsGenerator = [
        'mode' => 'utf-8',
        'format' => 'A4',
        'orientation' => 'P',
        'default_font_size' => 0,
        'default_font' => '',
        'margin_left' => 15,
        'margin_right' => 15,
        'margin_top' => 15,
        'margin_bottom' => 15
    ];

    protected string $template;

    protected TemplateWrapper|string $footerTemplate;

    /**
     * @psalm-return array{tempDir: string,...}
     */
    public function getOptionsGenerator(): array
    {
        return array_merge($this->optionsGenerator, ['tempDir' => $this->getTempDir()]);
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function getFooterTemplate(): TemplateWrapper|string
    {
        return $this->footerTemplate;
    }

    public function getTempDir(): string
    {
        return sys_get_temp_dir();
    }
}
