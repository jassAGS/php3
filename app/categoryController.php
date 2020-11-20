<?php

include "conecction.php";
    if(isset($_POST['action'])){
        $categoryController = new CategoryController();
        switch ($_POST['action']){
            case 'store':
                $name = strip_tags($_POST['name']);
                $description = strip_tags($_POST['description']);
                $status = strip_tags($_POST['status']);
                $categoryController->store($name,$description,$status);

            break;
            }

    }


class CategoryController{



    function get(){


        $conn = connect();
        if($conn->connect_error==false)
        {
            $query = "select * from categories";
            $prepared_query = $conn->prepare($query);
            $prepared_query->execute();
            echo("si jala");
            $result = $prepared_query->get_result();
            $categories = $result->fetch_all(MYSQLI_ASSOC);
            if(count($categories)>0){
                return $categories;
            }else
                return array();



        }else{
            return array();
        }
        


    }
    public function store($name,$description,$status){
        $conn = connect();
        if($conn->connect_error==false){
            $query = "insert into categories(name,description,status) 
            values(?,?,?)";
            
            $prepared_query = $conn->prepare($query);
            $prepared_query->bind_param('sss',$name,$description,$status);
            if($prepared_query->execute()){
                header("Location:". $_SERVER['HTTP_REFERER']);
            
            }else{
                header("Location:". $_SERVER['HTTP_REFERER']);

            }
        }
         
    }
    
}

?>