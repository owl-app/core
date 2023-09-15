<?php

declare(strict_types=1);

namespace Owl\Component\Core\Builder\Document;

use Owl\Component\Core\Builder\ExcelBuilderInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Contracts\Translation\TranslatorInterface;

class LocationsExcelBuilder implements ExcelBuilderInterface
{
    public function build(Spreadsheet $spreadsheet, TranslatorInterface $translator, array $data): Spreadsheet
    {
        $sheetIndex = 0;

        foreach ($data['locations'] as $location) {
            // If number of sheet is 0 then no new worksheets are created
            if ($sheetIndex > 0) {
                $spreadsheet->createSheet();
            }

            // sheet for the worksheet is setted and a title is assigned
            $sheet = $spreadsheet->setActiveSheetIndex($sheetIndex)->setTitle($translator->trans('owl.ui.location') . ' - ' . $location->getId());

            $sheet->getColumnDimension('A')->setWidth(27);
            $sheet->getColumnDimension('B')->setWidth(40);
            $sheet->getColumnDimension('C')->setWidth(40);
            $sheet->getColumnDimension('E')->setWidth(20);
            $sheet->setCellValue('A1', $translator->trans('owl.ui.name'))->getStyle('A1')->getFont()->setBold(true);
            // $sheet->setCellValue('A2', $translator->trans('owl.ui.category'))->getStyle('A2')->getFont()->setBold(true);
            $sheet->setCellValue('A3', $translator->trans('owl.ui.company'))->getStyle('A3')->getFont()->setBold(true);
            $sheet->setCellValue('A4', $translator->trans('owl.ui.user'))->getStyle('A4')->getFont()->setBold(true);
            $sheet->setCellValue('A5', $translator->trans('owl.ui.city'))->getStyle('A5')->getFont()->setBold(true);
            $sheet->setCellValue('A6', $translator->trans('owl.ui.street'))->getStyle('A6')->getFont()->setBold(true);
            $sheet->setCellValue('A7', $translator->trans('owl.ui.post_code'))->getStyle('A7')->getFont()->setBold(true);
            $sheet->setCellValue('A8', $translator->trans('owl.ui.phone'))->getStyle('A8')->getFont()->setBold(true);
            $sheet->setCellValue('A9', $translator->trans('owl.ui.email'))->getStyle('A9')->getFont()->setBold(true);
            $sheet->setCellValue('A10', $translator->trans('owl.ui.comments'))->getStyle('A10')->getFont()->setBold(true);

            $sheet->setCellValue('B1', $location->getName());
            // $sheet->setCellValue('B2', $location->get['name']);
            $sheet->setCellValue('B3', $location->getCompany()->getName());
            $sheet->setCellValue('B4', $location->getUser() ? $location->getUser()->getDisplayName() : $translator->trans('owl.ui.no_value'));
            $sheet->setCellValue('B5', $location->getCity());
            $sheet->setCellValue('B6', $location->getStreet());
            $sheet->setCellValue('B7', $location->getPostCode());
            $sheet->setCellValue('B8', $location->getPhone());
            $sheet->setCellValue('B9', $location->getEmail());
            $sheet->setCellValue('B10', $location->getComments());

            $sheet->setCellValue('C1', $translator->trans('owl.ui.equipment'))->getStyle('C1')->getFont()->setBold(true);

            if ($location->getEquipments()) {
                $i = 0;

                foreach ($location->getEquipments() as $equipment) {
                    $sheet->setCellValue('C' . ($i + 2), $equipment->getName());

                    $sheet
                        ->getStyle('D' . ($i + 2))
                        ->getNumberFormat()
                        ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

                    $sheet->setCellValue('D' . ($i + 2), $equipment->getSymbol());

                    $sheet
                        ->getStyle('E' . ($i + 2))
                        ->getNumberFormat()
                        ->setFormatCode("#\u{a0}##0.00 [\$zł-415];-#\u{a0}##0.00 [\$zł-415]");

                    $sheet->setCellValue('E' . ($i + 2), ($equipment->getPrice() / 100));

                    ++$i;
                }

                $numberSumCell = (count($location->getEquipments()) + 2);

                $sheet->setCellValue('C' . $numberSumCell, $translator->trans('owl.ui.sum'))->getStyle('C' . $numberSumCell)->getFont()->setBold(true);
                $sheet
                    ->getStyle('E' . $numberSumCell)
                    ->getNumberFormat()
                    ->setFormatCode("#\u{a0}##0.00 [\$zł-415];-#\u{a0}##0.00 [\$zł-415]");
                $sheet->setCellValue('E' . $numberSumCell, $location->getSumPrice() / 100);
            }

            // Index number is incremented for the next worksheet
            ++$sheetIndex;
        }

        return $spreadsheet;
    }
}
