<?php
require_once 'sysgem/dbHacker.php';

function insertPost( $title, $type, $subject, $writer, $content, $img_link )
 {
    $created_at = getTimeNow();
    $db = dbConnect();
    $qry = "INSERT INTO post (title,type,subject,writer,content,img_link,created_at)
        VALUES
        ('$title',$type,$subject,'$writer','$content','$img_link','$created_at')";
    $bol = mysqli_query( $db, $qry );
    return $bol;
}

function updatePost( $title, $type, $subject, $writer, $content, $img_link, $pid )
 {
    $created_at = getTimeNow();
    $db = dbConnect();
    $qry = "UPDATE post SET title='$title',type='$type',subject='$subject',writer='$writer',content='$content',img_link='$img_link' WHERE id=$pid";
    $result = mysqli_query( $db, $qry );
    if ( $result ) {
        header( 'Location:showAllPost.php' );
    } else {
        echo "<script>alert('Post insert fail!')</script>";
    }
    return $result;
}

function deletePost( $pid )
 {
    $db = dbConnect();
    $qry = "DELETE FROM post WHERE id='$pid'";
    $result = mysqli_query( $db, $qry );
    return $result;
}

function getAllPost( $type, $start )
 {
    $db = dbConnect();
    $qry = '';
    if ( $type == 1 ) {
        $qry = "SELECT * FROM post WHERE type= $type LIMIT $start,10";
    } else {
        $qry = "SELECT * FROM post LIMIT $start,10";
    }
    $result = mysqli_query( $db, $qry );
    return $result;
}

function getSinglePost( $pid )
 {
    $db = dbConnect();
    $qry = "SELECT * FROM post WHERE id=$pid";
    $result = mysqli_query( $db, $qry );
    return $result;
}

function getFilteredPost( $subjectid, $type )
 {
    $db = dbConnect();
    $qry = "SELECT * FROM post WHERE subject=$subjectid AND type=$type";
    $result = mysqli_query( $db, $qry );
    return $result;
}

function getAllSubject()
 {
    $db = dbConnect();
    $qry = 'SELECT * FROM subject';
    $result = mysqli_query( $db, $qry );
    return $result;
}

function getPostCount()
 {
    $db = dbConnect();
    $qry = 'SELECT * FROM post';
    $result = mysqli_query( $db, $qry );
    return mysqli_num_rows( $result );
}
?>