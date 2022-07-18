@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.6-rc.1/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker@3.0.3/daterangepicker.css">
@endsection

@section('content')
    <div class="content-wrapper pb-3 pt-3">
        <div class="content pb-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                    <h3 class="card-title">{{ $title }}</h3>
                                </div>
                                <div class="back-top">
                                <a href="{{ url()->previous() }}" class="btn text-muted" title="Kembali" data-toggle="tooltip" data-placement="right">
                                    <i class="fa fa-arrow-left fa-fw"></i></span>
                                </a>
                            </div>
                            </div> 
                            <form action="{{ route('users.account.update', $users->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="username_old" value="{{ $users->username ?? '' }}">
                                <div class="card-body">
                                    <div class="card card-solid">
                                        <div class="card-body pb-0 pt-3">
                                            <blockquote>
                                            <b>Keterangan!!</b><br>
                                            <small><cite title="Source Title">Inputan Yang Ditanda Bintang Merah (<span class="text-danger">*</span>) Harus Di Isi !!</cite></small>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="card-header with-border pl-0 pb-1">
                                        <span class="col-form-label text-bold">USER AKSES</span>
                                    </div>
                                    <br> 
                                    <div class="form-group row">
                                        <label class="col-md-4 col-xs-4 col-form-label">Username <span class="text-danger">*</span></label> 
                                        <div class="col-12 col-md-5 col-lg-5">
                                            <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username', $users->username ?? '') }}"  placeholder="Username.." autocomplete="off" required>
                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-xs-4 col-form-label">New Password</label> 
                                        <div class="col-12 col-md-5 col-lg-5">
                                            <input type="password" name="password_new" class="form-control{{ $errors->has('password_new') ? ' is-invalid' : '' }}" value="{{ old('password_new') }}"  placeholder="Password baru.." autocomplete="off">
                                            <span class="text-muted">Harap diisi jika ingin reset password</span>
                                            @if ($errors->has('password_new'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password_new') }}</strong>
                                                </span>
                                            @endif
                                        </div> 
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="offset-md-4">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-check-double mr-1"></i> Simpan</button> 
                                            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker@3.0.3/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker@3.0.3/daterangepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker@3.0.3/daterangepicker.min.js"></script>
    <script>
    	$('.select2').select2({
			placeholder : 'Pilih Data..'
        });
        
		$('.datepicker').daterangepicker({
		  singleDatePicker: true,
		  showDropdowns: true,
          autoUpdateInput: true,
          drops: 'up'
		});

	</script>
@endsection
