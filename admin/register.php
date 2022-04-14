<?php
include('../header.php');
?>

<?php
    include "../config.php";

    if(isset($_POST["submit"])){   

    $email = $_POST['EmailInput'];
    $pass = $_POST['PasswordInput'];
    $select = "SELECT * FROM `authentication` WHERE `email` = '$email'";
    $qry = mysqli_query($connect_db,$select);
    $numRow = mysqli_num_rows($qry);

    if($numRow > 0) {
        echo "<h1 style='color: red; display: flex; justify-content: center;'>User already exists!</h1><span style='display: flex; justify-content: center;'>Go to: <a href='./login.php'>Login.</a></span>";
    } else {
        $insrt = "INSERT INTO authentication(email , password) VALUES ('$email', '$pass')";
        mysqli_query($connect_db,$insrt);
        echo "
        <h1 style='color: green; display: flex; justify-content: center;'>Registration successful.</h1><span style='display: flex; justify-content: center;'>Go to: <a href='./login.php'>Login.</a></span>";
    }    
}
?>

<section class="container my-5">
<div class="row">
    <h1 class="text-center">Please Sign Up</h1>
    <div class="col-12 col-md-3"></div>
        <form method="post" class="col-12 col-md-6 my-5 authForm">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address/Username</label>
                <input type="text" class="form-control" name="EmailInput" required />                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="PasswordInput" required />
            </div>                
            <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
        </form>
        <span>Want to <a href="./login.php">Login</a>?</span>
    <div class="col-12 col-md-3"></div>
</div>
</section>

<?php
include('../footer.php');
?>