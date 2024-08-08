<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>포스트 목록</h2>

    <button onclick="location.href='article/apply'" class="btn btn-secondary btn-sm">글쓰기</button>
    <div class="table-responsive">
        <table class="table table-striped table-sm w100">
            <thead>
            <tr>
                <th scope="col">no.</th>
                <th scope="col">제목</th>
                <th scope="col">정렬순서</th>
                <th scope="col">카테고리</th>
                <th scope="col">작성일</th>
                <th scope="col">수정</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($list)): ?>
            <?php foreach ($list as $key => $value): ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['ta_title']; ?></td>
                    <td><?php echo $value['ta_sort']; ?></td>
                    <td><?php echo $value['tc_name']?></td>
                    <td><?php echo $value['ta_regdate']; ?></td>
                    <td><button onclick="location.href='article/modify?id=<?php echo $value['ta_idx']?>'" class="btn btn-primary btn-sm">수정</button></td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">조회된 포스트가 없습니다</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</main>
</body>
</html>
