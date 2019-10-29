<!DOCTYPE html>
<html>
<head>
<title>Top 5 Best Star Rated Products</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
body
{
 background-color:#e9c092;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #e9d192;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    color: #ff8905;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="index.html">Home</a></li>
  <li><a href="adminlogin.html">Admin</a></li>
   <li><a href="contact.php">Contact</a></li>
   <li><a href="/products.html">Products</a></li>

    
 
</ul>

<div class="body" style="background-colour:	#F0E68C; height: 180px; margin-top: -50px;">
<br>
<br>
		<h3 style="color: black; margin-left: 20px; top: 20px; position: relative;">Top 5 Star Rated Products</h3>
	</div>
	<br><br>
	<div style="margin-left: 50px; color: black; margin-top: -330px;">
		<table border="1|6">
		<tr>
			<th>Count</th>
			<th>Product</th>
			<th>Average Rating</th>
		</tr>
		<?php
		$conn = mysqli_connect("54.193.22.204","tester","password","project_281");

		$bestrating = array("Biscuits" => "rating1","Pet Brownies" => "rating2","Pet Candies" => "rating3", "Pet Customized Birthday Cakes" => "rating4", "Pet Cupcakes" => "rating5","Pet Donuts" => "rating6","Pet Fruit Cakes" => "rating7", "Pet Ice Cream Cakes" => "rating8", "Pet Macarons" => "rating9", "Pet Other Desserts" => "rating10");

		$query1 = "SELECT AVG(rating) as rating FROM biscuitsstar;";
		$result = mysqli_query($conn,$query1);

		foreach ($result as $row) {
			$bestrating["Biscuits"] = round($row["rating"],2);
		}

		$query2 = "SELECT AVG(rating) as rating FROM petbrowniesstar;";
		$result = mysqli_query($conn,$query2);

		foreach ($result as $row) {
			$bestrating["Pet Brownies"] = round($row["rating"],2);
		}

		$query3 = "SELECT AVG(rating) as rating FROM petcandiesstar;";
		$result = mysqli_query($conn,$query3);

		foreach ($result as $row) {
			$bestrating["Pet Candies"] = round($row["rating"],2);
		}

		$query4 = "SELECT AVG(rating) as rating FROM petcustomizedstar;";
		$result = mysqli_query($conn,$query4);

		foreach ($result as $row) {
			$bestrating["Pet Customized Birthday Cakes"] = round($row["rating"],2);
		}

		$query5 = "SELECT AVG(rating) as rating FROM petcupcakesstar;";
		$result = mysqli_query($conn,$query5);

		foreach ($result as $row) {
			$bestrating["Pet Cupcakes"] = round($row["rating"],2);
		}

		$query6 = "SELECT AVG(rating) as rating FROM petdonutsstar;";
		$result = mysqli_query($conn,$query6);

		foreach ($result as $row) {
			$bestrating["Pet Donuts"] = round($row["rating"],2);
		}

		$query7 = "SELECT AVG(rating) as rating FROM petfruitstar;";
		$result = mysqli_query($conn,$query7);

		foreach ($result as $row) {
			$bestrating["Pet Fruit Cakes"] = round($row["rating"],2);
		}

		$query8 = "SELECT AVG(rating) as rating FROM peticestar;";
		$result = mysqli_query($conn,$query8);

		foreach ($result as $row) {
			$bestrating["Pet Ice Cream Cakes"] = round($row["rating"],2);
		}

		$query9 = "SELECT AVG(rating) as rating FROM petmacaronsstar;";
		$result = mysqli_query($conn,$query9);

		foreach ($result as $row) {
			$bestrating["Pet Macarons"] = round($row["rating"],2);
		}

		$query10 = "SELECT AVG(rating) as rating FROM petotherstar;";
		$result = mysqli_query($conn,$query10);

		foreach ($result as $row) {
			$bestrating["Pet Other Desserts"] = round($row["rating"],2);
		}

		echo "<br>";

		asort($bestrating);
		// print_r($bestrating);

		$final = array_reverse($bestrating);
                $finalChart = array_slice($final,0,5);
		echo "<br>";
		// print_r($final);
		$count = 1;

		// echo "<strong>The 5 Top Star Rated Products are - </strong>"."<br /><br />";

		foreach($final as $key => $value) {
				if($count <= 5){
					 echo "<tr><td>".$count."</td><td>".$key."</td><td>".$value."</td></tr>";
					$count++;
				}
			}
	?>
	</div>

        <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Product', 'Stars'],
          <?php 
          	foreach ($finalChart as $key => $value) {
          		echo "['".$key."',".$value."],";
          	}

          ?>
        ]);

        var options = {
          title: 'Most Star Rated Products'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <div id="piechart" style="width: 500px; height: 250px; position: relative; top: 480px; left: 450px;"></div>
    
  
</body>
</html>


