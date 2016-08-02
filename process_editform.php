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
            แก้ไขข้อมูลการออกตรวจ
      </h1>
      <ol class="breadcrumb">
          <li><a href="process_auditorview.php"><i class="fa fa-dashboard"></i> ข้อมูลการออกตรวจ</a></li>
        <li class="active">แก้ไขข้อมูลการออกตรวจ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">  
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-12">
                        <form class="form-horizontal" id="form1" action="process_insert.php" method="post" novalidate>
                        <?php    
                            $processID = $_GET['processID'];      
                                
                            $sql_select = "SELECT process.processID, process.processName, "
                                . "process.pwaBranchID, process.beginDate, "
                                . "process.finishDate, process.processStatusID, "
                                . "pwabranch.pwaBranchName, "
                                . "pwaReg.pwaRegName "
                                . "FROM process , pwabranch , pwaReg "
                                . "WHERE process.pwaBranchID = pwabranch.pwaBranchID "
                                . "AND pwaBranch.pwaRegID = pwaReg.pwaRegID "
                                . "AND process.processID = '$processID'";
                            $result = mysqli_query($link,$sql_select);                            
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                            <input name="processID" value = "<?php echo $row['processID']; ?>" hidden>
                            <div class="form-group">
                            <legend>หน่วยรับตรวจ</legend>
                            <div class="col-sm-6">
                            <label>กปภ.เขต</label><br/>
                            <select style="width: 100%" class="select2" name="pwaRegID" id="pwaRegID" required data-smk-msg="กรุณาเลือกกปภ.เขต">
                            <option value="<?php echo $row['pwaRegID']; ?>"><?php echo $row['pwaRegName']; ?></option>
                            </select>
                            </div>
                            <div class="col-sm-6">
                            <label>กปภ.สาขา</label><br/>
                            <select style="width: 100%" class="select2" name="pwaBranchID" id="pwaBranchID" required data-smk-msg="กรุณาเลือกกปภ.เขตและสาขา">
                            <option value="<?php echo $row['pwaBranchID']; ?>"><?php echo $row['pwaBranchName']; ?></option>
                            </select>
                            </div>
                            </div>
                            
                            <div class="form-group">
                                <legend>ช่วงเวลาเข้าตรวจ</legend>
                                <div class="col-sm-6">
                                    <label>ตั้งแต่วันที่</label>
                                    <input id="beginDate" type='date' class="form-control" name="beginDate" value="<?= $row['beginDate']; ?>"required data-smk-msg="กรุณากรอกวันที่เริ่มเข้าตรวจสอบ">
                            </div>
                            
                                <div class="col-sm-6">
                                    <label>ถึงวันที่</label>
                                    <input id="finishDate" type='date' class="form-control" name="finishDate" value="<?= $row['finishDate']; ?>"required data-smk-msg="กรุณากรอกวันที่เริ่มและสิ้นสุดการตรวจสอบ">
                            </div>
                            </div>  
                            <div class="form-group">  
                                <legend>กระบวนการ</legend>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" name="processName" value="<?php echo $row['processName']; ?>" required data-smk-msg="กรุณากรอกชื่อกระบวนการ">
                            </div>
                            </div>
                            
                            
                            <?php } ?>

                            <button id="btn1" type="submit" class="btn btn-default">บันทึก</button>
                      
                        </form>
                    </div>
                    
                </div>
              
            </div><!-- /.box-body -->

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
       
    $("document").ready(function(){
        $(".select2").select2();
	getReady();
        $("#pwaRegID").change(function(){
            getPwaBranch($(this).val());	
	});
        
	function getReady(){
            var _text4 = "";
            $.getJSON( "./json/pwaReg_json.php", function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
                            
	 			_text4 += "<option value='" + data[i].pwaRegID + "'>" + data[i].pwaRegName + "</option>";   
	 		}
                        $("#pwaRegID").empty().append(_text4);
                 });       
	}
        
        function getPwaBranch(pwaRegID){
		_text5 = "";
		$.getJSON( "./json/pwaBranch_json.php?pwaRegID=" + pwaRegID, function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
	 			_text5 += "<option value='" + data[i]['pwaBranchID'] + "'>" + data[i]['pwaBranchName'] + "</option>";
	 		}
	 		$("#pwaBranchID").empty().append(_text5);
		});
	}  

        
        
        $("#pwaRegID").focus();
        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'process_update.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                //$('#form1')[0].reset();
                $("#pwaRegID").focus();
                window.location.replace('process_auditorview.php');
            });
            e.preventDefault();
            
            
  }
  e.preventDefault();
  });
   });
</script>  

  </body>
</html>