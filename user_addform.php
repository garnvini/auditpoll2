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
            เพิ่มผู้ใช้งานระบบ
          </h1>
          <ol class="breadcrumb">
            <li><a href="user.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li><a href="#">เพิ่มผู้ใช้งานระบบ</a></li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">  
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-6">
                    
                  <form id="form1" action="user_insert.php" method="post" class="form" novalidate>
                            <div class="form-group">
                                <label for="userName">ชื่อที่ใช้เข้าระบบ</label>
                                <input id="userName" type="text" class="form-control" name="userName" required data-smk-msg="กรุณากรอกชื่อที่ใช้เข้าระบบ">
                            </div>
                      
                            <div class="form-group">
                                <label for="userPassword">รหัสผ่าน</label>
                                <input id="userPassword" type="password" class="form-control" name="userPassword" required data-smk-msg="กรุณากรอกรหัสผ่าน">
                            </div>
                      
                            <div class="form-group">
                                <label for="userFullname">ชื่อ</label>
                                <input id="userFullname" type="text" class="form-control" name="userFullname" required data-smk-msg="กรุณากรอกชื่อ">
                            </div>
                            
                            <div class="form-group">
                                <label for="userLastname">นามสกุล</label>
                                <input id="userLastname" type="text" class="form-control" name="userLastname" required data-smk-msg="กรุณากรอกนามสกุล">
                            </div>
                            <div class="form-group">
                                <label>เลือกรูปภาพประจำตัว</label>
                                <input type="file" id="userPicture" name="userPicture">
                                <p class="help-block">กรุณาเลือกไฟล์รูปภาพ นามสกุล .jpg .png .gif</p>
                            </div>      
                            <div class="form-group">
                                <label for="userEmail">อีเมล์</label>
                                <input id="userEmail" type="email" class="form-control" name="userEmail" required data-smk-msg="กรุณากรอกอีเมล์">
                            </div>
                            
                            <div class="form-group">
                            <label for="usertypeID">ประเภทผู้ใช้งาน</label><br/>
                            <select name="usertypeID" id="userTypeID" required data-smk-msg="กรุณาเลือกประเภทผู้ใช้งาน">
                            <option value="">-- เลือกประเภทผู้ใช้งาน --</option>
                            <?php
                                    $sql = "SELECT * FROM usertype";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo '<option value="'.$row['usertypeID'].'">'.$row['usertypeName'].'</option>';         
                                    }
                                ?>                            
                            </select>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="userPosition">ตำแหน่ง</label>
                                <input id="userPosition" type="text" class="form-control" name="userPosition" required data-smk-msg="กรุณากรอกตำแหน่ง">
                            </div>
                            <div class="form-group">
                                <label for="userLevel">ชั้น</label>
                                <input id="userLevel" type="number" class="form-control" name="userLevel" required data-smk-msg="กรุณากรอกชั้น">
                            </div>
                            
                            <div class="form-group">
                            <label for="party">ฝ่าย</label><br/>
                            <select name="party" id="party" required data-smk-msg="กรุณาเลือกฝ่าย">
                            <option value="">-- เลือกฝ่าย --</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="division">กอง</label><br/>
                            <select name="division" id="division" required data-smk-msg="กรุณาเลือกกอง">
                            <option value="">-- เลือกกอง --</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="job">งาน</label><br/>
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

        
        
        $("#userName").focus();
        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'user_insert.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                $('#form1')[0].reset();
                $("#usernName").focus();
            });
            e.preventDefault();
            
            
  }
  e.preventDefault();
  });
   });
</script>  

  </body>
</html>
