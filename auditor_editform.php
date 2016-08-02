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
            แก้ไขข้อมูลผู้ตรวจสอบ
      </h1>
      <ol class="breadcrumb">
          <li><a href="auditor.php"><i class="fa fa-dashboard"></i> ข้อมูลผู้ตรวจสอบ</a></li>
        <li class="active">แก้ไขข้อมูลผู้ตรวจสอบ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">แก้ไขข้อมูลผู้ตรวจสอบ</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->

              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <form id="form1" action="auditor_update.php" method="post" class="form" enctype="multipart/form-data" novalidate>
                        <?php    
                        $auditorID = $_GET['auditorID'];      
                                
                        $sql_select = "SELECT auditor.auditorID, auditor.auditorCode, auditor.auditorPre, auditor.auditorName, auditor.auditorLastname, "
                                . "auditor.auditorPicture, auditor.auditorPosition, auditor.auditorLevel, auditor.auditorOption, "
                                . "auditor.partyID, auditor.divisionID, auditor.jobID, party.partyName, "
                                . "division.divisionName, job.jobName FROM auditor , party , job , division  "
                                . "WHERE auditor.auditorID = '$auditorID' AND auditor.partyID = party.partyID "
                                . "AND auditor.divisionID = division.divisionID AND auditor.jobID = job.jobID";
                        $result = mysqli_query($link,$sql_select);
                            
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="form-group">
                                <input id="auditorID" name="auditorID" value = "<?php echo $row['auditorID']; ?>" hidden>
                            </div>
                            <div class="form-group">
                                <label>รหัสพนักงาน</label>
                                <input id="auditorCode" type="text" class="form-control" name="auditorCode" value="<?php echo $row['auditorCode']; ?>" required>
                            </div>
                            <div class="form-group">
                            <label>คำนำหน้า</label><br/>
                            <select name="auditorPre" id="auditorPre" required data-smk-msg="กรุณาเลือกคำนำหน้า">
                            <option value="<?php echo $row['auditorPre']; ?>"><?php echo $row['auditorPre']; ?></option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label>ชื่อ</label>
                                <input id="auditorName" type="text" class="form-control" name="auditorName" value="<?php echo $row['auditorName']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input id="auditorLastname" type="text" class="form-control" name="auditorLastname" value="<?php echo $row['auditorLastname']; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label>ตำแหน่ง</label>
                                <input id="auditorPosition" type="text" class="form-control" name="auditorPosition" value="<?php echo $row['auditorPosition']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>ชั้น</label>
                                <input id="auditorLevel" type="number" class="form-control" name="auditorLevel" value="<?= $row['auditorLevel']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>เพิ่มเติม</label>
                                <input id="auditorOption" type="text" class="form-control" name="auditorOption" value="<?php echo $row['auditorOption']; ?>" required>
                            </div>
                            <div class="form-group">
                            <label>ฝ่าย</label><br/>
                            <select style="width: 100%" name="party" id="party" required data-smk-msg="กรุณาเลือกฝ่าย">
                            <option value="<?php echo $row['partyID']; ?>"><?php echo $row['partyName']; ?></option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label>กอง</label><br/>
                            <select name="division" id="division" required data-smk-msg="กรุณาเลือกกอง">
                            <option value="<?php echo $row['divisionID']; ?>"><?php echo $row['divisionName']; ?></option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label>งาน</label><br/>
                            <select name="job" id="job" required data-smk-msg="กรุณาเลือกงาน">
                            <option value="<?php echo $row['jobID']; ?>"><?php echo $row['jobName']; ?></option>
                            </select>
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
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="bootstrap/js/smoke.min.js"></script>

<script>
       
    $(document).ready(function(){
        $("#party").mousedown(function(){
            getReady();
        });
        
        $("#party").change(function(){
            getDivision($(this).val());
        });
	$("#division").change(function(){
            getJob($(this).val());
	});
        $("#auditorPre").mousedown(function(){
            getAuditorPre($(this).val());
	});
	function getReady(){
            var _text = "<option value=''> -- เลือกฝ่าย -- </option>";
            $.getJSON( "./json/party_json.php", function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
                            
	 			_text += "<option value='" + data[i].partyID + "'>" + data[i].partyName + "</option>";
	 		}
                        var _text2 = "<option value='' enabled='false'> -- เลือกกอง -- </option>";
                        var _text3 = "<option value='' enabled='false'> -- เลือกงาน -- </option>";
	 		$("#party").empty().append(_text);
                        //$("#division").empty().append(_text2);
                        //$("#job").empty().append(_text3);
		});
	}
                
        function getDivision(partyID){
		_text = "<option value=''> -- เลือกกอง -- </option>";
		$.getJSON( "./json/division_json.php?partyID=" + partyID, function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
	 			_text += "<option value='" + data[i].divisionID + "'>" + data[i].divisionName + "</option>";
                        }
	 		$("#division").empty().append(_text);
		});
	}       
        
        function getJob(divisionID){
		_text = "<option value=''> -- เลือกงาน -- </option>";
		$.getJSON( "./json/job_json.php?divisionID=" + divisionID, function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
	 			_text += "<option value='" + data[i].jobID + "'>" + data[i].jobName + "</option>";
	 		}
	 		$("#job").empty().append(_text);
		});
	}   
        
        function getAuditorPre(divisionID){
            var _text = "<option value=''> -- เลือกคำนำหน้า -- </option>";
	    _text += "<option value='นาย'>นาย</option>";
            _text += "<option value='นาง'>นาง</option>";
            _text += "<option value='นางสาว'>นางสาว</option>";
	    $("#auditorPre").empty().append(_text);
	}
        
        $("#auditorName").focus();
        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'auditor_update.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                window.location.replace('auditor.php');
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
