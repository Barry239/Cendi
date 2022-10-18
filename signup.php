<?php

  // Validate session
  session_start();
  if (isset($_SESSION['userId'])) header('Location: index.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <!-- Font Awesome icons (free version) -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="./assets/css/styles.css" rel="stylesheet" />

    <title>Lorem, ipsum dolor.</title>
  </head>
  <body class="bg-dark bg-gradient">

    <!-- Layout wrapper -->
    <div id="layoutAuthentication">
      <!-- Layout content -->
      <div id="layoutAuthentication_content">
        <!-- Main page content -->
        <main>
          <!-- Main content container -->
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-xxl-7 col-xl-10">
                <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-5">
                  <div class="card-body p-5">
                    <!-- Auth header with logo image -->
                    <div class="text-center">
                      <img class="mb-3" src="./assets/img/sign-logo.svg" alt="..." style="height: 48px">
                      <h1 class="display-6 mb-0">Create New Account</h1>
                      <div class="subheading-1 mb-5">to continue to app</div>
                    </div>
                    <!-- Register new account form -->
                    <form id="signupForm">
                      <div class="row">
                        <div class="col-sm-6 mb-4">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                            <label for="firstname">First Name</label>
                          </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                            <label for="lastname">Last Name</label>
                          </div>
                        </div>
                      </div>
                      <div class="mb-4">
                        <div class="form-floating">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                          <label for="email">Email Address</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 mb-4">
                          <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                          </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                          <div class="form-floating">
                            <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="Repeat Password">
                            <label for="repeatPassword">Repeat Password</label>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="terms" name="terms">
                          <label class="form-check-label" for="terms">
                            I agree to the website terms and conditions
                          </label>
                        </div>
                      </div>
                      <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small fw-normal text-decoration-none" href="./signin.html">Sign in instead</a>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      <!-- Layout footer -->
      <div id="layoutAuthentication_footer">
        <!-- Auth footer -->
        <footer class="p-4">
          <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between small">
            <div class="me-sm-3 mb-2 mb-sm-0">
              <div class="fw-normal text-white">Copyright © Your Website 2021</div>
            </div>
            <div class="ms-sm-3">
              <a class="fw-normal text-decoration-none" href="#!">Privacy</a>
              <a class="fw-normal text-decoration-none mx-4" href="#!">Terms</a>
              <a class="fw-normal text-decoration-none" href="#!">Help</a>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JQuery 3 -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Core theme JS -->
    <script src="./assets/js/scripts.js"></script>
    <!-- Form submit JS -->
    <script src="./assets/js/forms.js"></script>

  </body>
</html>
