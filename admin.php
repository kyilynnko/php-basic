<?php
include_once 'views/top.php';
include_once 'views/header.php';
if ( checkSession( 'username' ) )
 {
    if ( getSession( 'username' ) != 'kyilynnko' ) {
        header( 'Location:index.php' );
    }
} else {
    header( 'Location:index.php' );
}
if ( isset( $_POST[ 'submit' ] ) )
 {
    $postTitle = $_POST[ 'postTitle' ];
    $postType = $_POST[ 'postType' ];
    $postWriter = $_POST[ 'postWriter' ];
    $postContent = $_POST[ 'postContent' ];
    $subject = $_POST[ 'subject' ];
    $file = $_FILES[ 'file' ];
    // echo '<pre>' . print_r( $file, true ) . '</pre>';
    $img_link = mt_rand( time(), time() ) .'_' . $_FILES[ 'file' ] [ 'name' ]. mt_rand( time(), time() );
    move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], 'assests/uploads/'.$img_link );

    $bol = insertPost( $postTitle, $postType, $subject, $postWriter, $postContent, $img_link );
    header( 'Location:showAllPost.php' );
    if ( $bol ) 
 {
        echo "
    <div class='container my-5'>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            Post Insert Successfully.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
    </div>";
    } else {
        echo "
    <div class='container my-5'>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            Post Insert Fail!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
    </div>";
    }
}
?>
<div class = 'container my-3'>
<div class = 'row'>
<?php
include_once 'views/side_bar.php'
?>
<section class = 'col-md-9'>
<form method = 'post' action = 'admin.php' enctype = 'multipart/form-data' class = 'mb-5 table-bordered p-5'>
<h2 class = 'text-center text-danger english'>Post Insert Form</h2>
<div class = 'form-group'>
<label for = 'postTitle'>Post Title</label>
<input type = 'text' class = 'form-control' id = 'postTitle' name = 'postTitle'>
</div>
<div class = 'form-group'>
<label for = 'postType' class = 'english'>Post Type</label>
<select  class = 'form-control' id = 'postType' name = 'postType'>
<option value = '1'>Free Post</option>
<option value = '2'>Paid Post</option>
</select>
</div>
<div class = 'form-group'>
<label for = 'subject' class = 'english'>Subject</label>
<select  class = 'form-control' id = 'subject' name = 'subject'>
<?php
$subjects = getAllSubject();
foreach ( $subjects as $subject ) {
    echo "<option value='".$subject[ 'id' ]."'>".$subject[ 'name' ].'</option>';
}
?>
</select>
</div>
<div class = 'form-group'>
<label for = 'postWriter'>Post Writer</label>
<input type = 'text' class = 'form-control' id = 'postWriter' name = 'postWriter'>
</div>
<div class = 'form-group'>
<div class = 'custom-file'>
<input type = 'file' class = 'custom-file-input' id = 'file' name = 'file' multiple>
<label class = 'custom-file-label' for = 'customFile'>Choose file</label>
</div>
</div>
<div class = 'form-group'>
<label for = 'postContent' class = 'english'>Post Content</label>
<textarea type = 'text' class = 'form-control' id = 'postContent' rows = '10' name = 'postContent'/></textarea>
</div>
<div class = 'row no-gutters justify-content-end'>
<button class = 'btn btn-outline-primary mr-3'>Cancel</button>
<button class = 'btn btn-primary' name = 'submit'>Post</button>
</div>
</form>
</section>
</div>
</div>
<?php
include_once 'views/footer.php';
include_once 'views/base.php';
?>