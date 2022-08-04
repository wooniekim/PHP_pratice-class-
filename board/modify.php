<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php" ?>
<?php
$idx = get('idx', '0');
if($idx == '0'){
    ?>
    <script>alert('잘못된 접근입니다'); location.href='<?=$_site_options['board']['listPage']?>';</script>
    <?php
    return;
}

// 게시물 수정하기
$stmt = $db->prepare("SELECT * FROM " . $_site_options['board']['tableName'] ." WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();

$error = 0;
if($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $subject = $row['subject'];
    $writer = $row['writer'];
} else {
    $error += 1;
?>
    <script>alert('잘못된 접근입니다'); location.href='<?=$_site_options['board']['listPage']?>';</script>
<?php
    return;
}

$db = null;
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>수정</title>
</head>
<body>
    <h1>수정</h1>
    <div>
        <form action="<?=$_site_options['board']['modifyOkPage']?>" method="post">
        <input type="hidden" name="idx" value="<?=$idx?>"/>
            <div>공지글</div>
            <div>
                <input type="checkbox"id="isNotice" name="isNotice" value="y"/>
            </div>
            <div>제목</div>
            <div>
                <input type="text" id="subject" name="subject" value="<?=$subject?>" placeholder="제목을 입력하세요" />
            </div>
            <div>작성자</div>
            <div>
                <input type="text" id="writer" name="writer" value="<?=$writer?>" placeholder="작성자를 입력하세요" />
            </div>
            <div>옵션</div>
            <div>
                <input type="checkbox"id="options_1" name="options[]" value="제목옵션1"/> 제목옵션1
                <br>
                <input type="checkbox"id="options_2" name="options[]" value="제목옵션2"/> 제목옵션2
                <br>
                <input type="checkbox"id="options_3" name="options[]" value="제목옵션3"/> 제목옵션3
                <br>
            </div>
            <div>
                <input type="submit" value="전송" />
            </div>
        </form>
    </div>
</body>
</html>