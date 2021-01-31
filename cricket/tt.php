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
		color:white;
	}
	hr {
  border: 1px solid white;
}
table{
		border: 1px solid white;
	}
	tr{
		border: 1px solid white;
	}
	th{
		border: 1px solid white;
	}
</style>

	
</head>
<body>
	<button class="btn btn-light "><a href="schedule.php" style="color:">Back</a></button><div style="margin-top:10px; style : center" >

<table class="table table-hover table-dark" width="100%"; align="center"><tr><th>
	<?php
	$con=mysqli_connect("localhost","root","","cricket");
		 $match_no=$_POST['match_no'];
		 $que="select team1 from schedules where match_no='$match_no'";
				
		echo "Squad for match number $match_no ";
	
		?></th></tr></table>



<table width="100%"><tr><th>
 	<table align="center">
		
		<?php
		$con=mysqli_connect("localhost","root","","cricket");
		$query1="SELECT p.playername FROM schedules s,player p WHERE s.team1=p.name AND s.match_no='$match_no'";
		$result1=mysqli_query($con,$query1);

		$query="select sc.team1 from schedules sc where  sc.match_no='$match_no' limit 0,1";
	    $res=mysqli_query($con,$query);
	    if(mysqli_num_rows($res)>0){
        while ($row=mysqli_fetch_assoc($res)) {
            echo "<tr><th><b>".$row["team1"]."</b></th></tr>";
                    }
    	}


		if(mysqli_num_rows($result1)>0)
		{
			while ($row=mysqli_fetch_assoc($result1)) {
			echo "<tr><th>".$row["playername"]."</th></tr>";
			
			}
		}
		mysqli_close($con);
		?></table></th><th>


		<table align="center">
		

 		<?php
 		$match_no=$_POST['match_no'];
 		$con=mysqli_connect("localhost","root","","cricket");
		$query1="SELECT p.playername FROM schedules s,player p WHERE s.team2=p.name AND s.match_no='$match_no'";
		$result1=mysqli_query($con,$query1);
		

		$query="select sc.team2 from schedules sc where  sc.match_no='$match_no' limit 0,1";
	    $res=mysqli_query($con,$query);
	    if(mysqli_num_rows($res)>0){
        while ($row=mysqli_fetch_assoc($res)) {
            echo "<tr><th><b>".$row["team2"]."</b></th></tr>";
                    }
    	}

		if(mysqli_num_rows($result1)>0)
		{
			while ($row=mysqli_fetch_assoc($result1)) {
			echo "<tr><th>".$row["playername"]."</th></tr>";
			
			}
		}
		mysqli_close($con);
		?></table></th></tr></table>
		<br><br>


<table width="100%"; align="center">
</table>
<table width="100%"; align="center">
	<div style : center" >
	<h1><b align="center"><i>Players selected are</i></b></h1>
	</div>
</table>

<table width="100%"><tr><th>
 	<table align="center">
		<tr>
			<th>Playernames</th>
			<th>Team</th>
			<th>Position</th>
		</tr>
		<?php
		$con = mysqli_connect("localhost", "root", "", "cricket") or die(mysqli_error($con));
	    $match_no=$_POST['match_no'];
	    $query="select p.playername,p.name,s.position from selected_for s,schedules sc,player p where  s.name=sc.team1 and s.date=sc.date  and s.cap_no=p.cap_no  and s.name=p.name and sc.match_no='$match_no' order by p.name";
	    $res=mysqli_query($con,$query);
	    if(mysqli_num_rows($res)>0){

        while ($row=mysqli_fetch_assoc($res)) {

            echo "<tr><th>".$row["playername"]."</th><th>".$row["name"]."</th><th>".$row["position"]."</th></tr>";
                    }
    	}

		else
		{
		 echo "NOT ANNOUNCED!! for team1";
	     
	    
		}
			
		$query="select p.playername,p.name,s.position from selected_for s,schedules sc,player p where  s.name=sc.team2 and s.date=sc.date  and s.cap_no=p.cap_no  and s.name=p.name and sc.match_no='$match_no' order by p.name";
	    $res=mysqli_query($con,$query);
	    if(mysqli_num_rows($res)>0){

	        while ($row=mysqli_fetch_assoc($res)) {

	            echo "<tr><th>".$row["playername"]."</th><th>".$row["name"]."</th><th>".$row["position"]."</th></tr>";
	                    }
	    }
	    
		else
		{
		 echo "NOT ANNOUNCED!! for team2";
	    
	    
		}
		mysqli_close($con);
		?>

	

</body>
</html>