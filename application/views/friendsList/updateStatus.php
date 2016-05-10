<?php
$animalid = $this->input->post('animalId');
$statusId = $this->input->post('status');
$dbh = new PDO('mysql:host=localhost;dbname=intinyt1_animalQuest;port=8889', "intinyt1_jcpace4", "kickin1991");
$statement = $dbh->prepare("UPDATE SET status = " . $statusId . " WHERE id =" . $animalid);
$statement->execute();
?>