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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="text-center">
                                    <h3 class="card-title">{{ "Input Salary ". $request->status }}</h3>
                                </div>
                                <div class="back-top">
                                <a href="{{ route('salary.index') }}" class="btn text-muted">
                                    <i class="fa fa-arrow-left fa-fw"></i></span>
                                </a>
                            </div>
                            </div> 
                            <form action="{{ route('salary.detail.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @include('salary.detail._form')
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
        $("#form-lembur input").inputFilter(function(value) {
            return /^-?\d*$/.test(value); 
        });

        $("#KaryawanBulanan input").inputFilter(function(value) {
            return /^-?\d*$/.test(value); 
        });

    	$('.select2').select2({
			placeholder : 'Pilih Data..'
        });
        
		$('.datepicker').daterangepicker({
		  singleDatePicker: true,
		  showDropdowns: true,
          autoUpdateInput: true,
          drops: 'down'
        });

        @if ($errors->any())
            $(document).ready(function() {
                var el = document.getElementsByClassName('toggle-form-lembur')[0];
                if (el.checked) {
                    $('#form-lembur').show();
                    $('#form-lembur input').removeAttr('disabled');
                }
            });
        @endif

        $('input[name=lembur]').change(function(){
            $('#form-lembur').toggle();
            if (this.checked == true) {
                $('#form-lembur').show();
                $('#form-lembur input').removeAttr('disabled');
                $('#form-lembur input').attr('required', "");

                HitungTotalLembur();

            } else if(this.checked == false) {
                $('input[name=lembur]').prop('checked', false);
                $('#form-lembur input').attr('disabled', true);
                $('#form-lembur input').removeAttr('required', "");
                
                let jam_lembur = $("#jam_lembur").val(0);
                let gaji_lembur = $('#gaji_lembur').val(0);
                let salary    = $('#total_salary_hidden').val();
                let pot_bpjs    = $('#pot_bpjs').val();
                let transportasi = $('#transportasi').val();
                let total = parseInt(pot_bpjs) + parseInt(transportasi) + parseInt(salary);
                $('#grand_total_salary').html(to_rupiah(total));
                $('#grand_total_salary_hidden').val(total);
                $('#gaji_lembur_preview').html(to_rupiah(0));
            }
        });

        $('select[name=staff_id]').change(function(){
            var staff_id = $(this).val();
            var periode  = "{{ $request->periode }}";
            $.ajax({
                url:"{{URL::to('/staff/get_salary')}}",
                data:{"staff_id" : staff_id, "periode": periode},
                success: function(html)
                {
                    let position = html.get_position
                    @if($request->status != "Staff")
                        let count = html.count_kehadiran
                    @else
                        let count = 1;
                    @endif
                    console.log(html);
                    $('input[name=total_kehadiran]').val(count);
                    $('#salary_preview').html(to_rupiah(position.salary));
                    $('#total_kehadiran').html(count);

                    let total_salary = parseInt(count) * parseInt(position.salary);
                    $('#total_salary').html(to_rupiah(total_salary));
                    $('#total_salary_hidden').val(total_salary)

                    $('#total_salary_hidden_preview').html(to_rupiah(position.salary));
                    if($('#grand_total_salary_hidden').val() == 0)
                    {
                        $('button[name=submit]').removeAttr('disabled');
                    }
                    @if($request->status == "Staff")
                        HitungTotal();
                    @else
                        $('#grand_total_salary').html(to_rupiah(total_salary));
                    @endif

                    HitungTotalLembur();
                }
            });
        });

        $(document).ready(function(){
            @if($request->status == "Daily Worker")
                $("#KaryawanBulanan").attr('style', 'display:none')
                $("#KaryawanHarian").removeAttr('style', 'display:none')
            @endif
        });
       
        $(document).on('keyup', '#pot_bpjs', function(){
            let salary    = $('#total_salary_hidden').val();
            let pot_bpjs    = $('#pot_bpjs').val();
            let total = parseInt(pot_bpjs) + parseInt(salary);
            $('#grand_total_salary').html(to_rupiah(total));
            $('#pot_bpjs_preview').html(to_rupiah(pot_bpjs));
        });

        $(document).on('keyup', '#transportasi', function(){
            HitungTotal();
            let transportasi = $('#transportasi').val();
            $('#transportasi_preview').html(to_rupiah(transportasi));
        });

        $(document).on('keyup', '#gaji_lembur', function(){
            let jam_lembur = $("#jam_lembur").val();
            let gaji_lembur = $(this).val();
            let total_lembur = parseInt(jam_lembur) * parseInt(gaji_lembur);
            $('#gaji_lembur_preview').html(to_rupiah(total_lembur));
            let salary    = $('#total_salary_hidden').val();
            let pot_bpjs    = $('#pot_bpjs').val();
            let transportasi = $('#transportasi').val();
            let total = parseInt(pot_bpjs) + parseInt(transportasi) + parseInt(salary) + parseInt(total_lembur);
            $('#grand_total_salary').html(to_rupiah(total));
            $('#grand_total_salary_hidden').val(total);
        });

        function  HitungTotalLembur()
        {
            let jam_lembur = $("#jam_lembur").val();
            let gaji_lembur = $('#gaji_lembur').val();
            let total_lembur = parseInt(jam_lembur) * parseInt(gaji_lembur);
            let salary    = $('#total_salary_hidden').val();
            let pot_bpjs    = $('#pot_bpjs').val();
            let transportasi = $('#transportasi').val();
            let total = parseInt(pot_bpjs) + parseInt(transportasi) + parseInt(salary) + parseInt(total_lembur);
            $('#grand_total_salary').html(to_rupiah(total));
            $('#grand_total_salary_hidden').val(total);
        }

        function HitungTotal()
        {
            let salary    = $('#total_salary_hidden').val();
            let pot_bpjs    = $('#pot_bpjs').val();
            let transportasi = $('#transportasi').val();
            let total = parseInt(pot_bpjs) + parseInt(transportasi) + parseInt(salary);
            $('#grand_total_salary').html(to_rupiah(total));
            $('#grand_total_salary_hidden').val(total);
        }

        function to_rupiah(angka){
            var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
            var rev2    = '';
            for(var i = 0; i < rev.length; i++){
                rev2  += rev[i];
                if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                    rev2 += '.';
                }
            }
            return 'Rp. ' + rev2.split('').reverse().join('');
        }
	</script>
@endsection
