@php
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-type: application/octet-stream");
    header ("Content-Disposition: attachment; filename=Laporan-absensi-departement-".strtolower($filter)."-periode-".ucwords($absensi->periode).".xls");
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Apurav - Report</title>
    <style>
        #master td{
            vertical-align: middle;
            
        }
    </style>
</head>
<body>
    <div style="text-align: center; font-size: 20px;">
        <b><u>DAFTAR ABSENSI</u></b>
    </div>         
    
    <br>
    <table style="">
        <tr>
            <td colspan="2" style="width: 100px;">Periode</td>
            <td colspan="5">: {{ str_replace('-', ' - ', ucwords($absensi->periode)) }}</td>
        </tr>
        <tr>
            <td colspan="2" style="width: 100px;">Departement</td>
            <td colspan="5" style="text-align: left">: {{ ucwords($filter) }}</td>
        </tr>
    </table>
    <br>
    
    <table border="1" style="font-size: 14px;width: 100%;">
        <tbody>
            <tr style="font-weight: bold;line-height: 2;text-align: center;background-color: #18c33e;">
                <td colspan="3" style="vertical-align : middle;width: 10px;">KEAHLIAN</td>
                @if (count($attendance_date) > 0)
                    <td colspan="{{ count($attendance_date) }}" style="vertical-align : middle;white-space:normal;
                    width: auto;
                    height: auto;
                    word-wrap: break-word;">TANGGAL ABSEN</td>
                @endif
                <td rowspan="2" style="vertical-align : middle;">Total Kehadiran</td>
            </tr>
            
            <tr style="line-height: 2;text-align: center;background-color: #dee2e6;">
                <td style="width:5px;height: 20px;">No.</td>
                <td>Nama</td>
                <td>Posisi</td>
                {{-- <td>Departement</td> --}}
                
                @foreach ($attendance_date as $d)
                    <td style="min-width:50px; vertical-align: middle; text-align: center; background-color: yellow" >{{ date('d', strtotime($d->tanggal_absen)) }}</td>
                @endforeach
             
            </tr>
                @php
                    $grand_total = 0;
                @endphp

                @forelse ($schedules as $schedule)
                <tr style="text-align: left;" id="master">
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td>{{ $schedule->staff->name }}</td>
                    <td>{{ $schedule->staff->position->name }}</td>
                    {{-- <td>{{ $schedule->staff->departement->name }}</td> --}}
                    @php
                        $sum_kehadiran = 0;
                        $sum_jam = 0;
                        $grand_hari = 0;
                        $grand_lembur = 0;
                        $count_absen_staff = $schedule->absensi->where('periode', $absensi->periode)->count();
                    @endphp
                    @forelse ($schedule->absensi->where('periode', $absensi->periode) as $item)
                        @if ($loop->first)
                            @if (count($attendance_date) != $count_absen_staff)
                                <td style="vertical-align: middle; background-color: #ccc" colspan="{{ intval(count($attendance_date)) - intval($count_absen_staff) }}"></td>
                            @endif 
                        @endif

                        @if ($item->attendance_id != '')     
                            <td style="color: white; text-align: center; background-color: {{ $item->attendance->color }}">
                                {{ $item->attendance->singkatan }}
                            </td>
                        @else
                            <td style="width:20px;text-align: center;"><i style="line-height: 0.2;"></i></td>
                        @endif
                    
                        @php
                            $sum_jam += $item->jumlah_lembur;
                            $sum_kehadiran +=  $item->attendance->value;
                            $grand_hari = $sum_kehadiran * $schedule->schedule;
                            $grand_lembur = $sum_jam * $schedule->uang_overtime;
                        @endphp
                    @empty
                    @endforelse

                    @php
                        $total = $grand_hari + $grand_lembur;
                        $grand_total += $total;
                    @endphp
                    <td style="vertical-align: middle; text-align: center;">{{ $sum_kehadiran }}</td>
                </tr>
                @empty
                    <td style="text-align: center;" colspan="{{ 3 + count($attendance_date) + 7}}">Tidak ada data</td>
                @endforelse
        </tbody>
    </table>       
</body>
</html>