<?php

include 'config.php';

$id = $_GET['id'];

$delete = "DELETE FROM `pdflist` WHERE id = $id";

$deleteQuery = mysqli_query($connect_db, $delete);

header("location:index.php");

?>