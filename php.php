<?php
session_start();

if($_SERVER["REQUEST_METHOD"]== "POST"){
    if(isset($_POST["botton"])){
        if(isset($_SESSION["cart"])){
            $myitems= array_column($_SESSION["cart"],"item_id");
            if(in_array($_POST["item_id"], $myitems)){
                echo '<script>alert("Item already Added"); location.href="index.php"</script>';
            }
            else{
                $count=count($_SESSION["cart"]);
                $_SESSION["cart"][$count]=array('item_id'=>$_POST['item_id'],'item_name'=>$_POST['item_name'],'is_veg'=>$_POST['is_veg']);
                echo "<script> window.location.href='index.php';</script>";
            }
        }
        else{
            $_SESSION["cart"][0]=array('item_id'=>$_POST['item_id'],'item_name'=>$_POST['item_name'],'is_veg'=>$_POST['is_veg']);
            echo "<script> window.location.href='index.php';</script>";
        }
    }
    if(isset($_POST["remove"]))
    foreach ($_SESSION["cart"] as $key => $value) {
        if($value['item_id']==$_POST['item_id']){
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart']=array_values($_SESSION['cart']);
        echo "<script> window.location.href='cart.php';</script>"; 
        }
    }
}
?>