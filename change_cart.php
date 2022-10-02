<?php 

include 'files/db.php';

// $id = $_POST['id'];
// $qty = $_POST['qty'];
// $p   = $_POST['price'];
// $price = $p * $qty;

// $sql = "UPDATE `cart` SET `quantity` = '".$qty."' WHERE `cart`.`cart_id` = $id";
// mysqli_query($con,$sql);
/***************************************************************************************/
 if(isset($_POST["id"]) && isset($_POST["qty"]))
 {
  //$post_title = mysqli_real_escape_string($connect, $_POST["postTitle"]);
  $id = $_POST["id"];
  //$post_description = mysqli_real_escape_string($connect, $_POST["postDescription"]);
  $qty = $_POST["qty"];
  echo $qty;
  if($_POST["id"] != '')  
  {  
    //update post  
    //$sql = "UPDATE cart SET quantity = '".$qty."' WHERE post_id = ".$id."";
    //$sql = "UPDATE `cart` SET `quantity` = '".$qty."' WHERE `cart`.`cart_id` = $id";
    $sql = "UPDATE `cart` SET `quantity` = $qty WHERE `cart`.`cart_id` = '$id'";

    mysqli_query($con, $sql);  
  }  
  else  
  {  
    //insert post  
    $sql = "INSERT INTO tbl_post(post_title, post_description, post_status) VALUES ('".$post_title."', '".$post_description."', 'draft')";  
    mysqli_query($connect, $sql);  
    echo mysqli_insert_id($connect);  
  }
 } 

 ?>