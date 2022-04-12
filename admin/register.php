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
        echo "<script>alert('User already exists')</script>";
    } else {
        $insrt = "INSERT INTO authentication(email , password) VALUES ('$email', '$pass')";
        mysqli_query($connect_db,$insrt);
        echo "<script>alert('Registration successful')</script>";
        header("Location:index.php");
    }    
}
?>

<section class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address/Username</label>
                <input type="text" class="form-control" name="EmailInput" required />                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="PasswordInput" required />
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
</section>

<?php
include('../footer.php');
?>