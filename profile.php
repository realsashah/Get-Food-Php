<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha512-f8mUMCRNrJxPBDzPJx3n+Y5TC5xp6SmStstEfgsDXZJTcxBakoB5hvPLhAfJKa9rCvH+n3xpJ2vQByxLk4WP2g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
    <?php include 'header.php' ?>
    
   

    <div class='container'>
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
            <div class="col-12">
                <h3>Profile</h3>
                <hr>
            </div>
        </div>
        <div class='row'>
            <div class='col-12'>
                <h4 id='profileName'>Name: </h4>
                <h4 id='profileEmail'>Email: </h4>
                <h4 id='profileUsername'>Username: </h4>
            </div>
        </div>

        <div class='row'>
            <h4>Orders</h4>
        </div>
        <div class='row'>
            <?php 
                  include 'connect.php';
                  $userId=$_GET['user'];
                  $sql="SELECT * FROM `cart` INNER JOIN `dishes` 
                  ON cart.item_id=dishes.id WHERE user_id=$userId AND isDone=1";
  
                  $result = $conn->query($sql);
                  $total=0;
                  if($result->num_rows>0){
                      while($row = $result->fetch_assoc()){
                         echo" 
                          <div class='col-12 col-md-8 media'>
                              <img class='mr-3' src=".$row['dish_image']." alt='".$row['dish_name']."' width='64px' height='64px'>
                              <div class='media-body'>
                                <h5 class='mt-0'>".$row['dish_name']."</h5>
                                <h6>Qty:".$row['qty']."<br>Price:".$row['dish_price']."</h6>
                                <p>".$row['dish_detail']."</p>
                               </div>
                          </div>
                      
                          ";
                      }
                      
                  }
                  else{
                      echo "<h1>No Order Placed Yet</h1>";
                  }
            ?>
        </div>

    </div>

    <?php include 'footer.php' ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/cjs/popper.min.js" integrity="sha512-BO7V2K9oqbTnqEK9j/RiBzft8mcyj5XsfDgCmc0yymJQcBl4qhuR+TVgPL2pilyEqcMJxc8t0tp/lXGu9I0loA==" crossorigin="anonymous"></script>
    <script type='text/javascript' src='./js/scripts.js'></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
    
    
</body>
</html>