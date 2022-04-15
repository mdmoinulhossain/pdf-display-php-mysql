<?php 

include 'config.php';

// "submit" is the button name.
// if(isset($_POST['submit'])){

  // this 'pdf' is the name of input field
  $pdf = $_FILES['pdf']['name']; // define name of input
  $pdf_type = $_FILES['pdf']['type']; // define type of input
  $pdf_size = $_FILES['pdf']['size']; // define size of input
  $pdf_tem_loc = $_FILES['pdf']['tmp_name']; // define temporary location with file name
  $pdf_store = "pdf/".$pdf; //store file in "./pdf" location

  move_uploaded_file($pdf_tem_loc, $pdf_store); // finally moved file from temporary location to permanent location

  $insert = "INSERT INTO pdflist(pdf) VALUES('$pdf')";
  // `pdflist` is the database table name, `pdfile` is the table field name.

  $insertQuery = mysqli_query($connect_db, $insert);
  // execute the function

// }

?>

<!-- <section class="container">
<form class="my-5" action="upload.php" method="POST" enctype="multipart/form-data">  
    <label for="InputPdf" class="form-label">Upload your PDF File</label>
    <input type="file" class="form-control" id="InputPdf" name="pdf" required>
    <br/>
  <input type="submit" value="Upload PDF" name="submit" id="upload" class="btn btn-primary" />
</form> -->

