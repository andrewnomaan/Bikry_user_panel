<?php
  require 'header.php';
?>
<div class="container">
<form>
  <div class="mb-3 col-6 mx-auto">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3 col-6 mx-auto">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3 col-6 mx-auto">
    <label for="exampleInputPassword1" class="form-label" style="display:block;">Delivery Address</label>
    <a href="address.php">Add Address</a>
  </div>

  <div class="col-6 mx-auto">
  <button type="submit" class="btn btn-primary mb-3" style="border-radius:5px;">Submit</button>
  </div>
</form>
</div>
<?php
 require 'footer.php';
?>