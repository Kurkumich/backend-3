<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="w-100 bg-dark">
        <div class="container p-5 mb-2 text-center text-white">
            <h1>Tables</h1>
        </div>
    </div>

    <div class="container text-center">
        <div class="container bg-dark text-white mt-4">
            <p class="fs-3 fw-bold mb-0">superpowers</p>
        </div>
        <div class="table-responsive">
            <table class="table table-dark table-striped table-bordered">
                <thead>
                    <th>id</th>
                    <th>superpower_name</th>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli('localhost','root','','test');
                    $query = "SELECT * FROM superpowers";
                    $query_run = mysqli_query($conn, $query);
                    foreach ($query_run as $row) {
                    ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['superpower_name'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="row my-3">
            <div class="col-3">
                <div class="container bg-dark text-white">
                    <p class="fs-3 fw-bold mb-0">user_superpowers</p>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-bordered">
                        <thead>
                            <th>user_id</th>
                            <th>superpower_id</th>
                        </thead>
                        <tbody>
                            <?php
                            $conn = new mysqli('localhost','root','','test');
                            $query = "SELECT * FROM user_superpowers";
                            $query_run = mysqli_query($conn, $query);
                            foreach ($query_run as $row) {
                            ?>
                                <tr>
                                    <td><?= $row['user_id'] ?></td>
                                    <td><?= $row['superpower_id'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col">
                <div class="container bg-dark text-white">
                    <p class="fs-3 fw-bold mb-0">users</p>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-bordered">
                        <thead>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>birth_date</th>
                            <th>gender</th>
                            <th>limbs</th>
                            <th>bio</th>
                            <th>contract</th>
                        </thead>
                        <tbody>
                            <?php
                            $conn = new mysqli('localhost','root','','test');
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($conn, $query);
                            foreach ($query_run as $row) {
                            ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['birth_date'] ?></td>
                                    <td><?= $row['gender'] ?></td>
                                    <td><?= $row['limbs'] ?></td>
                                    <td><?= $row['bio'] ?></td>
                                    <td><?= $row['contract'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white p-5">
        <div>(c) Кан Владимир 2023</div>
    </footer>
</body>

</html>