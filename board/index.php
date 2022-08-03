<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php" ?>
<?php 
$stmt = $db->prepare("SELECT * FROM board;");
$stmt->execute();

$count = $stmt->rowCount();

$listTag = '<ul>';
while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $listTag .= '<li><a href="view.php?idx=' . $row["idx"] . '">idx : ' . $row["idx"] . ", subject : " . $row["subject"] . ", writer : " . $row["writer"] . "</a></li>";
}
$listTag .= '</ul>';

$db = null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>목록</title>
</head>
<body>
    <h1>Don't try this shit at home! (총 <?= $count?>건)</h1>
    <?= $listTag ?>
    <div>
        <a href="write.php">새 글</a>
    </div>
</body>
</html>