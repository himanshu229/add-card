<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resturent menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>

<body>
    <!-- As a link -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">MENU ITEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link  btn btn-outline-info" aria-current="page" href="#">Home</a>
                    </li>
                    
                </ul>
               
            </div>
            <?php
            if(isset($_SESSION['cart'])){
                $count = count($_SESSION['cart']);
            }
            ?>
            <a class=" d-flex flex-row-reverse btn btn-success" href="cart.php" style="float: right;">My Cart(<?php echo $count; ?>)</a>
        </div>
    </nav>
    <div class="row ml-2 mr-2" id="demo">

    </div>


<input type="hidden" name="" value="">
<input type="hidden" name="" value="">
</body>
</html>



<script>
    function update() {
        fetch("https://jsonblob.com/api/jsonBlob/dc64aa7c-4510-11eb-a6f4-13f5a43f0e16")
            .then(response => response.json())
            .then(rsp => {
                console.log(rsp.menu_items);
                rsp.menu_items = Object.values(rsp.menu_items);
                console.log(rsp.menu_items);
                rsp.menu_items.forEach(function (elements) {
                    console.log(elements.item_id, elements.item_name, elements.is_veg);
                    html1 = '<div class="col-sm-4 mt-3"> <div class="card"><div class="card-body"><h5 class="card-title"> Item ID: ' + elements.item_id + '</h5><p class="card-text"> Item Name:<br> ' + elements.item_name + '</p><p class="card-text"> Is Veg: ' + elements.is_veg + '</p><form method="POST" action="php.php"><input type="hidden" name="item_id" value="'+ elements.item_id +'"><input type="hidden" name="item_name" value="'+ elements.item_name +'"><input type="hidden" name="is_veg" value="'+ elements.is_veg +'"><button name="botton" class="btn btn-primary">Add to Card</button></form></div></div></div>'

                    document.querySelector("#demo").innerHTML += html1;
                });

            })
    }
    update();
</script>