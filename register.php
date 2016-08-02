 <?php
    include './db/database.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบประเมินผลการปฏิบัติงานผู้ตรวจสอบ สำนักตรวจสอบ การประปาส่วนภูมิภาค</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstraptable/bootstrap-table.min.css">
    <link rel="stylesheet" href="./bootstrap/css/smoke.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="./dist/css/skins/_all-skins.css">
    <link href="./dist/css/select2.min.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="./index.php" class="logo">
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <span class="logo-lg"><a href="./index.php"><img src="./assets/pics/logo2.png"></a></span>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
              <!-- User Account: style can be found in dropdown.less -->
             
            </ul>
          </div>
        </nav>
      </header>

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
            สมัครสมาชิกใหม่
          </h1>
            
        </section>

        <!-- Main content -->
        <section class="content">  
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-12">
                        <form id="form1" method="post" class="form-horizontal" enctype="multipart/form-data" novalidate>
                            <div class="form-group">   
                            <div class="col-sm-6">
                            <label>ชื่อผู้ใช้งาน</label><br/>                            
                            <input style="width: 100%"  id="userName" type="text" class="form-control" name="userName" required data-smk-msg="กรุณากรอกชื่อผู้ใช้งาน">
                            </div>
                            
                            <div class="col-sm-6">                           
                            <label>รหัสผ่าน</label><br/>                            
                            <input style="width: 100%"  id="userPassword" type="password" class="form-control" name="userPassword" required data-smk-msg="กรุณากรอกรหัสผ่าน">
                            </div>
                            </div>
                            
                            
                            <div class="form-group">   
                            <div class="col-sm-6">
                            <label>ชื่อ</label><br/>                              
                            <input style="width: 100%"  id="userFullname" type="text" class="form-control" name="userFullname" required data-smk-msg="กรุณากรอกชื่อ">
                            </div>
                            
                            <div class="col-sm-6">                           
                            <label>นามสกุล</label><br/>                            
                            <input style="width: 100%"  id="userLastname" type="text" class="form-control" name="userLastname" required data-smk-msg="กรุณากรอกนามสกุล">
                            </div>
                            </div>
                            
                            <div class="form-group">  
                            <div class="col-sm-6">
                            <label>รหัสพนักงาน</label><br/> 
                            <input style="width: 100%"  id="userCode" type="text" class="form-control" name="userCode" required data-smk-msg="กรุณากรอกรหัสพนักงาน">
                            </div>
                            <div class="col-sm-6">
                            <label>สิทธิ์การใช้งาน</label><br/> 
                            <select style="width: 100%" class="selectnosearch" name="userTypeID" id="userTypeID" required data-smk-msg="กรุณาเลือกสิทธิ์การใช้งาน">
                            <option value="6">ผู้ตรวจสอบ</option>
                            <option value="2">หัวหน้างาน</option>
                            </select>
                            </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                <label>เลือกรูปภาพประจำตัว</label>
                                <input type="file" id="userPicture" name="userPicture">
                                <p class="help-block">กรุณาเลือกไฟล์รูปภาพ นามสกุล .jpg .png .gif</p>
                            </div>
                            </div>    
                            
                            <div class="form-group">  
                            <div class="col-sm-4">
                            <label>อีเมล์</label>                            
                            <input style="width: 100%"  id="userEmail" type="email" class="form-control" name="userEmail" required data-smk-msg="กรุณากรอกอีเมล์">
                            </div>
                                  
                            <div class="col-sm-4">
                            <label>ตำแหน่ง</label>                            
                            <input style="width: 100%" id="userPosition" type="text" class="form-control" name="userPosition" required data-smk-msg="กรุณากรอกตำแหน่ง">
                            </div>
                            <div class="col-sm-4">
                            <label>ชั้น</label>   
                            <input style="width: 100%" id="userLevel" type="number" class="form-control" name="userLevel" required data-smk-msg="กรุณากรอกระดับชั้น">
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <div class="col-sm-4">
                            <label>ฝ่าย</label><br/>                            
                            <select style="width: 100%" class="select2" name="partyID" id="partyID" required data-smk-msg="กรุณาเลือกฝ่าย">
                            <option value="">เลือกฝ่าย</option>
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <label>กอง</label><br/>
                            <select style="width: 100%" class="select2" name="divisionID" id="divisionID" required data-smk-msg="กรุณาเลือกกอง">
                            <option value="">เลือกกอง</option>
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <label>งาน</label><br/>
                            <select style="width: 100%" class="select2" name="jobID" id="jobID" required data-smk-msg="กรุณาเลือกงาน">
                            <option value="">เลือกงาน</option>
                            </select>
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
        $(".selectnosearch").select2({
            minimumResultsForSearch: Infinity
        });
	getReady();
        $("#partyID").change(function(){
            getDivision($(this).val());
        });
	$("#divisionID").change(function(){
            getJob($(this).val());	
	});
        
        
	function getReady(){
            var _text = "<option value=''>เลือกฝ่าย</option>";
            $.getJSON( "./json/party_json.php", function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
                            
	 			_text += "<option value='" + data[i].partyID + "'>" + data[i].partyName + "</option>";
                                
	 		}
                        var _text2 = "<option value=''>เลือกกอง</option>";
                        var _text3 = "<option value=''>เลือกงาน</option>";
	 		$("#partyID").empty().append(_text);
                        $("#divisionID").empty().append(_text2);
                        $("#jobID").empty().append(_text3);
		});   
	}
                
        function getDivision(partyID){
		_text = "<option value=''>เลือกกอง</option>";
		$.getJSON( "./json/division_json.php?partyID=" + partyID, function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
	 			_text += "<option value='" + data[i]['divisionID'] + "'>" + data[i]['divisionName'] + "</option>";
	 		}
	 		$("#divisionID").empty().append(_text);
		});
	}       
        
        function getJob(divisionID){
		_text = "<option value=''>เลือกงาน</option>";
		$.getJSON( "./json/job_json.php?divisionID=" + divisionID, function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
	 			_text += "<option value='" + data[i]['jobID'] + "'>" + data[i]['jobName'] + "</option>";
	 		}
	 		$("#jobID").empty().append(_text);
		});
	}   
        
       

        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'registering.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                $(location).attr('href', 'welcome.php');
            });
            e.preventDefault();
            
            
  }
  e.preventDefault();
  });
   });
</script>  

  </body>
</html>
