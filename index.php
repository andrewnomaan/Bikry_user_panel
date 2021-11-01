<?php
  require 'header.php';
  require 'corousel.php';
?>

<section>
    <div class="container d-flex mt-5">
        <div class="row">
            <div class="col-3">
                <div class="left-sidebar relative">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <?php
						      $sql="SELECT * FROM categories";
							  $res=mysqli_query($conn,$sql);
							  while ($row=mysqli_fetch_assoc($res)) { 
						   ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                        <?php echo ucfirst($row['cat_name']) ?>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!--/category-products-->
                    <div id="message" style="font-size:18px;" class="mt-4 mb-2"></div>
                </div>
            </div>

<div class="col-9 padding-right">
    <?php
						    $cat_sql="SELECT * FROM categories";
							$cat_res=mysqli_query($conn,$sql);
							while ($cat_row=mysqli_fetch_assoc($cat_res)) { 
						?>
    <div class="row">
        <!--features_items-->

        <h2 class="title text-center"><?php echo $cat_row['cat_name'] ?> Products</h2>
        <?php
					    $product_sql="SELECT * from products where status=1 and cat_id='$cat_row[id]' order by id desc";
					    $product_res=mysqli_query($conn,$product_sql);
					    while ($row=mysqli_fetch_assoc($product_res)) {
					   ?>
        <div class="col-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="images/<?php echo $row['img']?>" alt="" width="100%" height="200" />
                        <h2 class="pt-2"><i class="fas fa-rupee-sign"></i>.<?php echo $row['price']?></h2>
                        <p style="font-size:15px;" class="pt-2"><?php echo $row['name']?></p>
                        <form action="" class="form">
                            <input type="hidden" class="pid" name="pid" value="<?php echo $row['id'];?>">
                            <input type="hidden" class="pname" name="p_name" value="<?php echo $row['name'];?>">
                            <input type="hidden" class="pprice" name="p_price" value="<?php echo $row['price'];?>">
                            <input type="hidden" class="pimage" name="p_image" value="<?php echo $row['img'];?>">
                            <a href="#" class="btn btn-default add-to-cart" style="font-size:15px;"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <?php }?>


    </div>
    <!--features_items-->
    <?php }?>




</div>
</div>
</div>
</section>

<?php
	  require 'footer.php';
	?>
<script>
$(document).ready(function() {
    $('.add-to-cart').click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form");
        var pid = $form.find(".pid").val();
        var pname = $form.find(".pname").val();
        var pprice = $form.find(".pprice").val();
        var pimage = $form.find(".pimage").val();
        var pqty = $form.find(".qtytype").val();
        $.ajax({
            url: 'action.php',
            method: 'post',
            data: {
                pid: pid,
                pname: pname,
                pprice: pprice,
                pimage: pimage,
                pqty: pqty
            },
            success: function(response) {
                $('#message').html(response);
                load_cart_item();
            }
        })
    })
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

})
</script>