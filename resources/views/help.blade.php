@extends('layouts.app')
@section('content')
<div class="content-wrapper pb-5 pt-3">
    <section class="content pb-3">
        <div class="col-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-justify">
                        <div class="card-header">
                            {{ $title ?? 'Butuh Bantuan' }}
                            <div class="float-right">
                                <a href="#" class="text-secondary nav-link pt-0 pb-0 pr-0 rounded-circle" title="Lihat opsi" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu text-center pl-3" style="width: 20px;">
                                    <a href="javascript:void(0)" class="text-secondary"><i class="fa fa-question"></i> Buat Form Bantuan</a><br>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Description</h5>
                            <p class="card-text">Halaman ini didesain untuk membantu user atau pengguna aplikasi {{ config('app.name', 'Laravel') }}. Jika saat penggunaan aplikasi ini ada yang
                                dibingunkan silahkan anda baca cara penggunaan icon yang ada dibawah ini atau hubungi adminsitrator atau developer untuk lebih cepat mengatasi masalah yang dihadapi.
                                selanjutnya anda juga dapat membuat form pengaduan atau form bantuan untuk di kirim ke developer. silahkan anda buat form bantuan yang ada dibawah ini :
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            <button type="submit" class="btn btn-primary">Buat Form Bantuan</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-light">
                            Daftar icon
                            <div class="float-right">
                                {{-- <i class="fas fa-ellipsis-v"></i> --}}
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table" style="white-space: normal;">
                                <tr class="align-top">
                                    <td width="20">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </td>
                                    <td>
                                        Menu ini adalah menu Pilihan / opsi yang mana didalamnya ada icon lagi yang harus anda pilih
                                    </td>
                                </tr>
                                <tr class="align-top">
                                    <td width="30">
                                        <i class="fa fa-plus"></i>
                                    </td>
                                    <td>
                                        Menu ini adalah menu untuk menambah data
                                    </td>
                                </tr>
                                <tr class="align-top">
                                    <td width="20">
                                        <i class="fa fa-trash"></i>
                                    </td>
                                    <td>
                                        Menu ini adalah menu untuk menghapus data
                                    </td>
                                </tr>
                                <tr class="align-top">
                                    <td width="20">
                                        <i class="fa fa-pencil"></i>
                                    </td>
                                    <td>
                                        Menu ini adalah menu untuk mengedit / merubah data
                                    </td>
                                </tr>
                                <tr class="align-top">
                                    <td width="20">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </td>
                                    <td>
                                        Menu ini adalah menu untuk berkas atau laporan document
                                    </td>
                                </tr>
                                <tr class="align-top">
                                    <td width="20">
                                        <i class="fas fa-key"></i>
                                    </td>
                                    <td>
                                        Menu ini adalah menu untuk mengedit akun user anda yakni merubah username dan password anda.
                                    </td>
                                </tr>
                                <tr class="align-top">
                                    <td width="20">
                                        <i class="fa fa-question"></i>
                                    </td>
                                    <td>
                                        Menu ini adalah menu bantuan, untuk membantu bagaimana cara menggunakan aplikasi, fungsi icon yang ada pada aplikasi
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            Create Data
                            {{-- <div class="float-right">
                                <i class="fas fa-ellipsis-v"></i>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <h1 class="text-center py-2">
                                <i class="fas fa-user-plus fa-2x text-danger"></i>
                            </h1>
                            <h5 class="card-title">Catatan :</h5>
                            <p class="card-text">
                                Ketika anda melakukan penambahan data tunggu proses loading sampai selesai untuk mencegah terjadinya kesalahan input data.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection