@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.6-rc.1/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset ('css/sweetalert.css') }}">
@endsection
@section('content')
    <div class="content-wrapper pb-3">
        <div class="content-header">
            <div class="container-fluid">
                <form>
                    <div class="form-inline">
                        <div class="input-group app-shadow">
                            <div class="input-group-append">
                                <div class="input-group-text bg-white border-0">
                                    <span><i class="fa fa-search"></i> </span>
                                </div>
                            </div>
                            <input type="search" placeholder="Search" aria-label="Search..." class="form-control input-flat border-0" id="search"> 
                        </div> 
                        <a href="{{ route('cuti.create') }}" class="btn btn-default app-shadow d-none d-md-inline-block ml-auto">
                            <i class="fas fa-plus fa-fw"></i> Ajukan Cuti
                        </a>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="content pb-5">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                Data Cuti
                                <span id="count" class="badge badge-danger float-right float-xl-right mt-1">{{ $count }}</span>
                            </div>
                            <table id="datatable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">#</th> 
                                        <th>Staff</th>
                                        <th>Tgl. Mulai</th>
                                        <th>Tgl. Selesai</th>
                                        <th>Durasi</th>
                                        <th>Keterangan</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach ($cuti as $item)
                                        <tr id="hide{{ $item->id }}">
                                            <td class="text-center">
                                                <a href="#" class="text-secondary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @if ($item->status == 0)
                                                        <a class="dropdown-item" href="{{ route('cuti.edit', $item->id) }}">
                                                            <i class="far fa-edit mr-1"></i> Edit
                                                        </a>
                                                    @else
                                                        <span class="m-3">Cuti telah di verifikasi tdk dapat di edit</span>
                                                    @endif
                                                    @if (Auth::user()->hasRole('admin'))
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0)" onClick="hapus({{$item->id}})">
                                                            <i class="far fa-trash-alt mr-2"></i> Hapus
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $item->staff->name ?? '' }}</td> 
                                            <td>{{ tgl_indo($item->tgl_mulai ?? '') }}</td> 
                                            <td>{{ tgl_indo($item->tgl_selesai ?? '') }}</td> 
                                            <td>{{ $item->jumlah_cuti ?? '' }} Hari</td> 
                                            <td>{{ $item->keterangan }}</td>
                                            <td style="min-width: 160px;">
                                                @if ($item->status == 0)
                                                    @if (Auth::user()->hasRole('admin'))
                                                        <form action="{{ route('cuti.validated', $item->id) }}" method="POST" class="float-right">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="input-group">
                                                                <select name="validasi" class="form-control input-sm select2">
                                                                    <option value="">Verifikasi</option>
                                                                    <option value="1">Terima</option>
                                                                    <option value="2">Tolak</option>
                                                                </select>
                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-secondary btn-sm">OK</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <span class="badge badge-warning">Tunggu Persetujuan</span>
                                                    @endif
                                                @else
                                                    <div class="text-right">
                                                        {!! $item->status == 1 ? '<span class="badge badge-success">disetujui</span>' : '<span class="badge badge-danger">ditolak</span>' !!}
                                                    </div>
                                                @endif
                                               
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="loading"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('cuti.create') }}" class="btn btn-lg rounded-circle btn-primary btn-fly d-block d-md-none app-shadow">
        <span><i class="fas fa-plus fa-sm align-middle"></i></span>
    </a>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.6-rc.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert-dev.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>
        $('.select2').select2({
			placeholder : 'Verifikasi..'
        });
        function hapus(id){
            swal({
            title: 'Yakin.. ?',
            text: "Data anda akan dihapus. Tekan tombol yes untuk melanjutkan.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!',
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url:"{{URL::to('/cuti/destroy')}}",
                        data:"id=" + id ,
                        success: function(data)
                        {
                            swal("Deleted", data.message, "success");
                            $("#count").html(data.count);
                            $("#hide"+id).hide(300);
                        }
                    });
                    
                }else{
                    swal("Canceled", "Anda Membatalkan! :)","error");
                }
            });
        }
    </script>
@endsection
