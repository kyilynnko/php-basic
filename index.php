<?php
include_once "views/top.php";
include_once "views/header.php";

$start=0;
if(isset($_GET['start']))
{
    $start = $_GET['start'];
}
$rows = getPostCount();

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
                        $result = getAllpost(2,$start);
                    }else
                    {
                        $result = getAllPost(1,$start);
                    };
                    // echo "<pre>" . print_r($result,true) . "</pre>";
                    foreach ($result as $post)
                    {
                        $pid = $post["id"];
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
<div class="container">
    <div class="col-md-4 offset-md-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $t = 0;
            for ($i=0;$i<$rows;$i+=10){
                $t++;
                echo '<li class="page-item"><a class="page-link" href="index.php?start='.$i.'">'.$t.'</a></li>';
            }
            ?>
        </ul>
</nav>
    </div>
</div>

<?php
include_once "views/footer.php";
include_once "views/base.php";
?>    

