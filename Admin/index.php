<?php
$pageName='Quotations';
include('header.php');
include('includes/dbc.php');
?>  

<div class="content-wrapper" style="min-height: 2056.12px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quotations</h1>
        </div> 
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">  
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Folders</h3> 
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item active">
                <a href="index.php" class="nav-link">
                  <i class="fas fa-inbox"></i> All 
                </a>
              </li>
              <li class="nav-item">
                <?php print '<a href="?category=Delivery" class="nav-link">'?> 
                  <i class="fas fa-truck"></i> Deliveries
                </a>
              </li>
              <li class="nav-item">
                <?php print '<a href="?category=Hardware" class="nav-link">'?> 
                  <i class="fas fa-hammer"></i> Hardware
                </a>
              </li>
              <li class="nav-item">
                <?php print '<a href="?category=Electrical" class="nav-link">'?> 
                  <i class="fas fa-plug"></i> Electrical Supplies 
                </a>
              </li>
              <li class="nav-item">
                <?php print '<a href="?category=Feedback" class="nav-link">'?> 
                  <i class="fas fa-comments"></i> Feedbacks     
                </a>
              </li>  
            </ul>
          </div>
          <!-- /.card-body -->
        </div> 
      </div>
      <!-- /.col --> 
      <?php 
      if(isset($_GET['quotation'])){
        $id = $_GET['quotation'];  
        $query = mysqli_query($con, "Select * from quotations Where Quotation_ID ='$id'"); // SQL Query 
        $result = mysqli_fetch_array($query)  
      ?>
      <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Read Mail</h3>  
            </div>
            <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-read-info">
              <h5><?php Print $result['Subject']?></h5>
              <h6>From:  <?php Print $result['Customer_email']?> <br> <?php Print $result['Customer_contact']?> <br> 
                <span class="mailbox-read-time float-right"><?php Print $result['Date']?></span></h6>
            </div> 
              <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
              <?php if($result['Category']!="Feedback"){ ?> 
              <p><b> <?php Print $result['Customer_name']?></b> requested an appointment on: <b><?php Print date("Y-m-d",strtotime($result['AppointmentDate']))?> </b></p>
              <?php } ?>
              Message: <br><br>
              <?php Print $result['Message']?>
            </div>
              <!-- /.mailbox-read-message -->
          </div>
            <!-- /.card-body -->  
          <div class="card-footer">
            <div class="float-right"><button type="button" class="btn btn-default"><i class="fas fa-reply"></i> 
            <a style="color: inherit; text-decoration: none;" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?php echo $result['Customer_email']?>&su=Reply to subject: <?php echo $result['Subject']?>" target="_blank">Reply</a></button></div>
            <?php print '<button onclick=\'return confirm("Are you sure you want to delete this item");\' type="button" class="btn btn-default"><i class="far fa-trash-alt"></i>
            <a style="color: inherit; text-decoration: none;" href="?delete='.$_GET['quotation'].'"> Delete </a>
            </button>'?>
            <button type="button" onclick="window.print();return false;" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
          </div> 
        </div>
      </div>
      <?php 
      } else 
      {?> 
      <div class="col-md-9">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Inbox</h3>   
          </div>
            <!-- /.card-header -->
          <div class="card-body p-0">
          <form action="index.php" method="POST">
          <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" id="selectAll" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button> 
                <!-- /.btn-group --> 
                <div class="float-right"> 
                    <button onclick='return confirm("Are you sure you want to delete these items?");' type="submit" name="trash_multiple"class="btn btn-danger btn-sm">
                      <i class="far fa-trash-alt"></i>
                    </button>
                </div>
                <!-- /.float-right -->
              </div>
            <div class="table-responsive mailbox-messages">
              <table id="inbox" class="table table-hover table-striped">
                <tbody>
                  <?php  
                    if(isset($_GET['category'])){
                      $category  = $_GET['category'];
                      $query = mysqli_query($con, "Select * from quotations Where Category ='$category'"); // SQL Query
                    }else{ 
                      $query = mysqli_query($con, "Select * from quotations Where Category <> 'trash'"); // SQL Query
                    } 
                    while($row = mysqli_fetch_array($query)){
                    ?>
                      <tr>
                        <td>
                          <div class="icheck-primary">
                          <input type="checkbox" name='trash_ids[]' value='<?php echo $row['Quotation_ID']?>' > 
                          </div>
                        </td>
                      <?php Print '<td class="mailbox-name"><a href="?quotation='.$row['Quotation_ID'].'">'. $row['Customer_name'] . "</a></td>";
                      Print '<td class="mailbox-subject"><b>'. $row['Subject']. "</b></td>";
                      Print '<td class="mailbox-date">'.  date("Y-m-d",strtotime($row['Date'])). "</td>"; ?>
                      </tr> 
                    <?php 
                  } 
                ?>
                </tbody>
              </table>   
            </div>
            </form>    
          </div>
          <!-- /.card-body --> 
        </div>
        <!-- /.card -->
      </div> 
      <!-- /.col --> 
      <?php 
        }; ?> 
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div> 
  
<?php
include('footer.php');
?> 

<?php 
  if(isset($_GET['delete'])){       
      $query = mysqli_query($con, "DELETE FROM quotations WHERE Quotation_ID ='".$_GET['delete']."'"); // SQL Query  
      deleteSuccess();
    }
  if(isset($_POST['trash_multiple'])){
    $ids = $_POST['trash_ids'];
    $extract_ids = implode(',',$ids);
    echo $extract_ids; 
    $query = mysqli_query($con, "DELETE FROM quotations WHERE Quotation_ID IN($extract_ids)"); // SQL Query 
    deleteSuccess();
  }
  function deleteSuccess(){
      echo "<script>";
      echo "alert('Delete Successful');";
      echo "window.location.reload();";
      echo "window.location.href='index.php'";
      echo "</script>";
  }   
?>

<script>
$(document).ready(function () {
  $('body').on('click', '#selectAll', function () {
    if ($(this).hasClass('allChecked')) {
        $('input[type="checkbox"]', '#inbox').prop('checked', false);
    } else {
        $('input[type="checkbox"]', '#inbox').prop('checked', true);
    }
    $(this).toggleClass('allChecked');
  })
});
</script>