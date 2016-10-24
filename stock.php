<!DOCTYPE html>
<html>
<head>
	<?php

		$id = $_REQUEST["q"];

		mysql_connect("localhost","root") or die(mysql_error());

		mysql_select_db("bloodbank") or die(mysql_error());

		$query = "select * from bloodstocks where bankid = ".$id;
		$stocks = mysql_query($query) or die(mysql_error());
		$stocks = mysql_fetch_array($stocks);

	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device.width, initial-scale=1">
	<script type="text/javascript" src="jquery3.1.1.js"></script>
    <script type="text/javascript" src="Chart.js"></script>
    <script type="text/javascript">
        window.onload = drawchart;
        function drawchart() {
            var ctx = document.getElementById("stock");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["A+", "A-", "B+", "B-", "O+", "O-","AB+","AB-"],
                    datasets: [{
                        label: 'Blood Stock (in litres)',
                        data: [<?php echo($stocks['aplus'].",".$stocks['aminus'].",".$stocks['bplus'].",".$stocks['bminus'].",".$stocks['oplus'].",".$stocks['ominus'].",".$stocks['abplus'].",".$stocks['abminus']) ?>],
                        backgroundColor: [
                            'rgba(228, 6, 19, 1)',
                            'rgba(228, 6, 019, 1)',
                            'rgba(228, 6, 019, 1)',
                            'rgba(228, 6, 019, 1)',
                            'rgba(228, 6, 019, 1)',
                            'rgba(228, 6, 019, 1)',
                            'rgba(228, 6, 019, 1)',
                            'rgba(228, 6, 019, 1)',
                        ],
                        borderColor: [
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(255, 0, 0, 1)',
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
        }
    </script>
</head>
<body>
	<canvas id="stock"></canvas>
</body>
</html>