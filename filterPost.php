<?php
include_once "views/top.php";
?>

<div class="container my-3">
    <div class="row">
        <?php
        include_once "views/side_bar.php"
        ?>    
        <section class="col-md-9">
            <div class="row">
                <?php
                    $result = "";
                    if(checkSession("username"))
                    {
                        $result = getFilteredPost($_GET["sid"],1);
                    }else{
                        $result = getFilteredPost($_GET["sid"],2);
                    };
                    // echo "<pre>" . print_r($result,true) . "</pre>";
                    foreach ($result as $post)
                    {
                        $pid = $post["subject"];
                        echo '<div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>'.substr($post["title"],0,30).'</h3>
                                        <p>'.substr($post["content"],0,150).'</p>
                                        <a href="postDetail.php?pid='.$pid.'" class="btn btn-info btn-sm float-right">Detail</a>
                                    </div>
                                </div>
                            </div>';
                    }
                ?>
                
            </div>
        </section>
    </div>
</div>

<?php
include_once "views/footer.php";
include_once "views/base.php";
?>    

