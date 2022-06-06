<?php 




function build_calendar($month, $year){
 
  $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
  $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
  $numberDays = date('t', $firstDayOfMonth);
  $dateComponents = getdate($firstDayOfMonth);
  $monthName = $dateComponents['month'];
  $dayOfWeek = $dateComponents['wday'];
  $dateToday = date('Y-m-d');
  
  $calendar = "<table class='table table-bordered'>";
  $calendar .= "<center><h2>$monthName $year</h2>";
  $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m',mktime(0,0,0,$month-1,1,$year)).
  "&year=".date('Y',mktime(0,0,0,$month-1,1,$year))."'>Previous Month</a>&nbsp;";

  $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m').
  "&year=".date('Y')."'>Current Month</a>&nbsp;";
  
  $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m',mktime(0,0,0,$month+1,1,$year)).
  "&year=".date('Y',mktime(0,0,0,$month+1,1,$year))."'>Next Month</a></center><br>";

  






  $calendar .= "<tr>";

  foreach($daysOfWeek as $day){
    $calendar .= "<th class='header' style='background-color:#00fff0; color:white;'>$day</th>";
  }
  $currentDay = 1;

  $calendar .= "</tr><tr>";

  if($dayOfWeek > 0){
    for($k=0;$k<$dayOfWeek;$k++){
      $calendar.="<td></td>";
    }
  }



  $month = str_pad($month,2,"0",STR_PAD_LEFT); //out put 01,02...12

  while($currentDay <= $numberDays){

    if ($dayOfWeek == 7){
      $dayOfWeek = 0;
      $calendar.="</tr><tr>";
    }

    $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
    $date = "$year-$month-$currentDayRel";

    $dayname = strtolower(date('l', strtotime($date))); 
    $eventNum = 0; 

    $today = $date==date('Y-m-d')? "today" : "";
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "kiwiholiday_db";
    $link = mysqli_connect($server, $user, $password, $database);
    $queryA = "SELECT * FROM booking where house_id = 7  "; //get house_id from houseDatail page
   $resultA = mysqli_query($link, $queryA);
   $check_in= array();
   $check_out= array();
   
  
   $rowsE = mysqli_fetch_all($resultA, MYSQLI_ASSOC);//get  all the matched rows.
  foreach ($rowsE as $rowE){
    
    $check_out[] = $rowE['check_out'];
    $check_in[] = $rowE['check_in'];
    

}


     
    if($date<date('Y-m-d')){
      $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
    } elseif(in_array($date,$check_in)){
      $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>Booked</button>";
    } elseif(in_array($date,$check_out)){
      $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>Booked</button>";
    }
    else{
      $calendar.="<td class='$today'><h4>$currentDay</h4><button class='btn btn-success btn-xs'>Available</button>";
    }
   

 
    $calendar.= "</td>";
    $currentDay++;
    $dayOfWeek++;

  }

  if($dayOfWeek != 7){
    $remainingDays = 7-$dayOfWeek;
    for($i=0;$i<$remainingDays;$i++){
      $calendar .= "<td></td>";
    }
  }

  $calendar .= "</tr>";
  $calendar .= "</table>";

  return $calendar;
 echo $calendar;



}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Vicky Kang">
    <meta name="keyword" content="holiday house, holiday accomdation">   
    <title>Welcome to KiwiHoliday</title>
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <style>
    .today {
    background: yellow;
   }
   </style>

   
    

</head>
<body>
<div>
  <div class="container">  
    
      <div class="row">
      
        <div class="col">
          <?php 
          $dateComponents = getdate();
          if(isset($_GET['month']) && isset($_GET['year'])){
            $month = $_GET['month']; 			     
            $year = $_GET['year'];
             }else{
            $month = $dateComponents['mon']; 			     
            $year = $dateComponents['year'];
            }
          echo build_calendar($month, $year);
          ?>
        </div>
      </div>
        
   
        
              
    </div>
 
</div>
            
                 
                
        















<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>