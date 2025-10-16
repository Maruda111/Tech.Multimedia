<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
    <?php declare(strict_types=1); // włączenie typowania zmiennych w PHP >=7
    session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit();
    } else {
        header('location: zadanie/bootstrap');
    }
    ?>
</body>

</html>