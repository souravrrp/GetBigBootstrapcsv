<?php

$sdate=$_POST["startdate"];
//echo $sdate."<br>\n";


$edate=$_POST["enddate"];
//echo $edate."<br>\n"."<br>\n";



//        Create CSV File

$myFile = "testFile".".csv"; 
$fh = fopen($myFile, 'w') 
       or                  
       die("can't open file");
fwrite($fh, $sdate."\n");
do {
   $sdate = date ("Y-m-d", strtotime("+1 day", strtotime($sdate))); 
   fwrite($fh, $sdate."\n");
} while ($sdate < $edate);

 fclose($fh);

 // Get Date from CSV file


 $row = 1;
if (($handle = fopen("testFile.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 50000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        for ($c=0; $c < $num; $c++) {

            echo "<div style='text-align:center'>".$row.":  ".$data[$c] . "<br />\n"."</div>";
                       
        $row++;
        }
    }
    fclose($handle);
}
?>
<!DOCTYPE html>
<head>
<title>Leave Management System</title>
<style type="text/css">
body {
  background-color: #666;
}
</style>
</head>
<body>
<div id = "nav">
   <div id = "nav_wrapper"></div>
    <ul>
      <li>
      <ul>
                        
      </ul>
      </li> 
   </ul>
  </div>
  </div>
</body>
</html>