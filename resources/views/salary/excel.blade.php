@php
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-type: application/octet-stream");
    header ("Content-Disposition: attachment; filename=Laporan-salary-staff-".strtolower($staff->name)."-periode-".ucwords($filter ?? 'All').".xls");
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
        <b>DATA SALARY STAFF</b>
    </div>         
    
    <br>
    <table style="">
        <tr>
            <td width="100">Nama</td>
            <td colspan="3">: {{ $staff->name }}</td>
        </tr>
        <tr>
            <td width="100">Position Status</td>
            <td colspan="3">: {{ $staff->position->status }}</td>
        </tr>
        <tr>
            <td>Periode</td>
            <td colspan="3">: {{ ucwords($filter ?? 'All') }}</td>
        </tr>
    </table>
    <br>
    
    <table border="1" style="font-size: 14px;width: 100%;">
        <thead>
            <tr style="background-color: royalblue">
                <th>Periode</th>
                <th>Salary</th>
                <th>Tgl. Salary</th>
                <th>Status</th>
                <th>Lembur</th>
                <th>Gaji Lembur</th>
                @if ($staff->position->status == 'Staff')
                    <th>BPJS</th>
                    <th>Transportasi</th>
                @endif
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($salary as $item)
                <tr style="line-height: 1;">
                    <td>{{ ucwords($item->periode) }}</td>
                    <td>Rp. {{ number_format($item->salary, 0, ',', '.') }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tgl_salary)) }}</td>
                    <td style="background-color:  {{ $item->status_gaji == 'Dibayar' ? 'green' : 'yellow' }}">{{ $item->status_gaji ?? 'Belum Dibayar' }}</td>
                    <td>{{ $item->jumlah_overtime }}</td>
                    <td>Rp. {{ number_format($item->uang_overtime, 0, ',', '.') }} / Jam</td>
                    @if ($staff->position->status == 'Staff')
                    <td>Rp. {{ number_format($item->pot_bpjs, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($item->transportasi, 0, ',', '.') }}</td>
                    @endif
                    <td style="font-weight: bold;">Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="7">Tidak ada data untuk ditampilkan</td>
                </tr>
            @endforelse
        </tbody>
    </table>       
</body>
</html>