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
            เพิ่มข้อมูลหน่วยรับตรวจ
          </h1>
          <ol class="breadcrumb">
              <li><a href="auditedagency.php"><i class="fa fa-dashboard"></i> หน่วยรับตรวจ</a></li>
            <li><a href="#">เพิ่มข้อมูลการออกตรวจ</a></li>
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
                            <label>กปภ.เขต</label><br/>
                            <select style="width: 100%" class="select2" name="pwaRegID" id="pwaRegID" required data-smk-msg="กรุณาเลือกกปภ.เขต">
                            <option value="">เลือกเขต</option>
                            <option value="1">กปภ.เขต 1</option>
                            <option value="2">กปภ.เขต 2</option>
                            <option value="3">กปภ.เขต 3</option>
                            <option value="4">กปภ.เขต 4</option>
                            <option value="5">กปภ.เขต 5</option>
                            <option value="6">กปภ.เขต 6</option>
                            <option value="7">กปภ.เขต 7</option>
                            <option value="8">กปภ.เขต 8</option>
                            <option value="9">กปภ.เขต 9</option>
                            <option value="10">กปภ.เขต 10</option>
                            <option value="11">กปภ.สนญ.</option>                            
                            </select>
                            </div>
                            
                            <div class="col-sm-6">
                            <label>กปภ.สาขา</label><br/>
                            <input type="text" class="form-control" name="pwaBranchName" required data-smk-msg="กรุณาเลือกกปภ.เขตและกรอกกปภ.สาขา">
                            </div>
                            </div>   
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>อีเมล์</label>
                                    <input type='email' class="form-control" name="pwaBranchEmail">
                                </div>
                            
                                <div class="col-sm-6">
                                    <label>โทรศัพท์ (พิมพ์ต่อกันโดยไม่ต้องเว้นวรรค)</label>
                                    <input type="text" data-smk-type="number" class="form-control" maxlength="8" >
                                </div>
                            </div>  
                
                            <div class="form-group">  
                                <div class="col-sm-12">
                                <label>ผู้จัดการสาขา</label>    
                                <input type="text" class="form-control" name="pwaBranchManager">
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
                url: 'auditedagency_insert.php',
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