@extends('template')
@section('title','Dashboard')
@section('css')

@endsection

@section('konten')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row mt-5">
    <center>
        <div class="card" style="width: 18rem;">
            <div class="card-header">
               <strong>Customer</strong> 
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Total Customer : {{$count_customer}} </li>
            </ul>
        </div>

        <div style="height:auto; max-width:75%; cursor:pointer;" class="mt-3">
		        <canvas id="myChart"></canvas>
	    </div>
        
    </center>
</div>

@endsection

@section('script')
<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
                    <?php
                    foreach ($kota_customer as $kp){
                            echo " ' ";
                            echo  $kp->kota_customer;
                            echo " ' ";
                            echo ',';
                    }
                    ?>
                ],
				datasets: [{
					label: '# Kota Customer',
					data: [
                    <?php
                    foreach ($kota_customer as $kp){
                            echo " ' ";
                            echo  $kp->kota;
                            echo " ' ";
                            echo ',';
                    }
                    ?>
                    ],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
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
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
@endsection
