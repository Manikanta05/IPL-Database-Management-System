<!DOCTYPE html>
<html>

<head><p>
	<title>SCHEDULES</title>
	
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
	<style >
	body{
		background:#2d2d2d;
	}
	hr {
  border: 1px solid white;
}
.container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
</style>
</head>
<body>
	<button class="btn btn-light " style="float:left"><a   href="admin1st.html">Back</a></button>
	
	 <div style=" style : center;color:white;" >
	 <h3 align="center">Matches</h3>


	<form action="match.php" class="form-inline" style="float:right"method="post" >
                  <input class="form-control mr-sm-2 " style="margin-right:2px"type="text" placeholder="Enter match no."  name="match_no" aria-label="Update">
				 <select name="name" style="margin-right:4px" >
				 <option value="">Select team</option>
				 <option value="rcb">rcb</option>
				 <option value="srh">srh</option>
				 <option value="csk">csk</option>
				 <option value="kkr">kkr</option>
				 <option value="rr">rr</option>
				 <option value="mi">mi</option>
				 <option value="dc">dc</option>
				 <option value="kxip">kxip</option>
				 </select>
                 <button class=" btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit">Update</button>
				  </form><br>
	
				  <hr >
	<table align="center" class="table table-hover table-dark">
		<tr>
			<th scope="col">Date </th>
			<th scope="col">Team1 </th>
			<th scope="col">Team2 </th>
			<th scope="col">Match Number </th>
			<th scope="col">VENUE </th>
			<th scope="col">Winner</th>
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="select * from schedules s,played_in p where  s.date=p.date and s.team1=p.team1 order by s.date";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr><td>".$row["date"]."</td><td>".
			$row["team1"]."</td><td>".
			$row["team2"]."</td><td>".
			$row["match_no"]."</td><td>".$row["stadium_name"]."</td><td>"
			.$row["winner"]."</td></tr>";
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



//if (mysqli_query($con,$q8)>0)
//{echo "success";}
//else
//{echo "success1";
//}
mysqli_close($con);
?>



		 <form action="tt.php" method="post"><table><tr align="center">
            <p style="text-align: center;font-size: 25;color:white">Enter Match Number to retrieve players
            <input type="number" name="match_no" style="width: 300;height: 25;">
            <input class=" btn btn-success" type="submit" style="float:center;" value="Submit">
            </p></tr></table>
    </form>




</body>
</html>