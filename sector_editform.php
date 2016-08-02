<?php  
    include './db/database.php';
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<?php include 'head.php'; ?>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'leftside.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            แก้ไขข้อมูลหน่วยงานสำนักตรวจสอบ
      </h1>
      <ol class="breadcrumb">
          <li><a href="sector.php"><i class="fa fa-dashboard"></i> ข้อมูลหน่วยงานสำนักตรวจสอบ</a></li>
        <li class="active">แก้ไขข้อมูลหน่วยงานสำนักตรวจสอบ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">แก้ไขข้อมูลหน่วยงานสำนักตรวจสอบ</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->

              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" id="form1" action="auditedagency_update.php" method="post" novalidate>
                        <?php    
                        $pwaBranchID = $_GET['pwaBranchID'];      
                                
                        $sql_select = "SELECT * FROM pwabranch WHERE pwabranch.pwaBranchID = '$pwaBranchID'";
                        $result = mysqli_query($link,$sql_select);
                            
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="form-group">
                            <input id="pwaBranchID" name="pwaBranchID" value = "<?php echo $row['pwaBranchID']; ?>" hidden>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-6">    
                            <label>กปภ.เขต</label><br/>                            
                            <select name="pwaRegID" id="pwaRegID" style="width: 100%" class="select2" required data-smk-msg="กรุณาเลือกเขต">
                            <option value="<?php echo $row['pwaRegID']; ?>">กปภ.เขต<?php echo $row['pwaRegID']; ?></option>
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
                                <label>กปภ.สาขา</label>
                                <input id="pwaBranchName" type="name" class="form-control" name="pwaBranchName" value="<?php echo $row['pwaBranchName']; ?>" required data-smk-msg="กรุณาเลือกกปภ.เขตและกรอกกปภ.สาขา">
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                <label>อีเมล์สาขา</label>
                                <input id="pwaBranchEmail" type="email" class="form-control" name="pwaBranchEmail" value="<?php echo $row['pwaBranchEmail']; ?>">
                                </div>
                                <div class="col-sm-6">
                                <label>เบอร์โทรสาขา</label>
                                <input id="pwaBranchTel" type="text" class="form-control" name="pwaBranchTel" value="<?php echo $row['pwaBranchTel']; ?>">
                                </div>
                                </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                <label>ผู้จัดการสาขา</label>
                                <input id="pwaBranchManager" type="text" class="form-control" name="pwaBranchManager" value="<?php echo $row['pwaBranchManager']; ?>">
                            </div>
                                </div>
                            <?php  }  ?>
                            <button id="btn1" type="submit" class="btn btn-default">บันทึก</button>
                        </form>
                    </div>
                    
                </div>
              
            </div><!-- /.box-body -->
            <div class="box-footer">
                
            </div>
            
        </div><!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'footer.php'; ?>

  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

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
   
    $(document).ready(function(){
        
        $(".select2").select2();

        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'auditedagency_update.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                window.location.replace('auditedagency.php');
            });
            e.preventDefault();
  }
  e.preventDefault();
  });
   });     
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
