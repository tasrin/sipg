
@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper pb-5 pt-3">
    <section class="content pb-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 order-last order-md-first">
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="text-center">
                                <h3 class="card-title">Profil Detail</h3>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <td width="10">Nama</td>
                                            <td width="5">:</td>
                                            <td>{{ $staff->name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="10">Position</td>
                                            <td width="5">:</td>
                                            <td>{{ $staff->position->name ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <td width="10">Departement</td>
                                            <td width="5">:</td>
                                            <td>{{ $staff->departement->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tgl. Lahir</td>
                                            <td>:</td>
                                            <td>{{ (tgl_indo($staff->birth ?? '-')) }}</td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td>:</td>
                                            <td>{{ $staff->phone ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>{{ ucwords($staff->addres ?? '-') }}</td>
                                        </tr>
                                      </tbody>
                                 </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 order-first order-md-last">
                    <div class="card">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if (Auth::user()->staff->id == $staff->id)
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset($staff->photo ?? 'img/user.jpg') }}" alt="User profile picture" style="width: 100px; height: 100px;">
                                    <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" style="display: none">
                                        @csrf
                                        @method('patch')
                                        <input type="file" name="picture" accept=".jpg, .png, .jpeg" id="UploadFotoProfil">
                                    </form>
                                @else
                                    <img class="profile-user-img img-fluid img-circle" src="{{ ('img/user.jpg') }}" alt="User profile picture" style="width: 100px; height: 100px;">
                                @endif
                            </div>
                            <h3 class="profile-username text-center  pt-2">{{ ucwords(Auth::user()->staff->name ?? Auth::user()->name) }}</h3>
                            <p class="text-muted text-center">{{ Auth::user()->role->name ?? '' }}</p>
                        </div>
                        <div class="card-body p-0 table-responsive">
                            <table border="0" class="table table-hover nowrap" id="url-custom">
                                {{-- <tr data-href="javascript:void(0)" class="bg-info ganti-foto" title="Klik Untuk Mengganti Foto" data-toggle="tooltip" data-placement="bottom">
                                    <td><i class="fas fa-upload mr-2"></i> Ganti Foto</td>
                                </tr> --}}
                                <tr data-href="{{ route('profile.edit', Auth::user()->staff->id) }}" title="Perbarui profil anda." data-toggle="tooltip" data-placement="bottom">
                                    <td><i class="fa fa-pencil mr-2 text-warning"></i> Edit Profile</td>
                                </tr>
                                <tr data-href="{{ route('users.account.edit', Auth::user()->id) }}" title="Edit username dan password anda." data-toggle="tooltip" data-placement="bottom">
                                    <td><i class="fas fa-key mr-2"></i> Account</td> 
                                </tr>
                                <tr data-href="{{ route('help') }}" title="Klik untuk melihat petunjuk penggunaan menu" data-toggle="tooltip" data-placement="bottom">
                                    <td><i class="fas fa-question mr-2"></i> Help</td> 
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/sweetalert-dev.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#url-custom tr').click(function(){
            window.location = $(this).data('href');
            return false;
        });

        $('.ganti-foto').on('click', function(event) {
            event.preventDefault();
            $('input[name=picture]').click();
        });

        $('input[name=picture]').change(function() {
            this.form.submit();
        });
    });
</script>
@endsection