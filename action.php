<?php
   require 'db_connect.php';

   //For add to cart product
   if(isset($_POST['pid'])){
       $pid=$_POST['pid'];
       $pname=$_POST['pname'];
       $pprice=$_POST['pprice'];
       $pimage=$_POST['pimage'];
       if(isset($_SESSION['cart'])){
           $arr=array_column($_SESSION['cart'],'name');
           if(in_array($pname,$arr)){
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <strong>Item already added to your cart!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true" style="font-size:25px !important;">&times;</span>
                </button>
              </div>';  
           }
           else{
           $count=count($_SESSION['cart']);
           $_SESSION['cart'][$count]=array("id"=>$pid,
                                            "name"=>$pname,
                                            "price"=>$pprice,
                                            "image"=>$pimage,
                                          "qty"=>1,
                                        "tprice"=>$pprice);
            echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <strong>Item added to your cart!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true" style="font-size:25px !important;">&times;</span>
                         </button>
                        </div>'; 
           }
       }
       else{
        $_SESSION['cart'][0]=array("id"=>$pid,
        "name"=>$pname,
        "price"=>$pprice,
        "image"=>$pimage,
        "qty"=>1,
      "tprice"=>$pprice);
        echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <strong>Item added to your cart!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true" style="font-size:25px !important;">&times;</span>
                         </button>
                        </div>'; 
       }
   }
   //For count product in cart
    if(isset($_GET['cartItem']) && isset($_GET['cartItem'])=='cart_item'){
      $count=0;
      if(isset($_SESSION['cart']))
      {
        $count=count($_SESSION['cart']);
      }
        echo $count;
    }


    //For remove cart
    if(isset($_GET['remove']) && $_GET['remove']!=''){
      foreach($_SESSION['cart'] as $key=>$value){
        if($value['id']==$_GET['remove'])
        {
          unset($_SESSION['cart'][$key]);
          $_SESSION['cart']=array_values($_SESSION['cart']);
        }
      }
      $_SESSION['showalert']='block';
      $_SESSION['message']='Item removed from cart!';
      header("location:cart.php");
    }
    if(isset($_POST['itemQty'])){
      $qty=$_POST['itemQty'];
      $pid=$_POST['pid2'];
      $pprice=$_POST['pprice'];
      $pimage=$_POST['img'];
      $tprice=$qty*$pprice;
      foreach($_SESSION['cart'] as $key=>$value){
        if($value['id']==$pid){
          $pname=$value['name'];
          $_SESSION['cart'][$key]=array("id"=>$pid,
          "name"=>$pname,
          "price"=>$pprice,
          "image"=>$pimage,
          "qty"=>$qty,
          "tprice"=>$tprice
        );
          echo $tprice;
        }
      }
  }
?>