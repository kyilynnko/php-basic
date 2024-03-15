<?php
include_once "views/top.php";
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ret = loginUser($email, $password);
    $message ="";
    switch ($ret){
        case "Login success":
            $message ="Login success";
            if(getSession("username")==="kyilynnko" && getSession("email")==="kyilynnko@gmail.com")
            {
                header("Location:admin.php");
            }else
            {
                header("Location:index.php");
            }
        break;
        case "Login fail":
            $message ="Login fail";
        break;
        case "Fail":
            $message ="Authention fail.";
        break;
        default:
        break;
    }
    echo "  <div class='container' my-5>
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
        <h2 class="text-danger english text-center mb-3">Login to see special post!</h2>
        <form action="login.php" class="form" method="post">
            <div class="form-group">
                <label for="email" class="english">Email</label>
                <input type="text" class="form-control english" name= "email" id="email">
            </div>
            <div class="form-group">
                <label for="password" class="english">Password</label>
                <input type="password" class="form-control english" name= "password" id="password">
            </div>
            <p></p>
            <div class="row no-gutters justify-content-end">
                <button class="btn btn-dark" type="submit" value="submit" name="submit">Login</button>
            </div>
        </form>
    </div>
</div>

<?php
include_once "views/footer.php";
include_once "views/base.php";
?>    

