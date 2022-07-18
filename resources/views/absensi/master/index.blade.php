@extends('layouts.app')

@section('styles')
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
                        <a href="{{ route('absensi.create') }}" class="btn btn-default d-none d-md-inline-block ml-auto">
                            <i class="fas fa-plus fa-sm fa-fw"></i> Mulai Absen
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
                                Data Absen
                                <span class="badge badge-danger float-right float-xl-right mt-1">{{ $count }}</span>
                            </div>
                            <table id="datatable" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:100px;">Action</th> 
                                        <th>Periode</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach ($absensi as $item)
                                        <tr>
                                            <td class="text-left">
                                                <a href="{{ route('absensi.detail', $item->periode) }}" class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye fa-sm"></i> Lihat Absen
                                                </a>
                                            </td>
                                            <td>{{ str_replace('-', ', ', strtoupper($item->periode)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('absensi.create') }}" class="btn btn-lg rounded-circle btn-primary btn-fly d-block d-md-none app-shadow">
        <span><i class="fas fa-plus fa-sm align-middle"></i></span>
    </a>

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert-dev.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>
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
                        url:"{{URL::to('/master/tenaga_kerja/destroy')}}",
                        data:"id=" + id ,
                        success: function(html)
                        {
                            swal("Deleted", "Data Berhasil Di Hapus.", "success");
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