<html>
<body>
<table border=1px align="center" class="table table-hover table-dark">
		<tr>
			<th scope="col">Date </th>
			<th scope="col">Team1 </th>
			<th scope="col">Team2 </th>
			<th scope="col">Match Number </th>
			<th scope="col">VENUE </th>
            <th scope="col">Winner</th>
            
        </tr>    



<?php
//$variable="<script>document.write(a)</script>";
//echo "$variable\n";
session_start();
$mno=$_POST['match_no'];
$name=$_POST['name'];
//echo "$mno";
$con = mysqli_connect("localhost", "root", "", "cricket") or die(mysqli_error($con));
$t1="select * from schedules s,played_in p where s.date=p.date and s.team1=p.team1 and match_no=$mno";
$r1=mysqli_query($con,$t1);
$row=mysqli_fetch_assoc($r1);

echo "<tr><td>".$row["date"]."</td><td>".
			$row["team1"]."</td><td>".
			$row["team2"]."</td><td>".
			$row["match_no"]."</td><td>".$row["stadium_name"]."</td><td>"
			.$row["winner"]."</td></tr>";

if($row["winner"]!=NULL)
{
echo "<script type='text/javascript'>alert('Winner already present, do you want to modify it !')

</script>";
$q1="update schedules set winner='$name' where match_no=$mno";
if(mysqli_query($con,$q1))
{
    echo "<script type='text/javascript'>alert('Winner Updated !')
    </script>";
    header("refresh: 0.01; url=admin1st.html");
}
header("refresh: 0.01; url=admin1st.html");
}
else if(($row["team1"]==$name or $row["team2"]==$name)and$row["team1"]!=NULL )
{
    $q="update schedules set winner='$name' where match_no=$mno";
    if(mysqli_query($con,$q))
    {
        echo "<script type='text/javascript'>alert('Winner Updated !')
        </script>";
        header("refresh: 0.01; url=admin1st.html");
    }
    else
    {
        echo "<script type='text/javascript'>alert('Error !')
        </script>";
        header("refresh: 0.01; url=admin1st.html");
    }
}
else
    {
        echo "<script type='text/javascript'>alert('Invalid teamname !')</script>";
        header("refresh: 0.01; url=admin1st.html");
    }




//$q="update team set rating='$rating' where name='$name'";

//if(mysqli_query($con,$q))
//{
 //   header("refresh: 0.01; url=rank.php");
//}
//else
//{echo "<script type='text/javascript'>alert('ERROR!!');</script>";
 // header("refresh: 0.01; url=rank.php");

    //echo "error";
    //header("refresh: 0.01; url=admin1st.html");
//}
?>
</body>
</html>