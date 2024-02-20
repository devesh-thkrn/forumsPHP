<?php 
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
                <p><b> Posted By: <?php echo $user; ?> </b></p> 
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h1 class="py-3">Discussions</h1>
        <?php 
        // $id = $_GET['catid'];
        // $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id";
        // $result = mysqli_query($conn, $sql);
        // while($row = mysqli_fetch_assoc($result)){
        //     $id = $row['thread_id'];
        //     $title = $row['thread_title'];
        //     $desc = $row['thread_desc'];
        //     echo '<div class="media my-3 d-flex gap-3">
        //         <div class="flex-shrink-0 mb-3">
        //             <img src="img/user.png" alt="User Icon" class="image-fluid object-fit-contain d-inline" style="width: 50px;">
        //         </div>
        //         <div class="media body">
        //         <h5 class="d-inline"><a href="thread.php?threadid=' . $id . '" class="text-dark">
        //             '. $row['thread_title'] .'
        //         </a></h5><br>
        //         '. $row['thread_desc'] . '
        //         </div>
        //     </div>';
    
        // };
        ?>
    </div>




    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>