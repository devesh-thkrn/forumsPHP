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

    <!-- Search results start here -->

    <div class="container my-3">
        <h3>Search Results for "<?php echo $_GET['search'];?>"</h3>
        <?php
        $noResult = true;
        $query = $_GET['search'];
        $sql = "SELECT * FROM threads WHERE MATCH(thread_title, thread_desc) AGAINST ('$query')";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $url = "thread.php?threadid=".$thread_id;
            echo "
            <div class='result my-5'>
                <h3><a href='$url'> $title </a></h3>
                <p> $desc </p>
            </div>
            ";
        }
        if($noResult){
            echo "Nothing was found, please try another keyword. A more general keyword might help.";
        }
            ?>

    </div>





    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>