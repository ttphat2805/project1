<div class="page-header ">
    <h3 class="page-title center_page-header"> Danh mục </h3>
</div>
<div class="row center_modal">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Thêm danh mục
                </h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form action="<?=BASE_URL?>/admin/addcategory" class="forms-sample" method="POST">
                    <div class="form-group">
                        <label for="" class="label__css">Tên danh mục</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label__css">Trạng thái</label><br />
                        <div class="wrapper">
                            <input type="radio" name="status" id="option-1" value="1" checked>
                            <input type="radio" name="status" id="option-2" value="2">
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
                    <input type="submit" value="Thêm" name="btn__submit" class="btn btn-primary">
                    <a href="<?php echo BASE_URL ?>/admin/showcategory" class="btn btn-dark">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</div>