<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <form method="post" id="articleForm">
        <input type="hidden" name="id" id="id" value="<?php echo $data['id']?>">
        <div>
            <h4>대분류 카테고리</h4>
            <select name="category" id="category">
                <option value="104" <?php if($data['category']=='104') echo "selected"; ?>>DONGNAE</option>
                <option value="105" <?php if($data['category']=='105') echo "selected"; ?>>CREATOR</option>
            </select>

            <hr>

            <h4>소분류 카테고리</h4>
            <select name="category_sub" id="category_sub">
                <option value="106" <?php if($data['category_sub']=='106') echo "selected"; ?>>FOOD</option>
                <option value="107" <?php if($data['category_sub']=='107') echo "selected"; ?>>BOOK</option>
                <option value="108" <?php if($data['category_sub']=='108') echo "selected"; ?>>CAFE</option>
                <option value="109" <?php if($data['category_sub']=='109') echo "selected"; ?>>STAY</option>
                <option value="110" <?php if($data['category_sub']=='110') echo "selected"; ?>>EXPERIENCE</option>
                <option value="111" <?php if($data['category_sub']=='111') echo "selected"; ?>>DESIGN</option>
                <option value="112" <?php if($data['category_sub']=='112') echo "selected"; ?>>TREND</option>
                <option value="113" <?php if($data['category_sub']=='113') echo "selected"; ?>>PHOTO</option>
                <option value="114" <?php if($data['category_sub']=='114') echo "selected"; ?>>VIDEO</option>
                <option value="115" <?php if($data['category_sub']=='115') echo "selected"; ?>>SPACE</option>
            </select>

            <hr>

            <h4>제목</h4>
                <input type="text" name="title" id="title" value="<?php echo $data['title'];?>">

            <hr>

            <h4>대표 이미지</h4>
                <input type="hidden" id="thumbnail_id" value="<?php echo $data['thumbnail_id'];?>">
                <input type="file" name="thumbnail" id="thumbnail">

            <hr>

            <h5>현재 대표이미지</h5>
            <p><?php echo base_url($data['thumbnail_url']);?></p>
            <img src="<?php echo base_url($data['thumbnail_url']);?>">

            <hr>

            <h4>본문</h4>
            <!-- 에디터 -->
                <textarea id="summernote" name="content" value="<?php echo $data['content'];?>"></textarea>
        </div>
        <button type="button" id="submitBtn">저장</button>
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
            url: '<?php echo base_url('index.php/article/upload_image'); ?>',
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
        formData.append('content', $('#summernote').val());
        formData.append('category', $('#category').val());
        formData.append('category_sub', $('#category_sub').val());
        formData.append('thumbnail', $('#thumbnail')[0].files[0]);

        $.ajax({
            url: '<?php echo base_url('index.php/article/update_article'); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('저장되었습니다');
                window.location.href = '<?php echo base_url('index.php/article'); ?>';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
</script>