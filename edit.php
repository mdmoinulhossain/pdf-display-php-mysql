<?php include('./header.php'); ?>


<style>
    .singlePdf{
        display: flex !important;
    }
    .pdf{
        width: 200px;
        height: 100px;
    }
</style>

<section class="container my-5">
    <div class="row">
    <?php
    // Program to display current page URL.
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
                === 'on' ? "https" : "http") . 
                "://" . $_SERVER['SERVER_NAME'].
                $_SERVER['REQUEST_URI'];
    // echo $link;
?>
        
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">PDF</th>
                        <th scope="col">Link</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'config.php';
                $display = "SELECT * FROM `pdflist`";
                $url = "http://localhost/php/pdf-upload/";
                $displayQuery = mysqli_query($connect_db, $display);  
                
                while($record = mysqli_fetch_array($displayQuery)){
                ?>

                <tr>
                    <td><?php echo $record["id"] ?></td>
                    <td><embed type="application/pdf" src="pdf/<?php echo $record["pdf"] ?>" class="pdf"></td>
                    <td id="myInp"><?php echo $url."pdf/".$record["pdf"] ?></td>
                
                    <td><a href="delete.php?id=<?php echo $record['id']; ?>&pdf=<?php echo $record["pdf"]; ?>" class="bi bi-trash3-fill">Delete</a></td>
                </tr>
                <?php } ?>

                </tbody>
            </table>       

            
    </div>
</section>

<?php include('./footer.php'); ?>