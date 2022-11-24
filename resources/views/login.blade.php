<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - WEB Admin</title>
    <link href="/sbadmin/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/stye.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center" style="margin-top: 200px">
                        <div class="col-md-6 col-lg-4 mt-5">
                            <div class="card shadow-lg border-0 " style="border-radius: 20px">
                                <div class="card-header"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px">
                                    <h4 class="text-center font-weight-light my-2">Login Admin</h4>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $err)
                                            <p class="alert alert-danger">{{ $err }}</p>
                                        @endforeach
                                    @endif
                                    <form action="{{ route('loginaksi') }}" method="POST">
                                        @csrf
                                        <div class=" mb-3 ">
                                            <label for="" class="form-label">Username</label>
                                            <input class="form-control" id="username" name="username" type="text"
                                                placeholder="Masukkan Username" />

                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Password</label>
                                            <input class="form-control" name="password" id="inputPassword"
                                                type="password" placeholder="Masukkan Password" />

                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-3">
                                            <input class="btn btn-primary" type="submit" style="width: 50%"
                                                value="Login"></input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">Copyright &copy; RIDEDEV 2022</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>
