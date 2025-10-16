<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tarasewicz 121145</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="twoj_css.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="text-center">Formularz logowania</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="weryfikuj2.php">
                            <div class="mb-3">
                                <label for="user" class="form-label">Login:</label>
                                <input type="text" class="form-control" name="user" id="user" maxlength="20" required>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Hasło:</label>
                                <input type="password" class="form-control" name="pass" id="pass" maxlength="20"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Zaloguj się</button>
                        </form>
                        <div class="mt-3">
                            <p>Nie masz konta? <a href="rejestruj.php" class="link-primary">Zarejestruj się</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>