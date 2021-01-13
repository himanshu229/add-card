<?php
include("php.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" integrity="sha512-u7ppO4TLg4v6EY8yQ6T6d66inT0daGyTodAi6ycbw9+/AU8KMLAF7Z7YGKPMRA96v7t+c7O1s6YCTGkok6p9ZA==" crossorigin="anonymous" />

</head>

<body>
    <!-- As a link -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MENU ITEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link  btn btn-outline-info" aria-current="page" href="index.php">Home</a>
                    </li>

                </ul>

            </div>
            <a class=" d-flex flex-row-reverse btn btn-success" href="cart.php" style="float: right;">My Cart</a>
        </div>
    </nav>
    <div class="card ml-5 mt-5 mr-5">
        <h5 class="card-header">Order</h5>
        <div class="card-body">
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Item Id</th>
                        <th scope="col">Item name</th>
                        <th scope="col">Is_veg</th>
                        <th scope="col" style='width: 222px;'>Quantity</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                                if(isset($_SESSION["cart"]))
                                {
                                     foreach($_SESSION["cart"] as $key => $value) {
                                        echo "<tr>
                                             <td>$value[item_id]</td>
                                             <td  style='width: 522px;' >$value[item_name]</td>
                                             <td>$value[is_veg]</td>
                                             <td>    
                                             <div aria-label='Page navigation example' style='margin-left: 25px;'>
                                             <ul class='pagination'>
                                                 <li class='page-item'>
                                                     <button class='page-link' onClick='increaseNumber()' style='box-shadow: none'>
                                                             <i class='fas fa-plus'></i>
                                                         
                                                     </button>
                                                 </li>
                                                 <li class='page-item'>
                                                     <input type='text' id='textbox' class='page-link' value='1' style='width: 62px; text-align: center;'>
                                                 </li>
                                                 <li class='page-item'>
                                                     <button class='page-link' onClick='decreaseNumber()' style='box-shadow: none'><i class='fas fa-minus'></i></button>
                                                     </a>
                                                 </li>
                                     
                                             </ul>
                                         </div></td>
                                             <td>
                                             <form action='php.php' method='POST'>
                                             <button name='remove' class='btn btn-danger'>Remove</button>
                                             <input type='hidden' name='item_id' value='$value[item_id]'>
                                             </form></td>
                    
                                            </tr>";
                                }
                            }
                                ?>

                </tbody>

            </table>
        </div>
    </div>


</body>

</html>
<script>
const decreaseNumber = () =>{
        var itemval = document.getElementById('textbox').value;
        if (itemval <= 1) {
            itemval = 1;
        }
        else{
            itemval = parseInt(itemval)-1;
            document.getElementById('textbox').value = itemval;
        }   
    } 
    const increaseNumber = () =>{
        var itemval = document.getElementById('textbox').value;
        if(itemval >= 10){
            itemval = 10;
        }
        else{
            itemval = parseInt(itemval)+1;
            document.getElementById('textbox').value = itemval;
        }
          
    } 
</script>