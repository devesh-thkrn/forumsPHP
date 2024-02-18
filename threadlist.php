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





    <!-- Category container starts here -->
    <div class="container py-4">

        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome to the Python Forum</h1>
                <p class="col-md-8 fs-4">Python is a versatile high level language that has gained popularity over the
                    last two decades.</p>
                <hr class="my-4">
                <p style="color: gray;"> - Participate in online forums as you would in constructive, face-to-face discussions.<br>
                    - Postings should continue a conversation and provide avenues for additional continuous dialogue. <br>
                    - Do not post “I agree,” or similar, statements. <br>
                    - Stay on the topic of the thread – do not stray.</p>
                <button class="btn btn-primary btn-lg" type="button">Click this for ... Something</button>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h1 class="py-3">Browse Questions</h1>
        <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="img/user.png" alt="User Icon" class="image-fluid object-fit-contain" style="height: 60px;">
            </div>
            <div class="flex-grow-1 ms-3">
                This is some content from a media component. You can replace this with any content and adjust it as
                needed.
            </div>
        </div>
    </div>




    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>