<?php
Class blogmodels extends db{
    function getBlog(){
        $query = "SELECT * FROM blog WHERE status=1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function insertblog($title,$title_slug,$description,$content,$imageName,$status)
    {
        $query = "INSERT INTO blog(title,slug,description,content,image,status) 
        values (:title,'$title_slug','$description','$content','$imageName','$status')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":title",$title,PDO::PARAM_STR);
        $stmt->execute();
    }

    function deleteBlog($id){
        $query = "DELETE from blog where id=$id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function getblogid($id){
        $query = "SELECT * FROM blog WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function updateblog($title,$slug,$description, $content, $status,$id){
        $query = "UPDATE blog set title= ? ,slug=? ,description=? ,content = ? , status= ? where id= ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$title,$slug,$description, $content, $status,$id]);
        
    }

    function updateimageblog($image,$id){
        $query = "UPDATE blog set image=? where id= ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$image, $id]);
    }
}
?>