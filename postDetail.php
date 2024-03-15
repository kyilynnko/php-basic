<?php
include_once "views/top.php";
include_once "views/header.php";

if(isset($_GEt['pid']))
{
   $pid=$_GEt['pid'];
}
?>

<div class="container my-3">
    <div class="card col-md-8 offset-md-2">
        <?php
            $result = getSinglePost($_GET['pid']);
            foreach($result as $data){
            echo '<div class="card-header"> ' . $data ["title"] .' <span class="float-right">'.$data["created_at"].'</span></div> ';
            echo '<img src="assests/uploads/'.$data["img_link"].'" alt="" class="img-fluid">';
            echo '<div class="card-footer">' . $data ["content"] . '</div> ';
            echo '<div class="card-footer">' . $data ["writer"] . '</div> ';
            }
?>
    </div>
</div>

<?php
include_once "views/footer.php";
include_once "views/base.php";
?>    