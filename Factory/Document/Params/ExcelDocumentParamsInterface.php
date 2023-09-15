<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory\Document\Params;

interface ExcelDocumentParamsInterface
{
    public function getBuilder(): string;

    public function getWriter(): string;

    public function setWriter(string $writer): void;
}
