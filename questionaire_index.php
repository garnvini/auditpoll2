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
          <form id="form1" action="questionaire_do.php" method="get" class="form" enctype="multipart/form-data" novalidate>
        <section class="content-header">
          <h1>
            กรุณาเลือกกระบวนการที่ต้องการทำแบบประเมิน
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="form-group">
              <label>กระบวนการ</label><br/>
              <select name="processID" id="processID" required data-smk-msg="กรุณาเลือกกระบวนการ">
              <?php    
                $sql_process = "SELECT * FROM process WHERE processStatusID = 2";
                $result_process = mysqli_query($link,$sql_process);   
                while ($row_process = mysqli_fetch_assoc($result_process)) { ?> 
               <option value="<?php echo $row_process['processID']; ?>"><?php echo $row_process['processName']; ?></option>
               <?php }  ?>
              </select>
              </div>

                <button id="btn1" type="submit" class="btn btn-default">บันทึก</button>
              </div><!-- /. box-header with-border -->  
            </div><!-- /.box -->
        </section><!-- /.content -->
        
            </form> 
      </div><!-- /.content-wrapper -->
      

    <?php
        include 'footer.php';
    ?>

  
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
    
    <script type="text/javascript">
    $("document").ready(function(){

    });
    </script> 
    
  </body>
</html>
