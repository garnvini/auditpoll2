 <?php
    include './db/database.php';
?>

<!DOCTYPE html>
<html>
  <?php
  include 'head.php';
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
      <?php
      if ($_POST){
    include './db/database.php';
    include './session.php';
    
    $processName = $_POST['processName']; 
    $teamID = $_POST['teamID'];
    $beginDate = $_POST['beginDate'];
    $finishDate = $_POST['finishDate'];
    $pwaJobID = $_POST['pwaJobID'];
    $pwaBranchID = $_POST['pwaBranchID'];

    function trimas($i){
    return $i > 3 ? ( $i > 6 ? ($i > 9 ? '1' : '4') : '3') : '2';
    }
    
    function fiscalYear($m,$y){
        if ($m == 1){
            return $y+544;
        }
        else {
            return $y+543;
        }
    }

    $m = date('n',strtotime($beginDate));
    $y = date('Y',strtotime($beginDate));
    $trimas = trimas($m);
    $fy = fiscalYear($trimas,$y);

    
    $sql = "INSERT INTO `process` (`processName`, `teamID`, "
            . "`pwaBranchID`, `beginDate`, "
            . "`finishDate`, `quarter`, `fiscalYear`, `processStatusID`) "
            . " VALUES ('$processName', '$teamID', "
            . "'$pwaBranchID', '$beginDate', "
            . "'$finishDate', '$trimas', '$fy', 1)";
    
    $result = mysqli_query($link,$sql);
    
    $logDate  = date('Y-m-d H:i:s');
    $event = "เพิ่มข้อมูลการออกตรวจ " . $processName;
    $ip = $_SERVER['HTTP_CLIENT_IP']?:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?:$_SERVER['REMOTE_ADDR']);
        
    $sql2="INSERT INTO `log` (`userID`, `userIP`, `logEvent`, `logTypeID`, `logDate`) "
            . "VALUES ('$s_userID', '$ip', '$event', '3', '$logDate')";
    $result2 = mysqli_query($link,$sql2);
    
    if($result){
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
    }
    else{
        $error = "เกิดข้อผิดพลาดในการเพิ่มข้อมูล". mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $error));
      
    }
    }
    ?>
      
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
            เพิ่มข้อมูลการออกตรวจ
          </h1>
          <ol class="breadcrumb">
              <li><a href="process_auditorview.php"><i class="fa fa-dashboard"></i> ข้อมูลการออกตรวจ</a></li>
            <li><a href="#">เพิ่มข้อมูลการออกตรวจ</a></li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">  
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-12">
                  <form class="form-horizontal" id="form1" action="process_insert.php" method="post" novalidate>
                            <div class="form-group">
                            <legend>หน่วยรับตรวจ</legend>
                            <div class="col-sm-6">
                            <label>กปภ.เขต</label><br/>
                            <select style="width: 100%" class="select2" name="pwaRegID" id="pwaRegID" required data-smk-msg="กรุณาเลือกกปภ.เขต">
                            <option value="">เลือกเขต</option>
                            </select>
                            </div>
                            <div class="col-sm-6">
                            <label>กปภ.สาขา</label><br/>
                            <select style="width: 100%" class="select2" name="pwaBranchID" id="pwaBranchID" required data-smk-msg="กรุณาเลือกกปภ.เขตและสาขา">
                            <option value="">เลือกสาขา</option>
                            </select>
                            </div>
                            </div>
                            
                            <div class="form-group">
                                <legend>ช่วงเวลาเข้าตรวจ</legend>
                                <div class="col-sm-6">
                                    <label>ตั้งแต่วันที่</label>
                                    <input type='date' class="form-control" name="beginDate" required data-smk-msg="กรุณากรอกวันที่เริ่มเข้าตรวจสอบ">
                                </div>
                            
                                <div class="col-sm-6">
                                    <label>ถึงวันที่</label>
                                    <input type='date' class="form-control" name="finishDate" required data-smk-msg="กรุณากรอกวันที่เริ่มและสิ้นสุดการตรวจสอบ">
                                </div>
                            </div>  
                            <div class="form-group">  
                                <legend>กระบวนการ</legend>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" name="processName" required data-smk-msg="กรุณากรอกชื่อกระบวนการ">
                            </div>
                            </div>
                            
                            <div class="form-group">                            
                            <legend>ทีมผู้ตรวจสอบ</legend>    
                            <div class="col-sm-12">
                                <label>เลือกทีมผู้ตรวจสอบ</label>
                                <?php  
                                    $n = 1;
                                    $sql = "SELECT * FROM team WHERE userID = $s_userID";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo '<div class="col-sm-12">';
                                        echo '<input type="radio" name="teamID" value="'.$row['teamID'].' class="form-control" required data-smk-msg="กรุณาเลือกทีมผู้ตรวจสอบ" class="required"> <b>ทีมที่ ' . $n . '</b> : '; 
                                        
                                        $head = $row['head'];
                                        $member1 = $row['member1'];
                                        $member2 = $row['member2'];
                                        $member3 = $row['member3'];
                                        $sql_head = "SELECT * FROM auditor WHERE auditorID = $head";
                                        $result_head = mysqli_query($link, $sql_head);
                                        while ($row_head = mysqli_fetch_assoc($result_head)){
                                            echo '<u><b>หัวหน้าทีม</b></u> : ' . $row_head['auditorName']. " " . $row_head['auditorLastname'] . ' <u><b>สมาชิกในทีม</b></u> : ';       
                                        }
                                        
                                        $sql_member1 = "SELECT * FROM auditor WHERE auditorID = $member1";
                                        $result_member1 = mysqli_query($link, $sql_member1);
                                        while ($row_member1 = mysqli_fetch_assoc($result_member1)){
                                            echo $row_member1['auditorName']. " " . $row_member1['auditorLastname'] . ", ";       
                                        }
                                        
                                        $sql_member2 = "SELECT * FROM auditor WHERE auditorID = $member2";
                                        $result_member2 = mysqli_query($link, $sql_member2);
                                        while ($row_member2 = mysqli_fetch_assoc($result_member2)){
                                            echo $row_member2['auditorName']. " " . $row_member2['auditorLastname'] . ", ";       
                                        }
                                        
                                        $sql_member3 = "SELECT * FROM auditor WHERE auditorID = $member3";
                                        $result_member3 = mysqli_query($link, $sql_member3);
                                        while ($row_member3 = mysqli_fetch_assoc($result_member3)){
                                            echo $row_member3['auditorName']. " " . $row_member3['auditorLastname'];       
                                        }
                                        $n++;  
                                        echo '</div>';
                                    }
                                ?>
                            
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
	getReady();
        $("#pwaRegID").change(function(){
            getPwaBranch($(this).val());	
	});
        
	function getReady(){
            var _text4 = "<option value=''>เลือกเขต</option>";
            $.getJSON( "./json/pwaReg_json.php", function( data ) {
	 		for(var i = 0; i < data.length; i++) { // หรือใช้ loop วิธีอื่นก็ได้
                            
	 			_text4 += "<option value='" + data[i].pwaRegID + "'>" + data[i].pwaRegName + "</option>";   
	 		}
                        var _text5 = "<option value=''>เลือกสาขา</option>";
                        $("#pwaRegID").empty().append(_text4);
                        $("#pwaBranchID").empty().append(_text5);
                 });       
	}
        
        function getPwaBranch(pwaRegID){
		_text5 = "<option value=''>เลือกสาขา</option>";
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
                url: 'process_insert.php',
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