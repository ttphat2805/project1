
<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>


<div class="page-header ">
    <h3 class="page-title center_page-header"> Bài viết </h3>
</div>
<div class="row center_modal">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Sửa bài viết
                </h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form class="forms-sample" method="POST" action="<?= BASE_URL ?>/admin/updateblog" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['blog']['id'] ?>">
                    <div class="form-group">
                        <label for="" class="label__css">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $data['blog']['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Ảnh</label>
                        <input type="file" name="image" class="form-control">
                        <img src="<?php echo BASE_URL ?>/public/assets/images/blog/<?php echo $data['blog']['image'] ?>" alt="Ảnh không tồn tại !" width="250" height="200px">
                        
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Mô tả</label>
                        <textarea name="description" cols="300" rows="5" class="form-control editor"><?php echo $data['blog']['description'] ?></textarea>
                    </div>
                    <div class="form-group input_price">
                        <label for="" class="label__css ">Nội dung</label>
                        <textarea name="content"  cols="300" rows="5" class="form-control editor" id="editor"><?php echo $data['blog']['content'] ?></textarea>
                    </div>
                    <!-- <div class="form-group"></div> -->
                    <div class="form-group">
                        <label for="" class="label__css">Trạng thái</label><br />
                        <div class="wrapper">
                            <input type="radio" name="status" id="option-1" value="1" <?= $data['blog']['status'] == 1 ? 'checked' : '' ?>>
                            <input type="radio" name="status" id="option-2" value="0" <?= $data['blog']['status'] == 0 ? 'checked' : '' ?>>
                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>Active</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <div class="dot"></div>
                                <span>Unactive</span>
                            </label>
                        </div><br>
                    </div>
                    <input type="submit" value="Cập nhật" name="btn__submit" class="btn btn-primary">
                    <a href="<?php echo BASE_URL ?>/admin/showblog" class="btn btn-dark">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
 CKEDITOR.replace( 'editor', {
  height: 300,
  filebrowserUploadUrl: "upload.php"
 });
</script>
