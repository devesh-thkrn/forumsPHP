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
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>

    <?php
        // inserting into comment db
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        $id = $_GET['threadid'];
        if($method == 'POST'){
            $user_email = $_SESSION['useremail'];
            $sql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $user_sno= $row['sno'];
            //Inserting the thread into db
            $comment = $_POST['comment'];
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment);

            // $comment = str_replace(">" , $comment, "&gt;");
            // $comment = str_replace("<" , $comment, "&lt;");
            $sql = "INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES (NULL, '$comment', '$id', '$user_sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
        }
    ?>
    <?php if($showAlert){
        echo'
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your comment has been added to the thread!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    };
    ?>
    <?php
        $noResult = true;
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE `thread_id` = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $user = $row['thread_user_id'];

        }

    ?>



    <!-- Category container starts here -->
    <div class="container py-4">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold"><?php echo $title;?></h1>
                <p class="col-md-8 fs-4"><?php echo $desc; ?></p>
                <hr class="my-4">
                <p style="color: gray;"> - Participate in online forums as you would in constructive, face-to-face
                    discussions.<br>
                    - Postings should continue a conversation and provide avenues for additional continuous dialogue.
                    <br>
                    - Do not post “I agree,” or similar, statements. <br>
                    - Stay on the topic of the thread – do not stray.
                </p>
                <?php
                $sql2 = "SELECT user_email FROM `users` WHERE sno='$user'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $user_email = $row2['user_email'];
                ?>
                <p><b> Posted By: <?php echo $user_email; ?> </b></p>
            </div>
        </div>
    </div>


    <?php 
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo '
    <div class="container">
        <h1 class="py-2">Post a comment</h1>
        <form action="'. $_SERVER['REQUEST_URI']. '" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Type your comment here</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>';
}
else{
    echo "<div class='container'><h1 class='py-2'>Post a comment!</h1><p style:'color:grey;'>You are not logged in.</p></div>";
};
?>

    <div class="container my-5">
        <h1 class="py-3">Discussions</h1>

        <?php 
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE `thread_id` = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_datetime = $row['comment_time'];
            $thread_user_id = $row['comment_by'];
            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $user_email = $row2['user_email'];
            echo '<div class="media my-3 d-flex gap-3">
                <div class="flex-shrink-0 mb-3">
                    <img src="img/user.png" alt="User Icon" class="image-fluid object-fit-contain d-inline" style="width: 50px;">
                </div>
                <div class="media body">
                    <p class="my-0"><b>'. $user_email .' at : '. $comment_datetime .'</b></p>
                    ' . $content . '
                </div>
            </div>';
    
        };
        ?>
    </div>




    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>