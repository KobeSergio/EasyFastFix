<?php include 'includes/header.php'; 
include('includes/dbc.php');?>

<div class="banner3">
  <div class="py-5 banner" style="background-image:url(images/appointment.jpg);">
    <div class="container" >
      <div class="row">
        <div class="col-md-7 col-lg-5">
          <h3 class="my-3 text-white font-weight-medium text-uppercase">Book an Appointment</h3>
          <div class="bg-white">
          <form action="" method="POST">
            <div class="form-row border-bottom">
              <div class="p-4 left border-right w-50">
                <label class="text-inverse font-12 text-uppercase">First Name</label>
                <input required name="first_name" type="text" class="border-0 p-0 font-14 form-control" placeholder="Your First Name" />
              </div>
              <div class="p-4 right w-50">
                <label class="text-inverse font-12 text-uppercase">Last Name</label>
                <input required name="last_name" type="text" class="border-0 p-0 font-14 form-control" placeholder="Your Last Name" />
              </div>
            </div>
            <div class="form-row border-bottom p-4">
              <label class="text-inverse font-12 text-uppercase">Email Address</label>
              <input required name="email" type="text" class="border-0 p-0 font-14 form-control" placeholder="Enter your Email Address" />
            </div>
            <div class="form-row border-bottom p-4">
              <label class="text-inverse font-12 text-uppercase">Phone Number</label>
              <input required name="contact" type="text" class="border-0 p-0 font-14 form-control" placeholder="Enter your Phone Number" />
            </div>
            <div class="form-row border-bottom p-4">
              <label class="text-inverse font-12 text-uppercase">Quotation for:</label>
              <select required name="category" class="border-0 p-0 font-14 form-control" name="category" id="category">
                <option value="Delivery">Delivery</option>
                <option value="Hardware">Hardware</option>
                <option value="Electrical">Electrical Supplies</option> 
              </select>
            </div>
            <div class="form-row border-bottom p-4 position-relative">
              <label class="text-inverse font-12 text-uppercase">Booking Date</label>
              <div class="input-group date">
                <input required name="AppointmentDate" type="text" class="border-0 p-0 font-14 form-control" id="datepicker" placeholder="Select the Appointment Date" />
                <label class="mt-2 border-0" for="dp"><i class="icon-calendar mt-1 border-0"></i></label>
              </div>
            </div>
            <div class="form-row border-bottom p-4">
              <label class="text-inverse font-12 text-uppercase">Subject</label>
              <input required name="subject" type="text" class="border-0 p-0 font-14 form-control" placeholder="Message subject" />
            </div>
            <div class="form-row border-bottom p-4">
              <label class="text-inverse font-12 text-uppercase">Message</label>
              <textarea required name="message" col="1" row="1" class="border-0 p-0 font-weight-light font-14 form-control" placeholder="Write Down the Message"></textarea>
            </div>
            <div>
              <button type="submit" class="m-0 border-0 py-4 font-14 font-weight-medium btn btn-danger-gradiant btn-block position-relative rounded-0 text-center text-white text-uppercase">
									<span>Book Yor Appointment Now</span>
							</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br><br><br>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {  
  $name = $_POST['first_name'] . " " . $_POST['last_name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $subject = $_POST['subject'];
  $category = $_POST['category'];
  $AppointmentDate = $_POST['AppointmentDate']; 
  $ParsedAppointmentDate = date("Y-m-d H:i:s", strtotime($AppointmentDate)); 
  $message = $_POST['message'];
  $date = date("Y-m-d H:i:s");

  $sql = "INSERT INTO quotations(Customer_name,Customer_email,Customer_contact,subject,category,AppointmentDate,message,date) 
          VALUES ('$name','$email','$contact','$subject','$category','$ParsedAppointmentDate','$message','$date')";
  $run = mysqli_query($con, $sql);

  echo $sql;
  if($run){
    echo "<script type ='text/JavaScript'>";  
    echo "alert('Quotation sent')";    
    echo "</script>"; 
    unset($_POST);
    echo "<script>window.location.href='index.php';</script>";
    exit;
  }else{
    echo "<script type ='text/JavaScript'>";  
    echo "alert('Quotation not sent')";    
    echo "</script>"; 
  }
} 
?>

<script>
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
      }
      var $subMenu = $(this).next('.dropdown-menu');
      $subMenu.toggleClass('show');
    
    
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass('show');
      });
    
    
      return false;
      });
    
      jQuery('.dropdown').hover(function() {
    
    jQuery(this).find('.main-dropdown').stop(true, true).delay(100).fadeIn(400);
    }, function() {
    jQuery(this).find('.main-dropdown').stop(true, true).delay(100).fadeOut(400);
    });
  
    jQuery('.sub-menu').hover(function() {
  
    jQuery(this).find('.sub-dropdown').stop(true, true).delay(100).fadeIn(400);
    }, function() {
    jQuery(this).find('.sub-dropdown').stop(true, true).delay(100).fadeOut(400);
    });

  
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

  
  </script>
<br><br><br>
  <!-- FOOTER -->
  <?php include 'includes/footer.php'; ?>
