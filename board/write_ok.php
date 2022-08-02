<?phpgit 
function take(&$var1, $defValue=''){
    return isset($var1) ? $var1 : $defValue;
}
function get($index, $defValue=''){
    return take($_GET[$index], $defValue);
}
function post($index, $defValue=''){
    return take($_POST[$index], $defValue);
}
echo 'write_ok.php';
echo ' / '  . '<br>';

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
?>