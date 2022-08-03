<?php 
  session_start();
  include_once('connect.php');
  include_once('function.php');

  if(isset($_POST['btnregister']))
  {
    $administratorid = AutoID("tbladministrator","administratorid","A-",6);
    $name=$_POST['txtname'];
    $password=$_POST['txtpassword'];
    $username=$_POST['txtusername'];
    $email=$_POST['txtemail'];
    $role=$_POST['cborole'];


      $insert=mysqli_query($connection,"INSERT INTO
       tbladministrator (administratorid,name,role,username,email,password)
       VALUES ( '$administratorid','$name','$role','$username','$email','$password')");
          
      if($insert) 
      {
        echo "<script>alert(' Register Success!')</script>";
        echo "<script>location='index.php'</script>";
      }
      else
      {
        echo mysqli_error ($connection);
      }
  }
 ?>
<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika University</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form action="#" method="post">
                  <div class="form-group">
                    <label for="frist_name">Admin Name</label>
                      <input id="frist_name" type="text" class="form-control" required="" name="txtname" autofocus>
                  </div>

                  <div class="form-group">
                    <label for="frist_name">Role</label>
                      <select id="name" name="cborole" required=""  class="form-control" >
                      <option>Choose Role</option>
                      <option>Administrator</option>
                      <option>Marketing Manager</option>
                      <option>Marketing Coordinator</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" required="" name="txtemail">
                    <div class="invalid-feedback" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="frist_name">User Name</label>
                      <input id="frist_name" type="text" class="form-control" required="" name="txtusername" autofocus>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" required="" data-indicator="pwindicator"
                        name="txtpassword">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" required="" name="password-confirm">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" required="" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="btnregister">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              <!-- <div class="mb-4 text-muted text-center">
                Already Registered? <a href="auth-login.html">Login</a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>