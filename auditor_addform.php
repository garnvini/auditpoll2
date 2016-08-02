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
            เพิ่มผู้ตรวจสอบ
          </h1>
          <ol class="breadcrumb">
            <li><a href="auditor.php"><i class="fa fa-dashboard"></i>ผู้ตรวจสอบ</a></li>
            <li><a href="#">เพิ่มผู้ตรวจสอบ</a></li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">  
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-6">
                    
                        <form id="form1" action="auditor_insert.php" method="post" enctype="multipart/form-data" class="form" novalidate>
                            <div class="form-group">
                                <label for="auditorCode">รหัสพนักงาน</label>
                                <input id="auditorCode" type="text" class="form-control" name="auditorCode" required data-smk-msg="กรุณากรอกรหัสพนักงาน">
                            </div>
                            <div class="form-group">
                            <label for="auditorPre">คำนำหน้า</label><br/>
                            <select name="auditorPre" id="auditorPre" required data-smk-msg="กรุณาเลือกคำนำหน้า">
                            <option value="">-- เลือกคำนำหน้า --</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            </select>
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <label>ชื่อ</label>
                                <input id="auditorName" type="text" class="form-control" name="auditorName" required data-smk-msg="กรุณากรอกชื่อ">
                            </div>
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input id="auditorLastname" type="text" class="form-control" name="auditorLastname" required data-smk-msg="กรุณากรอกนามสกุล">
                            </div>
                            <div class="form-group">
                                <label>เลือกรูปภาพประจำตัว</label>
                                <input type="file" id="auditorPicture" name="auditorPicture">
                                <p class="help-block">กรุณาเลือกไฟล์รูปภาพ นามสกุล .jpg .png .gif</p>
                            </div>
                            <div class="form-group">
                                <label>ตำแหน่ง</label>
                                <input id="auditorPosition" type="text" class="form-control" name="auditorPosition" required data-smk-msg="กรุณากรอกตำแหน่ง">
                            </div>
                            <div class="form-group">
                                <label>ชั้น</label>
                                <input id="auditorLevel" type="number" class="form-control" name="auditorLevel" required data-smk-msg="กรุณากรอกชั้น">
                            </div>
                            <div class="form-group">
                                <label>เพิ่มเติม</label>
                                <input id="auditorOption" type="text" class="form-control" name="auditorOption">
                            </div>
                            <div class="form-group">
                            <label>ฝ่าย</label><br/>
                            <select name="party" id="party" required data-smk-msg="กรุณาเลือกฝ่าย">
                            <option value="">-- เลือกฝ่าย --</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label>กอง</label><br/>
                            <select name="division" id="division" required data-smk-msg="กรุณาเลือกกอง">
                            <option value="">-- เลือกกอง --</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label>งาน</label><br/>
                            <select name="job" id="job" required data-smk-msg="กรุณาเลือกงาน">
                            <option value="">-- เลือกงาน --</option>
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
       
    $("document").ready(function(){
	getReady();
        $("#party").change(function(){
            getDivision($(this).val());
        });
	$("#division").change(function(){
            getJob($(this).val());
		
	});
        
	function getReady(){
            var _text = "<option value=''> -- เลือกฝ่าย -- </option>";
            $.getJSON( "./json/party_json.php", function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
                            
	 			_text += "<option value='" + data[i].partyID + "'>" + data[i].partyName + "</option>";
                                
	 		}
                        var _text2 = "<option value=''> -- เลือกกอง -- </option>";
                        var _text3 = "<option value=''> -- เลือกงาน -- </option>";
	 		$("#party").empty().append(_text);
                        $("#division").empty().append(_text2);
                        $("#job").empty().append(_text3);
		});
	}
                
        function getDivision(partyID){
		_text = "<option value=''> -- เลือกกอง -- </option>";
		$.getJSON( "./json/division_json.php?partyID=" + partyID, function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
	 			_text += "<option value='" + data[i]['divisionID'] + "'>" + data[i]['divisionName'] + "</option>";
	 		}
	 		$("#division").empty().append(_text);
		});
	}       
        
        function getJob(divisionID){
		_text = "<option value=''> -- เลือกงาน -- </option>";
		$.getJSON( "./json/job_json.php?divisionID=" + divisionID, function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
	 			_text += "<option value='" + data[i]['jobID'] + "'>" + data[i]['jobName'] + "</option>";
	 		}
	 		$("#job").empty().append(_text);
		});
	}   

        
        
        $("#questionName").focus();
        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'auditor_insert.php',
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
