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
}
