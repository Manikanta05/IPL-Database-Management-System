<!DOCTYPE html>
<html>
<head>
<title>Player search</title>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
</head>
<style type="text/css">
	
	tr,th	{border: 1px solid white;	color: white;

	}
	body{
background-color: #111111;
	} 
	p{
		color: white;
	}


</style>
<body ><button class="btn btn-light " style="float:left"><a href="user1st.html" >Back</a></button><br><br>


<?php
     $con = mysqli_connect("localhost", "root", "", "cricket") or die(mysqli_error($con));
    $player=$_POST['playername'];
    $query="select * from player where playername like '%$player%'";
    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res)>0){

    	    while($row = mysqli_fetch_assoc($res)){

    	echo " <h1><p align="."center".">".$row["playername"]."<p></h1><table width="."100%"." height="."400px"."><tr><th height="."100%"."><img src=".$row["image"]." width="."700px"."></th><th><table width="."100%".">
    	<tr><th>PLAYERNAME</th><th>".$row["playername"]."</th></tr>
    	<tr><th>RANK</th><th>".$row["rank"]."</th></tr>
    	<tr><th>TEAM</th><th>".$row["name"]."</th></tr>
    	<tr><th>RUNS</th><th>".$row["runs"]."</th></tr>
        <tr><th>TYPE</th><th>".$row["type"]."</th></tr>
        <tr><th>BATTING BEST</th><th>".$row["batting_best"]."</th></tr>
    	<tr><th>BOWLING BEST</th><th>".$row["bowling_best"]."</th></tr></table></th>
    	</tr></table>";
    	
}
}else
{
	 echo "<script type='text/javascript'>alert('PLAYER NOT FOUND!!');</script>";
      header("refresh: 0.01; url=user1st.html");
    
}


mysqli_close($con);    ?>
</body></html>