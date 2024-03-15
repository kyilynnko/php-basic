<?php
include_once 'views/top.php';
include_once 'views/nav.php';
include_once 'views/header.php';
include_once 'sysgem/postGenerator.php';

if ( isset( $_GET[ 'pid' ] ) )
 {
    $pid = $_GET[ 'pid' ];
    $result = getSinglePost( $pid );
    $posts = [];
    foreach ( $result as $item )
 {
        $posts[ 'title' ] = $item[ 'title' ];
        $posts[ 'writer' ] = $item[ 'writer' ];
        $posts[ 'img_link' ] = $item[ 'img_link' ];
        $posts[ 'content' ] = $item[ 'content' ];
    }
}

if ( isset( $_POST[ 'update' ] ) )
 {
    $file = $_FILES[ 'file' ];
    $imgName = '';
    if ( $_FILES[ 'file' ][ 'name' ] != null ) {
        $imgName = mt_rand( time(), time() ) . '_' . $_FILES[ 'file' ][ 'name' ];
        move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], 'assests/uploads/'.$imgName );
        unlink( 'assests/uploads/'.$_POST[ 'oldImg' ] );
    } else {
        $imgName = $_POST[ 'oldImg' ];
    }
    $postTitle = $_POST[ 'postTitle' ];
    $postType = $_POST[ 'postType' ];
    $postWriter = $_POST[ 'postWriter' ];
    $postContent = $_POST[ 'postContent' ];
    $subject = $_POST[ 'subject' ];
    $img_link = $imgName;
    $pid = $_GET[ 'pid' ];
    updatePost( $postTitle, $postType, $subject, $postWriter, $postContent, $img_link, $pid );

}
?>

<div class = 'container my-3'>
    <div class = 'row'>
        <?php
        include_once 'views/side_bar.php'
        ?>
        <section class = 'col-md-9'>
            <form method = 'post' action = "postEdit.php?pid=<?php echo $_GET['pid'];?>" enctype = 'multipart/form-data'
                class = 'mb-5 table-bordered p-5'>
                <h2 class = 'text-center text-danger english'>Post Edit Here</h2>
                <div class = 'form-group'>
                    <label for = 'postTitle'>Post Title</label>
                    <input type = 'text' class = 'form-control' id = 'postTitle' name = 'postTitle'
                    value = "<?php echo $posts[ 'title' ]?>">
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
                            echo "<option value = '".$subject[ 'id' ]."'>".$subject[ 'name' ].'</option>';
                        }
                    ?>
                    </select>
                </div>
                <div class = 'form-group'>
                    <label for = 'postWriter'>Post Writer</label>
                    <input type = 'text' class = 'form-control' id = 'postWriter' name = 'postWriter'
                        value = "<?php echo $posts[ 'writer'] ?>">
                </div>
                <div class = 'form-group'>
                    <div class = 'custom-file'>
                        <input type = 'file' class = 'custom-file-input' id = 'file' name = 'file' multiple>
                        <label class = 'custom-file-label' for = 'customFile'>Choose file</label>
                        <input type = 'hidden' name = 'oldImg' value = "<?php echo $posts[ 'img_link']?>" >
                    </div>
                </div>
                <div class = 'form-group'>
                    <label for = 'postContent' class = 'english'>Post Content</label>
                    <textarea type = 'text' class = 'form-control' id = 'postContent' rows = '10' name = 'postContent'/>
                        <?php echo $posts[ 'content' ] ?>
                    </textarea>
                </div>
                <div class = 'row no-gutters justify-content-end'>
                    <button class = 'btn btn-outline-primary mr-3'>Cancel</button>
                    <button class = 'btn btn-primary mr-3' name = 'update'>Update</button>
                </div>
                <img src = "assests/uploads/<?php echo $posts[ 'img_link'] ?>" alt = '' class = 'img-fluid'>
            </form>
        </section>
    </div>
</div>

<?php
include_once 'views/footer.php';
include_once 'views/base.php';
?>
