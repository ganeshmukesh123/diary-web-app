<!doctype html>
<html lang="en">
  <head>
    <title>Diary</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div id="header">
      <div class="container">
        <div class="content">

          <h1>Diary</h1>
          <p>Store you thoughts permanent and securely.</p>
          <div id="error"></div>
          <div id="login_signin_form">
            <p id="tag">Login using your Username and Password.</p>
              <div class="form-group">
                <input type="email" class="form-control" id="InputUsername" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="InputPassword" placeholder="Password">
              </div>
              <!-- <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input">
                  stay logged in
                </label>
              </div> -->
              <button class="btn btn-primary" id="login">Login</button>
              <button class="btn btn-primary" id="signup">SignUp</button>
              <p style="margin-top: 12px;"><a href="#" style="color: white;" id="toggleSignUp">SignUp</a></p>
          </div>
        </div>
      </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript">
      let SignUp=0;
      $("#InputEmail").hide();
      $("#signup").hide();
      $("#toggleSignUp").click(()=>{
        if(SignUp==0){
          $("#tag").html("Interested? SignUp now.");
          $("#InputEmail").show();
          $("#login").hide();
          $("#signup").show();
          $("#toggleSignUp").html("Login");
          SignUp=1;
        }
        else{
          $("#tag").html("Login using your Username and Password.");
          $("#InputEmail").hide();
          $("#login").show();
          $("#signup").hide();
          $("#toggleSignUp").html("SignUp");
          SignUp=0;
        }
      });
    </script>
  </body>
</html>