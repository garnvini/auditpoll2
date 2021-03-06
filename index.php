<?php
    include './db/database.php';
?>

<!DOCTYPE html>
<html>
  <?php
  include 'head.php';
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <?php
        include 'header.php';
      ?>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
    <?php
        include 'leftside.php';
    ?>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
           <div class="alert alert-success"><h3>ยินดีต้อนรับเข้าสู่ระบบประเมินผลการปฏิบัติงานผู้ตรวจสอบ สตส. กปภ.</h3></div>
            
            
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
                <h4>ข้อมูลส่วนตัว</h4>
              </div>
            <div class="box-body">
              <!--Start creating your amazing application!-->
              <div class="row">
                  <div class="col-md-3">
                      <img src="./assets/users/<?php echo (empty($s_userPicture)? 'default.jpg' : $s_userPicture)?>" class="img img-bordered" width="200">
                  </div>
                  <div class="col-md-9">
                  <p>คุณ : <?php echo $s_userFullname. " " . $s_userLastname; ?></p>
                  <p>ตำแหน่ง : <?php echo $s_userPosition. " " . $s_userLevel; ?></p>
                  <p>สิทธิการใช้งานของคุณ : <?php echo $s_userTypeName; ?></p>
                  <p>กรุณาใช้งานจากเมนูการใช้งานทางด้านซ้ายมือ</p>
                  <p><a href="user_editform.php?userID=<?php echo $s_userID ?>" class="btn btn-adn">แก้ไขข้อมูลส่วนตัว</a></p>
                  
                  </div>
                  </div>

              
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <?php
        include 'footer.php';
    ?>

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="./plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./bootstraptable/bootstrap-table.min.js"></script>
    <!-- SlimScroll -->
    <script src="./plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="./plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./dist/js/demo.js"></script>
    <script src="./bootstrap/js/smoke.min.js"></script>
    
    <script>

</script>   
 
       
  </body>
</html>
