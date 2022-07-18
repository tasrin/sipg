@extends('layouts.app')
@section('content')
	<div class="content-wrapper pb-5 pt-3">
		<section class="content pb-3">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-12">
								<div class="info-box bg-info-gradient">
									<span class="info-box-icon"><i class="fa fa-money"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Salary</span>
										<span class="info-box-number">{{ $salary ?? 0 }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-12">
								<div class="info-box bg-success-gradient">
									<span class="info-box-icon"><i class="fa fa-calendar"></i></span>
		
									<div class="info-box-content">
										<span class="info-box-text">Schedule</span>
										<span class="info-box-number">{{ $schedule ?? 0 }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-12">
								<div class="info-box bg-secondary-gradient">
									<span class="info-box-icon"><i class="fa fa-user-circle"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Staff</span>
										<span class="info-box-number">{{ $staff ?? 0 }}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<div class="col-md-5 col-sm-12 col-12 mb-3 float-left">
							<div class="text-center">Jumlah Staff berdasarkan Departement</div>
							<canvas id="BarChartStaffDepartement" width="200" height="200"></canvas>
						</div>
						<div class="col-md-5 col-sm-12 col-12 mb-3 float-right">
							<div class="text-center">Jumlah Staff berdasarkan Position</div>
							<canvas id="BarChartStaffPosition" width="200" height="200"></canvas>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
	$('.alert').fadeOut(7000);
    var bar_staff_departement = document.getElementById('BarChartStaffDepartement').getContext('2d');
    var bar_staff_position = document.getElementById('BarChartStaffPosition').getContext('2d');
    
    // Statistik Staff Departement

    var Departement = [];
    var CountDepartement = [];
    $.get("{{ url('/home/getStaffDepartement')}}", function(data){

        $.each(data, function(i,item){
            Departement.push(item.name_departement);
            CountDepartement.push(item.count);
        });

        var myChart = new Chart(bar_staff_departement, 
        {
            type: 'bar',
            data: {
                labels: Departement,
                datasets: [{
                    label: 'Jumlah Staff',
                    data: CountDepartement,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });

    // Statistik Staff Position

    var Position = [];
    var CountPosition = [];
    $.get("{{ url('/home/getStaffPosition')}}", function(data){
        $.each(data, function(i,item){
            Position.push(item.name_position);
            CountPosition.push(item.count);
        });
    
        var myChart = new Chart(bar_staff_position, {

            type: 'bar',
            data: {
                labels: Position,
                datasets: [{
                    label: 'Jumlah Staff',
                    data: CountPosition,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
</script>
@endsection