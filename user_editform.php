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
            แก้ไขข้อมูลส่วนตัว
          </h1>
          <ol class="breadcrumb">
              <?php 
              if($s_userTypeID  == 2 || $s_userTypeID  == 3 ) {  //ถ้าเป็นผู้ตรวจสอบ
              echo '<li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>';
              }
              else {
                  echo '<li><a href="user.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>';
              }
            ?>
            
            <li><a href="#">แก้ไข้ข้อมูลส่วนตัว</a></li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">  
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-12">
                    
                  <form id="form1" action="user_update.php" method="post" class="form-horizontal" novalidate>
                            <?php    
                                $userID = $_GET['userID'];     
                                
                                $sql_select = "SELECT `user`.userID,`user`.userName, `user`.userFullname, "
                                        . "`user`.userPassword, `user`.userLastname, `user`.userPicture, "
                                        . "`user`.userEmail, `user`.usertypeID, `user`.userPosition, "
                                        . "`user`.userLevel, `user`.jobID, "
                                        . "usertype.usertypeName, job.jobName, "
                                        . "division.divisionID, division.divisionName, party.partyID, party.partyName FROM `user` , "
                                        . "usertype , job, division, party WHERE user.userID = '$userID' "
                                        . "AND user.usertypeID=usertype.usertypeID AND user.jobID=job.jobID "
                                        . "AND job.divisionID=division.divisionID AND division.partyID = party.partyID";
                                $result = mysqli_query($link,$sql_select);
                            
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                            <input id="userID" name="userID" value = "<?php echo $row['userID']; ?>" hidden>
                            <div class="form-group">
                                <div class="col-md-6">
                                <label>ชื่อที่ใช้เข้าระบบ</label>
                                <input id="userName" type="text" class="form-control" name="userName" value="<?php echo $row['userName']; ?>" readonly>
                            </div>
                                                  
                            <div class="col-md-6">
                                <label>รหัสผ่าน</label>
                                <input id="userPassword" type="password" class="form-control" name="userPassword" required data-smk-msg="กรุณากรอกรหัสผ่าน" value = "<?php echo $row['userPassword']; ?>">
                            </div>
                            </div>
                      
                            <div class="form-group">
                            <div class="col-md-6">
                                <label>ชื่อ</label>
                                <input id="userFullname" type="text" class="form-control" name="userFullname" required data-smk-msg="กรุณากรอกชื่อ" value = "<?php echo $row['userFullname']; ?>">
                            </div>
                            
                            <div class="col-md-6">
                                <label>นามสกุล</label>
                                <input id="userLastname" type="text" class="form-control" name="userLastname" required data-smk-msg="กรุณากรอกนามสกุล" value = "<?php echo $row['userLastname']; ?>">
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <div class="col-md-12">   
                                <p><br><img src="./assets/users/<?php echo (empty($row['userPicture'])? 'default.jpg' : $row['userPicture'])?>" width="200" class="img img-bordered"></p>
                                <label>เปลี่ยนรูปภาพประจำตัว</label>
                                <input type="file" id="userPicture" name="userPicture">
                                <p class="help-block">กรุณาเลือกไฟล์รูปภาพ นามสกุล .jpg .png .gif</p>
                            </div>                      
                            </div> 
                            
                            <div class="form-group">
                            <div class="col-md-6"> 
                                <label>อีเมล์</label>
                                <input type="email" class="form-control" name="userEmail" required data-smk-msg="กรุณากรอกอีเมล์" value = "<?php echo $row['userEmail']; ?>">
                            </div>
                            
                            <div class="col-md-6"> 
                            <label>ประเภทผู้ใช้งาน</label><br/>
                            <select name="usertypeID" required data-smk-msg="กรุณาเลือกประเภทผู้ใช้งาน" class="form-control" >
                            <option value="<?php echo $row['usertypeID']; ?>"><?php echo $row['usertypeName']; ?></option>
                            </select>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <div class="col-md-6">
                                <label for="userPosition">ตำแหน่ง</label>
                                <input id="userPosition" type="text" class="form-control" name="userPosition" required data-smk-msg="กรุณากรอกตำแหน่ง" value = "<?php echo $row['userPosition']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="userLevel">ชั้น</label>
                                <input id="userLevel" type="number" class="form-control" name="userLevel" required data-smk-msg="กรุณากรอกชั้น" value = "<?php echo $row['userLevel']; ?>">
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <div class="col-md-4">
                            <label for="party">ฝ่าย</label>
                            <select name="party" id="party" required data-smk-msg="กรุณาเลือกฝ่าย" class="form-control" >
                            <option value="<?php echo $row['partyID']; ?>"><?php echo $row['partyName']; ?></option>
                            </select>
                            </div>
                                
                            <div class="col-md-4">
                            <label for="division">กอง</label><br/>
                            <select name="division" id="division" required data-smk-msg="กรุณาเลือกกอง" class="form-control" >
                            <option value="<?php echo $row['divisionID']; ?>"><?php echo $row['divisionName']; ?></option>
                            </select>
                            </div>
                                
                            <div class="col-md-4">
                            <label for="job">งาน</label><br/>
                            <select name="job" id="job" required data-smk-msg="กรุณาเลือกงาน" class="form-control" >
                            <option value="<?php echo $row['jobID']; ?>"><?php echo $row['jobName']; ?></option>
                            </select>
                            </div>
                                <?php  }  ?>
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
	$("#party").mousedown(function(){
            getReady();
        });
        
        $("#party").change(function(){
            getDivision($(this).val());
        });
	$("#division").change(function(){
            getJob($(this).val());
	});
        $("#usertypeID").mousedown(function(){
            getUsertypeID($(this).val());
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
        
        function getUserTypeID(){
            var _text = "<option value=''> -- เลือกประเภทผู้ใช้งาน -- </option>";
	    _text += "<option value='1'>ผู้ดูแลระบบ</option>";
            _text += "<option value='2'>ผู้ตรวจสอบ</option>";
            _text += "<option value='3'>ธุรการ</option>";
            _text += "<option value='4'>หน่วยรับตรวจ</option>";
            _text += "<option value='5'>กองพัฒนาและสนับสนุนงานตรวจสอบ</option>";
	    $("#usetypeID").empty().append(_text);
	} 

        
        
        $("#userFullname").focus();
        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'user_update.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                $('#form1')[0].reset();
                $("#usernFullname").focus();
            });
            e.preventDefault();
            
            
  }
  e.preventDefault();
  });
   });
</script>  

  </body>
</html>
