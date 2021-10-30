<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
                              $sql="SELECT * FROM banners";
                              $res=mysqli_query($conn,$sql);
                              $i=0;
                              while($row=mysqli_fetch_assoc($res)){
                                  $i++;
                                  if($i==1){
                            ?>
            <div class="carousel-item active">
                <img src="images/<?php echo $row['banner'] ?>" class="girl img-responsive" alt="" />
                <img src="" class="pricing" alt="" />
            </div>
            <?php
                                  }
                                  else{
                            ?>
            <div class="carousel-item">
                <img src="images/<?php echo $row['banner'] ?>" class="girl img-responsive" alt="" />
                <img src="" class="pricing" alt="" />
            </div>
            <?php
                                  }
                              }
                            ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="prev" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="next" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </div>
		
	