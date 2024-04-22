<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();

}
require_once("models/product.php");
require_once("models/category.php");
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

<!-- nav -->



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
        <li class="nav-item pl-1 my-2">
						<a class="nav-link" href="index.php"><i class="fa fa-home fa-fw mr-1"></i>Home</a>
					</li>
       
					<li class="nav-item pl-1 my-2">
						<a data-toggle="modal" data-target="#product_name" class="nav-link" href=""><i class="fa fa-home fa-fw mr-1"></i>Add Product</a>
					</li>

          <li class="nav-item pl-1 my-2">
						<a class="nav-link" href="product_edit.php"><i class="fa fa-home fa-fw mr-1"></i>Edit Product</a>
					</li>

               <li class="nav-item active pl-1 my-2">
						<a  class="nav-link" href="controllers/auth.php?logout"><i class="fa fa-th-list fa-fw mr-1"></i>Log-out</a>
					</li>
		
				</ul>
			</div>
		</div>
	</nav>
	<!--# Navbar #-->
	</header>



<section class="product_table">
  <div class="container mt-2">
    <h1><b>Products</b> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#product_name"><i class="icofont-ui-add"></i></button></h1>
  
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped table-sm table-warning" style="overflow: hidden;">
    <thead>
      <tr>
        <th>Code</th>
       <th>#</th>
      </tr>
    </thead>
    <tbody id="myTable">

        
      <?php 
        
          $product = new stock_product();
          $product->product_list($_GET['id']);
      ?>

    </tbody>
  </table>
  
  </div>
</section>






<!-- Add Product -->
<div class="modal fade" id="product_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-info text-light">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg">
        <div class="container">
          <form action="controllers/product.php" method="POST">
            <div class="form-group">
              <label for="exampleFormControlInput1">Name</label>
              <input type="text" name="product_name" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">1C=?p</label>
              <input type="number" name="cp" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="form-group ">
              <label for="inputState">Catagory</label>
              <select name="category_id" class="form-control">
                <?php
                 $product = new category();
                 $product->Choose();
                ?>

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