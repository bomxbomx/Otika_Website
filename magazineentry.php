<?php 
  // session_start();
  include_once('connect.php');
  include_once('function.php');

  // if(isset($_SESSION["role"])!="Marketing Coordinator")
  // {
  //   echo "<script>alert('Just only Marketing Coordinator can make this entry!')</script>";
  //      echo "<script>location='contrubutionlist.php'</script>";
  // }
  if(isset($_POST['btnregister']))
  {
    $magazineid = AutoID("tblmagazine","magazineid","Ma-",6);
    $title=$_POST['txttitle'];
    $year=$_POST['cboacyear'];
    $startdate=$_POST['txtstartdate'];
    $enddate=$_POST['txtenddate'];

    //For "Image"
  // get the original filename
  $image = $_FILES['img']['name'];    
  // image storing folder, make sure you indicate the right path
  $folder = "Magazine/"; 
  
  // image checking if exist or the input field is not empty
  if($image) 
  { 
    // creating a filename
    $filename = $folder . $magazineid . "_" . $image;       
    // uploading image file to specified folder
    $copied = copy($_FILES['img']['tmp_name'], $filename); 
    
    // checking if upload succesfull
    if (!$copied) 
    {         
    exit("Problem occured. Cannot Upload Product Image.");
    }
  }
    
      $insert=mysqli_query($connection,"INSERT INTO
       tblmagazine (magazineid,title,image,acyearid,startdate,enddate,status)
       VALUES ( '$magazineid','$title','$filename','$year','$startdate','$enddate','Valid')");
          
      if($insert) 
      {
        echo "<script>alert(' Register Success!')</script>";
        echo "<script>location='magazineentry.php'</script>";
      }
      else
      {
        echo mysqli_error ($connection);
      }
    
  }
 ?>
 <!DOCTYPE html>
<html lang="en">


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika University</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
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
    
     <?php 
    include("header.php");
   ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    
                    <form action="#" method="post" enctype="multipart/form-data">
                    <h4>Register new magazine</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Magazine Title</label>
                      <input type="text" name="txttitle" id="name" class="form-control" />
                    </div>

                    <div class="form-group">
                      <label>Academic Year</label>
                      <select name="cboacyear" class="form-control">
                      <option>Choose Academic Type</option>
                      <?php 
                                $select=mysqli_query($connection,"SELECT * FROM tblacyear");
                                $count=mysqli_num_rows($select);
                                for ($i=0; $i < $count ; $i++) { 
                                  $data=mysqli_fetch_array($select);
                                  $doctypeid=$data['acyearid'];
                                  $type=$data['acyear'];

                                  echo "<option value='$doctypeid'>$type</option>";
                                  
                                }
                      ?>
                    </select>
                    </div>

                    <div class="form-group">
                      <label>Start Creation Date</label>
                      <input type="date" name="txtstartdate" id="name" class="form-control" />
                    </div>

                    <div class="form-group">
                      <label>Due Date</label>
                      <input type="date" name="txtenddate" id="name" class="form-control" />
                    </div>

                    <div class="form-group">
                      <label>Magazine Cover</label>
                      <input type="file" name="img" id="name" class="form-control" />
                    </div>

                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" name="btnregister" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </div>
              </form>
              </div>


            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Otika University</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
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


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->
</html>