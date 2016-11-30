<!doctype html>
<html lang="en">

<link rel="stylesheet" href="/css/style.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action = "index.php" method = "post">

    <input type = "text" name = "video" pattern = "[A-Za-zА-Яа-яЁё]+?" placeholder = "Введите название ролика без цифр" required>

    <select name = "choice">
        <option value = "date">По дате</option>
        <option value = "viewCount">По просмотрам</option>
    </select>

    <input type = "number" min = "0" max = "20" name = "count" required>

    <input type = "submit" name = 'search' value = "искать">

</form>

</body>
</html>

