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

class Jurnal implements FromView,WithStyles,ShouldAutoSize
{
    use Exportable;
    protected $tdate;

    function __construct($tdate = null) {
            $this->tdate = $tdate;
    }

    
    public function view(): View
    {
        $data=Http::withToken(session('access_token'))->get(env('API_URL').'ledger/journal', ['tdate'=>$this->tdate])->json();;
        //dd($this->tdate);
        return view('laporan.jurnal-export', [
            'data' => $data,
            'tdate' => $this->tdate,
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
        
        $sheet ->getStyle('A1:H4')->applyFromArray($styleArray);
        $sheet->getStyle('A1:T3')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:T3')->getAlignment()->setVertical('center');
        $sheet->getStyle('A1:H4')->getFont()->setBold(true);
    }

    
}

?>