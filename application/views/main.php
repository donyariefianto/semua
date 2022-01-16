<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <title>CodeIgniter 3 ChartJS - Jaranguda.com</title>
  </head>
  <body>
 
  <div class="container">
    <canvas id="myChart"></canvas>
  </div>
 
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">
    var col = '#fafafa';
    var ind = {
            label: 'industri',
        //     backgroundColor: transparent ,
            borderColor: '#8cd472',
            data: [23,89,34,56,98,12
            ]
    }
    var agr = {
            label: 'agro',
        //     backgroundColor: '#ADD8E6',
            borderColor: '#00c0ff',
            data: [90,23,54,18,43,75
            ]
    }
    var est = {
            label: 'estate',
        //     backgroundColor: '#ADD8E6',
            borderColor: '#c0caea',
            data: [45,65,56,98,12,43
            ]
    }
    var dir = {
            label: 'direksi',
            // backgroundColor: '#ADD8E6',
            borderColor: '#ffff4d',
            data: [38,34,34,12,76,34
            ]
    }
    var trd = {
            label: 'trading',
            // backgroundColor: '#ADD8E6',
            borderColor: '#ffc19a',
            data: [37,56,23,69,62,75
            ]
    }
    var hotel = {
            label: 'hotel',
            // backgroundColor: '#ADD8E6',
            borderColor: '#ff8da1',
            data: [56,29,64,67,98,23
            ],
    }
  
        
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["jan","feb","mar","apr","mei","jun",
        "jul","agst","sep","nov","okt","des" 
        ],
        datasets: [hotel,agr,ind,est,trd,dir], 
    },
});
 
  </script>
  </body>
</html>