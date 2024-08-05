<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>포스트 목록</h2>

    <div class="table-responsive">
        <table class="table table-striped table-sm w100">
            <thead>
            <tr>
                <th scope="col">no.</th>
                <th scope="col">제목</th>
                <th scope="col">카테고리</th>
                <th scope="col">작성일</th>
                <th scope="col">수정</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($list)): ?>
            <?php foreach ($list as $list): ?>
                <tr>
                    <td><?php echo $list['ID']; ?></td>
                    <td><?php echo $list['post_title']; ?></td>
                    <td><?php echo $list['category']?></td>
                    <td><?php echo $list['post_date']; ?></td>
                    <td><button click="" >수정</button></td>
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
