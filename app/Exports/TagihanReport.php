<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class TagihanReport implements FromView,WithStyles,ShouldAutoSize
{
    use Exportable;
    
    public function view(): View
    {
        $data=['A'=>'A','B'=>'B','C'=>'C',];
        return view('pembayaranangsuran.tagihan', [
            'data' => $data,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $styleArray = array(
            'borders' => array(
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ),
        );
        
        $sheet ->getStyle('A1:T4')->applyFromArray($styleArray);
        $sheet->getStyle('A1:T3')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:T3')->getAlignment()->setVertical('center');
        $sheet->getStyle('A1:T3')->getFont()->setBold(true);
    }

    
}

?>