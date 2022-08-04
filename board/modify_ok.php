<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php" ?>
<?php
$idx = post('idx', '0');
if($idx == '0'){
    ?>
    <script>alert('잘못된 접근입니다'); location.href='<?=$_site_options['board']['listPage']?>';</script>
    <?php
    return;
}

$subject = post('subject', '제목 없음');
$writer = post('writer', '작성자 없음');

// 데이터베이스 연결
$stmt = $db->prepare("UPDATE " . $_site_options["board"]["tableName"] . " SET subject = :subject, writer = :writer WHERE idx=:idx;");
$stmt->bindValue(':subject', $subject);
$stmt->bindValue(':writer', $writer);
$stmt->bindValue(':idx', $idx);
$stmt->execute();

$db = null;
?>

<script>
    location.href = '<?=$_site_options['board']["viewPage"]?>?idx=<?=$idx?>';
</script>