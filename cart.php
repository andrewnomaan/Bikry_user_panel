<?php
  require 'header.php';
  $total_price=0;
?>
<style>
	.checkoutbtn a:focus {
  outline: none;
  box-shadow: none;
}

</style>
<div class="container pt-5">
    <div style="display:<?php if(isset($_SESSION['showalert'])){ echo $_SESSION['showalert'];}else{echo 'none';}unset($_SESSION['showalert'])?>"
        class="alert alert-success alert-dismissible" role="alert">
        <strong
            style="font-size:20px;"><?php if(isset($_SESSION['message'])){ echo $_SESSION['message'];}unset($_SESSION['message'])?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:25px;">&times;</span>
        </button>
    </div>
</div>
<section>
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="">
                        <th scope="col">Item</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						  foreach($_SESSION['cart'] as $key=>$value){
						?>
					 <tr>
                    <input type="hidden" class="pid" value="<?php echo $value['id'];?>">
                    <input type="hidden" class="pimage" value="<?php echo $value['image'];?>">
                    <input type="hidden" class="pprice" value="<?php echo $value['price'];?>">
                        <td class="mt-2">
                            <img src="images/<?php echo $value['image'] ?>" alt="" width="80">
                        </td>
                        <td>
                            <h4 class="pt-4"><?php echo $value['name'] ?></h4>
                            <!-- <p>Web ID: 1089772</p> -->
                        </td>
                        <td>
                            <p class="pt-4"><?php echo $value['price'] ?></p>
                        </td>
                        <td>
                            <div class="cart_quantity_button pt-4">
                                <input type="button" value="-" class="button-minus itemQtyminus" data-field="quantity"
                                    style="margin-left:20px;">
                                <input type="number" step="1" max="10" value="<?php echo $value['qty'] ?>" name="quantity"
                                    class="quantity-field qty">
                                <input type="button" value="+" class="button-plus itemQty" data-field="quantity">
                            </div>
                        </td>
                        <td>
                            <p class="cart_total_price pt-4"><?php echo $value['tprice'] ?></p>
                        </td>
                        <td class="cart_delete pt-4">
                            <a href="action.php?remove=<?php echo $value['id'];?>" class="cart_quantity_delete"
                                onclick="return confirm('Are you sure to want to delete this item in your cart')"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php
					   $total_price=$value['tprice']+$total_price;
						  }
					 ?>
                </tbody>
            </table>
        </div>
		<div class="col-12 border mt-4 mb-4 py-2 bg-light d-flex justify-content-between" style="border-radius:10px;">
			<p class="ps-2 my-auto"><b>Total</b></p>
			<p class="pe-3 my-auto"><i class="fas fa-rupee-sign"></i>.<?php echo $total_price; ?></p>
		</div>
        <div class="col-12 text-center mt-0 py-2 pay mb-4 checkoutbtn" style="background-color:#ffc107;color:#fff;">
            <a href="checkout.php" class="btn border-0" style="font-size:1.5rem;color:#fff; border:2px solid yellow;"><b>Checkout</b></a>
        </div>
    </div>
</section>
<!--/#cart_items-->

<?php
  require 'footer.php';
?>
<script>
$(document).ready(function() {
    load_cart_item();

    function load_cart_item() {
        $.ajax({
            url: 'action.php',
            method: 'get',
            data: {
                cartItem: "cart_item"
            },
            success: function(response) {
                $('#count').html(response);
            }
        })
    }
    $('.itemQty').on('click',function(){
            var $el=$(this).closest('tr');
            var pid=$el.find(".pid").val();
            var pprice=$el.find(".pprice").val();
            var itemQty=parseInt($el.find(".qty").val())+1;
            var img=$el.find(".pimage").val();
            location.reload(true);
            $.ajax({
          url:'action.php',
          method:'post',
          data:{pid2:pid,pprice:pprice,itemQty:itemQty,img:img},
          success:function(response){
              $('#message').html(response);
          },
		  error:function(error){
			alert('error; ' + eval(error));
		  } 
        })
        })
        $('.itemQtyminus').on('click',function(){
            var $el=$(this).closest('tr');
            var pid=$el.find(".pid").val();
            var pprice=$el.find(".pprice").val();
            var itemQty=parseInt($el.find(".qty").val())-1;
            var img=$el.find(".pimage").val();
            location.reload(true);
            $.ajax({
          url:'action.php',
          method:'post',
          data:{pid2:pid,pprice:pprice,itemQty:itemQty,img:img},
          success:function(response){
              $('#message').html(response);
          } 
        })
        })

    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal)) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }

    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal > 0) {
            parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    $('.cart_quantity_button').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.cart_quantity_button').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });
})
</script>