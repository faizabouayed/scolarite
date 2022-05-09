@extends('layouts.MenuEnseignant')
@Section('content')

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
            google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);


      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Année', 'Enseignants', 'Etudiants'],
          ['2018', {{$s1}}, {{$se1}}],
          ['2019', {{$s2}}, {{$se2}}],
          ['2020', {{$s3}}, {{$se3}}],
          ['2021',  {{$s4}}, {{$se4}}],
          ['2022',  {{$s5}}, {{$se5}}]
        ]);

        var options = {
          chart: {
            title: ' Date Incription et Recrutement',
            subtitle: 'Etudiants, Enseignants',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

       function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['SIC',    {{$etud_sic}}],
          ['GL',     	{{$etud_gl}}],
          ['MID', 	{{$etud_mid}}],
          ['RSD',    	{{$etud_rsd}}]
        ]);

        var options = {
          title: 'Etudiants par option'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }




    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
       <div id="piechart" style="width: 900px; height: 500px;"></div>
   



    
  </body>
</html>




@endsection