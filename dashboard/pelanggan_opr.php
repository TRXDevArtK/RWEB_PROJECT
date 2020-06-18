<?php

    include('auth_database.php');

    //LOAD LIST PELANGGAN
    if(isset($_POST['key']) && $_POST['key'] == 'load'){
        $limit = $_POST['limit'];
        if (isset($_POST["page"])){ 
            $page  = $_POST["page"]; 
        } 
        else{ 
            $page=1; 
        }  

        $start_from = ($page-1) * $limit;  

        $query = "SELECT * FROM pelanggan limit $start_from,$limit";

        $sql_run = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($sql_run)){
            $data[] = $row;
        }

        //$data += array("cek"=>"HALOOOOO", "cek2"=>"heyaaaa");

        echo json_encode($data);
    }
    
    //DELETE DATA PELANGGAN
    if(isset($_POST['key']) && $_POST['key'] == 'delete'){
        $ktp = $_POST['ktp'];
        $query = "DELETE FROM `pelanggan` WHERE `pelanggan`.`ktp` = $ktp";
        $sql_run = mysqli_query($conn, $query);
    }
    
    //UPDATE DATA PELANGGAN
    if(isset($_POST['key']) && $_POST['key'] == 'update'){
        echo $_POST['key'];
    }

?>

