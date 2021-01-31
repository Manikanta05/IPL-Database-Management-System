<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
	<title>Stadium</title>
	<style >
	body{
		background:#2d2d2d;
	}
	table{
		border: 1px solid black;
		background-color:white;
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
	 <div style=" style : center;color:white;"  >
	 <h3 align="center">Stadium</h3>
	 <hr >
	<table align="center" class="table table-hover table-dark">
		<tr>
			<th scope="col">Stadium Name</th>
			<th scope="col">Capacity</th>
			
			<th scope="col">Board Name</th>
			<th scope="col">Team's Stadium</th>
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="select * from stadiums";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr><th>".$row["stadium_name"]."</th>"."<th>".
			$row["capacity"]."</th><th>".
			
			$row["board_name"]."</th><th>".
			$row["team"]."</th></tr>";
			}
			
		}
		mysqli_close($con);
		?>
		<?php
$con=mysqli_connect("localhost","root","","cricket");

$query="create or replace view teamrank as select count(case when winner='mi' then 1  end) as mi ,
count(case when winner='rcb' then 1  end)  as rcb,
count(case when winner='csk' then 1  end)  as csk,
count(case when winner='dc' then 1  end)  as dc,
count(case when winner='kxip' then 1  end)  as kxip,
count(case when winner='rr' then 1  end)  as rr,
count(case when winner='kkr' then 1  end)  as kkr,
count(case when winner='srh' then 1  end)  as srh
from schedules;
";
$q1="update team set rating=(select mi from teamrank) where name='mi'";
$q2="update team set rating=(select csk from teamrank) where name='csk';";
$q3="update team set rating=(select rcb from teamrank) where name='rcb';";
$q4="update team set rating=(select rr from teamrank) where name='rr';";
$q5="update team set rating=(select kkr from teamrank) where name='kkr';";
$q6="update team set rating=(select kxip from teamrank) where name='kxip';";
$q7="update team set rating=(select dc from teamrank) where name='dc';";
$q8="update team set rating=(select srh from teamrank) where name='srh'; ";
mysqli_query($con,$query);
mysqli_query($con,$q1);
mysqli_query($con,$q2);
mysqli_query($con,$q3);
mysqli_query($con,$q4);
mysqli_query($con,$q5);
mysqli_query($con,$q6);
mysqli_query($con,$q7);
mysqli_close($con);
?>
	</table>
</body>
</html>