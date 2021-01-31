<!DOCTYPE html>
<html>

<head>
	<title>RANKS</title>
	<meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<style >
	body{
		background:#2d2d2d;
	}
	table{
		border: 0px solid black;
	}
	tr{
		border: 1px solid black;
		background-color:#F6F9F0;
	}
	th{
		border: 1px solid black;
		color: black;
	}
</style>
</head>
<body style="background-color:">
	<button class="btn btn-light"><a href="user1st.html" style="color:">Back</a></button>
	<table width="100%"><tr><th>
 <div style="margin-top:10px; style : center" >
 	<table width="100%"><tr><th><p style="align-content: center;"><h1 style="color: orange;align:center">ORANGE CAP</h1></p></th></tr>
	<table align="center">
		<tr>
			<th>Name</th>
			<th>Rank</th>
			<th>Teamname</th>
			<th>Runs</th>
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="select * from player  where type='batsman' and runs=(select max(runs) from player) ";
		$result=mysqli_query($con,$query);[$i]=floor(1);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) { $i=$i+1;
				$nm = $row["cap_no"];
			$q="update player set rank='$i' where cap_no='$nm'";
    		mysqli_query($con,$q);
			echo "<tr><th>".$row["playername"]."</th><th>".
			floor($i)."</th><th>".
			$row["name"]."</th><th>".
			$row["runs"]."</th></tr>";
			}
		}?></table>
		<table width="100%"><tr><th>
 <div style="margin-top:10px; style : center" >
 	<table width="100%"><tr><th><p style="align-content: center;"><h1 style="color: purple ">PURPLE CAP</h1></p></th></tr>
	<table align="center">
		<tr>
			<th>Name</th>
			<th>Rank</th>
			<th>Teamname</th>
			<th>Wickets</th>
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="select * from player  where type='bowler' and wickets=(select max(wickets) from player) ";
		$result=mysqli_query($con,$query);[$i]=floor(1);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) { $i=$i+1;
				$nm = $row["cap_no"];
			$q="update player set rank='$i' where cap_no='$nm'";
    		mysqli_query($con,$q);
			echo "<tr><th>".$row["playername"]."</th><th>".
			floor($i)."</th><th>".
			$row["name"]."</th><th>".
			$row["wickets"]."</th></tr>";
			}
		}?></table>
	 <div style="margin-top:10px; style : center" ><table width="100%"><tr><th><p style="align-content: center;"><h1 style="color:">TEAM RANKING</h1></p></th></tr><tr><th>
	<table align="center">
		<tr>
			<th>Rank</th>
			<th>Name</th>
			<th>Rating</th>
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		



		$query="select * from team order by rating desc";
		$result=mysqli_query($con,$query);
		[$i]=floor(1);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) { $i=$i+1;
			
			//if($rate!=floor($i))
			//	{$q="update team set rank='floor($i)' where rating='$rating'";
    		//	mysqli_query($con,$q);
			

			echo "<tr><th>"
			.floor($i)."</th><th>".
			$row["name"]."</th><th>".
			$row["rating"]."</th></tr>";
			}}
		?>
</table></th></tr></table></div>






<table width="100%"><tr><th>
 <div style="margin-top:10px; style : center" >
 	<table width="100%"><tr><th><p style="align-content: center;"><h1 style="color: #51111">BATSMAN RANKING</h1></p></th></tr>
	<table align="center">
		<tr>
			<th>Name</th>
			<th>Rank</th>
			<th>Teamname</th>
			<th>Runs</th>
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="select * from player  where type='batsman' order by runs desc";
		$result=mysqli_query($con,$query);[$i]=floor(1);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) { $i=$i+1;
			echo "<tr><th>".$row["playername"]."</th><th>".
			floor($i)."</th><th>".
			$row["name"]."</th><th>".
			$row["runs"]."</th></tr>";
			}
		}?></table></th><th>




<table width="100%"><tr style="width: 100%"><th>
<p align="center">
	<h1> BOWLER RANKING
</h1>
</p></th></tr>
		<table align="center">
		<tr>
			<th>Name</th>
			<th>Rank</th>
			<th>Teamname</th>
			<th>wickets</th>
			
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query="select * from player  where type='bowler' order by wickets desc";
		$result=mysqli_query($con,$query);[$i]=floor(1);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) { $i=$i+1;
			echo "<tr><th>".$row["playername"]."</th><th>".
			floor($i)."</th><th>".
			$row["name"]."</th><th>".
			$row["wickets"]."</th></tr>";
			}
		}?></table></th><th>
		


<table width="100%"><tr style="width: 100%"><th>
<p align="center">
	<h1>ALL-ROUNDER RANKING
</h1>
</p></th></tr>

		<table align="center">
		<tr>
			<th>Name</th>
			<th>Rank</th>
			<th>Teamname</th>
			<th>runs</th>
			<th>wickets</th>
		</tr>
		<?php
		$con=mysqli_connect("localhost","root","","cricket");

		$query="select * from player  where type='allrounder' order by (runs+wickets*2) desc";
		$result=mysqli_query($con,$query);[$i]=floor(1);
		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result)) { $i=$i+1;
			echo "<tr><th>".$row["playername"]."</th><th>".	
			floor($i)."</th><th>".
			$row["name"]."</th><th>".
			$row["runs"]."</th><th>".
			$row["wickets"]."</th></tr>";
			}
		}
	
		mysqli_close($con);
		?>
	</table></th></tr></table></div></th></tr></table>
	
</th></tr></table>
	
</body>
</html>