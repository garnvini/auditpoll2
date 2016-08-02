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
      <?php
            if($_POST) {
            

            $partyName = $_POST['partyName']; 

            $sql = "INSERT INTO `party` (`partyName`) "
                . " VALUES ('$partyName')";

                    $result = mysqli_query($link,$sql);

                    $logDate  = date('Y-m-d H:i:s');
                    $event = "เพิ่มฝ่าย " . $partyName;
                    $ip = $_SERVER['HTTP_CLIENT_IP']?:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?:$_SERVER['REMOTE_ADDR']);

                    $sql2="INSERT INTO `log` (`userID`, `userIP`, `logEvent`, `logTypeID`, `logDate`) "
                            . "VALUES ('$s_userID', '$ip', '$event', '3', '$logDate')";
                    $result2 = mysqli_query($link,$sql2);

                    if($result){
                        header('Content-Type: application/json');
                        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
                    }
                    else{
                        $error = "เกิดข้อผิดพลาดในการเพิ่มข้อมูล". mysqli_error($link);
                        echo json_encode(array('status' => 'danger','message' => $error));

                    }
            }	
      ?>
      
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            เพิ่มฝ่าย
          </h1>
          <ol class="breadcrumb">
              <li><a href="sector.php"><i class="fa fa-dashboard"></i> หน่วยงานสำนักตรวจสอบ</a></li>
            <li><a href="#">เพิ่มฝ่าย</a></li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">  
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-12">
                  <form class="form-horizontal" method="post" novalidate>

                            <div class="form-group">  
                                <div class="col-sm-12">
                                <label>ฝ่าย</label>    
                                <input type="text" class="form-control" name="partyName">
                            </div>
                            </div>
                
                            <button id="btn1" type="submit" class="btn btn-default">บันทึก</button>

                        </form>
                  
                  
                  
                    </div>
            </div>

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
    <script src="./dist/js/select2.min.js"></script>
    
    <script type="text/javascript">
       
    $("document").ready(function(){
        
        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'testpostback.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
            });
            e.preventDefault();
            
            
  }
  e.preventDefault();
  });
   });
</script>  

  </body>
</html>