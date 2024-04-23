<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style8.css">
</head>
<body>
  
<?php
  include("navbar.html");
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".info-item .btn").click(function(){
                $(".container").toggleClass("log-in");
            });
            $(".container-form .btn").click(function(){
                $(".container").addClass("active");
            });
        });
    </script>

    <div class="container">
        <div class="box"></div>
        <div class="container-forms">
          <div class="container-info">
            <div class="info-item">
              <div class="table">
                <div class="table-cell">
                  <p>
                    Have an account?
                  </p>
                  <div class="btn">
                    Log in
                  </div>
                </div>
              </div>
            </div>
            <div class="info-item">
              <div class="table">
                <div class="table-cell">
                  <p>
                    Don't have an account? 
                  </p>
                  <div class="btn">
                    Sign up
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-form">
            <div class="form-item log-in">
              <div class="table">
                <div class="table-cell">
                  <input name="Username" placeholder="Username" type="text" />
                  <input name="Password" placeholder="Password" type="Password" />
                  <div class="btn">
                    Log in
                  </div>
                </div>
              </div>
            </div>
            <div class="form-item sign-up">
              <div class="table">
                <div class="table-cell">
                  <input name="email" placeholder="Email" type="text" />
                  <input name="fullName" placeholder="Full Name" type="text" />
                  <input name="Username" placeholder="Username" type="text" />
                  <input name="Password" placeholder="Password" type="Password" />
                  <div class="btn">
                    Sign up
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>