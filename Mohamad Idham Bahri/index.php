<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
  header("location:dashboard/index.php?message=selamat datang kembali...");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Login</title>
    <link rel="shortcut icon" href="./img/icon.png">
</head>
<body>
    <!-- Section: Design Block -->
<section class="">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="my-5 display-3 fw-bold ls-tight">
              Masuk<br />
              <span class="text-danger">Akun Anda</span>
            </h1>
            <p style="color: hsl(217, 10%, 50.8%)">
              Silahkan login ke akun anda !!
            </p>
          </div>
  
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                <form action="login.php" method="POST">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <!-- <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1" class="form-control" />
                        <label class="form-label" for="form3Example1">First name</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example2" class="form-control" />
                        <label class="form-label" for="form3Example2">Last name</label>
                      </div>
                    </div>
                  </div> -->
  
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                            <?php
                  if (isset($_GET['message'])) {
                    echo $_GET['message'];
                  }
                  ?>
                    <input name="user_id" type="text" id="form3Example3" class="form-control" />
                    <label class="form-label" for="form3Example3">Username</label>
                  </div>
  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input name="password" type="password" id="form3Example4" class="form-control" />
                    <label class="form-label" for="form3Example4">Password</label>
                  </div>
  
                  <!-- Checkbox -->
                  <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                    <label class="form-check-label" for="form2Example33">
                      Subscribe to our newsletter
                    </label>
                  </div>
  
                  <!-- Submit button -->
                  <button name="login" type="submit" class="btn btn-danger btn-block mb-4">
                    Login
                  </button>
  
                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>or sign up with:</p>
            
                    <a href="https://www.facebook.com/profile.php?id=100087439115626" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook"></i>
                    </a>

                    <a href="https://instagram.com/jfive_variasi?igshid=YmMyMTA2M2Y=" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-instagram"></i>
                    </a>
                    
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->
</body>
</html>