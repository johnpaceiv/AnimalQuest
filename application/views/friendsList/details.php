<?php
$animalid = $this->uri->segment(3, 0);
$dbh = new PDO('mysql:host=localhost;dbname=intinyt1_animalQuest;port=8889', "intinyt1_jcpace4", "kickin1991");
$statement = $dbh->prepare("SELECT animals.id, animalName, animalAge, alone.aloneDuration, energyLevel.energyLevel, bio, image FROM animals JOIN energyLevel on energyLevel.id = animals.energy JOIN alone ON alone.id = animals.alone WHERE animals.id =" . $animalid);
$statement->execute();
$return = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($return as $data){
    $animalName = $data["animalName"];
    $animalAge = $data["animalAge"];
    $energy = $data["energyLevel"];
    $alone = $data["aloneDuration"];
    $details = $data["bio"];
    $image = $data["image"];
}

?>
<!-- BODY CONTENT -->
<div id="bodyContainer">
    <!-- CALL TO ACTION -->
    <div id="ctaContainer" class="global-panel-container">
        <a href="../../friendsList/results"><button class="backBtn">Back</button></a>
        <div id="callToAction" class="global-panel">
            <div id="clearTop"></div>
            <span id="animalImg"><img src="../../../img/animalProfiles/<?php echo $image;?>.jpg" alt="Animal Logo" class="profileImg"/></span>
            <h2 id="animalName"><?php echo $animalName;?></h2>
            <hr class="nameBorder">
            <p id="age"><strong>Age:</strong> <?php echo $animalAge;?>.</p>
            <p id="energyLevel"><strong>I have a:</strong> <?php echo $energy;?> energy level.</p>
            <p id="aloneFor"><strong>I can be alone for:</strong> <?php echo $alone;?>.</p>
            <p id="bio"><strong>About me:</strong>  <?php echo $details;?></p>
            <?php
                if($_SESSION['status'] == 0){
                    echo  '<a href="mailto:' . $_SESSION["rescueEmail"] . '?subject=Information%20About%20' . $animalName . '&body=Please send me more information about ' . $animalName . '."><button id="moreInfoBtn">Send Me Details</button></a>';
                }
                if($_SESSION['status'] == 1){
                    echo  '<button id="markAdoptedBtn">Mark as Adopted</button>';
                }
            ?>
            <div id="clearPanel"></div>
        </div>
    </div>
    <!-- End Call to Action -->
</div>
<?php
    echo '<form method="post" id="updateStatus" action="../../friendsList/updateStatus">';
    echo form_hidden('animalId', $animalid);
    echo form_hidden('status', 1);
    echo '</form>'
?>
<div id="confirmation">Are you sure you want to mark <?php echo $animalName;?> as adopted?</div>
<script>
    $("#markAdoptedBtn").click(function() {
        $( "#confirmation" ).dialog({
            modal: true,
            buttons: {
                "Yes": function() {
                    $('#updateStatus').submit();
                },
                "No": function() {
                    $( this ).dialog( "close" );
                }
            }
        });
    });
</script>
