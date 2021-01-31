<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
	<title>Cricket boards</title>
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
</style>
</head>
<body>
	<button class="btn btn-light " style="float:left"><a href="user1st.html" style="color:">Back</a></button>
	 <div style=" style : center;color:white;">
	 <h3 align="center">Cricket Boards</h3>
	 <hr >
	<table align="center"  class="table table-hover table-dark">
		<tr>
			<th scope="col">Board Name</th>
			<th scope="col">Team's Board</th>
			
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="select * from cricket_boards";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr><th>".$row["board_name"]."</th>"."<th>".
			$row["team"]."</th><tr>";
			
			}
		}
		mysqli_close($con);
		?>
	</table>
</body>
</html>
<!--$row["DOA"]."</th></tr>";-->