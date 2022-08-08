<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php

$subject = post('subject', '제목 없음');
$writer = post('writer', '작성자 없음');
$pwd = post('pwd');
$content = post('content');


$stmt = $db->prepare("INSERT INTO " . $_board_options["tableName"] . " (subject, writer, pwd, content) VALUES (:subject, :writer, :pwd, :content)");
$stmt->bindValue(':subject', $subject);
$stmt->bindValue(':writer', $writer);
$stmt->bindValue(':pwd', $pwd);
$stmt->bindValue(':content', $content);
$stmt->execute();

$db = null;
?>

<script>
    location.href='<?=$_board_options["listPage"]?>';
</script>


