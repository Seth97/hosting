<!doctype html>
<html lang="ru">
<head>

    <link rel="stylesheet" href="/css/style.css">

    <style>



    </style>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>


<?php
session_start();

print_r($_POST);

$choice = $_POST['choice'];
$count = $_POST['count'];

$_SESSION['choice'] = $choice;
$_SESSION['count'] = $count;


$key = "AIzaSyDdu2ZBRB7ZWvLYnArIvrUCqqYA7ES9zYg"; // Ваш ключ... или мой
$search = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$_POST['video'].'&key='.$key.'&maxResults='.$_SESSION['count'].'&type=video&order='.$_SESSION['choice']; // Первоначальная информация с запросом, чтобы уменьшить количество кода



if( $curl = curl_init() and $_POST['search']) {
    curl_setopt($curl, CURLOPT_URL, $search);  // maxResults - количество материала order - сортировка по: viewCount - число просмотров, Date - дата загрузки type = video только видео
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $out = curl_exec($curl);

    $obj = json_decode($out,true); // "разбиваем" результат









    echo "<div class='accordion'>";



for($i = 0; $i < $count; $i++) { // и выводим в цикле



        $video_name = $obj ['items'][$i]['snippet']['title'] . "<br>"; //название видео
        $date =  $obj ['items'][$i]['snippet']['publishedAt'] . "<br>"; //дата загрузки
        $author = $obj ['items'][$i]['snippet']['channelTitle'] . "<br>"; //автор
        $video_id = $obj['items'][$i]['id']['videoId']; //ссылка видео для плеера





print <<<HERE


        <section id="$i">
         <h2><a href="#$i">$video_name автор этого видео: $author выложено в $date</a></h2>
        <div>

            <iframe width="560" height="315" src="https://www.youtube.com/embed/$video_id" frameborder="0" allowfullscreen>
            </iframe>

         </div>
       </section>


HERE;
            

        
        





    }



echo "</div>";

    curl_close($curl);


}

?>



<body>

<form action = "index.php" method = "post">

    <input type = "text" name = "video" pattern = "[A-Za-zА-Яа-яЁё]+?" placeholder = "Введите название ролика/роликов" required>

    <input type = "hidden" name = "choice" value = "<?=$_SESSION['choice']?>">

    <input type = hidden name = "count" value = "<?=$_SESSION['count']?>">

    <input type = "submit" name = 'search' value = "искать">

</form>



</body>
</html>