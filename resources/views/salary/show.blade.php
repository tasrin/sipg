@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.6-rc.1/dist/css/select2.min.css">
@endsection
@section('content')
    <div class="content-wrapper pb-3">
        <div class="content pb-5 pt-3">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h3 class="card-title back-top" style="margin-top: 5px;">
                                    <a href="{{ route('salary.index') }}" title="Kembali" data-toggle="tooltip" data-placement="right" class="btn text-muted">
                                        <i class="fa fa-arrow-left fa-fw"></i></span>
                                    </a>
                                </h3>
                                <div class="float-left offset-5 pt-1">
                                    <span class="d-none d-md-block d-lg-block">{{ $title ?? '' }}</span>
                                </div>
                                <div class="float-right row">
                                    <form action="{{ url()->current() }}">
                                        <div class="input-group">
                                            <select name="filter" class="form-control input-sm select2">
                                                <option value="">Tampilkan semua</option>
                                                @if (!empty($filter))
                                                    <option value="all">SHOW ALL</option>
                                                @endif
                                                @foreach ($periode as $item)
                                                    <option value="{{ $item->periode }}" {{ $item->periode == old('filter', $filter) ? 'selected':'' }}>{{ strtoupper($item->periode) }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-secondary btn-sm">Filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> 
                                <table class="table no-border header-table mb-0 ml-2 mt-2">
                                    <tr style="line-height: 1px;">
                                        <td width="100">Nama</td>
                                        <td width="10" class="text-center">:</td>
                                        <td>{{ $staff->name }}</td>
                                    </tr>
                                    <tr style="line-height: 1px;">
                                        <td width="100">Position Status</td>
                                        <td width="10" class="text-center">:</td>
                                        <td>{{ $staff->position->status }}</td>
                                    </tr>
                                    <tr style="line-height: 1px;">
                                        <td>Periode</td>
                                        <td>:</td>
                                        <td>{{ ucwords($filter ?? 'All') }}</td>
                                    </tr>
                                </table>
                            <div class="table-responsive">
                                <div class="card-body p-3">
                                    <table class="table table-bordered mb-0" style="font-size: 14px;">
                                        <thead>
                                            <tr class="bg-light">
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
                                                    <td>
                                                        <span class="badge {{ $item->status_gaji == 'Lunas' ? 'badge-success' : 'badge-danger' }}">{{ $item->status_gaji ?? 'Belum Lunas' }}</span>
                                                    </td>
                                                    <td>{{ $item->jumlah_overtime }}</td>
                                                    <td>Rp. {{ number_format($item->uang_overtime, 0, ',', '.') }} / Jam</td>
                                                    @if ($staff->position->status == 'Staff')
                                                    <td>Rp. {{ number_format($item->pot_bpjs, 0, ',', '.') }}</td>
                                                    <td>Rp. {{ number_format($item->transportasi, 0, ',', '.') }}</td>
                                                    @endif
                                                    <td class="font-weight-bold">Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="9">Tidak ada data untuk ditampilkan</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    @if (!empty($filter))
                                        <a href="{{ route('salary.export.excel', [$staff->id, $filter]) }}" class="btn btn-success btn-sm" id="export-excel">
                                            <i class="fa fa-file-excel-o fa-fw"></i> Export Excel
                                        </a>
                                    @else
                                        <a href="{{ route('salary.export.excel', [$staff->id, 'all']) }}" class="btn btn-success btn-sm" id="export-excel">
                                            <i class="fa fa-file-excel-o fa-fw"></i> Export Excel
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div id="loading"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.6-rc.1/dist/js/select2.min.js"></script>
@include('alert.mk-notif')
    <script>
        $('.select2').select2({
			placeholder : 'Periode..'
        });
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });

        $('#export-excel').on("click", function () {
            $(this).addClass('disabled');
            setTimeout(RemoveClass, 1000);
        });

        function RemoveClass() {
            $('#export-excel').removeClass("disabled");
		}
    </script>
@endsection