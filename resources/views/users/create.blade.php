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
                                <a href="{{ route('users.index') }}" class="btn text-muted">
                                    <i class="fa fa-arrow-left fa-fw"></i></span>
                                </a>
                            </div>
                            </div> 
                            <form action="{{ route('users.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @include('users._form')
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
