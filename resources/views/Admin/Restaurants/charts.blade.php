@extends('layouts.dashboard')

@section('sideMap')
<div class="col-xs-12 col-md-3 col-lg-2">
    <a href="{{ route('admin.restaurants.index')}}"><i class="fas fa-utensils"></i> Ristoranti</a>
</div>
@endsection

@section('content')
<canvas id="myChart"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script>
    var datas = {!! json_encode($datas) !!};

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {

        type: 'bar',
        data: {
            labels: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
            datasets: [{
                label: 'Ordini per mese',
                backgroundColor:[
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(255, 99, 132, 0.6)'
            ],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                borderColor: 'rgb(255, 99, 132)',
                data:datas
            }]
        },
        options:{
        title:{
          display:true,
          text:'Statistiche Ordini',
          fontSize:25
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        },
      }
    });
</script>
@endsection