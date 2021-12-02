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

    function getmember($id){
        $query = "SELECT * FROM member WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function countmember(){
        $query = "SELECT * FROM member";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }
    function insertwishlist($id_member,$id_product){
        $query = "INSERT INTO product_wishlist(`member_id`, `product_id`) VALUES ('$id_member','$id_product')";
        $stmt = $this->conn->prepare($query);
        $kq = false;
        if ($stmt->execute()) {
            $kq = true;
            return json_encode($kq);
        }
        return json_encode($kq);
    }

    function checkexistwishlist($id,$id_product) {
        $query = "SELECT * FROM product_wishlist WHERE `member_id` = $id AND `product_id` = $id_product";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function getwishlist($id_member){
        $query = "SELECT a.member_id,a.product_id as 'prodidwl',b.*,c.price,c.quantity from product_wishlist a inner join products b on a.product_id = b.id inner join product_type c on b.id = c.product_id  where a.member_id = $id_member group by c.product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function deletewishList($id_member,$id_product) {
        $query = "DELETE FROM `product_wishlist` WHERE `member_id` = $id_member AND `product_id` = $id_product";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function checkexistemailaccount($email, $id){
        $query = "SELECT email FROM member where email = ? and id != ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email,$id]);
        return $stmt;
    }

    function updatemyaccount($fullname,$mobile,$address,$email,$id){
        $query = "UPDATE member SET fullname = ?,mobile = ?,address = ?,email = ? where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$fullname,$mobile,$address,$email,$id]);
    }
}
