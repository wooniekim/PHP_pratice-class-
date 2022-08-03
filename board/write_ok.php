<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php" ?>
<?php
// echo 'write_ok.php';
// echo ' / '  . '<br>';

$options = post('options', []);
$isNotice = post('isNotice', 'n');
if($isNotice != 'y') $isNotice = 'n';
$subject = post('subject', '제목 없음');
$writer = post('writer', '작성자 없음');

echo '* 공지글 여부 : ' . $isNotice . '<br>';
echo '* 제목 : ' . $subject . '<br>';
echo '* 작성자 : ' . $writer . '<br>';
for($i=0; $i<count($options); $i++){
    echo '* 옵션#' . ($i + 1) . ' : ' . $options[$i] . '<br>';
}

// 데이터베이스 연결
$stmt = $db->prepare("INSERT INTO board (subject, writer) VALUES (:subject, :writer)");
$stmt->bindValue(':subject', $subject);
$stmt->bindValue(':writer', $writer);
$stmt->execute();

// $subject = $subject . '#';
// $writer = $writer . '#';
// $stmt->execute();

$db = null;
?>

<script>
    location.href = '/board/';
</script>