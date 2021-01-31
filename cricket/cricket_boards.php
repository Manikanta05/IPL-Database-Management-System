<!DOCTYPE html>
<html>
<head>
    <title>Cricket Boards</title>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
 
<style >
	body{
		background:#2d2d2d;
	}
</style>

</head>
<body>
	<button class="btn btn-light " style="float:left;margin-right:10px;"><a href="admin1st.html" style="color:">Back</a></button>
	
	 <div style="color:white;style : center" >
	 <h1>Cricket Boards</h1><br>
	<table  class="table table-hover table-dark" >
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