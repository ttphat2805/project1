<div class="page-header ">
    <h3 class="page-title center_page-header"> Danh mục </h3>
</div>
<div class="row center_modal">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật thuộc tính</h4>
                <!-- <p class="card-description"> Basic form layout </p> -->
                <form class="forms-sample" action="<?php echo BASE_URL ?>/admin/updateattribute" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['attribute']['id'] ?>">

                    <div class="form-group">
                        <label for="" class="label__css">Tên thuộc tính</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $data['attribute']['name'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="label__css">Giá trị</label>
                        <input type="text" name="value" class="form-control" value="<?php echo $data['attribute']['value'] ?>">
                    </div>
                    <input type="submit" value="Cập nhật" name="btn__submit" class="btn btn-primary">
                    <a href="<?php echo BASE_URL ?>/admin/showattr" class="btn btn-dark">Trở về</a>

                </form>
            </div>
        </div>
    </div>
</div>
