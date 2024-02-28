<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
         crossorigin="anonymous"
      />
      <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
        />
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="style_login.css" />
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js""></script>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="navbar.js"></script>
      <title>OPG Berlančić</title>
   </head>
   <body>
        <?php include 'edit_logic.php'; ?>
        <div class="container my-5">
            <h2>Uredi proizvod</h2>

            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Naziv</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Cijena</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_price" value="<?php echo $product_price; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Slika</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_image" value="<?php echo $product_image; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Opis</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_description" value="<?php echo $product_description; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <br>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="admin_page.html" role="button">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <br><br><br><br><br>
        <footer class="p-3 bg-dark text-white text-center position-relative">
            <div class="container">
                <p class="lead">Copyright &copy; 2023 OPG Berlančić</p>
                <a href="#" class="position-absolute bottom-0 end-0 p-3">
                <i class="bi bi-arrow-up-circle h1"></i>
                </a>
            </div>
        </footer>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
    </body>
</html>