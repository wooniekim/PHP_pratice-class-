<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php" ?>
<?php 

$stmt1 = $db->prepare("SELECT COUNT(*) FROM " . $_site_options['board']['tableName'] .";");
$stmt1->execute();
$total_count = $stmt1->fetchColumn();

$stmt2 = $db->prepare("SELECT * FROM " . $_site_options['board']['tableName'] ." ORDER BY idx DESC;");
$stmt2->execute();
$count = $stmt2->rowCount();

$article_list = [];
while($row = $stmt2->fetch(PDO::FETCH_BOTH)){
    $article_row = [
        "idx"=>$row["idx"],
        "subject"=>$row["subject"],
        "writer"=>$row["writer"],
        "pwd"=>$row["pwd"],
        "viewCount"=>$row["viewCount"],
        "created_at"=>$row["created_at"],
        "content"=>$row["content"],
    ];
    $article_list[] = $article_row;
}
$db = null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>목록</title>
</head>
<body>
    <h1><?=$_site_options['board']['name']?> ( 게시물수: <?=$count?> / 총 <?=$total_count?>건)</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>제목</th>
                <th>작성자</th>
                <th>조회수</th>
                <th>등록일시</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for($i=0; $i<count($article_list); $i++){
            ?>
            <tr>
                <td><?=($i+1)?></td>
                <td>
                    <a href="<?=$_site_options['board']['viewPage']?>?idx=<?$article_list[$i]['idx']?>">
                    <?=$article_list[$i]["subject"]?>
                </a>
                </td>
                <td><?=$article_list[$i]["writer"]?></td>
                <td><?=$article_list[$i]["viewCount"]?></td>
                <td><?=$article_list[$i]["created_at"]?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div>
        <a href="<?=$_site_options['board']['writePage']?>">새 글</a>
    </div>
</body>
</html>