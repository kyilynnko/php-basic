<?php
require_once "sysgem/postGenerator.php";
$data = file_get_contents("assests/genData.json");
$posts = json_decode($data,true);
$types = [1,2];
$i = 0;
$writers = ["kyilynn","lynnko","dodo","chitthit"];
$img_links = ["1708400864_3D_cordinate.png1708400864","1708401166_room_kyoto.png1708401166",
            "1708401219_hero-most-beautiful-flowers.jpg1708401219","1708415447_1.webp1708415447"];
$subjects = [1,2,3,4];
foreach($posts as $post)
{
    $i++;
    $title = $post["title"];
    $content = $post["content"];
    $type = $types[$i % 2];
    $writer = $writers[$i % 4];
    $img_link = $img_links[$i % 4];
    $subject = $subjects[$i % 4];
    insertPost($title,$type,$subject,$writer,$content,$img_link);
}

?>