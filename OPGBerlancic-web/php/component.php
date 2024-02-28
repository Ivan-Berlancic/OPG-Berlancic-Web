<?php

function component($productname, $productprice, $productimg, $productdesc, $productid){
    $element = "
    <div class='col-md-6 col-sm-12 my-3 my-md-0'>
        <form action='index.php' method='post'>
            <div class='card shadow mb-4'>
                <div>
                    <img src='$productimg' alt='Image1' class='img-fluid card-img-top w-75'>
                </div>
                <div class='card-body'>
                    <h5 class='card-title'>$productname</h5>
                    <p class='card-text'>
                        $productdesc
                    </p>
                    <h5>
                        <span class='price'>$productprice €</span>
                    </h5>
                    <button type='submit' class='btn btn-primary my-3' name='add'>Dodaj u košaricu<i class='bi bi-cart4'></i></button>
                    <input type='hidden' name='product_id' value='$productid'>
                    
                </div>
            </div>
        </form>
    </div>
    ";
    echo $element;
}


?>

