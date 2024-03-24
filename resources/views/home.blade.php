@extends('layouts.app')
@section('content')
	<div class="content-wrapper pb-5 pt-3">
		<section class="content pb-3">
			<div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-body p-3">
                          <div class="row">
                            <div class="col-8">
                              <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"  style="font-family: 'Poppins">Salary</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $salary ?? 0 }}
                                </h5>
                              </div>
                            </div>
                            <div class="col-4 text-end">
                              <div class="fas fa-money bg-gradient-primary shadow text-center border-radius-md " style="width: 50px; color:white; height:48px; padding-top: 16px;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-body p-3">
                          <div class="row">
                            <div class="col-8">
                              <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold" style="font-family: 'Poppins">Total Staff</p>
                                <h5 class="font-weight-bolder mb-0">
                                  {{ $staff ?? 0 }}
                                  <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                              </div>
                            </div>
                            <div class="col-4 text-end">
                              <div class="fas fa-users bg-gradient-primary shadow text-center border-radius-md " style="width: 50px; color:white; height:48px; padding-top: 16px;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-body p-3">
                          <div class="row">
                            <div class="col-8">
                              <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"  style="font-family: 'Poppins">Schedule</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $schedule ?? 0 }}
                                </h5>
                              </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="fa fa-calendar bg-gradient-primary shadow text-center border-radius-md " style="width: 50px; color:white; height:48px; padding-top: 16px;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                      <div class="card">
                        <div class="card-body p-3">
                          <div class="row">
                            <div class="col-8">
                              <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"  style="font-family: 'Poppins">Users Account</p>
                                <h5 class="font-weight-bolder mb-0">
                                  {{ $users ?? 0 }}
                                </h5>
                              </div>
                            </div>
                            <div class="col-4 text-end">
                              <div class="fas fa-user bg-gradient-primary shadow text-center border-radius-md " style="width: 50px; color:white; height:48px; padding-top: 16px;">
                              </div>
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
            <div class="social-panel-container">
        <div class="social-panel">
            <p>Created with</i> by
                <a target="_blank" href="https://florin-pop.com">GriyaTech</a>
            </p>
            <button class="close-btn"><i class="fas fa-times"></i></button>
            <h4>Get in touch on</h4>
            <ul>
                <li>
                    <a href="https://www.griyasoft.com" target="_blank">
                        <i class="fas fa-globe"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/griyasoft" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="https://facebook.com/Griyasoft-Banjarnegara" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/cv.griyasoft" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <button class="floating-btn">
        Get in Touch
    </button>
		</section>
</div>
<style>
    @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

* {
    box-sizing: border-box;
}


body {
    /* background-image: linear-gradient(45deg, #7175da, #9790F2); */
    font-family: 'Muli', sans-serif;
    /* justify-content: center;
    flex-direction: column; */
    min-height: 100vh;
    margin: 0;
}

/* .courses-container {} */

.course {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    display: flex;
    max-width: 100%;
    margin: 20px;
    overflow: hidden;
    width: 600px;
}

.course h6 {
    opacity: 0.6;
    margin: 0;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.course h2 {
    letter-spacing: 1px;
    margin: 10px 0;
}

.course-preview {
    background-color: #2A265F;
    color: #fff;
    padding: 30px;
    max-width: 250px;
}

.course-preview a {
    color: #fff;
    display: inline-block;
    font-size: 8px;
    opacity: 0.6;
    margin-top: 30px;
    text-decoration: none;
}

.course-info {
    padding: 30px;
    position: relative;
    width: 100%;
}

.progress-container {
    position: absolute;
    top: 30px;
    right: 30px;
    text-align: right;
    width: 150px;
}

.progress {
    background-color: #ddd;
    border-radius: 3px;
    height: 5px;
    width: 100%;
}

.progress::after {
    border-radius: 3px;
    background-color: #2A265F;
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 5px;
    width: 66%;
}

.progress-text {
    font-size: 10px;
    opacity: 0.6;
    letter-spacing: 1px;
}

.btn-con {
    background-color: #2A265F;
    border: 0;
    border-radius: 50px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    color: #fff;
    font-size: 16px;
    padding: 12px 25px;
    position: absolute;
    bottom: 30px;
    right: 30px;
    letter-spacing: 1px;
}

/* SOCIAL PANEL CSS */
.social-panel-container {
    position: fixed;
    right: 0;
    bottom: 80px;
    transform: translateX(100%);
    transition: transform 0.4s ease-in-out;
}

.social-panel-container.visible {
    transform: translateX(-10px);
}

.social-panel {
    background-color: #fff;
    border-radius: 16px;
    box-shadow: 0 16px 31px -17px rgba(0, 31, 97, 0.6);
    border: 5px solid #001F61;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-family: 'Muli';
    position: relative;
    height: 169px;
    width: 370px;
    max-width: calc(100% - 10px);
}

.social-panel button.close-btn {
    border: 0;
    color: #97A5CE;
    cursor: pointer;
    font-size: 20px;
    position: absolute;
    top: 5px;
    right: 5px;
}

.social-panel button.close-btn:focus {
    outline: none;
}

.social-panel p {
    background-color: #001F61;
    border-radius: 0 0 10px 10px;
    color: #fff;
    font-size: 14px;
    line-height: 18px;
    padding: 2px 17px 6px;
    position: absolute;
    top: 0;
    left: 50%;
    margin: 0;
    transform: translateX(-50%);
    text-align: center;
    width: 235px;
}

.social-panel p i {
    margin: 0 5px;
}

.social-panel p a {
    color: #FF7500;
    text-decoration: none;
}

.social-panel h4 {
    margin: 20px 0;
    color: #97A5CE;
    font-family: 'Muli';
    font-size: 10px;
    line-height: 18px;
    text-transform: uppercase;
}

.social-panel ul {
    display: flex;
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.social-panel ul li {
    margin: 0 10px;
}

.social-panel ul li a {
    border: 1px solid #DCE1F2;
    border-radius: 50%;
    color: #001F61;
    font-size: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50px;
    width: 50px;
    text-decoration: none;
}

.social-panel ul li a:hover {
    border-color: #FF6A00;
    box-shadow: 0 9px 12px -9px #FF6A00;
}

.floating-btn {
    border-radius: 26.5px;
    background-color: #001F61;
    border: 1px solid #001F61;
    box-shadow: 0 16px 22px -17px #03153B;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    line-height: 20px;
    padding: 12px 20px;
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
}

.floating-btn:hover {
    background-color: #ffffff;
    color: #001F61;
}

.floating-btn:focus {
    outline: none;
}

.floating-text {
    background-color: #001F61;
    border-radius: 10px 10px 0 0;
    color: #fff;
    font-family: 'Muli';
    padding: 7px 15px;
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    z-index: 998;
}

.floating-text a {
    color: #FF7500;
    text-decoration: none;
}

@media screen and (max-width: 480px) {

    .social-panel-container.visible {
        transform: translateX(0px);
    }

    .floating-btn {
        right: 10px;
    }
}
</style>

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