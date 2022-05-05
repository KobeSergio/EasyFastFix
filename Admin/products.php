<?php
$pageName='Products';
include('header.php');
include('includes/dbc.php');
?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div><!-- /.col --> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 
    <!-- MODAL -->
    <div class="modal fade" id="modal-xl" aria-modal="true" style="display: none; background-color: rgba(0, 0, 0, 0.5);">
      <div class="modal-dialog modal-lg" style="margin-top: 10vh;">
        <div class="modal-content">
          <div class="modal-header">
            <h3>ADD NEW PRODUCT</h3>
            <button type="button" class="close" data-dismiss="modal"> x </button>
          </div> <!-- /.modal-header --> 
          <div class="modal-body" style="justify-content: center; align-items: center;">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b>Edit Product</b></h3>  
            </div>
            <div class="card-body p-0">
              <div class="card-body">
                <div class="form-group">
                  <label for="category">Category:</label>
                  <select class="form-control" name="ProductCategory">
                      <option value="electrical">Electrical</option>
                      <option value="hardware">Hardware</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ProductName">Product Name:</label>
                  <input required type="text" name="ProductName" class="form-control" id="" placeholder="Product Name">
                </div>
                <div class="form-group">
                  <label for="ProductDescription">Product Description:</label>
                  <input required type="text" name="ProductDescription" class="form-control" id="ProductDescription" placeholder="Product Description">
                </div>    
                <div class="form-group">
                  <label for="ProductVariation">Product Variation:</label>
                  <input required type="text" name="ProductVariation" class="form-control" id="ProductVariation" placeholder="ProductVariation">
                </div>  
                <div class="form-group">
                  <label for="ProductAvailability">Availability</label>
                  <select required class="form-control" name="ProductAvailability">
                          <option value=2>Out of Stock</option>
                          <option value=1>Pre-Order</option>
                          <option value=0>Available</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="ProductImage">Image Upload</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <input required type="file" class="custom-file-input" name="ProductImage" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div> 
                    </div>
                  </div>  
              </div>  
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-success">Add</button>
            </div>
          </div> 
          </form>
          </div> <!-- /.modal-body --> 
        </div> <!-- /.modal-content --> 
      </div> <!-- /.modal-dialog --> 
    </div>
    <!-- /.modal -->    
    <!-- Main content -->
    <section class="content">
      <?php if(isset($_GET['edit'])){ ?> 
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Edit Product</b></h3>  
        </div>
        <div class="card-body p-0">
          <div class="card-body">
            <div class="form-group">
              <label for="category">Category:</label>
              <select class="form-control" name="ProductCategory">
                  <option value="electrical">Electrical</option>
                  <option value="hardware">Hardware</option>
              </select>
            </div>
            <div class="form-group">
              <label for="ProductName">Product Name:</label>
              <input required type="text" name="ProductName" class="form-control" id="" placeholder="Product Name">
            </div>
            <div class="form-group">
              <label for="ProductDescription">Product Description:</label>
              <input required type="text" name="ProductDescription" class="form-control" id="ProductDescription" placeholder="Product Description">
            </div>    
            <div class="form-group">
              <label for="ProductVariation">Product Variation:</label>
              <input required type="text" name="ProductVariation" class="form-control" id="ProductVariation" placeholder="ProductVariation">
            </div>  
            <div class="form-group">
              <label for="ProductAvailability">Availability</label>
              <select required class="form-control" name="ProductAvailability">
                      <option value=2>Out of Stock</option>
                      <option value=1>Pre-Order</option>
                      <option value=0>Available</option>
              </select>
            </div>
            <div class="form-group">
                <label for="ProductImage">Image Upload</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input required type="file" class="custom-file-input" name="ProductImage" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                  </div>
                  <div class="input-group-append"> 
                  </div>
                </div>
              </div>  
          </div>  
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="update" class="btn btn-primary">Overwrite</button>
        </div>
      </div> 
      </form>
      <?php
      } else { 
      ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Electrical Supplies</b></h3> 
          <div class="card-tools"> 
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr> 
                      <th style="width: 20%">
                          Item
                      </th>
                      <th style="width: 30%">
                          Description
                      </th>
                      <th>
                          Variations
                      </th>
                      <th style="width: 8%" class="text-center">
                          Availability
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $query = mysqli_query($con, "SELECT * FROM products WHERE Category = 'electrical'"); 
                  while($row = mysqli_fetch_array($query))
                  {
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
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Description'] . "</td>";
                    echo "<td>" . $row['Variation'] . "</td>";
                    echo "<td> <span class='badge badge-".$btncolor."'>" . $Stock . "</span></td>";
                    ?>
                    <td class="project-actions text-right"> 
                        <a class="btn btn-info btn-sm" href="?edit=<?php echo $row['Product_ID']?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('You are about to delete this item');" href="?delete=<?php echo $row['Product_ID']?>">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                    <?php
                  }
                ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">Add New Product</button>
            <button type="button" class="btn btn-default float-right"><a href="http://localhost/User/electrical.php">View</a></button>
        </div>
      </div>
      <!-- /.card --> 
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Hardware</b></h3> 
          <div class="card-tools"> 
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr> 
                      <th style="width: 20%">
                          Item
                      </th>
                      <th style="width: 30%">
                          Description
                      </th>
                      <th>
                          Variations
                      </th>
                      <th style="width: 8%" class="text-center">
                          Availability
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $query = mysqli_query($con, "SELECT * FROM products WHERE Category = 'hardware'"); 
                  while($row = mysqli_fetch_array($query))
                  {
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
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Description'] . "</td>";
                    echo "<td>" . $row['Variation'] . "</td>";
                    echo "<td> <span class='badge badge-".$btncolor."'>" . $Stock . "</span></td>";
                    ?>
                    <td class="project-actions text-right"> 
                        <a class="btn btn-info btn-sm" href="?edit=<?php echo $row['Product_ID']?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a> 
                        <a class="btn btn-danger btn-sm" onclick="return confirm('You are about to delete this item');" href="?delete=<?php echo $row['Product_ID']?>">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                    <?php
                  }
                ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">Add New Product</button>
            <button type="button" class="btn btn-default float-right"><a href="http://localhost/User/hardware.php">View</a></button>
        </div>
      </div>
      <!-- /.card --> 
      <?php
      } ?>
    </section>
    <!-- /.content -->
</div>

<?php
      if(isset($_POST['submit'])){ 
        if(!empty($_POST['ProductName']) && !empty($_POST['ProductDescription']) && !empty($_POST['ProductVariation'])){ 
          $category = $_POST['ProductCategory'];
          $name = $_POST['ProductName'];
          $description = $_POST['ProductDescription'];
          $variation = $_POST['ProductVariation'];
          $availability = $_POST['ProductAvailability'];
          $imageData = mysqli_real_escape_string($con, file_get_contents($_FILES['ProductImage']['tmp_name']));
          $imageType = mysqli_real_escape_string($con, $_FILES['ProductImage']['type']);

          if(substr($imageType,0,5) == "image"){
            $query = "insert into `products`(`Category`, `Name`, `Description`, `Variation`, `Availability`, `Image`) values('$category', '$name', '$description', '$variation', '$availability', '$imageData')";
            $sql = mysqli_query($con, $query);

            if($sql){
              echo "<script type ='text/JavaScript'>";  
              echo "alert('Product added')";    
              echo "</script>"; 
              unset($_POST);
              echo "<script>window.location.href='products.php';</script>";
              exit;
            }else{
              unset($_POST); 
              echo "<script type ='text/JavaScript'>";  
              echo "alert('Product Failed to add')";  
              echo "window.location.href='products.php'";
              echo "</script>"; 
            }
          }else{
            echo "<script type ='text/JavaScript'>";  
            echo "alert('Upload must be an image')";   
            echo "</script>"; 
          } 
        }
      } 
      if(isset($_POST['update'])){ 
        if(!empty($_POST['ProductName']) && !empty($_POST['ProductDescription']) && !empty($_POST['ProductVariation'])){
          $id = $_GET['edit']; 
          $category = $_POST['ProductCategory'];
          $name = $_POST['ProductName'];
          $description = $_POST['ProductDescription'];
          $variation = $_POST['ProductVariation'];
          $availability = $_POST['ProductAvailability'];
          $imageData = mysqli_real_escape_string($con, file_get_contents($_FILES['ProductImage']['tmp_name']));
          $imageType = mysqli_real_escape_string($con, $_FILES['ProductImage']['type']); 
          if(substr($imageType,0,5) == "image"){ 
            $query = "UPDATE products SET Category ='$category', Name='$name', Description='$description', Variation='$variation', Availability='$availability', Image='$imageData' 
                      WHERE Product_ID = $id";
            $sql = mysqli_query($con, $query);

            if($sql){
              echo "<script type ='text/JavaScript'>";  
              echo "alert('Product updated')";    
              echo "</script>"; 
              unset($_POST);
              echo "<script>window.location.href='products.php';</script>";
              exit;
            }else{
              unset($_POST); 
              echo "<script type ='text/JavaScript'>";  
              echo "alert('Product Failed to update')";   
              echo "</script>"; 
            }
          }else{
            echo "<script type ='text/JavaScript'>";  
              echo "alert('Upload must be an image')";   
              echo "</script>";  
          } 
        }
      }
      if(isset($_GET['delete'])){       
        $query = mysqli_query($con, "DELETE FROM products WHERE Product_ID ='".$_GET['delete']."'"); // SQL Query
        echo "<script>";
        echo "alert('Delete Successful');";
        echo "window.location.reload();";
        echo "window.location.href='products.php'";
        echo "</script>";   
      }
    ?>  
<?php
include('footer.php');
?>
