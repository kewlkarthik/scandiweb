<?php

    include 'autoloader.php';
    use com\scandiweb\service\ProductService;
    use com\scandiweb\dto\ProductAddDto;
    if(isset($_POST['submit'])){
        $productAddDto = new ProductAddDto(
            $_POST['sku'],
            $_POST['name'], $_POST['price'], $_POST['producttype'],
            $_POST
        );
        $service = new ProductService();
        $service->addProduct($productAddDto);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
                        <h4>Product Add</h4>
                    </span>
                </a>

                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">

                    <button type="submit" name="submit" value="submit" class="me-3 py-2 text-light text-decoration-none btn btn-primary" form="product_form">Save</button>

                    <a href="index.php"><button class="me-3 py-2 text-light text-decoration-none btn btn-danger">Cancel</button></a>
                </nav>
            </div>
        </header>

        <!-- Form -->
        <section>
            <div class="container" style="min-height:500px;">
                <form id="product_form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                    <div class="row mb-3">
                        <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                        <div class="col-md-2">
                            <input type="text" name="sku" class="form-control" id="sku">
                            <div class="invalid-feedback"> Please provide a valid SKU </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-md-2">
                            <input type="text" name="name" class="form-control" id="name">
                            <div class="invalid-feedback">Please provide a valid Name</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
                        <div class="col-md-2">
                            <input type="number" step="0.01" name="price" class="form-control" id="price">
                            <div class="invalid-feedback"> Please provide a valid Price </div>
                        </div>
                    </div>

                    <!-- Form Select -->

                    <div class="row mb-3">
                        <label for="producttype" class="col-sm-2 col-form-label">Type Switcher</label>
                        <div class="col-md-2">
                            <select class="form-select form-control" name="producttype" id="productType">
                                <option value="Type Switcher">Type Switcher</option>
                                <option value="DVD">DVD</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Book">Book</option>
                            </select>
                            <div class="invalid-feedback"> Please select the product </div>

                            
                        </div>
                    </div>
                    <div class="myDiv" id="DVD" style="display: <?php echo $productValues['producttype']=='DVD' ?'inline' : 'none'; ?>;">
                        <div class="row mb-3">
                            <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="size" id="size">
                                <div class="invalid-feedback"> Please provide a valid Size </div>
                            </div>
                            <p style="padding-left: 228px;">Please, provide size</p>
                        </div>
                    </div>

                    <div class="myDiv" id="Furniture" style="display: <?php echo $productValues['producttype']=='Furniture' ?'inline' :'none'; ?>;">

                        <div class="row mb-3">
                            <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="height" id="height">
                                <div class="invalid-feedback"> Please provide a valid Height </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="width" id="width">
                                <div class="invalid-feedback"> Please provide a valid Width </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="length" id="length">
                                <div class="invalid-feedback"> Please provide a valid Length </div>
                            </div>
                            <p style="padding-left: 228px;">Please, provide dimensions</p>
                        </div>

                    </div>

                    <div class="myDiv" id="Book" style="display: <?php echo $productValues['producttype']=='Book' ?'inline' :'none'; ?>;">
                        <div class="row mb-3">
                            <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="weight" id="weight">
                                <div class="invalid-feedback"> Please provide a valid Width  </div>
                            </div>
                            <p style="padding-left: 228px;">Please, provide weight</p>
                        </div>
                    </div>




            </div>



            </form>
    </div>
    </section>

    <!-- Footer -->

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-6 col-md text-center">
                Scandiweb Test assignment
            </div>
        </div>
    </footer>
    </div>

    <script>
                            
        $('div.myDiv').hide();
        $('#productType').change(function() {
            $('div.myDiv').hide();
            $('#' + this.value).show();
        });

        $('#product_form').submit(function(e){

            $('input').each(function(index) {
                if($(this).is(":visible")&&!$(this).val()) {
                    $(this).addClass('is-invalid');
                } else{
                    $(this).removeClass('is-invalid');
                }   
            });
            if($('#productType').val() == 'Type Switcher'){
                $('#productType').addClass('is-invalid');
            } else {
                $('#productType').removeClass('is-invalid');
            }
            if($('#product_form input').hasClass('is-invalid')||$('#productType').hasClass('is-invalid')){
                e.preventDefault();
            }
        }); 

    </script>

</body>

</html>