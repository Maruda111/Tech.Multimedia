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
    $link = mysqli_connect('sql172.lh.pl', 'serwer388473_database1', 'Szymon.piotr5', 'serwer388473_database1'); // połączenie z BD – wpisać swoje dane
    if (!$link) {
        echo "Błąd: " . mysqli_connect_errno() . " " . mysqli_connect_error();
    } // obsługa błędu połączenia z BD
    mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
    $result = mysqli_query($link, "SELECT * FROM users WHERE username='$user'"); // wiersza, w którym login=login z formularza
    $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
    if (!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
 
    {echo"
       
       <div class=\"container mt-5\">
            <div class=\"row justify-content-center\">
                <div class=\"col-md-6\">
                    <div class=\"card\">
                        <div class=\"card-header bg-primary text-white\">
                            Logowanie nieudane!
                        </div>
                        <div class=\"card-body\">
                              Brak użytkownika o takim loginie !;\n <br> <a href=\"index.php\">Powrót do logowania</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
    } else { // jeśli $rekord istnieje
        if ($rekord['password'] == $pass) // czy hasło zgadza się z BD
        {
            echo "
            <div class=\"container mt-5\">
                <div class=\"row justify-content-center\">
                    <div class=\"col-md-6\">
                        <div class=\"card\">
                            <div class=\"card-header bg-primary text-white\"> 
                            Logowanie Ok. User: {$rekord['username']}. Hasło: {$rekord['password']}
                            </div>
                            <div class=\"card-body\">
                                Teraz możesz przejść do strony głównej: <br> <a href=\"zadanie/bootstrap\">Strona główna</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
                session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $rekord['username'];
            header("Location: zadanie/bootstrap");
            exit();
            

        } else {

            echo "
            <div class=\"container mt-5\">
                <div class=\"row justify-content-center\">
                    <div class=\"col-md-6\">
                        <div class=\"card\">
                            <div class=\"card-header bg-danger text-white\">
                                Błąd w haśle!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";  
        }
    }
    mysqli_close($link); // zamknięcie połączenia z BD
    ?>
</BODY>

</html>