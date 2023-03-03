<?php

declare(strict_types=1);

namespace Owl\Component\Core\Builder;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Contracts\Translation\TranslatorInterface;

interface ExcelBuilderInterface
{
    public function build(Spreadsheet $spreadsheet, TranslatorInterface $translator, array $data): Spreadsheet;
}
