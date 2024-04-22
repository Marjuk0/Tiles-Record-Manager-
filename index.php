<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();

}
require_once("models/category.php");
require_once("models/product_details.php");
if (isset($_SESSION['user_authenticated'])){ 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>M/S Kashem Enterprise</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>



<header>
	<!--- Navbar --->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<a class="navbar-brand text-white" href="#">M/S Kashem Enterprise</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
				<span class="navbar-toggler-icon"><i class='bx bx-menu text-light mr-2'></i></span>
			</button>
			<div class="collapse navbar-collapse" id="nvbCollapse">
				<ul class="navbar-nav ml-auto">
        <li class="nav-item pl-1">
						<a class="nav-link" href="index.php"><i class="fa fa-home fa-fw mr-1"></i>Home</a>
					</li>
					<li class="nav-item pl-1">
						<a data-toggle="modal" data-target="#catagory_name" class="nav-link" href=""><i class="fa fa-home fa-fw mr-1"></i>Add Category</a>
					</li>
					<li class="nav-item pl-1">
						<a data-toggle="modal" data-target="#catagory_details" class="nav-link" href="#"><i class="fa fa-th-list fa-fw mr-1"></i>Categorys</a>
					</li>
          <li class="nav-item pl-1">
						<a class="nav-link" href="product_edit.php"><i class="fa fa-home fa-fw mr-1"></i>Edit Product</a>
					</li>
               <li class="nav-item active pl-1">
						<a  class="nav-link" href="controllers/auth.php?logout"><i class="fa fa-th-list fa-fw mr-1"></i>Log-out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--# Navbar #-->
	</header>






   


<section class="mt-5">
<div class="container">
  <div class="row">
      
         <?php
          $product = new category();
          $product->card();
          ?>

  </div>
</div>


</section>




<!-- Modal -->
<div class="modal fade" id="catagory_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="controllers/category.php" method="POST">
            <div class="form-group">
              <label for="exampleFormControlInput1">Catagory</label>
              <input type="text" name="category" class="form-control" id="exampleFormControlInput1">
            </div>
            <input type="submit" value="Submit">
          </form>
           
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- Category details -->
<div class="modal fade" id="catagory_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        

        <table class="table">
  <thead>
    <tr>
      <th scope="col">Category</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
          <?php
          $product = new category();
          $product->read();
          ?>
 
  </tbody>
</table>

           
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>






<section class="product_table mt-5">


  <div class="container mt-2">

  <h1><b>Recently Added</b></h1>
   
  <br>
  <div class="table-responsive">
  <table class="table table-bordered table-striped table-sm table-warning" style="overflow: hidden;">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Date</th>
        <th>C.Memo challan no.(In)</th>
        <th>Quentity in</th>
        <th>C.Memo challan no.(Sale)</th>
        <th>Quentity Sold</th>
        <th>Remarks</th>
       <th></th>
      </tr>
    </thead>
    <tbody >
  

 
      <?php
          $product = new product_details();
          $product->table_1();
      ?>
    


    
    </tbody>
  </table>
  </div>

 
  
  </div>
</section>

</div>
 

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/table.js"></script>

</body>

</html>

<?php 
}else{
   header("Location: log-in.php?msg='You are not Log-in'");
}
?>