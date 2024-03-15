<?php
include_once "views/top.php";

if(isset($_POST['submit']))
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST['password'];
    $ret = registerUser($username, $email, $password);
    $message ="";
    switch($ret)
    {
        case "Register success.":
            $message="Register success.";
            if($username==="kyilynnko" && $email==="kyilynnko@gmail.com"){
                header("Location:admin.php");
            }else{
                header("Location:index.php");
            }
            setSession("username",$username);
            setSession("email",$email);
            break;
        case "Email is already inused.":
            $message="Email is already inused.";
        break;
        case "Register fail.":
            $message="Register fail.";
        break;
        case "Fail":
            $message="Email and password not in format.";
        break;
        default:
            break;
    }

echo "  <div class='container my-5' >
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                ". $message ."
            </div>
        </div>"
;
}
?>

<div class="container my-3">
    <div class="col-md-8 offset-md-2 table-bordered p-4">
        <h2 class="text-danger english text-center mb-3">Register to be a sepical me!</h2>
        <form action="register.php" class="form" method="post">
            <div class="form-group">
                <label for="username" class="english">Username</label>
                <input type="text" class="form-control english" name= "username" id="email">
            </div>
            <div class="form-group">
                <label for="email" class="english">Email</label>
                <input type="email" class="form-control english" name= "email" id="email">
            </div>
            <div class="form-group">
                <label for="password" class="english">Password</label>
                <input type="password" class="form-control english" name= "password" id="password">
            </div>
            <p></p>
            <div class="row no-gutters justify-content-end">
                <button class="btn btn-dark" type="submit" value="submit" name="submit">Register</button>
            </div>
        </form> 
    </div>
</div>

<?php
include_once "views/footer.php";
include_once "views/base.php";
?>

