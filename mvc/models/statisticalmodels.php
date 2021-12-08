<?php 

class statisticalmodels extends db {

    function filterbydate($fromdate,$todate){
        $query = "SELECT sum(price) as 'total',sum(quantity) as 'quantity',created_at from orderdetail where created_at between ? and ? GROUP BY created_at";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$fromdate,$todate]);
        return $stmt->fetchAll();
    }

    function chartdays(){
        $query = "SELECT sum(price) as 'total',sum(quantity) as 'quantity',created_at from orderdetail GROUP BY created_at";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function productincat(){
        $query = "SELECT b.id as 'idbrand',b.name,COUNT(*) as 'soluong',a.id as 'idpd', a.categoryid,a.views from products a INNER JOIN category b on a.categoryid = b.id GROUP by b.id,b.name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function countcomment(){
        $query = "SELECT count(a.product_id) as 'count',b.name from comments a INNER JOIN products b on a.product_id = b.id GROUP by a.product_id order by count(a.product_id) desc limit 3";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}