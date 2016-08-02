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
            เพิ่มกอง
          </h1>
          <ol class="breadcrumb">
              <li><a href="sector.php"><i class="fa fa-dashboard"></i> หน่วยงานสำนักตรวจสอบ</a></li>
            <li><a href="#">เพิ่มกอง</a></li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">  
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-12">
                  <form class="form-horizontal" id="form1" action="auditedagency_insert.php" method="post" novalidate>
                            <div class="form-group">
                            <div class="col-sm-6">                                
                            <label>ฝ่าย</label><br/>
                            <select style="width: 100%" class="select2" name="partyID" id="partyID" required data-smk-msg="กรุณาเลือกฝ่าย">
                            <option value="">เลือกฝ่าย</option>
                            <?php      
                                $sql_select = "SELECT * FROM party";
                                $result = mysqli_query($link,$sql_select);                            
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['partyID']; ?>"><?php echo $row['partyName']; ?></option>                           
                            <?php } ?>
                            </select>
                            </div>
                            
                            <div class="col-sm-6">
                            <label>เพิ่มกอง</label><br/>
                            <input type="text" class="form-control" name="divisionName" required data-smk-msg="กรุณากรอกกองที่ต้องการเพิ่ม">
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
        $(".select2").select2();

        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'sector_division_insert.php',
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