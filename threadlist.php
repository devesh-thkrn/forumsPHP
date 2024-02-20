<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeDiscuss - Where ideas are born</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/_header.php';?>
    <?php include 'partials/_dbconnect.php';?>
    <?php
        $id = $_GET['catid'];
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            //Inserting the thread into db
            $th_title = $_POST['title'];
            $th_desc =  $_POST['desc'];
            $sql = "INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES (NULL, '$th_title', '$th_desc', '$id', '0', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;

        }
    ?>
    <?php if($showAlert){
        echo'
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your thread has been added to the forum!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    };
    ?>
    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $cat_title = $row['category_name'];
            $cat_desc = $row['category_description'];
        }
    ?>



    <!-- Category container starts here -->
    <div class="container py-4">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome to the <?php echo $cat_title.' Forums';?></h1>
                <p class="col-md-8 fs-4"><?php echo $cat_desc; ?></p>
                <hr class="my-4">
                <p style="color: gray;"> - Participate in online forums as you would in constructive, face-to-face
                    discussions.<br>
                    - Postings should continue a conversation and provide avenues for additional continuous dialogue.
                    <br>
                    - Do not post “I agree,” or similar, statements. <br>
                    - Stay on the topic of the thread – do not stray.
                </p>
                <button class="btn btn-success btn-lg" type="button">Click this for ... Something</button>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="py-2">Ask A Question</h1>
        <form action = "<?php $_SERVER['REQUEST_URI']?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Please keep title as concise as possible.</div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Problem Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <div class="container my-5" id="ques">
        <h1 class="py-3">Browse Questions</h1>
        <?php
        //$id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        //$noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            echo '<div class="media my-3 d-flex gap-3">
                <div class="flex-shrink-0 mb-3">
                    <img src="img/user.png" alt="User Icon" class="image-fluid object-fit-contain d-inline" style="width: 50px;">
                </div>
                <div class="media body">
                <h5 class="d-inline"><a href="thread.php?threadid='. $id .'" class="text-dark">
                    '. $row['thread_title'] .'
                </a></h5><br>
                '. $row['thread_desc'] . '
                </div>
            </div>';
        };

        if($noResult){
            echo "<br><b>Be the first person to ask a question!<br><br></b>";
        }
        ?>

    </div>


    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>