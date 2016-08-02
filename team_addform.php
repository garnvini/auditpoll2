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
        <section class="content-header">
          <h1>
            เพิ่มทีมผู้ตรวจสอบ
          </h1>
          <ol class="breadcrumb">
              <li><a href="team.php"><i class="fa fa-dashboard"></i> ข้อมูลทีมผู้ตรวจสอบ</a></li>
            <li>เพิ่มทีมผู้ตรวจสอบ</li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">  
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-6">
                        <form id="form1" action="team_insert.php" method="post" class="form">
                           <div class="form-group">    
                               <input type="hidden" name="userID" value="<?php echo $s_userID; ?>">
                            <label>หัวหน้าทีม</label><br/>                            
                            <select style="width: 100%" class="select2" name="head" required data-smk-msg="กรุณาเลือกหัวหน้าทีม">
                            <?php  
                                    $sql = "SELECT * FROM team , auditor WHERE team.userID = '$s_userID' AND team.head =  auditor.auditorID GROUP BY team.userID";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $row['auditorID']; ?>"><?php echo $row['auditorPre'].$row['auditorName']." ".$row['auditorLastname']; ?></option>       
                                    <?php } ?>
                            </select>
                            </div>
                            
                            <div class="form-group">
                                <label>สมาชิกในทีม <small>(กรุณาเลือกสมาชิกในทีมทั้ง 3 คน)</small></label><br/>
                            <select style="width: 100%" class="select2" multiple="multiple" name="member[]" required>
                                <option value=''>เลือกสมาชิกในทีม</option>
                                <?php  
                                    $sql = "SELECT * FROM auditor";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $row['auditorID']; ?>"><?php echo $row['auditorPre'].$row['auditorName']." ".$row['auditorLastname']; ?></option>       
                                    <?php } ?>
                            </select>
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
        $(".select2").select2({
            maximumSelectionLength: 3,
            placeholder: "เลือกสมาชิกในทีม"
        });
        $(".select3").select2();
	
        

        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'team_insert.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                window.location.replace('team.php');
            });
            e.preventDefault();
            
            
  }
  e.preventDefault();
  });
   });
</script>  

  </body>
</html>
