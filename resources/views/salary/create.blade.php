@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.6-rc.1/dist/css/select2.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker@3.0.3/daterangepicker.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" />
    @endsection
@section('content')
    <div class="content-wrapper pb-3 pt-3">
        <div class="content pb-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="text-center">
                                    <h3 class="card-title">{{ $title }}</h3>
                                </div>
                                <div class="back-top">
                                <a href="{{ route('salary.index') }}" class="btn text-muted">
                                    <i class="fa fa-arrow-left fa-fw"></i></span>
                                </a>
                            </div>
                            </div> 
                            <form action="{{ route('salary.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @include('salary._form')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js" integrity="sha512-zHDWtKP91CHnvBDpPpfLo9UsuMa02/WgXDYcnFp5DFs8lQvhCe2tx56h2l7SqKs/+yQCx4W++hZ/ABg8t3KH/Q==" crossorigin="anonymous"></script>
<script>
    	$('.select2').select2({
			placeholder : 'Pilih Data..'
        });
     
        $(function() {
            $('.datepicker').datepicker({
                    language: 'id',
                    format: 'MM-yyyy',
                    viewMode: "months", 
                    minViewMode: "months",
                    autoClose:true,
                });
            });
        
	</script>
@endsection
