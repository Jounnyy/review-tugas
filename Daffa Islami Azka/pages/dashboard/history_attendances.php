<?php
    session_start();
    include("./../../utilities/connection.php");
    if(!isset($_SESSION['status']) || $_SESSION['status'] != "logined") {
        header("location:../../index.php?msg=You must login first!");
    } else if ($_SESSION['role'] == "admin") {
        session_start();
        session_destroy();
        header("location:./../../index.php?msg=You're administrator!");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent attendances</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/nav-side-bar.css">
</head>

<body style="background-color: #f2f2f2;">

    <div style="overflow-x: hidden; margin: 10px 10px;">

        <div class="card mb-3">
            <div class="card-body">

                <div class="header">
                    <h4>Recent attendances</h4>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="mb-3 recent-attendances">
                <div class="card">
                    <div class="card-body">

                        <?php include('./attendances.php'); ?>

                        <form action="./action.php" method="post">
                            <button type="submit" class="btn btn-secondary mt-2" name="back">Back to dashboard</button>
                        </form>

                    </div>
                </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>


</body>

</html>