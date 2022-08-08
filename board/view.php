<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
$idx = get('idx', '0');
if($idx == '0') {
?>
<script>alert('잘못된 접근 입니다.');location.href='/board/';</script>
<?php
return;
}
// 게시물 조회수 증가 시키기
$stmt = $db->prepare("UPDATE " . $_board_options["tableName"] . " SET viewCount=viewCount+1 WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();

// 게시물 가져오기
$stmt = $db->prepare("SELECT * FROM " . $_board_options["tableName"] . " WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();

$error = 0;

$errorMsg = '';
if($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    $subject = $row['subject'];
    $writer = $row['writer'];
    $viewCount = $row['viewCount'];
    $content = nl2br($row['content']);
    $createdAt = $row['created_at'];
} else {
    $error += 1;
    $errorMsg .= '<li>게시물이 삭제되었거나 이동되었을 수 있습니다.</li>';
}
// $listTag .= '</ul>'; 

$db = null;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$_board_options["name"]?> 상세보기</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script>
            function del() {
                // 22. 8. 5 [우니] 수정
                // 비밀번호 적용때문에 필요가 없게 되었습니다.
                //if(confirm('정말 삭제하시겠습니까?')) {
                    location.href="<?=$_board_options["delPage"]?>?idx=<?=$idx?>";
                //}
            }
        </script>
    </head>
    <body>
    <div id="main" class="container-fluid h-100 px-0">
        <header class="p-3 bg-dark text-white">
            <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?=$_board_options['listPage']?>" class="nav-link px-2 text-warning">자유게시판</a></a></li>
                <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                <li><a href="#" class="nav-link px-2 text-white">pricing</a></li>
                <li><a href="<?=$_board_options['listPage']?>" class="nav-link px-2 text-white">게시판</a></li>
                <li><a href="#" class="nav-link px-2 text-white">문의</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2">Login</button>
                <button type="button" class="btn btn-warning">Sign-up</button>
                </div>
            </div>
            </div>
        </header>
        <!-- </div> -->
        <div class="px-5 pt-3">
            <header class="d-flex align-items-center pb-3 mb-1">
                <a href="<?=$_board_options['listPage']?>" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4"><?=$_board_options["name"]?> 상세 보기</span>
            </a>
            </header>
        </div>
    <?php if($error == 0) {?>
    <article class="blog-post px-5 pt-3">
    <h2 class="blog-post-title"><?=$subject?></h2></h2>
    <p class="blog-post-meta"><?=$viewCount?>회 조회됨 / <?=$createdAt?> by <?=$writer?> <a href="#">Chris</a></p>

    <p><?=$content?></p>
    </article>

    <nav class="blog-pagination px-5 pt-3" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="<?=$_board_options['listPage']?>">목록</a>
        <a class="btn btn-outline-secondary" href="<?=$_board_options['modifyPage']?>?idx=<?=$idx?>">수정</a>
        <a class="btn btn-outline-danger" href="<?=$_board_options['delPage']?>?idx=<?=$idx?>">삭제</a>
    </nav>
    <?php } else { ?>
    <?=$errorMsg?>
    <nav class="blog-pagination px-5 pt-3" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="<?=$_board_options['listPage']?>">목록</a>
    </nav>
    <?php } ?>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
        </footer>
        </div>
        
        <!-- 부트스트랩 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>












