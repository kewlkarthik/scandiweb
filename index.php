<?php  

  include 'autoloader.php';
  use com\scandiweb\service\ProductService;
  
  $prdService = new ProductService();
  $productsList = $prdService->getProducts();

  if(isset($_POST['submit']) && !empty($_POST['product']))
  {
    $prdsToDelete = array_values(array_filter($_POST['product']));
    $prdService->deleteProducts($prdsToDelete);
    $productsList = $prdService->getProducts();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script>
                 $(document).ready(function(){
                    $('input.product').hide();
                    $('#delete').submit(function(e){
                      $('input.delete-checkbox').each(function() {
                          if($(this).is(':checked'))
                          {
                            $(this).next('.product').prop( 'checked', true);
                          } else{
                            $(this).next().prop('checked', false);
                        }
                      })
                    });
                });
        </script>
  <title>Scandiweb Application</title>
</head>

<body>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <div class="container py-3">

    <!-- Header -->

    <header>
      <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
          <span class="fs-4">
            <h4>Product List</h4>
          </span>
        </a>

        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
          <a class="me-3 py-2 text-light text-decoration-none btn btn-primary" href="addproduct.php">ADD</a>
          <button type="submit" name="submit" value="submit" class="me-3 py-2 text-light text-decoration-none btn btn-danger" form="delete">MASS DELETE</button>
        </nav>
      </div>
    </header>

    <!-- Cards -->

    <section>
    <form id="delete" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <div class="container" style="min-height:500px;">
        <?php if ($productsList): ?>

        <div class="row row-cols-4 align-items-center">

        <?php foreach ($productsList as $key => $row): ?>
          <div class="col py-5">
            <div class="card px-3 " style="width: 260px; height:180px;">
              <div class="card-body">
                <input class="form-check-input mt-0 delete-checkbox" type="checkbox" name="product[<?php echo $key ?>][sku]" value="<?php echo $row-> getSku(); ?>">
                <input class="product" type="checkbox" name="product[<?php echo $key ?>][productType]" value="<?php echo $row-> getProductType(); ?>">
                <div class="container text-center" style="padding-bottom: 20px;">
                <h6><?php echo $row-> getSku(); ?></h6>
                <h6><?php echo $row -> getName(); ?></h6>
                <h6><?php echo $row -> getPrice(); ?> $</h6>
                <h6><?php echo $row -> getAttributes(); ?></h6>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    
          
        </div>

        <?php else: ?>

          <p style="text-align: center;"> No products Available in the Database</p>

        <?php endif; ?>

      </div>
      </form>
    </section>

    <!-- footer -->

    
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
      <div class="row">
        <div class="col-6 col-md text-center">
          Scandiweb Test assignment
        </div>
      </div>
    </footer>
  </div>
</body>

</html>