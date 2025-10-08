<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['loggedin'])) {
        header("Location: index3.php");
        exit();
    }else {
        echo "Witaj, " . htmlentities($_SESSION['user'], ENT_QUOTES, "UTF-8") . "!</br>";
    }
    ?>
    <a href="logout.php">Wyloguj się</a>
</body>
</HTML>