<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>

<BODY>
    <?php
    $user = $_POST['user']; // login z formularza
    $user = htmlentities($user, ENT_QUOTES, "UTF-8");
    $pass = $_POST['pass']; // hasło z formularza
    $pass = htmlentities($pass, ENT_QUOTES, "UTF-8");
    $link = mysqli_connect('sql172.lh.pl', 'serwer388473_database1', 'Szymon.piotr5', 'serwer388473_database1'); // połączenie z BD – wpisać swoje dane
    if (!$link) {
        echo "Błąd: " . mysqli_connect_errno() . " " . mysqli_connect_error();
    } // obsługa błędu połączenia z BD
    mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
    $result = mysqli_query($link, "SELECT * FROM users WHERE username='$user'"); // wiersza, w którym login=login z formularza
    $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
    if (!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
    {
        echo "Brak użytkownika o takim loginie !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
    } else { // jeśli $rekord istnieje
        if ($rekord['password'] == $pass) // czy hasło zgadza się z BD
        {
            echo "Logowanie Ok. User: {$rekord['username']}. Hasło: {$rekord['password']}";
            session_start();
            $_SESSION['loggedin'] = true;

        } else {
            echo "Błąd w haśle !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
        }
    }
    mysqli_close($link); // zamknięcie połączenia z BD
    ?>
</BODY>

</html>