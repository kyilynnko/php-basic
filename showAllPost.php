<?php
include_once 'views/top.php';
include_once 'views/header.php';
include_once 'sysgem/postGenerator.php';
$start = 0;
if ( isset( $_GET[ 'start' ] ) )
 {
    $start = $_GET[ 'start' ];
}
$rows = getPostCount();
if ( checkSession( 'username' ) )
 {
    if ( getSession( 'username' ) != 'kyilynnko' )
 {
        header( 'Location:index.php' );
    }
} else {
    header( 'Location:index.php' );
}

if ( isset( $_GET[ 'pid' ] ) ) 
 {
    $pid = $_GET[ 'pid' ];
    $bol = deletePost( $pid );
    if ( $bol ) {
        header( 'Location:showAllPost.php' );
    }
}
?>

<div class = 'container my-3'>
<div class = 'row'>
<?php
include_once 'views/side_bar.php'
?>
<section class = 'col-md-9'>
<div class = 'row'>
<?php
$result = getAllPost( 2, $start );
foreach ( $result as $post ) {
    echo '
        <div class="col-md-6">
            <div class="card mb-5 p-3">
                <div class="card-block">
                    <h5>'.htmlspecialchars( substr( $post[ 'title' ], 0, 30 ) ).'</h5>
                    <p>'.htmlspecialchars( substr( $post[ 'content' ], 0, 150 ) ).'</p>
                        <input type="hidden" name="post_id" value="'.$post[ 'id' ].'">
                        <a href="showAllPost.php?pid='.$post[ 'id' ].'" class="btn btn-info btn-sm float-right mr-2">Delete</a>
                        <a href="postEdit.php?pid='.$post[ 'id' ].'" class="btn btn-info btn-sm float-right mr-2">Edit</a>
                </div>
            </div>
        </div>';
}
?>
</div>
</section>
</div>
</div>
<div class = 'container'>
<div class = 'col-md-4 offset-md-4'>
<nav aria-label = 'Page navigation example'>
<ul class = 'pagination'>
<?php
$t = 0;
for ( $i = 0; $i<$rows; $i += 10 )
 {
    $t++;
    echo '<li class="page-item"><a class="page-link" href="showAllPost.php?start='.$i.'">'.$t.'</a></li>';
}
?>
</ul>
</nav>
</div>
</div>
<?php
include_once 'views/footer.php';
include_once 'views/base.php';
?>