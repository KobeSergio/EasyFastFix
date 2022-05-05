<?php include 'includes/header.php'; 
      include('includes/dbc.php'); 
?>

  <section class="hardware">
    <div class="container-fluid">
      <br><br>
      <h1>Electrical Supplies</h1> <br>
      <div class="px-lg-5"> 
        <div class="row">
          <!-- Gallery item -->
          <?php  
              $query = mysqli_query($con, "Select * from products Where Category ='Electrical'"); // SQL Query 
              while($row = mysqli_fetch_array($query)){
              $Stock = "";
              $btncolor = "";
              if($row['Availability'] == 0){
                $Stock = "Available"; 
                $btncolor = "success";
              } 
              else if ($row['Availability'] == 1){
                $Stock = "Pre-Order"; 
                $btncolor = "warning";
              } 
              else if ($row['Availability'] == 2){
                $Stock = "Out of stock";
                $btncolor = "danger";
              }
              ?>  
              <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-sm">
                  <div class="img-hardware"> 
                      <img src="data:image;base64,<?php echo base64_encode($row['Image'])?>" alt="" class="img-fluid card-img-top">
                    </a>
                  </div>
                  <div class="p-4">
                    <h5><?php echo $row['Name']?></h5>
                    <p class="small text-muted mb-0"> <?php echo $row['Description']?> </p>
                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                      <p class="small mb-0"><span class="font-weight-bold"><?php echo $row['Variation']?></span></p>
                      <div class="badge badge-<?php echo $btncolor ?> px-3 rounded-pill font-weight-normal"><?php echo $Stock?></div>
                    </div>
                  </div>
                </div>
            </div> 
          <?php 
            } 
          ?> 
      <!-- End -->     
      </div>
      <div class="py-5 text-center"><a href="contact.php" class="btn btn-outline-primary px-5 py-3 text-uppercase">Request for Quotation</a></div>
      </div>
    </div> 
  </section>  
<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>
