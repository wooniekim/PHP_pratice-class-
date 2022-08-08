<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
// 전체 게시물 수 조회
$stmt1 = $db->prepare("SELECT COUNT(*) FROM " . $_board_options["tableName"] . ";");
$stmt1->execute();
$total_count = $stmt1->fetchColumn();

$stmt2 = $db->prepare("SELECT * FROM " . $_board_options["tableName"] . " ORDER BY idx DESC;");
$stmt2->execute();
$count = $stmt2->rowCount();

$article_list = [];
while($row = $stmt2->fetch(PDO::FETCH_BOTH)) {
    $article_row = [
        "idx" => $row["idx"],
        "subject" => $row["subject"],
        "writer" => $row["writer"],
        "pwd" => $row["pwd"],
        "viewCount" => $row["viewCount"],
        "created_at" => $row["created_at"],
        "content" => $row["content"],
    ];
    $article_list[] = $article_row;
}

$db = null;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>목록</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            html, body {height: 100%;}
            a { text-decoration: none; color: #0f0f0f;}
            th { text-align : center; } /* 제목 정렬 */
            .td-no { width: 60px; text-align : center; }
            .td-subject {  }
            .td-writer { width: 120px; text-align : center; }
            .td-view-count { width: 100px; text-align : center; }
            .td-created-at { width: 200px; text-align : center; }
        </style>
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
                <span class="fs-4"><?=$_board_options["name"]?>(게시물수: <?= $count ?>/<?= $total_count ?>건)</span>
            </a>
            </header>
        </div>
        <div class="w-100 px-3">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="td-no">#</th>
                    <th class="td-subject">제목</th>
                    <th class="td-writer">작성자</th>
                    <th class="td-view-count">조회수</th>
                    <th class="td-created-at">등록일시</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for($i=0; $i<count($article_list); $i++) {
                ?>
                <tr>
                    <td class="td-no"><?=($i+1)?></td>
                    <td class="td-subject">
                        <a href="<?=$_board_options["viewPage"]?>?idx=<?=$article_list[$i]["idx"]?>">
                            <?=$article_list[$i]["subject"]?>
                        </a>
                    </td>
                    <td class="td-writer"><?=$article_list[$i]["writer"]?></td>
                    <td class="td-view-count"><?=$article_list[$i]["viewCount"]?></td>
                    <td class="td-created-at"><?=$article_list[$i]["created_at"]?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div>
            <a class="btn btn-primary" href="<?=$_board_options["writePage"]?>">새글</a>
        </div>
        </div>
        <!-- footer -->
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