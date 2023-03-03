<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document\Params;

use Owl\Component\Core\Exception\InvalidDocumentConfigurationException;

final class ExcelDocumentParams extends AbstractDocumentParams
{
    protected string $builder;

    protected string $writer = 'xlsx';

    public function getBuilder(): string
    {
        return $this->builder;
    }

    public function getWriter(): string
    {
        return $this->writer;
    }

    public function setWriter(string $writer): void
    {
        if (!in_array($writer, ['xls', 'xlsx'])) {
            throw new InvalidDocumentConfigurationException(sprintf('%s file format is not supported', $writer));
        }

        $this->writer = $writer;
    }
}
