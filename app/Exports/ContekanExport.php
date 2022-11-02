<?php
 
namespace App\Exports;
 
use App\Models\CallActivities;
use App\Models\Customer;
use App\Models\Distributor;
use App\Models\Mcl;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
 
class CallActivityExport implements FromQuery, WithHeadings, WithMapping, WithEvents
{
    use Exportable;
 
    private $filter_year;
    private $filter_month;
    private $filter_day;
    private $dist_id;
 
    public function __construct($year, $month, $day, $dist_id)
    {
        $this->filter_year = $year;
        $this->filter_month = $month;
        $this->filter_day = $day;
        $this->dist_id = $dist_id;
    }
    public function startCell(): string
    {
        return 'A4';
    }
 
    public function query()
    {
        if ($this->dist_id == 0) {
            if ($this->filter_year) {
                return CallActivities
                    ::query()
                    ->WhereYear('created_at', $this->filter_year)->orderBy('id', 'ASC');
            }
            if ($this->filter_month) {
                $arr = explode("-", $this->filter_month);
                $y = $arr[0];
                $m = $arr[1];
                return CallActivities
                    ::query()
                    ->WhereMonth('created_at', $m)
                    ->WhereYear('created_at', $y)->orderBy('id', 'ASC');
            }
 
            if ($this->filter_day) {
                return CallActivities::query()->whereDate('created_at', $this->filter_day)->orderBy('id', 'ASC');
            }
        } else {
            $cc = Customer::where('distributor_id', $this->dist_id)->select('id')->get()->toArray();
            $mm = Mcl::whereIn('customer_id', $cc)->select('id')->get()->toArray();
 
            if ($this->filter_year) {
                return CallActivities
                    ::whereIn('mcl_id', $mm)
                    ->WhereYear('created_at', $this->filter_year)->orderBy('id', 'ASC');
            }
            if ($this->filter_month) {
                $arr = explode("-", $this->filter_month);
                $y = $arr[0];
                $m = $arr[1];
                return CallActivities
                    ::whereIn('mcl_id', $mm)
                    ->WhereMonth('created_at', $m)
                    ->WhereYear('created_at', $y)->orderBy('id', 'ASC');
            }
 
            if ($this->filter_day) {
                return CallActivities::whereIn('mcl_id', $mm)->whereDate('created_at', $this->filter_day)->orderBy('id', 'ASC');
            }
        }
    }
    public function headings(): array
    {
        return  [
            'ID',
            'MCL',
            'Salesman',
            'Notes',
            'Lat',
            'Long',
            'Datetime'
        ];
    }
    public function map($call_activities): array
    {
 
        return [
            $call_activities->id,
            $call_activities->mcl->customer->name,
            $call_activities->mcl->salesman->name,
            $call_activities->notes,
            $call_activities->lat,
            $call_activities->long,
            $call_activities->created_at->format('d/m/Y H:i:s')
        ];
    }
 
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:G1');
                $event->sheet->getDelegate()->mergeCells('A2:G2');
                $event->sheet->getDelegate()->mergeCells('A3:G3');
                $event->sheet->getDelegate()
                    ->getStyle('A1:A2')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
 
                $event->sheet->getDelegate()->setCellValue('A1', 'PT. TIARA KENCANA')
                    ->getStyle('A1')
                    ->getFont()
                    ->setBold(true)
                    ->setSize(20);
 
                if ($this->dist_id == 0) {
                    if ($this->filter_year) {
                        $event->sheet->getDelegate()->setCellValue('A2', 'Call Activities' . ' ' . $this->filter_year)
                            ->getStyle('A2')
                            ->getFont()
                            ->setBold(true)
                            ->setSize(15);
                    }
 
                    if ($this->filter_month) {
                        $month = date('F Y', strtotime($this->filter_month));
                        $event->sheet->getDelegate()->setCellValue('A2', 'Call Activities' . ' ' . $month)
                            ->getStyle('A2')
                            ->getFont()
                            ->setBold(true)
                            ->setSize(15);
                    }
 
                    if ($this->filter_day) {
                        $day = date('d F Y', strtotime($this->filter_day));
                        $event->sheet->getDelegate()->setCellValue('A2', 'Call Activities' . ' ' . $day)
                            ->getStyle('A2')
                            ->getFont()
                            ->setBold(true)
                            ->setSize(15);
                    }
                } else {
                    $distributor = Distributor::where('id', $this->dist_id)->first();
                    if ($this->filter_year) {
                        $event->sheet->getDelegate()->setCellValue('A2', 'Call Activities' . ' ' .  $distributor->name . ' ' . $this->filter_year)
                            ->getStyle('A2')
                            ->getFont()
                            ->setBold(true)
                            ->setSize(15);
                    }
 
                    if ($this->filter_month) {
                        $month = date('F Y', strtotime($this->filter_month));
                        $event->sheet->getDelegate()->setCellValue('A2', 'Call Activities' . ' ' .  $distributor->name . ' ' . $month)
                            ->getStyle('A2')
                            ->getFont()
                            ->setBold(true)
                            ->setSize(15);
                    }
 
                    if ($this->filter_day) {
                        $day = date('d F Y', strtotime($this->filter_day));
                        $event->sheet->getDelegate()->setCellValue('A2', 'Call Activities'  . ' ' .  $distributor->name . ' ' . $day)
                            ->getStyle('A2')
                            ->getFont()
                            ->setBold(true)
                            ->setSize(15);
                    }
                }
            },
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A4:G4')
                    ->getFont()
                    ->setBold(true)
                    ->setSize(12)
                    ->getColor()
                    ->setARGB('ffffff');
 
                $event->sheet->getDelegate()->getStyle('A4:G4')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('687ecb');
 
 
                $event->sheet->getDelegate()
                    ->getStyle('G')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
 
                $event->sheet->getDelegate()
                    ->getStyle('A4:G4')
                    ->getAlignment()
                    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
 
 
                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFFFF'],
                        ],
                    ],
                ];
                $event->sheet->getDelegate()->getStyle('A4')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('B4')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('C4')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('D4')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('E4')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('F4')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('G4')->applyFromArray($styleArray);
 
 
 
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getRowDimension('2')->setRowHeight(30);
                $event->sheet->getDelegate()->getRowDimension('4')->setRowHeight(25);
 
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(45);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(60);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(25);
            },
        ];
    }
}
 