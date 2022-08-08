<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$_board_options["name"]?> 새글 작성</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src='/js/func.js'></script>
        <script>
            function chkForm() {
                let options = [];
                options.push({selector ":subject", regex: /^\s*$/, isFocus: false, errorMsg: "제목을 바르게 입력하세요."})
                options.push({selector ":writer", regex: /^\s*$/, errorMsg: "작성자를 바르게 입력하세요."})
                options.push({selector ":content", regex: /^\s*$/, errorMsg: "내용을 바르게 입력하세요."})
                options.push({selector ":pwd", regex: /^\D*$/, errorMsg: "비밀번호는 숫자만 입력하세요."})
                return wooniechkForm(options);
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
                <span class="fs-4"><?=$_board_options["name"]?> 새글 작성</span>
            </a>
            </header>
        </div>
        <!-- 이전코드 -->
        <div>
            <form class="px-5" action="<?=$_board_options["writeOkPage"]?>" method="post" onsubmit="return chkForm();">
                <div class="col-12 mb-3">
                    <label for="subject" class="form-label">제목</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="제목을 입력하세요" style="width: 90%;" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-12 mb-3">
                    <label for="writer" class="form-label">작성자</label>
                    <input type="text" class="form-control" id="writer" name="writer" placeholder="작성자의 이름을 입력하세요" style="width: 10%;" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-12 mb-3">
                    <label for="content" class="form-label">내용</label>
                    <textarea class="form-control " name="content" id="content" col="200" row="50" style="height: 200px;"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-12 mb-3">
                    <label for="pwd" class="form-label">비밀번호</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="비밀번호" style="width: 6%;" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div>
                    <button class="btn btn-secondary" onclick="history.back()">취소</button>
                    <input class="btn btn-primary" type="submit" value="전송" />
                </div>
            </form>
        </div>
        </div>
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