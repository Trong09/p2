<?php
require "helper.php";
require "logic.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Pharmacy Stock Order</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Pharmacy Stock Order</h2>
        <h5>Select the drug and amount you want to order for today.</h5>
        <hr>

        <!-- Initiate Form  -->
        <form method="GET" action="search.php">
            <!-- Drug Name Text Input -->
            <div class="form-group">
                <label>Drug Name</label>
                <input type="text" class="form-control" name="searchTerm" value="<?php if (isset($searchTerm)) echo $searchTerm?>" placeholder="Enter: Gammagard, Gammunex, or Remicade"
            </div>
            <br>

            <!-- Quantity Text Input -->
            <div class="form-group">
                <label>Quantity</label>
                <input type="text" class="form-control" name="quantity" value="<?php if (isset($quantity)) echo $quantity?>" placeholder="Enter Amount You Want to Order"
            </div>
            <br>

            <!-- Unit Checkbox Input -->
            <div class="btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-primary  <?php if($unit == 'Vials') echo 'active'?>">
                    <input type="checkbox" name="searchUnit" value="Vials" <?php if($unit == 'Vials') echo 'checked'?> autocomplete="off" > Vials
                </label>
                <label class="btn btn-outline-primary  <?php if($unit == 'Syringes') echo 'active'?>">
                    <input type="checkbox" name="searchUnit" value="Syringes" <?php if($unit == 'Syringes') echo 'checked'?>autocomplete="off"> Syringes
                </label>
                <label class="btn btn-outline-primary  <?php if($unit == 'Boxes') echo 'active'?>">
                    <input type="checkbox" name="searchUnit" value="Boxes" <?php if($unit == 'Syringes') echo 'checked'?>autocomplete="off"> Boxes
                </label>
            </div>
            <br>

            <!-- Miscellaneous Text Input -->
            <div class="form-group">
                <label>Miscellaneous</label>
                <input type="text" class="form-control" name="miscellaneous"  value="<?php if (isset($miscellaneous)) echo $miscellaneous?>" placeholder="Add Message"
            </div>
            <br>

            <!-- Email Text Input -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php if (isset($email)) echo $email?>"placeholder="Enter inventory email"
            </div>
            <br>

            <!-- Quantity Radio Input -->
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-primary <?php if($location == 'Waltham') echo 'active'?> " >
                    <input type="radio" name="location" value="Waltham" <?php if($location == 'Waltham') echo 'checked'?> autocomplete="off"> Waltham
                </label>
                <label class="btn btn-outline-primary <?php if($location == 'CATCR') echo 'active'?> ">
                    <input type="radio" name="location" value="CATCR" <?php if($location == 'CATCR') echo 'checked'?> autocomplete="off"> CATCR
                </label>
            </div>
            <hr>

            <!-- Form submit and validations -->
            <button type="submit" class="btn btn-success" name="add">Add to Cart</button>
            <?php if($hasErrors): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
    </div>
    <hr>

    <!-- Shopping Cart table -->
    <div class="container">
        <label>Shopping Cart <?=$location?></label>
        <table class="table table-striped table-hover table-sm">
            <tr class="alert-primary">
                <th>Drug Name</th>
                <th>Quantity</th>
                <th>Unit</th>
            </tr>
            <tr>
                <td><?=$drug?></td>
                <td><?=$quantity?></td>
                <td><?=$unit?></td>
            </tr>
        </table>
    </div>
    <hr>

    <!-- Output miscellaneous -->
    <h6><?=$miscellaneous?></h6>
    <hr>

    <!-- Submit Data to Email  -->
    <form method="GET" action="submit.php">
        <?php if(!$hasErrors): ?>
        <button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
        <?php endif; ?>
    </form>
</body>
</html>

