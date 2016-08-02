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
            อนุมัติการออกตรวจ
      </h1>
      <ol class="breadcrumb">
          <li><a href="process_toapprove.php"><i class="fa fa-dashboard"></i> การออกตรวจรอการอนุมัติ</a></li>
        <li class="active">อนุมัติการออกตรวจ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">อนุมัติการออกตรวจ</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->

              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="container-fluid">
                        <form id="form1" method="post" class="form"  enctype="multipart/form-data" novalidate>
                        <?php    
                        $processID = $_GET['processID'];                                   
                        $sql_select = "SELECT process.processID, process.processName, "
                                . "process.beginDate, process.finishDate, "
                                . "process.teamID, pwabranch.pwaBranchName, team.head, "
                                . "team.member1, team.member2, team.member3, job.jobName "
                                . "FROM process , pwabranch , team , auditor, job "
                                . "WHERE process.pwaBranchID = pwabranch.pwaBranchID "
                                . "AND process.teamID = team.teamID "
                                . "AND team.head = auditor.auditorID AND auditor.jobID = job.jobID "
                                . "AND process.processID = '$processID'";
                        $result = mysqli_query($link,$sql_select);                            
                            while ($row = mysqli_fetch_assoc($result)) { ?>                         
                                
                <section class="col-md-12">
                    <div class="panel panel-info">
                            <div class="panel-heading">
                              <h3 class="panel-title"><?php echo $row['processName']; ?><h3>
                                      <input type="hidden" name="processName" value="<?php echo $row['processName'] ?>">
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md-3">
                                  <div class="thumbnail">
                                    <div class="caption">
                                        <?php         
                                        $head = $row['head']; 
                                        $sql_select2 = "SELECT auditorPre, auditorName, "
                                            . "auditorLastname, auditorID, auditorPicture, auditorPosition, auditorOption "
                                            . "FROM auditor WHERE auditorID = '$head'";
                                        $result2 = mysqli_query($link,$sql_select2);
                                        while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                                      <p><img src="assets/img/<?php echo (empty($row2['auditorPicture'])? 'default.jpg' : $row2['auditorPicture'])?>" class="img img-bordered" width="200"></p>
                                      <h4>หัวหน้าทีม</h4>                                      
                                      <p><?php echo $row2['auditorPre'].$row2['auditorName']." ".$row2['auditorLastname']; ?></p>
                                      <p><?php echo $row2['auditorPosition']." ".$row2['auditorOption'] ?></p>
                                    <?php  }  ?>
                                    </div>
                                  </div>
                                </div>
                                  <div class="col-md-3">
                                  <div class="thumbnail">
                                    <div class="caption">                                      
                                      <?php         
                                        $member1 = $row['member1']; 
                                        $sql_select3 = "SELECT auditorPre, auditorName, "
                                            . "auditorLastname, auditorID, auditorPicture, auditorPosition, auditorLevel "
                                            . "FROM auditor WHERE auditorID = '$member1'";
                                        $result3 = mysqli_query($link,$sql_select3);
                                        while ($row3 = mysqli_fetch_assoc($result3)) { ?>
                                      <p><img src="assets/img/<?php echo (empty($row3['auditorPicture'])? 'default.jpg' : $row3['auditorPicture'])?>" class="img img-bordered" width="200"></p>
                                      <h4>ผู้ตรวจสอบ</h4>
                                      <p><?php echo $row3['auditorPre'].$row3['auditorName']." ".$row3['auditorLastname']; ?></p>
                                      <p><?php echo $row3['auditorPosition']." ".$row3['auditorLevel']." ".$row2['auditorOption'] ?></p>
                                      <?php  }  ?>
                                    </div>
                                  </div>
                                </div>
                                  <div class="col-md-3">
                                  <div class="thumbnail">
                                    <div class="caption">
                                      <?php         
                                        $member2 = $row['member2']; 
                                        $sql_select4 = "SELECT auditorPre, auditorName, "
                                            . "auditorLastname, auditorID, auditorPicture, auditorPosition, auditorLevel  "
                                            . "FROM auditor WHERE auditorID = '$member2'";
                                        $result4 = mysqli_query($link,$sql_select4);
                                        while ($row4 = mysqli_fetch_assoc($result4)) { ?>
                                      <p><img src="assets/img/<?php echo (empty($row4['auditorPicture'])? 'default.jpg' : $row4['auditorPicture'])?>" class="img img-bordered" width="200"></p>
                                      <h4>ผู้ตรวจสอบ</h4>                                      
                                      <p><?php echo $row4['auditorPre'].$row4['auditorName']." ".$row4['auditorLastname']; ?></p>
                                      <p><?php echo $row4['auditorPosition']." ".$row4['auditorLevel']." ".$row2['auditorOption'] ?></p>
                                      
                                      <?php  }  ?>
                                    </div>
                                  </div>
                                </div>
                                  <div class="col-md-3">
                                  <div class="thumbnail">
                                    <div class="caption">
                                      <?php         
                                        $member3 = $row['member3']; 
                                        $sql_select5 = "SELECT auditorPre, auditorName, "
                                            . "auditorLastname, auditorID, auditorPicture, auditorPosition, auditorLevel  "
                                            . "FROM auditor WHERE auditorID = '$member3'";
                                        $result5 = mysqli_query($link,$sql_select5);
                                        while ($row5 = mysqli_fetch_assoc($result5)) { ?>
                                      <p><img src="assets/img/<?php echo (empty($row5['auditorPicture'])? 'default.jpg' : $row5['auditorPicture'])?>" class="img img-bordered" width="200"></p>
                                      <h4>ผู้ตรวจสอบ</h4>                                      
                                      <p><?php echo $row5['auditorPre'].$row5['auditorName']." ".$row5['auditorLastname']; ?></p>
                                      <p><?php echo $row5['auditorPosition']." ".$row5['auditorLevel']." ".$row2['auditorOption'] ?></p>
                                    <?php  }  ?>
                                    </div>
                                  </div>
                                </div>
                                  <div class="panel-body">
                                    <div class="row">
                                    <div class="col-md-12">
                                    <input id="processID" name="processID" value = "<?php echo $row['processID']; ?>" hidden>
                                    <p><b>งาน</b> : <?php echo $row['jobName']; ?></p>
                                    <p><b>หน่วยรับตรวจ</b> : <?php echo $row['pwaBranchName']; ?></p>
                                    <p><b>ระยะเวลาเข้าตรวจ ตั้งแต่วันที่</b> : <?php echo $row['beginDate']; ?> <b>ถึงวันที่</b> : <?php echo $row['finishDate']; ?></p>                      
                                    <?php  }  ?>
                                    <button id="btn1" type="submit" name="approve" value="approve" formaction="process_doapprove.php" class="btn btn-success">อนุมัติกระบวนการ</button>
                                    <button id="btn1" type="reset" name="cancle" value="cancle" formaction="process_docancle.php" class="btn btn-danger">ไม่อนุมัติกระบวนการ</button>
                                    </div>
                                    </div>  
                                </div>                                
                            </div>
                            </div>
                            </section>                            
                        </form>
                    </div>                    
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
        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'process_doapprove.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                //$('#form1')[0].reset();
                //$("#empName").focus();
                window.location.replace('process_toapprove.php');
            });
            e.preventDefault();
        }
        });
        
        $('#form1').on("reset",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'process_docancle.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                //$('#form1')[0].reset();
                //$("#empName").focus();
                window.location.replace('process_toapprove.php');
            });
            e.preventDefault();
        }
        });
   });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
