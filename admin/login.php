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
        echo "<h1 style='color: red; display: flex; justify-content: center;'>Username or password is incorrect!</h1>";
    }

}

?>
<?php
if(isset($_SESSION['emailAddress'])){
    header("location: ../adminpdf.php");
}
?>

<section class="container my-5">
<div class="row">
    <h1 class="text-center">Please Login</h1>
     <div class="col-12 col-md-3"></div>
    <form method="post" class="col-12 col-md-6 my-5 authForm">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address/Username</label>
            <input type="text" class="form-control" name="EmailInput" required/>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="PasswordInput" required/>
        </div>        
        <button type="submit" name="login" class="btn btn-outline-success">Login</button>
    </form>
    <span>Want to <a href="./register.php">Sign Up</a>?</span>
    <div class="col-12 col-md-3"></div>
</div>
</section>



<?php
include('../footer.php');
?>