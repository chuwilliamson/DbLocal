<?php
	include "login.php";
	
	if(isset($_POST["userType"]))
	{
		$_SESSION['userType'] = $_POST["userType"];
		
		if($_SESSION['userType'] == "member")
		{
			if(isset($_POST["memberID"]))
			{
				$_SESSION['memberID'] = $_POST["memberID"];
			}
		}
		
		else
		{
			$_SESSION['memberID'] = "";
		}
	}

	else if(isset($_SESSION["userType"]) == false)
	{
		echo "Not logged in!";
		echo '<br><br>';
		echo '<a href ="LoginPage.php">Go Log In</a>';
		
		die();
	}
	
	if(isset($_SESSION["today"]) == false)
	{
		$date = "01/01/2015";
		
		$_SESSION["today"] = $date;
	}
	
	
	
	
	
?>

<html>
<head>
<title> 
Index for Janksby Database
</title>
</head>
<h3>Index</h3>

<body>

<?php 

	$sessionUser = $_SESSION['userType'];

	echo "Logged in as: $sessionUser"; 
	//$date = explode("/", $_SESSION["today"]);
	$date = $_SESSION["today"];
	echo "<br>";
	echo "Today's date: $date";
	
?> 
<br>
<br>

<?php

	if($_SESSION["userType"] == "member")
	{
		echo "Membership ID: " . $_SESSION['memberID'] . "<br>";
		echo "<a href ='MovieListings.php'>Movie Listings</a>";
		echo "<br>";
		echo "<a href ='AddMemberToAccount.php'>Add a Member to your Membership</a>";
	}
	
	if($_SESSION["userType"] == "employee")
	{
		echo "<a href ='ScheduleMovie.php'>Schedule a movie showing</a>";
	}
	
	
	if($_SESSION["userType"] == "admin")
	{
		echo "<a href ='ReloadDatabase.php'>Reset database with test data</a>";
		echo "<br>";
		echo "<a href ='ResetReservations.php'>Reset all Reservation and Movie Showing data</a>";
		echo "<br>";
		echo "<a href ='ClearSession.php'>Clear session variables</a>";
		echo "<br>";
		
		echo "<br><b> Manage Cinemas </b>";
		echo "<br>";
		echo "<a href ='AddCinema.php'>Add a Cinema</a>";
		echo "<br>";
		echo "<a href ='DeleteCinema.php'>Delete a Cinema</a>";
		echo "<br>";
		
		echo "<br><b> Manage Theaters </b>";
		echo "<br>";
		echo "<a href ='AddTheater.php'>Add a Theater</a>";
		echo "<br>";
	}
	
	if($_SESSION["userType"] == "guest")
	{
		echo "<br>";
		echo "<a href ='AddMembership.php'>Create Membership Account</a>";
	}
	
	
?>

<br>
<a href ='ViewingHistory.php'>Display Viewing History</a>
<br>
<a href ="LoginPage.php">Login Page</a>
<br>
<br>

</body>
</html>



