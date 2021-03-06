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
            เพิ่มข้อคำถาม
          </h1>
          <ol class="breadcrumb">
            <li><a href="questionaire.php"><i class="fa fa-dashboard"></i> สร้างแบบประเมิน</a></li>
            <li><a href="#">เพิ่มข้อคำถาม</a></li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">  
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-6">
                        <form id="form1" action="question_insert.php" method="post" class="form" novalidate>
                            <div class="form-group">
                                <?php
                                    $questionaireID = $_GET['questionaireID'];
                                ?>
                                <label for="questionaireID">ลำดับแบบประเมิน</label>
                                <input id="questionaireID" type="number" class="form-control" name="questionaireID" required data-smk-msg="กรุณากรอกข้อคำถาม"  value = "<?php echo $questionaireID; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="questionName">ข้อคำถาม</label>
                                <input id="questionName" type="text" class="form-control" name="questionName" required data-smk-msg="กรุณากรอกข้อคำถาม">
                            </div>
                            
                            <div class="form-group">
                            <label for="questionMethodID">รูปแบบคำตอบ</label><br/>
                            <select name="questionMethodID" id="questionMethodID" required data-smk-msg="กรุณาเลือกรูปแบบคำตอบ">
                            <?php
                                    $sql = "SELECT * FROM questionMethod";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo '<option value="'.$row['questionMethodID'].'">'.$row['questionMethodName'].'</option>';         
                                    }
                                ?>
                            </select>
                            </div>
                       
                            
                            <div class="form-group">
                            <label for="questionTypeID">หัวข้อการประเมิน</label><br/>
                            <select name="questionTypeID" id="questionTypeID" required data-smk-msg="กรุณาเลือกหัวข้อการประเมิน">
                            <?php
                                    $sql = "SELECT * FROM questionType";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo '<option value="'.$row['questionTypeID'].'">'.$row['questionTypeName'].'</option>';         
                                    }
                                ?>
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
    
    <script type="text/javascript">
       
    $(document).ready(function(){
        $("#questionName").focus();
        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'question_insert.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                $('#form1')[0].reset();
                $("#questionName").focus();
            });
            e.preventDefault();
  }
  e.preventDefault();
  });
   });
</script>

  </body>
</html>
