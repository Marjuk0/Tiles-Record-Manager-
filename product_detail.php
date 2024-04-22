<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();

}
require_once("models/product_details.php");
require_once("models/product.php");
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
        <li class="nav-item pl-1 my-2">
						<a class="nav-link" href="index.php"><i class="fa fa-home fa-fw mr-1"></i>Home</a>
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

<div class="container">
  <div class="row mt-3">
    <div class="col-12">

    <h3><b>
    <?php
        $product = new stock_product();
        $product->product_name($_GET['id']);
    ?>
    </b></h3> 

    
    </div>

    <div class="col-12">
<h2>Balance : <b  id="quentity"></b><b>/Pieces</b></h2>
<h2>Balance : <b  id="quentity_car"></b><b>/Cartons</b></h2>
    </div>
    <div class="col-12">

<button type="button" class="btn btn-secondary btn-lg btn-danger btn-block" data-toggle="modal" data-target="#exampleModal">Add</button>

</div>
  </div>
</div>   






<section class="product_table">
  <div class="container mt-2">
   
  <br>

<div class="table-responsive">

  <table class="table table-bordered table-striped table-sm table-warning" style="overflow: hidden;">
    <thead>
      <tr>
        <th>Date</th>
        <th>C.Memo challan no.(In)</th>
        <th>Quentity in</th>
        <th>C.Memo challan no.(Sale)</th>
        <th>Quentity Sold</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody id="myTable">
  

 


      <?php
          $product = new product_details();
          $product->table_display($_GET['id']);
      ?>
    



      <tr>
        <td><h3>Total</h3></td>
        <td></td>
        <td><h3 ><b class="quantity_1" id="quantity_in_total"></b></h3> </td>
        <td></td>
        <td ><h3><b class="quantity_2" id="quantity_out_total"></b></h3></td>
        <td></td>
      </tr>

    
    </tbody>
  </table>
</div>

 
  
  </div>
</section>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="controllers/product_details.php" method="POST">
            <div class="form-group">
              <label for="exampleFormControlInput1">Date</label>
              <input type="date" name="date" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="form-group">
              <label for="inputState">Name</label>
              <select name="product_id"  id="inputState" class="form-control">
                <?php
                 $product = new stock_product();
                 $product->Choose($_GET['id']);
                ?>
              </select>
            </div>


            <p>
              <a class="btn btn-warning" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><b>Product-in</b></a>
              <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"><b>Product-Out</b></button>
            </p>



              <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body bg-warning">
                 
                  <div class="form-group">
                    <label for="exampleFormControlInput1">C.Memo challan no</label>
                    <input name="m_in" type="text" class="form-control" id="exampleFormControlInput1">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Quentity in</label>
                    <input name="q_in" type="number" class="form-control" id="exampleFormControlInput1" >
                  </div>

                </div>
              </div>


              <div class="collapse multi-collapse" id="multiCollapseExample2">
                <div class="card card-body bg-success">
                  
                  <div class="form-group">
                    <label for="exampleFormControlInput1">C.Memo challan no</label>
                    <input name="m_out" type="text" class="form-control" id="exampleFormControlInput1" >
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Quentity Sold</label>
                    <input name="q_out" type="number" class="form-control" id="exampleFormControlInput1" >
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Remarks</label>
                    <input name="remarks" type="text" class="form-control" id="exampleFormControlInput1" >
                  </div>

                </div>
              </div>

              <input type="hidden" name="product_name" value="
              <?php
                   $product = new stock_product();
                   $product->product_name($_GET['id']);
              ?>
              " class="form-control" id="exampleFormControlInput1">

              <input type="hidden" name="product_id" value="<?php echo ($_GET['id']); ?>">
              <input class="btn btn-secondary  btn-block mt-1" type="submit" value="Submit">
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
  <script src="assets/js/popper.min.js" ></script>
  <script src="assets/js/table.js"></script>

  <script type="text/javascript">
   

   document.addEventListener("DOMContentLoaded", function(){
      var total_in = 0;
      var total_out = 0;

      document.querySelectorAll('.quantity_in').forEach(function(elem){
         total_in += Number(elem.innerHTML);
      })

      document.querySelectorAll('.quantity_out').forEach(function(elem){
         total_out += Number(elem.innerHTML);
      })

      var sub = Number(total_in) - Number(total_out);
      var car = Number(sub) / Number(
        <?php
                   $product = new stock_product();
                   $product->cp($_GET['id']);
              ?>
      );

      document.getElementById('quantity_in_total').innerHTML = total_in;
      document.getElementById('quantity_out_total').innerHTML = total_out;
      document.getElementById('quentity').innerHTML = sub;
      document.getElementById('quentity_car').innerHTML = car;


      

      


   })


  </script>


</body>

</html>

<?php 
}else{
   header("Location: log-in.php?msg='You are not Log-in'");
}
?>