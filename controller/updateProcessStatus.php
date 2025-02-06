<?php

    include_once "../config/dbconnect.php";
   
    $rp_id=$_POST['record'];
    //echo $order_id;
    $sql = "SELECT process_status from return_products where rp_id='$rp_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["process_status"]==0){
         $update = mysqli_query($conn,"UPDATE return_products SET process_status=1 where rp_id='$rp_id'");
    }
    else if($row["porcess_status"]==1){
         $update = mysqli_query($conn,"UPDATE return_products SET process_status=0 where rp_id='$rp_id'");
    }
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>