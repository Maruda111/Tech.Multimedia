<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<HEAD>
    <title>Tarasewicz</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>


<BODY>
    <?php
    $user = $_POST['user']; // login z formularza
    $user = htmlentities($user, ENT_QUOTES, "UTF-8");
    $pass = $_POST['pass']; // hasło z formularza
    $pass = htmlentities($pass, ENT_QUOTES, "UTF-8");
    $pass2 = $_POST['pass2']; // hasło z formularza
    $pass2 = htmlentities($pass2, ENT_QUOTES, "UTF-8");
    $link = mysqli_connect('sql172.lh.pl', 'serwer388473_database1', 'Szymon.piotr5', 'serwer388473_database1'); // połączenie z BD – wpisać swoje dane
    if (!$link) {
        echo "Błąd: " . mysqli_connect_errno() . " " . mysqli_connect_error();
    } // obsługa błędu połączenia z BD
    mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
    $result = mysqli_query($link, "SELECT * FROM users WHERE username='$user'"); // wiersza, w którym login=login z formularza
    $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
    if (!$rekord && $pass==$pass2) 
    {
        $inject = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
        mysqli_query($link, $inject);
        echo "Rejestracja zakończona sukcesem!";
        echo "</br> Teraz możesz się zalogować: </br> <a href=\"index3.php\">Zaloguj się</a>";
    } else if ($rekord) {
            echo "Użytkownik o podanym loginie już istnieje!";
            echo "</br> Powrót do logowania: </br> <a href=\"index3.php\">Zaloguj się</a>";
        } else if ($pass!=$pass2) {
            echo "Podane hasła nie są identyczne!";
            echo "</br><a href=\"rejestruj.php\">Powrót do formularza rejestracji</a>";
        }
        else {
        echo " wystąpił nieznany błąd przy rejestracji! </br>
        Spróbuj ponownie.</br>";
        echo "<br><a href=\"rejestruj.php\">Powrót do formularza rejestracji</a>";
    }
    mysqli_close($link); // zamknięcie połączenia z BD
    ?>

</BODY>

</html>