<?php
 include('./header.php');

 if(!isset($_SESSION['emailAddress'])){
     header("location: http://localhost/php/pdf-display-php-mysql/admin/login.php");
 }
 
?>

<style>
.singlePdf {
    border: 1px solid #000;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
}
.pdf{
    width: 100% !important
}
.mybtn{
    border: 1px dotted #000000;
    background-color: #F0F8FF;
}
.mybtn:hover{
    background-color: #F0FFFF;
}
</style>

<tbody>
     


<section class="container my-5">
    <div class="row">
        <h3>Your PDF's:</h3>
        <?php
        include 'config.php';

        $display = "SELECT * FROM `pdflist`";

        $displayQuery = mysqli_query($connect_db, $display);

        while($record = mysqli_fetch_array($displayQuery)){
        ?>
            <div class="col-6 col-md-4 singlePdf mx-2">
                <embed type="application/pdf" src="pdf/<?php echo $record["pdf"] ?>" class="pdf">
                <a href="<?php echo $record["id"] ?>" target="_blank">
                    <button class="btn mybtn mt-3">Open PDF</button>
                </a>
            </div>
        
        <?php } ?>
    </div>
</section>

<?php include("./footer.php"); ?>