<?php

class crudApp{
    private $conn;
    public function __construct()
    {
        #database Host, D-user, D-pass, D-name
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = "";
        $dbname = 'crud';
        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        
        if(!$this->conn){
            die("Database Connection Erroe");
        }
        
    }


    public function add_data($data){
        $std_name = $data['std_name'];
        $std_roll = $data['std_roll'];
        $std_image = $_FILES['std_image']['name'];
        $tmp_name = $_FILES['std_image']['tmp_name'];

        $query = "INSERT INTO student(std_name,std_roll,std_image) VALUE('$std_name',$std_roll,'$std_image')";
        
        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name, 'upload/'.$std_image);
            return "Information Added Successfully";
        }
    }

    public function display_data(){
        $query = "SELECT * FROM student";
        if(mysqli_query($this->conn, $query)){
            $returndata = mysqli_query($this->conn, $query);
            return $returndata;
        }
    }
  
    public function display_dataByID($id){
        $query = "SELECT * FROM student WHERE id=$id";
        if(mysqli_query($this->conn, $query)){
            $returndata = mysqli_query($this->conn, $query);
            $studentdata = mysqli_fetch_assoc($returndata);
            return $studentdata;
        }
    }

    public function update_data($data){
        $std_name = $data['ustd_name'];
        $std_roll = $data['ustd_roll'];
        $std_id = $data['std_id'];
        $std_image = $_FILES['ustd_image']['name'];
        $tmp_name = $_FILES['ustd_image']['tmp_name'];

        $query = "UPDATE student SET std_name='$std_name', std_roll=$std_roll, std_image='$std_image' WHERE id=$std_id";
        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name,'upload/'.$std_image);
            return "Information Updated Successfully";
        }
    }

    public function deleteDATA($id){
        $catch_img = "SELECT *FROM student WHERE id=$id";
        $delete_std_info = mysqli_query($this->conn, $catch_img);
        $std_infoDel = mysqli_fetch_assoc($delete_std_info);
        @ $deleteImg_data = $std_infoDel['std_image'];
        $query = "DELETE FROM student WHERE id=$id";
        if(mysqli_query($this->conn, $query)){
         @   unlink('upload/'.$deleteImg_data);
            return "Deleted success";
        }
    }
}