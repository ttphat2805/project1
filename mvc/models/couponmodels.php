<?php
class couponmodels extends db
{
    function insertcoupon($name, $code, $discout, $type, $min_order, $quantity, $date_created, $date_out, $status)
    {
        $query = "INSERT INTO coupon(name,code,discout,type,min_order,quantity,created_at,date_out,status)
        values ('$name','$code','$discout','$type','$min_order','$quantity','$date_created','$date_out','$status')";
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


    function updatecoupon($name, $code, $type, $discout, $min_order, $quantity, $date_created, $date_out, $status, $id)
    {
        $query = "UPDATE coupon set name = ?,code = ?,discout = ?,type = ?,min_order = ?, quantity = ?,status = ?,created_at = ?,date_out = ? where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $code, $discout, $type, $min_order, $quantity, $status, $date_created, $date_out, $id]);
    }

    function delcoupon($id){
        $query = "DELETE from coupon where id=$id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
}
