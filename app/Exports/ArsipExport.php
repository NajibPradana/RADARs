<?php

namespace App\Exports;

use App\Models\Arsip;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class ArsipExport implements FromQuery, WithHeadings, WithStyles, ShouldAutoSize, WithEvents, WithMapping
{
    protected $lembagaId;

    public function __construct($lembagaId)
    {
        $this->lembagaId = $lembagaId;
    }

    public function query()
    {
        // Tambahkan sorting sesuai dengan prioritas
        return Arsip::query()
            ->where('lembaga_id', $this->lembagaId)
            ->orderBy('kode_klasifikasi')
            ->orderBy('kurun_waktu')
            ->orderBy('uraian_informasi');
    }

    public function map($arsip): array
    {
        static $rowNumber = 0;
        $kurunWaktu = Carbon::parse($arsip->kurun_waktu);
        $rowNumber++;

        $keteranganKondisi = [];
        if (!empty($arsip->kondisi_asli)) {
            $keteranganKondisi[] = "• " . $arsip->kondisi_asli;
        }
        if (!empty($arsip->kondisi_tekstual)) {
            $keteranganKondisi[] = "• " . $arsip->kondisi_tekstual;
        }
        if (!empty($arsip->kondisi_baik)) {
            $keteranganKondisi[] = "• " . $arsip->kondisi_baik;
        }
        if (!empty($arsip->keterangan_lain)) {
            $keteranganKondisi[] = "• " . $arsip->keterangan_lain;
        }

        // Array nama bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $bulan = $kurunWaktu->month;
        $namaBulan = $bulanIndonesia[$bulan] ?? '';

        return [
            $rowNumber,
            $arsip->nomor_identitas, // Menambahkan kolom Nomor ID
            $arsip->kode_klasifikasi,
            $arsip->uraian_informasi,
            $namaBulan, // Menampilkan nama bulan dalam bahasa Indonesia
            $kurunWaktu->year,
            $arsip->jumlah . ' ' . $arsip->jenis_arsip . ' ',
            $arsip->retensi_aktif,
            $arsip->retensi_inaktif,
            implode("\n", $keteranganKondisi),
        ];
    }

    public function headings(): array
    {
        return [
            'NO',
            'NOMOR ID', // Menambahkan heading untuk Nomor ID
            'KLASIFIKASI',
            'URAIAN INFORMASI ARSIP',
            'BULAN',
            'TAHUN',
            'JUMLAH BERKAS',
            'RETENSI AKTIF',
            'RETENSI INAKTIF',
            'KETERANGAN KONDISI',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Set column widths
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(15); // Menambahkan lebar untuk kolom Nomor ID
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(30);
    
        // Set row height for the first row
        $sheet->getRowDimension(1)->setRowHeight(30);
    
        // Apply styling to the header row
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => [
                'bold' => true,
                'name' => 'Calibri',
                'size' => 12
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'A6A6A6']
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center'
            ]
        ]);
    
        // Apply general styling to all cells except column J
        $sheet->getStyle('A1:I' . $sheet->getHighestRow())->applyFromArray([
            'font' => [
                'name' => 'Calibri',
                'size' => 12
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center'
            ]
        ]);
    
        // Apply specific styling to column J (data)
        $sheet->getStyle('J2:J' . $sheet->getHighestRow())->applyFromArray([
            'alignment' => [
                'horizontal' => 'left', // Data alignment diatur ke kiri
                'vertical' => 'center'
            ]
        ]);
    
        return [];
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                $highestRow = $sheet->getHighestRow();
                $sheet->getStyle('A1:J' . $highestRow)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ]);
    
                // Mengatur wrap text untuk kolom JUMLAH BERKAS dan KETERANGAN KONDISI
                $sheet->getStyle('F2:F' . $highestRow)->getAlignment()->setWrapText(true);
                $sheet->getStyle('J2:J' . $highestRow)->getAlignment()->setWrapText(true);
            },
        ];
    }
}