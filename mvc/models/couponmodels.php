<?php
class couponmodels extends db
{
    function insertcoupon($name, $code, $discout, $min_order, $quantity, $date_created, $date_out, $status)
    {
        $query = "INSERT INTO coupon(name,code,discout,min_order,quantity,created_at,date_out,status)
        values ('$name','$code','$discout','$min_order','$quantity','$date_created','$date_out','$status')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function getcouponhome()
    {
        $query = "SELECT * FROM coupon";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function infocoupon($id)
    {
        $query = "SELECT * FROM coupon where id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    function getCoupon($code)
    {
        $query = "SELECT * FROM coupon where code = '$code'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }


    function updatecoupon($name, $code, $discout, $min_order, $quantity, $date_created, $date_out, $status, $id)
    {
        $query = "UPDATE coupon set name = ?,code = ?,discout = ?,min_order = ?, quantity = ?,status = ?,created_at = ?,date_out = ? where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $code, $discout, $min_order, $quantity, $status, $date_created, $date_out, $id]);
    }

    function delcoupon($id){
        $query = "DELETE from coupon where id=$id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    // Nghi code
    public function findCoupon ($code) {
        $sql = "select * from `coupon` where code = '$code'";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $query->fetch();

        return $query->rowCount();        
    }

    public function checkCouponUser($user_id, $coupon) {
        $sql = "select * from `coupon` a inner join `orders` b on a.id = b.coupon_id where b.member_id = '$user_id' and a.code like '$coupon'";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $query->fetch();
        return $query->rowCount();
    }

    public function updatequantitycoupon($id){
        $query = "UPDATE coupon set quantity = quantity - 1, used = used + 1 where id = $id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
    public function updatequantityproducttype($soluong,$id){
        $query = "UPDATE product_type set quantity = quantity - $soluong, sold = sold + $soluong where id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

}
