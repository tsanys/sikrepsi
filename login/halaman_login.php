<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/logo-big.png" />
  </head>

  <style>
      body {
          background-image: url('https://source.unsplash.com/random/?city');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
      }

      body::after {
          content: "";
          display: block;
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.5);
      }
      .card {
          z-index: 1;
      }
      .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
  </style>
  <body>
    
    <section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-start align-items-center h-100">
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <div class="card py-3 px-0">
                <div class="card-body p-5">
                <p>Silahkan Login terlebih dahulu!</p>
                <form action="aksi_login.php" method="POST">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" class="form-control form-control"
                    placeholder="Masukkan NIS/NIP" name="username"/>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" class="form-control form-control"
                    placeholder="Masukkan password" name="password"/>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                </div>

                </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
        Copyright © 2020. All rights reserved.
        </div>
        <!-- Copyright -->

    </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
 