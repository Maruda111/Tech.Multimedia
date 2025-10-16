<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<HEAD>
    <title>Tarasewicz</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="twoj_css.css">
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
    if (!$rekord && $pass == $pass2) {
        $inject = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
        mysqli_query($link, $inject);
    echo "
        <div class=\"container mt-5\">
            <div class=\"row justify-content-center\">
                <div class=\"col-md-6\">
                    <div class=\"card\">
                        <div class=\"card-header bg-primary text-white\">
                            Rejestracja zakończona sukcesem!
                        </div>
                        <div class=\"card-body\">
                            Teraz możesz się zalogować: <br> <a href=\"index.php\">Zaloguj się</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
    } else if ($rekord) {
        echo "
        <div class=\"container mt-5\">
            <div class=\"row justify-content-center\">
                <div class=\"col-md-6\">
                    <div class=\"card\">
                        <div class=\"card-header bg-primary text-white\">
                           <TEXT>Użytkownik o podanym loginie już istnieje!</TEXT>
                        </div>
                        <div class=\"card-body\">
                            <TEXT></br><a href=\"rejestruj.php\">Powrót do formularza rejestracji</a></TEXT>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        ";
    } else if ($pass != $pass2) {
        echo "
        <div class=\"container mt-5\">
            <div class=\"row justify-content-center\">
                <div class=\"col-md-6\">
                    <div class=\"card\">
                        <div class=\"card-header bg-primary text-white\">
                            <TEXT>Podane hasła nie są identyczne!</TEXT>
                        </div>
                        <div class=\"card-body\">
                            <TEXT></br><a href=\"rejestruj.php\">Powrót do formularza rejestracji</a></TEXT>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
    } else {
    echo "
    <div class=\"container mt-5\">
        <div class=\"row justify-content-center\">
            <div class=\"col-md-6\">
                <div class=\"card\">
                    <div class=\"card-header bg-primary text-white\">
                        <TEXT>wystąpił nieznany błąd przy rejestracji! </br>
        Spróbuj ponownie.</br></TEXT>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
    }
    mysqli_close($link); // zamknięcie połączenia z BD
?>

</BODY>

</html>