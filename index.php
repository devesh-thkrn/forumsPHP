<!doctype html>
<html lang="en">

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeDiscuss - Where ideas are born</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>

    <!-- Slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1000x300/?coding,macbook" class="d-block w-100" alt="..." style="">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1000x300/?coding,python" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1000x300/?coding,playstation" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <!-- Fetch all the categories -->
    <!-- Category container starts here -->
    <div class="container my-4" id="ques">
  <h2 class="text-center my-4">WeDiscuss - Browse Categories</h2>
  <div class="row my-6">
    <?php 
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['category_id'];
        $cat = $row['category_name'];
        $desc = $row['category_description'];
        echo '<div class="col-md-4 my-2">
                <div class="card">
                  <img src="https://source.unsplash.com/200x200/?coding,'.$cat.'" class="card-img-top" alt="... style="  min-width: 200px; max-width: 200px;min-height: 200px; max-height: 200px;">
                  <div class="card-body">
                    <h5 class="card-title"><a href="threadlist.php?catid=' .$id. ' " class="text-dark"> ' .$cat. ' </a></h5>
                    <p class="card-text">'.substr($desc, 0, 50).'...</p>
                    <a href="threadlist.php?catid=' .$id. ' " class="btn btn-success">View Threads</a>
                  </div>
                </div>
              </div>';
      }
    ?>
  </div>
</div>
    <!-- Use a for loop to iterate through the categories and display them in cards. -->




    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>