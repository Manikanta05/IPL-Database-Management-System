<!DOCTYPE html>
<html>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
<style >
	body{
		background:#2d2d2d;
	}
	table{
		border: 1px solid black;
	}
	tr{
		border: 1px solid black;
	}
	th{
		border: 1px solid black;
	}
	hr {
  border: 1px solid white;
}
</style>
<head><p>
	<title>SCHEDULES</title>
</head>
<body>
	<button class="btn btn-light " style="float:left"><a href="user1st.html" >Back</a></button>
	 <div style=" style : center;color:white;" >
	 <h3 align="center">Schedule</h3>
	 <hr >
	<table align="center" class="table table-hover table-dark">
		<tr>
			<th scope="col">Date</th>
			<th scope="col">Team1</th>
			<th scope="col">Team2</th>
			<th scope="col">Match Number</th>
			<th scope="col">VENUE</th>
			<th scope="col">Winner</th>
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="select * from schedules s,played_in p where  s.date=p.date and s.team1=p.team1 order by s.date";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr><th>".$row["date"]."</th><th>".
			$row["team1"]."</th><th>".
			$row["team2"]."</th><th>".
			$row["match_no"]."</th><th>".$row["stadium_name"]."</th><th>".$row["winner"]."</th></tr>";
			}
		}
		mysqli_close($con);
		?>



		 <form action="ttu.php" method="post"><table><tr align="center">
            <p style="text-align: center;font-size: 25;color:white">Enter Match Number to retrieve players
            <input type="number" name="match_no" style="width: 300;height: 25;"><br><br>
            <input type="submit" style="float:center;" value="Submit">
            </p></tr></table>
    </form>




</body>
</html>