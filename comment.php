<?php 
 // session_start();
  include_once('connect.php');
  include_once('function.php');

  if(isset($_REQUEST['Upload_ArticleID']))
{
  $upload_articleid=$_REQUEST['Upload_ArticleID'];
  $select=mysqli_query($connection,"SELECT * 
                                    FROM tblupload_article
                                    WHERE upload_articleid ='$upload_articleid'");
  $data=mysqli_fetch_array($select);
  $date=$data['date'];
  $documenttype=$data['documenttype'];
  $file=$data['file'];
  $studentid=$data['studentid'];
  $filename=$data['filename'];

  } 
 if (isset($_POST['btnsubmit']))
   {
    $txtupload_articleID=$_POST['txtupload_articleID'];
    $txtcomment=$_POST['txtcomment'];
    
    $update="UPDATE tblupload_article
            SET comment='$txtcomment'
            WHERE upload_articleid='$txtupload_articleID'";
      $run=mysqli_query($connection,$update);

      if($run)
      {
        echo "<script>alert('Comment Successful')</script>";
        echo "<script>location='upload_articlelist2.php'</script>";

      }
      else
      {
        echo mysqli_error($connection);
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
                      <input type="hidden" name="txtupload_articleID" value="<?php echo $_REQUEST['Upload_ArticleID'] ?>"/>
                    <h4>Article Upload Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>File Name</label>
                      <input type="text" name="txtfilename" id="name" readonly="" value="<?php echo $filename;?>" class="form-control" />
                    </div>

                    <div class="form-group">
                      <label>Document Type</label>
                      <input type="text" name="txtdocumenttype" id="name" readonly="" value="<?php echo $documenttype ;?>" class="form-control" />
                    </div>

                    <div class="form-group">
                      <label>Comment</label>
                      <input type="text" name="txtcomment" id="name" required="" class="form-control"/>
                    </div>
               
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" name="btnsubmit" type="submit">Submit</button>
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