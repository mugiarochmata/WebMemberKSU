<?php

namespace App\Exports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class Neraca implements FromView,WithStyles,ShouldAutoSize
{
    use Exportable;
    protected $pdate;

    function __construct($pdate = null) {
            $this->pdate = $pdate;
    }

    
    public function view(): View
    {
        $data=Http::withToken(session('access_token'))->get(env('API_URL').'ledger/ledger', ['pdate'=>$this->pdate])->json();;
        //dd($this->tdate);
        return view('laporan.neraca-export', [
            'data' => $data,
            'pdate' => $this->pdate,
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
        
        $sheet ->getStyle('A1:I4')->applyFromArray($styleArray);
        $sheet->getStyle('A1:I4')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:I4')->getAlignment()->setVertical('center');
        $sheet->getStyle('A1:I4')->getFont()->setBold(true);
    }

    
}

?>