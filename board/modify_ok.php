<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
$idx = post('idx', '0');
if($idx == '0') {
?>
<script>alert('잘못된 접근 입니다.');location.href='/board/';</script>
<?php
return;
}

$subject = post('subject');
$writer = post('writer');
$pwd = post('pwd');
$content = post('content');

//비밀번호 확인을 위해 게시물 가져오기
$stmt = $db->prepare("SELECT * FROM " . $_board_options["tableName"] . " WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();

if($row = $stmt->fetch(PDO::FETCH_BOTH)){
    if($row['pwd'] != $pwd){
        ?>
        <script>alert('비밀번호가 일치하지 않습니다.');history.back();</script>
        <?php
        return;
    }
} else {
    ?>
    <script>alert('잘못된 접근 입니다.');location.href='/board/';</script>
    <?php
    return;
}


$stmt = $db->prepare("UPDATE " . $_board_options["tableName"] . " SET subject=:subject, writer=:writer, content=:content WHERE idx=:idx;");
$stmt->bindValue(':subject', $subject);
$stmt->bindValue(':writer', $writer);
$stmt->bindValue(':content', $content);
$stmt->bindValue(':idx', $idx);
$stmt->execute();

$db = null;
?>

<script>
    location.href='<?=$_board_options["viewPage"]?>?idx=<?=$idx?>';
</script>


