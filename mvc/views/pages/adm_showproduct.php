<?php

class showproduct extends db
{
    function attribute_product($id)
    {
        $query = "SELECT DISTINCT a.id as 'idproduct',b.id as 'idproduct_type',b.price,b.quantity,c.name as 'nameattr',c.value FROM products a inner join product_type b on b.product_id = a.id inner join attribute c on b.attribute_id = c.id where b.product_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
$attr = new showproduct();
$attr_prod = $attr->attribute_product(85);
var_dump($attr_prod);
?>
<div class="page-header">
    <h3 class="page-title">Sản phẩm</h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a class="btn btn-success create-new-button" href="<?php echo BASE_URL ?>/admin/addproduct"> + Thêm sản phẩm</a>
                </h4>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach ($data['product'] as $item) :
                            ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $item['idproduct'] ?></td>
                                    <td><?= $item['nameproduct'] ?></td>
                                    <td><?php
                            

                                        foreach ($attr_prod as $attr) :
                                            echo '<p>' . $attr['value'] . ': ' . $attr['price'] . ' VNĐ</p>';
                                        ?><?php
                                        endforeach;
                                            ?>
                                    </td>
                                    <td><img src="<?php echo BASE_URL ?>/public/assets/images/product/<?= $item['image'] ?>" alt=""> </td>
                                    <td><?php
                                        foreach ($attr_prod as $attr) :
                                            echo '<p>' . $attr['value'] . ': ' . $attr['quantity'] . ' VNĐ</p>';
                                        ?><?php
                                        endforeach;
                                            ?>
                                    </td>

                                    <td><?= $item['status'] == 1 ? '<label class="badge badge-success">Còn hàng</label>' : '<label class="badge badge-danger">Hết hàng</label>' ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo BASE_URL ?>/admin/infoproduct/<?= $item['id'] ?>">Sửa</a>
                                        <a class="btn btn-danger click_delete" href="<?php echo BASE_URL ?>/admin/deleteproduct/<?= $item['id'] ?>">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>