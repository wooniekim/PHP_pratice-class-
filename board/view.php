<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php" ?>
<?php
$idx = get('idx', '0');
if($idx == '0'){
    ?>
    <script>alert('잘못된 접근입니다'); location.href='/board/';</script>
    <?php
    return;
}

// 게시물 가져오기
$stmt = $db->prepare("SELECT * FROM board WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();

$error = 0;
$listTag = '<ul>';
if($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $listTag .= '<li>idx : ' . $row['idx'] . '</li>';
    $listTag .= '<li>subject : ' . $row['subject'] . '</li>';
    $listTag .= '<li>writer : ' . $row['writer'] . '</li>';
} else {
    $error += 1;
    $listTag .= '<li>게시물이 삭제되었거나 이동되었을 수 있습니다.</li>';
}
$listTag .= '</ul>';

$db = null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>상세보기</title>
</head>
<body>
    <h1>게시물 상세보기</h1>
    <?= $listTag ?>
    <div>
        <a href="/board/">목록</a>
        <?php if($error == 0) {?>
        <a href="modify.php?idx=<?=$idx?>">수정</a>
        <a href="del.php?idx=<?=$idx?>">삭제</a>
        <?php } ?>
    </div>
</body>
</html>