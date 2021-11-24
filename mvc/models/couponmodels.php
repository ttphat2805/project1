<?php
class couponmodels extends db
{
    function insertcoupon($name, $code, $discout, $type, $min_order, $quantity, $used, $created_at, $date_out)
    {
        $query = "INSERT INTO coupon(name,code,discout,type,min_order,quantity,used,created_at,date_out)
        values (:name,$code,$discout,$type,$min_order,$quantity,$used,$created_at,$date_out)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
}
