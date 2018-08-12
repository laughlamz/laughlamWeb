<?php
	require "dbCon.php";
	ob_start();
	session_start();
	if( isset($_SESSION["User"]) ){
		$cur_usr = $_SESSION["User"];
	}

    date_default_timezone_set('Asia/Ho_Chi_Minh'); // CDT


    $qrReadLogD1 = mysqli_query($conn,"SELECT infoD1 FROM loghistory ORDER BY idLog DESC");
    $qr1ReadLogD1 = mysqli_fetch_array($qrReadLogD1);

   	if($cur_usr != 'phuongtrang'){
	$qrCN = "
		SELECT timeSensor FROM sensor_table ORDER BY idSensor DESC 
	";
	$qrCN1 = mysqli_query($conn, $qrCN);
	$qrCN2 = mysqli_fetch_array($qrCN1);
	
	$time = strtotime($qrCN2['timeSensor']);
	$curtime = time();		//date('Y-m-d H:i:s');
	$time_elapsed = $curtime - $time;
	  	$seconds = $time_elapsed ;
		$minutes = round($time_elapsed / 60 );
		$hours = round($time_elapsed / 3600);
		$days = round($time_elapsed / 86400 );
		$weeks = round($time_elapsed / 604800);
		$months = round($time_elapsed / 2600640 );
		$years = round($time_elapsed / 31207680 );
	if($time_elapsed <= 60){
  		echo '<img id="iConn" src="img/wifi21.png" />';
  		echo "<div id='moreinfo'>Connected</div>";
  		if($qr1ReadLogD1['infoD1'] == 0)
  		{
  			$qrWriteLogD1 = mysqli_query($conn,"INSERT INTO loghistory(infoD1,statusD1) VALUES (1,'connected')");
  		}
	}
   	else if($time_elapsed > 60){
   		if($qr1ReadLogD1['infoD1'] == 1)
  		{
  			$qrWriteLogD1 = mysqli_query($conn,"INSERT INTO loghistory(infoD1,statusD1) VALUES (0,'disconnected')");
  		}
  		echo '<img id="iConn" src="img/wifi22.png" />';
  		echo "<div id='moreinfo'>";
		// Seconds
		if($seconds <= 60)
		{
		echo " $seconds secs ago ";
		}
		//Minutes
		else if($minutes <=60)
		{
			if($minutes==1)
			{
			echo " 1 mins ago";
			}
			else
			{
			echo " $minutes mins ago";
			}
		}
		//Hours
		else if($hours <=24)
		{
			if($hours==1)
			{
			echo " 1 hrs ago ";
			}
			else
			{
			echo " $hours hrs ago ";
			}
		}
		//Days
		else if($days <= 7)
		{
			if($days==1)
			{
			echo " 1 day ago ";
			}
			else
			{
			echo " $days days ago ";
			}
		}
		//Weeks
		else if($weeks <= 4.3)
		{
			if($weeks==1)
			{
			echo " 1 week ago ";
			}
			else
			{
			echo " $weeks weeks ago";
			}
		}
		//Months
		else if($months <=12)
		{
			if($months==1)
			{
			echo " 1 month ago ";
			}
			else
			{
			echo " $months months ago";
			}
		}
		//Years
		else
		{
			if($years==1)
			{
			echo " 1 year ago ";
			}
			else
			{
			echo " $years years ago ";
			}
		}	
		echo "</div>";
   	}
   }
   	







   	if($cur_usr == 'phuongtrang'){
   	$qrCN = "
		SELECT timeSensor FROM sensor_tableT ORDER BY idSensor DESC 
	";
	$qrCN1 = mysqli_query($conn, $qrCN);
	$qrCN2 = mysqli_fetch_array($qrCN1);
	
	$time = strtotime($qrCN2['timeSensor']);
	$curtime = time();		//date('Y-m-d H:i:s');
	$time_elapsed = $curtime - $time;
	  	$seconds = $time_elapsed ;
		$minutes = round($time_elapsed / 60 );
		$hours = round($time_elapsed / 3600);
		$days = round($time_elapsed / 86400 );
		$weeks = round($time_elapsed / 604800);
		$months = round($time_elapsed / 2600640 );
		$years = round($time_elapsed / 31207680 );
	if($time_elapsed <= 60){
  		echo '<img id="iConn" src="img/wifi21.png" />';
  		echo "<div id='moreinfo'>Connected</div>";
	}
   	else if($time_elapsed > 60){
  		echo '<img id="iConn" src="img/wifi22.png" />';
  		echo "<div id='moreinfo'>";
		// Seconds
		if($seconds <= 60)
		{
		echo " $seconds secs ago ";
		}
		//Minutes
		else if($minutes <=60)
		{
			if($minutes==1)
			{
			echo " 1 mins ago";
			}
			else
			{
			echo " $minutes mins ago";
			}
		}
		//Hours
		else if($hours <=24)
		{
			if($hours==1)
			{
			echo " 1 hrs ago ";
			}
			else
			{
			echo " $hours hrs ago ";
			}
		}
		//Days
		else if($days <= 7)
		{
			if($days==1)
			{
			echo " 1 day ago ";
			}
			else
			{
			echo " $days days ago ";
			}
		}
		//Weeks
		else if($weeks <= 4.3)
		{
			if($weeks==1)
			{
			echo " 1 week ago ";
			}
			else
			{
			echo " $weeks weeks ago";
			}
		}
		//Months
		else if($months <=12)
		{
			if($months==1)
			{
			echo " 1 month ago ";
			}
			else
			{
			echo " $months months ago";
			}
		}
		//Years
		else
		{
			if($years==1)
			{
			echo " 1 year ago ";
			}
			else
			{
			echo " $years years ago ";
			}
		}	
		echo "</div>";
   	}
   	}

?>