<?php
include('../header.php');
?>

<?php
    include "../config.php";
    if(isset($_POST["login"])){   

    $email = $_POST['EmailInput'];
    $pass = $_POST['PasswordInput'];
    $select = "SELECT * FROM `authentication` WHERE `email` = '$email' && `password` = '$pass'";
    $qry = mysqli_query($connect_db,$select);
    $numRow = mysqli_num_rows($qry);

    if($numRow > 0) {
        $_SESSION['emailAddress'] = $email;
        header("Location: ../adminpdf.php");
    } else {
        header("Location: login.php");
    }    
}

?>
<?php
if(isset($_SESSION['emailAddress'])){
    header("location: ../adminpdf.php");
}
?>

<section class="container my-5">
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="EmailInput" required/>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="PasswordInput" required/>
        </div>
        
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
</section>



<?php
include('../footer.php');
?>