<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ifs laundry">
    <meta name="author" content="jocelin kisenga">

    <title>enregistrement</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="my-5 border-0 shadow-lg card o-hidden">
            <div class="p-0 card-body">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-10">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="mb-4 text-gray-900 h4">Creer un compte!</h1>
                            </div>
                            <form class="user" action="{{ route("register") }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="mb-3 col-sm-12 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" placeholder="noms complet">
                                    </div>
                                    @error("name")
                                    <span class="text-danger mt-1">Veuillez renseignez ce champ</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="votre email">
                                    @error("email")
                                    <span class="text-danger mt-1">email invalide</span>
                                    @enderror

                                </div>
                                <div class="form-group row">
                                    <div class="mb-3 col-sm-12 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="mot de passe">
                                    </div>
                                    @error("password")
                                    <span class="text-danger mt-1">Veuillez renseigner ce champ</span>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    s'enregistrer
                                </button>
                                <hr>
                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="{{ route("login") }}">Vous avez un compte? se connecter!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
