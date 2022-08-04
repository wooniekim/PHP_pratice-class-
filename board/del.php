<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php" ?>
<?php
$idx = get('idx', '0');
if($idx == '0'){
    ?>
    <script>alert('잘못된 접근입니다'); location.href='<?=$_site_options['board']['listPage']?>';</script>
    <?php
    return;
}

// 게시물 삭제하기
$stmt = $db->prepare("DELETE FROM " . $_site_options['board']['tableName'] ." WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();
?>
<script>alert('게시물이 삭제되었습니다.'); location.href='<?=$_site_options['board']['listPage']?>';</script>
<?php
$db = null;
?>