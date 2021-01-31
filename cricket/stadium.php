<!DOCTYPE html>
<html>
<head>
    <title>IPL DATABASE MANAGEMENT</title>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
  </head>
<style >
	body{
		background:#2d2d2d;
	}
	hr {
  border: 1px solid white;
}
</style>

	
</head>
<body >
<button class="btn btn-light " style="float:left"><a   href="admin1st.html">Back</a></button>
	 <div style="color:white; " >
	 <h2 align="center">Stadiums</h2>
	 <hr >
	<table class="table table-hover table-dark" align="center" >
		<tr>
			<th scope="col">Stadium Name</th>
			<th scope="col">Capacity</th>
			<th scope="col">Board Name</th>
			<th scope="col">Team's Stadium</th>
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="call stadium()";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr ><td  >".$row["stadium_name"]."</td>"."<td>".
			$row["capacity"]."</td><td>".

			$row["board_name"]."</td><td>".
			$row["team"]."</td></tr>";
			}
		}
		mysqli_close($con);
		?>
	</table>
</body>
</html>