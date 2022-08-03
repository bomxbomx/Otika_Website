<?php 
    
    session_start();
    include_once('connect.php');

    
if (isset($_POST['btnlogin'])) 
{
    
    $name=$_POST['txtusername'];
    $Password=$_POST['txtpassword'];
    $role=$_POST['cborole'];
    
    $insert="Select * from tbladministrator 
            where username='$name'
            and password='$Password'
            and role='$role'";
    $ret=mysqli_query($connection,$insert);
    $row=mysqli_fetch_array($ret);
    $count=mysqli_num_rows($ret);

    if($count==0)
    {
        if(!isset($_COOKIE['loginCount']))
        {   
            $logInCount=1;
        }
        else
        {
            $logInCount=$_COOKIE['loginCount'];
            $logInCount++;
        }
        setcookie('loginCount',$logInCount,time()+100);
        if($logInCount>=3)
        {
            die("login fail 3 times,Try again in 1 minute");
        }
        else
        {
            echo '<script type="text/javascript">alert("CHECK Username and Password correctly");
                   window.location.href="administratorlogin.php";</script>';
        }
    }
    else
    {
        $_SESSION["administratorid"]=$row["administratorid"];
        $_SESSION["role"]=$role;
        echo '<script type="text/javascript">alert("Success");
                   window.location.href="index.php";</script>';
    }

    
}

 ?>

<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika University</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
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
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="frist_name">User Name</label>
                    <input id="frist_name" type="text" class="form-control" name="txtusername" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="#" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="txtpassword" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
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
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="btnlogin">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>