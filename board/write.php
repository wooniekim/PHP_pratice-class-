<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>새 글 작성</title>
</head>
<body>
    <h1>게시판 새 글 작성</h1>
    <div>
        <!-- method는 아무 값도 없으면 get요청 -->
        <!-- submit버튼을 누르면 action쪽으로 입력받은 것을 가지고 감 -->
        <!-- post요청은 선물처럼 포장해서 감 -->
        <!-- payload는 body -->
        <form action="write_ok.php" method="post">
            <div>공지글</div>
            <div>
                <input type="checkbox"id="isNotice" name="isNotice" value="y"/>
            </div>
            <div>제목</div>
            <div>
                <input type="text" id="subject" name="subject" value="" placeholder="제목을 입력하세요" />
            </div>
            <div>작성자</div>
            <div>
                <input type="text" id="writer" name="writer" value="" placeholder="작성자를 입력하세요" />
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