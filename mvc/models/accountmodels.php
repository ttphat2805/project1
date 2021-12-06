<?php

class accountmodels extends db
{

    function getidmember($user_id)
    {
        $query = "SELECT id FROM member WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$user_id]);
        return $stmt->fetch()['id'];
    }

    function getmember($id)
    {
        $query = "SELECT * FROM member WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function countmember()
    {
        $query = "SELECT * FROM member";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }
    function insertwishlist($id_member, $id_product)
    {
        $query = "INSERT INTO product_wishlist(`member_id`, `product_id`) VALUES ('$id_member','$id_product')";
        $stmt = $this->conn->prepare($query);
        $kq = false;
        if ($stmt->execute()) {
            $kq = true;
            return json_encode($kq);
        }
        return json_encode($kq);
    }

    function checkexistwishlist($id, $id_product)
    {
        $query = "SELECT * FROM product_wishlist WHERE `member_id` = $id AND `product_id` = $id_product";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function getwishlist($id_member)
    {
        $query = "SELECT a.member_id,a.product_id as 'prodidwl',b.*,c.price,c.quantity from product_wishlist a inner join products b on a.product_id = b.id inner join product_type c on b.id = c.product_id  where a.member_id = $id_member group by c.product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function deletewishList($id_member, $id_product)
    {
        $query = "DELETE FROM `product_wishlist` WHERE `member_id` = $id_member AND `product_id` = $id_product";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function checkexistemailaccount($email, $id)
    {
        $query = "SELECT email FROM member where email = ? and id != ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email, $id]);
        return $stmt;
    }

    function updatemyaccount($fullname, $mobile, $address, $email, $id)
    {
        $query = "UPDATE member SET fullname = ?,mobile = ?,address = ?,email = ? where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$fullname, $mobile, $address, $email, $id]);
    }
    // ORDER ACCOUNT
    function accountshop($id)
    {
        $query = "SELECT a.id, a.member_id, a.status, a.total,
        DATE(`a`.`created_at`) as 'orderDate' FROM orders a INNER JOIN member ON a.member_id = member.id 
        WHERE a.member_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    //  a: bảng member -- b: bảng orders -- c:bảng ordermethod -- d:bảng products

    public function orderdetail($id)
    {
        $query = "SELECT a.fullname,a.mobile as 'mobilemember',a.address as 'addressmember',
        a.email as 'emailmember',b.*,c.name as 'nameordermethod' FROM member a 
        inner join orders b on a.id = b.memberid join ordermethod c on b.ordermethodid = c.id  
        where b.id= ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function order_product($id)
    {
        $query = "SELECT b.quantity,b.price,d.name,d.image FROM orders a inner join orderdetail b on a.id=b.order_id
        join product_type c on b.product_type_id = c.id join products d on c.product_id = d.id where a.id= ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
}
