<?
    include_once('actions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="conteiner">
        <ul id="category">
            <?
                foreach ($categories as $category) {
                    $name = substr($category, 0, -8) . 's';
                    ?>
                        <li><h1><?= $name ?></h1></li>
                    <?
                }
            ?>
        </ul>
    </div>

    <script src="script.js"></script>
</body>
</html>
