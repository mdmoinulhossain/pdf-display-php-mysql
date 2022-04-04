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
        
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">PDF</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'config.php';
                $display = "SELECT * FROM `pdflist`";
                $displayQuery = mysqli_query($connect_db, $display);
                while($record = mysqli_fetch_array($displayQuery)){
                ?>

                <tr>
                    <td>1</td>
                    <td><embed type="application/pdf" src="pdf/<?php echo $record["pdf"] ?>" class="pdf"></td>
                    <td><?php echo $record["pdf"] ?></td>
                    <td><a href="delete.php?id=<?php echo $record['id']; ?>" class="bi bi-trash3-fill">Delete</a></td>
                </tr>
                <?php } ?>

                </tbody>
            </table>


            

            
    </div>
</section>