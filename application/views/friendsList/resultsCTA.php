<?php
$db = new mysqli("localhost", "intinyt1_jcpace4", "kickin1991", "intinyt1_animalQuest");

if($_SESSION['status'] == 0){
    $query = $db->query("SELECT id, animalName, animalAge, alone, energy, image FROM animals WHERE statusId = 0 AND rescueid =" . $_SESSION['nonAuth_rescueid']);
}
if($_SESSION['status'] == 1){
    $query = $db->query("SELECT id, animalName, animalAge, alone, energy, image FROM animals WHERE statusId = 0 AND rescueid =" . $_SESSION['rescueid']);
}
$data = "";

while($rows = $query->fetch_array(MYSQLI_ASSOC)) {
    if ($data != "") {$data .= ",";}
    $data .= '{"animalid":"'  . $rows["id"] . '",';
    $data .= '"animalName":"'   . $rows["animalName"] . '",';
    $data .= '"animalAge":"'. $rows["animalAge"] . '",';
    $data .= '"aloneFor":"'. $rows["alone"] . '",';
    $data .= '"energyLevel":"'. $rows["energy"] . '",';
    $data .= '"image":"'. $rows["image"] . '"}';
};

$data ='{"rescueResults":['.$data.']}';
$db->close();

$file = fopen($_SERVER['DOCUMENT_ROOT'] ."/js/angularJs/animalRequest.php", "w") or die("Unable to open file!");
$txt = $data;
fwrite($file, $txt);
fclose($file);
if($_SESSION['status'] == 0) {
    $dbh = new PDO('mysql:host=localhost;dbname=intinyt1_animalQuest;port=8889', "intinyt1_jcpace4", "kickin1991");
    $statement = $dbh->prepare("SELECT rescueEmail, bio FROM users WHERE rescueid =" . $_SESSION['nonAuth_rescueid']);
    $statement->execute();
    $return = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($return as $data) {
        $_SESSION['rescueEmail'] = $data["rescueEmail"];
        $bio = $data["bio"];
    }
}
?>


<div id="bodyContainer">
    <!-- CALL TO ACTION -->
    <div id="ctaContainer" class="global-panel-container">
        <div id="callToAction" class="global-panel">
            <h1 id="ctaTitle">Welcome to <?php if($_SESSION['status']==0){echo $rescueName;}if($_SESSION['status']==1){echo $_SESSION['rescueName'];}?>!</h1>
            <h4><?php echo $bio ?></h4>
        </div>
    </div>
    <!-- End Call to Action -->
