<?php 
  // session_start();
  include_once('connect.php');
  include_once('function.php');

  if(isset($_SESSION['role']))
  {
    $r=$_SESSION['role'];
  }
 ?>
<!DOCTYPE html>
<html lang="en">


<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
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
              <!-- <div class="col-12 col-md-6 col-lg-6">
               
              </div> -->
              <div class="col-12 ">
                
                <div class="card">
                  <div class="card-header">
                    <h4>Magazine List</h4>
                  </div>
                  <div class="card-body">
                    <!-- <div class="section-title">Responsive</div> -->
                      <form action="#" method="post">

                     <?php  
                      $adminquery="SELECT * FROM tblmagazine m, tblupload_article c, tblacyear a, tblstudent s
                          where m.magazineid=c.magazineid
                          and a.acyearid=m.acyearid
                          and s.studentid=c.studentid";
                          $adminret=mysqli_query($connection,$adminquery);
                          $admincount=mysqli_num_rows($adminret);

                          ?> 

                    <div class="table-responsive">
                      <table class="table table-sm">
                        <thead>
                          <tr>
                             <th> Image </th>
                              <th> File </th>
                              <th> Title </th>
                              <th> Contribute Date </th>
                              <th> Contributor </th>
                              <th> Document Type </th>
                              <th> filename </th>
                              <th> Description </th>
                              <th> Comment </th>
                              <th>  </th>
                              <th>  </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                          for($i=0;$i<$admincount;$i++) 
                          { 
                            $arr=mysqli_fetch_array($adminret);
                            $upload_articleid=$arr['upload_articleid'];
                            $title=$arr['title'];
                            $date=$arr['date']; 
                            $documenttype=$arr['documenttype'];
                            $filename=$arr['filename']; 
                            $description=$arr['description']; 
                            $file=$arr['file'];
                            $comment=$arr['comment'];
                            $enddate=$arr['enddate'];

                            echo "<tr>";

                            if($documenttype=='File')
                            {
                                echo "<td width='30px'>";
                                echo "<img src='assets/images/document1.jpg' width='100px'>";
                                echo "</td>";
                              }
                              else
                              {
                                echo "<td>";
                                echo "<img src='assets/images/document1.jpg' width='100px'>";
                                echo "</td>";
                              }                        
                                echo "<td>";
                                echo "<a href='".$file."'>";
                                echo $documenttype;
                                echo "</a>";  
                              echo "</td>";
                              echo "<td>" . $arr['title'] . "</td>";
                              echo "<td>" . $arr['date'] . "</td>";
                              echo "<td>" . $arr['name'] . "</td>";
                              echo "<td>" . $arr['documenttype'] . "</td>";
                              echo "<td>" . $arr['filename'] . "</td>";
                              echo "<td>" . $arr['description'] . "</td>";
                              echo "<td>" . $arr['comment'] . "</td>";
                              if($r=='Marketing Coordinator')
                              {
                                  // echo "<td>";
                                  // echo "<a href='comment.php?Upload_ArticleID=$upload_articleid'>Comment</a>";
                                  // echo "</td>";

                                  // echo "<td>";
                                  // echo "<a href='upload_articleedit.php?Upload_ArticleID=$upload_articleid'>Edit</a>";
                                  // echo "</td>";

                                  $period=date('Y-m-d', strtotime($date. ' + 14 days'));
                                  $now = date("Y-m-d");

                                  if($now<$period) 
                                  {
                                    echo "<td>";
                                      echo "<a href='comment.php?Upload_ArticleID=$upload_articleid'>Comment</a>";
                                      echo "</td>";
                                  }
                                  if($enddate>date("Y-m-d"))
                                {
                                    echo "<td>";
                                      echo "<a href='upload_articleedit.php?Upload_ArticleID=$upload_articleid'>Edit</a>";
                                      echo "</td>";
                                  }
                                }

                              else
                              {
                                // echo "<td>";
                               //    echo "<form action='ExcelExporter.php' method='post'>";
                               //    echo "<input type='hidden' name='sql' value='$adminquery' />";
                               //   echo "<input name='download' type='submit' value='Download' />";
                               //   echo "</form>";
                               //   echo "</td>";

                                  // echo "<td>";
                                 //  echo "<a href='download.php?sql=$adminquery'>Download</a>";
                                  // echo "</td>";
                                }
                            echo "</tr>";

                             // echo "<a href='ExcelExporter.php?adminquery=$adminquery'>Download</a>";
                          }
                          ?>
                        </tbody>
                      </table>
                    </form>
                    <?php if($r=='Marketing Manager')
                    {
                     ?>
                      <form action="ExcelExporter.php" method="post">
                        <input type="hidden" name="sql" value="<?php echo $adminquery; ?>" />                            
                        <!-- <input name="showAll" type="submit" value="Download" /> -->
                        <button class="btn btn-primary mr-1" name="showAll" type="submit">Download</button>
                    </form>


                    <?php
                    }
                     ?>
                    </div>
                  </div>
                </div>
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


<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
</html>