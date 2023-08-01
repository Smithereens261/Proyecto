@extends('adminlte::page')

@section('title', 'Grafica')

@section('content_header')
    <h1>Personas que usan el transporte al día</h1>
@stop

@section('content')
    <canvas id="myChart"></canvas>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var graficaData = @json($graficas);

        // Sorting the data by date in ascending order
        graficaData.sort((a, b) => new Date(a.fecha) - new Date(b.fecha));

        // Function to convert date to the client's local time zone
        function convertToLocalDate(dateString) {
            var date = new Date(dateString);
            var clientOffset = new Date().getTimezoneOffset();
            var localDate = new Date(date.getTime() + (clientOffset * 60000));
            return localDate.toLocaleDateString();
        }

        // Extracting dates and usos from the sorted data and formatting dates
        var dates = graficaData.map(data => convertToLocalDate(data.fecha));
        var usos = graficaData.map(data => data.usos);

        // Creating the bar chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Número de personas que usan el transporte al día',
                    data: usos,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@stop
