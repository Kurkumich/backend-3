<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection Result</title>
    <style>
        .vertical-center {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$birth_date = $_POST['birth_date'];
$gender = $_POST['gender'];
$limbs = $_POST['limbs'];
$superpowers = $_POST['superpowers'];
$bio = $_POST['bio'];
$errors = [];
 
if (!preg_match("/^[a-zA-Zа-яА-ЯёЁ\s]+$/u", $name)) {
    $errors[] = "Имя содержит недопустимые символы.";
}
 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Неверный формат e-mail.";
}
 
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    die();
}
$conn = new mysqli('localhost','u52987','9793494','u52987');
if ($conn->connect_error) {
    die('Connection failed: '.$conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO users(name, email, birth_date, gender, limbs, bio)
    VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $name, $email, $birth_date, $gender, $limbs, $bio);
    $stmt->execute();
    $last_id = mysqli_insert_id($conn);
    foreach ($superpowers as $item) {
        switch ($item) {
            case 'immortality':
                $superpower_id = 1;
              break;
            case 'levitation':
                $superpower_id = 2;
              break;
            case 'wall_passing':
                $superpower_id = 3;
              break;
            case 'telekinesis':
                $superpower_id = 4;
              break;
        }
      $query = "INSERT INTO user_superpowers (user_id, superpower_id) VALUES ('$last_id', '$superpower_id')";
        mysqli_query($conn, $query);
    }
    $stmt->close();
    $conn->close();
}
?>
<body>
    <div class="container vertical-center">
        <div class="container rounded-pill shadow-lg bg-info text-white text-center">
            <p class="fs-3 fw-bold">Форма отправлена успешно!</p>
            <p class="fs-4 fw-bold">Ваш id: <?=$last_id?></p>
        </div>
    </div>
</body>
</html>
