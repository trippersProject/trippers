<div class="col-md-9 ms-sm-auto col-lg-10 p-md-4">
    <h5>작성글 관리 > 글 수정</h5>
    <hr/>
    <br/>
    <form method="post" id="articleForm">
        <input type="hidden" name="id" id="id" value="<?php echo $info['idx']?>">
        <div>
            <h4>대분류 카테고리</h4>
            <select name="category1" id="category1" class="form-control w-25">
                <?php foreach($category1 as $item):?>
                    <option value="<?php echo $item['id']?>" <?php echo ($item['id'] == $info['category1']) ? "selected" : ""?>><?php echo $item['name']?></option>
                <?php endforeach; ?>
            </select>

            <hr>

            <h4>소분류 카테고리</h4>
            <select name="category2" id="category2" class="form-control w-25">
                <option value=''>---선택---</option>
                <?php foreach($category2 as $item):?>
                    <option value="<?php echo $item['id']?>" <?php echo ($item['id'] == $info['category2']) ? "selected" : ""?>><?php echo $item['name']?></option>
                <?php endforeach; ?>
            </select>

            <hr>

            <h4>크리에이터(크리에이터 글일 경우에만 선택)</h4>
            <select name="c_id" id="c_id" class="form-control w-25">
                <?php /*foreach($category2 as $item):?>
                    <option value="<?php echo $item['id']?>" <?php echo ($item['id'] == $info['category2']) ? "selected" : ""?>><?php echo $item['name']?></option>
                <?php endforeach; */?>
                <option value='1'>테스트크리에이터</option>
            </select>

            <hr>

            <h4>제목</h4>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo $info['title'];?>">
            <hr>

            <h4>태그 ( '#' 으로 구분)</h4>
                <input type="text" name="tag" id="tag" class="form-control w-25" value="<?php echo $info['tag'];?>">
            <hr>

            <h4>대표 이미지</h4>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control w-25">

            <hr>

            <div class="container mt-5">
                <h5>현재 대표 이미지</h5>
                <p><?php echo $info['thumbnail'];?></p>
                <img src="<?php echo base_url(get_article_upload_path().$info['thumbnail']);?>" class="img-fluid" style="max-width: 30%;">
            </div>

            <hr>

            <h4>본문</h4>
            <!-- 에디터 -->
                <textarea id="summernote" name="content"><?php echo $info['content'];?></textarea>
        </div>
        <br/>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" id="submitBtn" class="btn btn-primary btn-lg">수정</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 500,
            lang: "ko-KR",

            toolbar: [
                ['style', ['style']], // 글자 스타일 설정 옵션
                ['fontsize', ['fontsize']], // 글꼴 크기 설정 옵션
                ['font', ['bold', 'underline', 'clear']], // 글자 굵게, 밑줄, 포맷 제거 옵션
                ['color', ['color']], // 글자 색상 설정 옵션
                ['table', ['table']], // 테이블 삽입 옵션
                ['para', ['ul', 'ol', 'paragraph']], // 문단 스타일, 순서 없는 목록, 순서 있는 목록 옵션
                ['height', ['height']], // 에디터 높이 조절 옵션
                ['insert', ['picture', 'link', 'video']], // 이미지 삽입, 링크 삽입, 동영상 삽입 옵션
                ['view', ['codeview', 'fullscreen', 'help']], // 코드 보기, 전체 화면, 도움말 옵션
            ],
            callbacks: {
                onImageUpload: function(files) {
                    for (var i = 0; i < files.length; i++) {
                        uploadImage(files[i]);
                    }
                }
            },
            fontSizes: [
                '8', '9', '10', '11', '12', '14', '16', '18',
                '20', '22', '24', '28', '30', '36', '50', '72',
            ], // 글꼴 크기 옵션

            styleTags: [
                'p',  // 일반 문단 스타일 옵션
                {
                    title: 'Blockquote',
                    tag: 'blockquote',
                    className: 'blockquote',
                    value: 'blockquote',
                },  // 인용구 스타일 옵션
                'pre',  // 코드 단락 스타일 옵션
                {
                    title: 'code_light',
                    tag: 'pre',
                    className: 'code_light',
                    value: 'pre',
                },  // 밝은 코드 스타일 옵션
                {
                    title: 'code_dark',
                    tag: 'pre',
                    className: 'code_dark',
                    value: 'pre',
                },  // 어두운 코드 스타일 옵션
                'h1', 'h2', 'h3', 'h4', 'h5', 'h6',  // 제목 스타일 옵션
            ],
        });
    });

    //본문이미지 업로드
    function uploadImage(file) {
        var data = new FormData();
        data.append("file", file);
        $.ajax({
            url: '/admin/article/upload_image',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                var image = $('<img>').attr('src', url);
                $('#summernote').summernote("insertNode", image[0]);
            },
            error: function(data) {
                console.error(data.responseText);
            }
        });
    }

    $('#submitBtn').click(function() {
        var formData = new FormData();
        formData.append('id', $('#id').val());
        formData.append('title', $('#title').val());
        formData.append('tag', $('#tag').val());
        formData.append('content', $('#summernote').val());
        formData.append('category1', $('#category1').val());
        if($('#category2').val()){  
            formData.append('category2', $('#category2').val());
        }
        if($('#c_id').val()){
            formData.append('c_id', $('#c_id').val());
        }
        if($('#thumbnail').val()){
            formData.append('thumbnail', $('#thumbnail')[0].files[0]);
        }

        $.ajax({
            url: '/admin/article/regi_article',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response.msg);
                window.location.href = '/admin/article';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
</script>