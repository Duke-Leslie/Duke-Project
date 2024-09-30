<?php 
   $admin_name = "admin";
   $admin_pwd = "2024";
   
   try{
       $db = new PDO("mysql:host=localhost;dbname=afritech", 'root', '');
       //echo "Connection Successfully";     
    }
   catch(PDOException $e){
    echo "Connection Failed: ".$e ->  getMessage();
   }

?>