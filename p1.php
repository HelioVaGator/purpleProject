<?php
//make use of configuration for connection in connection.php file
include '/connection.php';
//query to select all
$query = "SELECT * FROM purple";

$result= mysql_query($query);

while($purple = mysql_fetch_array($result)){
//finding distance between two points
$dist=distance($_GET["lat"],$_GET["lng"],$purple['lat'],$purple['long']);
if($dist>=10)  //and we can also check if($_GET["type"]==$purple['type'])... to check user input type
{
echo"<h3>".$purple['name']."  ".$purple['type']."  ".$purple['city']."<h3>";
}
//to check distance
//else
//echo $dist."<br>";

}
 
//echo "Welcome ".$_GET["type"]."<br>";
//echo "Your latitude is: ".$_GET["lat"]."<br>"; 
//echo "Your longitude is: ".$_GET["lng"]; 

//function to calculate distance
function distance($lat1, $lon1, $lat2, $lon2) {

    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lon1 *= $pi80;
    $lat2 *= $pi80;
    $lon2 *= $pi80;

    $r = 6372.797; // mean radius of Earth in km
    $dlat = $lat2 - $lat1;
    $dlon = $lon2 - $lon1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;

    //echo '<br/>'.$km;
    return $km;

}
?>

