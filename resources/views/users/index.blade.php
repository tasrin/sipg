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
                    </div>
                </form>
            </div>
        </div>
    
        <div class="content pb-5">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Data Users
                                <span class="badge badge-danger float-right float-xl-right mt-1">{{ $count }}</span>
                            </div>
                            <table id="datatable" class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                        <th style="width: 100px;"></th> 
                                        <th>Nama</th> 
                                        <th>Username</th>
                                        <th>Role</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr id="hide{{ $item->id }}">
                                            <td class="text-left">
                                                @if (Auth::user()->hasRole('admin'))
                                                    <form onsubmit="return confirm('Password akan direset berdasarkan usernamenya ( {{ $item->username ?? '' }} ), tekan ok untuk melanjutkan')" action="{{ route('users.update', $item->id) }}" method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="reset" value="true">
                                                        <button type="submit" class="btn btn-warning btn-sm btn-reset-password">
                                                            <i class="fa fa-refresh"></i> <span class="pl-1 hidden-xs hidden-sm">Reset Password</span>
                                                        </button>
                                                    </form>
                                                    @if ($item->role->name !== 'admin')
                                                        <a href="javascript:void(0)" onClick="hapus({{$item->id}})" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-times"></i></a>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>{{ strtoupper($item->staff->name ?? '-') }}</td> 
                                            <td>{{ $item->username ?? ''}}</td> 
                                            <td><span class="badge {{ $item->role->name == 'admin' ? 'badge-success':'badge-secondary' }}  text-lowercase">{{ $item->role->name }}</span></td>
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
                        url:"{{URL::to('/users/destroy')}}",
                        data:"id=" + id ,
                        success: function(html)
                        {
                            console.log(id);
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
