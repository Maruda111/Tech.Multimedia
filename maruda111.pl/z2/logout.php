<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['loggedin'])) {
        unset($_SESSION['loggedin']);
        unset($_SESSION['user']);
        session_destroy();
        echo "Wylogowano pomyślnie.";
    } else {
        echo "Nie jesteś zalogowany.";
    }
    ?>
    <a href="index.php">Powrót do logowania</a>
</body>

</HTML>