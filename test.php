<?php
/**
 * Created by PhpStorm.
 * User: johnpaceiv
 * Date: 9/17/15
 * Time: 17:44
 */

$mysqli = new mysqli("localhost", "root", "root", "animalQuest");
$list_query = 'SELECT * FROM animals where rescueid = ""';
$test = $mysqli->query($list_query);
$results = array();

//$resultsJSON = json_encode($row);
while($rows = mysqli_fetch_assoc($test)) {
    $results[] = $rows;
}
print json_encode($results);