<?php
  include('db/pdo.php');

  if(isset($_POST['login'])){
    //get email and password from the form;
    $email = $_POST['email'];
    $password = $_POST['password'];
    //select from database to verify if the email and password exist;
    $sql = $pdo->query("SELECT COUNT(*) AS total, id FROM COLIS.USER WHERE EMAIL = '$email' and  PASSWORD = '$password'");
    $res = $sql->fetch();
    if($res['total'] == 1){
      $_SESSION["id"] == $res['id'];
      header("location:admin");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/javascript.js"></script>
    <title>Tri de Colis</title>

    <style>
    .form-control-borderless {
        border: none;
    }

    .form-control-borderless:hover,
    .form-control-borderless:active,
    .form-control-borderless:focus {
        border: none;
        outline: none;
        box-shadow: none;
    }

    .button {
        padding: 15px 25px;
        font-size: 24px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #04AA6D;
        border: none;
        border-radius: 15px;
        box-shadow: 0 7px #999;
    }

    .button:hover {
        background-color: #3e8e41
    }

    .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }
    </style>
</head>

<body>
    <div class="navbar navbar-expand bg-dark navbar-dark text-white">
        <div class="container">
            <a href="#" class="navbar-brand"> Tri De Colis </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="#section" class="nav-link"> About us </a></li>
                    <li class="nav-item"><a href="#faq" class="nav-link"> Contact </a></li>
                    <li class="nav-item"><a href="#search" class="nav-link"> Search The parcel</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section id="hero" class="bg-dark text-light text-center text-sm-start">
        <div class="container">
            <div>
                <div>
                    <h1>Trie Colis</h1>
                    <p>Ce site utilise des cookies et autres traceurs. Nous utilisons des cookies techniques et des
                        cookies de personnalisation visant ainsi à vous offrir une meilleure expérience utilisateur sur
                        notre site ainsi que des contenus adaptés.</p>

                </div>
                <button type="button" id="formButton" class="button">Login as Admin</button>

                <form action="index.php" method="post" id="loginForm">
                    <b>Email:</b> <input class="form-control" type="text" name="email">
                    <b>Password: </b><input class="form-control" type="password" name="password">
                    <br>
                    <button type="submit" class="button" name="login">Login</button>
                    <br>
                </form>
                <img class="img-fluid w_50" src="images/image_principal.svg">
            </div>
        </div>
    </section>


    <div class="container">
        <div >
            <br />
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">

                    <div class="card-body row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-search h4 text-body"></i>
                        </div>

                        <form action="consulter.php" method="GET">
                        <div class="col">
                          <label>Tracker votre colis</label>
                            <input class="form-control" name="code" type="number" placeholder="Code du colis">
                        </div>

                            <button name="search" id="search" class="button" type="submit"> Search</button>
                      </form>

                    </div>

                </div>
                <!--end of col-->
            </div>
        </div>
    </div>




    <div id="faq">
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <!-- Right -->
            </section>
        </footer>
    </div>
    <!-- Footer -->








    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="js/sweetalert2.all.min.js"></script>
</body>

</html>