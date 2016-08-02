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
        <section class="content-header">
          <h1>ผลการประเมินผู้ตรวจสอบรายบุคคล</h1>
          <ol class="breadcrumb">
              <li><a href="scoreperson_result.php"><i class="fa fa-dashboard"></i> คะแนนรายบุคคล</a></li>
            <li><a href="#">ผลการประเมินผู้ตรวจสอบรายบุคคล</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
            <div class="box-header with-border">
            <div class="row">
            <?php    
            $processID = filter_input(INPUT_GET, 'processID');
            $auditorID = filter_input(INPUT_GET, 'auditorID');
            $questionaireID = filter_input(INPUT_GET, 'questionaireID');
            $sql_auditor = "SELECT auditor.auditorCode, auditor.auditorPre, "
                    . "auditor.auditorName, auditor.auditorLastname, "
                    . "auditor.auditorPicture, auditor.auditorPosition, "
                    . "auditor.auditorLevel, auditor.auditorOption, "
                    . "process.processName, job.jobName, process.beginDate, process.finishDate, "
                    . "division.divisionName, party.partyName, pwabranch.pwaBranchName "
                    . "FROM scoreperson , auditor , process , "
                    . "job , division , party , pwabranch "
                    . "WHERE scoreperson.auditorID = '$auditorID' "
                    . "AND scoreperson.processID = '$processID' "
                    . "AND scoreperson.questionaireID = '$questionaireID' "
                    . "AND scoreperson.auditorID = auditor.auditorID "
                    . "AND scoreperson.processID = process.processID "
                    . "AND process.pwaBranchID = pwabranch.pwaBranchID "
                    . "AND auditor.jobID = job.jobID "
                    . "AND job.divisionID = division.divisionID "
                    . "AND division.partyID = party.partyID "
                    . "GROUP BY scoreperson.auditorID";
            $result_auditor = mysqli_query($link,$sql_auditor);   
            while ($row_auditor = mysqli_fetch_assoc($result_auditor)) { ?>       
          <div class="col-md-3">
            <p><img src="assets/img/<?php echo (empty($row_auditor['auditorPicture'])? 'default.jpg' : $row_auditor['auditorPicture'])?>" class="img img-bordered" width="250"></p>
           </div><!-- /.col-md-- --> 
          <div class="col-md-9">
              <h4><?php echo $row_auditor['auditorPre'].$row_auditor['auditorName']." ".$row_auditor['auditorLastname']; ?></h4>
                    <p><?php echo $row_auditor['auditorPosition']." ".$row_auditor['auditorLevel'] . " " . $row_auditor['auditorOption']; ?></p>
                    <p><?php echo $row_auditor['jobName'] . "  " . $row_auditor['divisionName'] . "  " . $row_auditor['partyName']; ?></p>
                    <p><b>ตรวจสอบกระบวนการ : </b><?php echo $row_auditor['processName']; ?></p>
                    <p><b>หน่วยรับตรวจ : </b><?php echo $row_auditor['pwaBranchName']; ?></p>
                    <p><b>วันที่ปฏิบัติงาน</b> <?php echo "&nbsp;&nbsp;".$row_auditor['beginDate']."&nbsp;&nbsp;"; ?> <b>ถึงวันที่</b> <?php echo "&nbsp;&nbsp;".$row_auditor['finishDate']; ?></p>

                <table id = "table" 
                     data-toggle="table" 
                     data-url="./json/scoreperson_result_detail_json.php?auditorID=<?php echo $auditorID; ?>&processID=<?php echo $processID; ?>&questionaireID=<?php echo $questionaireID; ?>">                       
                    <thead>
                        <tr>
                        <th data-align="center" data-field="num">ลำดับ</th>    
                        <th data-field="questionName">พฤติกรรมการทำงาน</th>
                        <th data-align="center" data-field="scorePoint">คะแนน</th>
                    </tr>
                </thead>
            </table>
                    <br>
                    <?php 
                    $sql_evaluate = "SELECT SUM(scoreperson.scorePoint) "
                            . "AS 'sum', AVG(scoreperson.scorePoint) AS 'avg', "
                            . "COUNT(*) AS 'cnt' "
                            . "FROM  scoreperson "
                            . "WHERE scoreperson.auditorID = '$auditorID' "
                            . "AND scoreperson.processID = '$processID' "
                            . "AND scoreperson.questionaireID = '$questionaireID'";
                    $result_evaluate = mysqli_query($link,$sql_evaluate);   
            while ($row_evaluate = mysqli_fetch_assoc($result_evaluate)) { ?>                     
                    <center>
                    <h3><span class="label label-danger">คะแนนรวม <?php  echo $row_evaluate['sum'] ?></span>
                        <span class="label label-danger"> คะแนนเฉลี่ย <?php  echo $row_evaluate['avg'] ?></span>
                        <span class="label label-danger"> คิดเป็นเปอร์เซ็นต์ 
                        <?php  
                        $avg = ($row_evaluate['sum']/($row_evaluate['cnt']*5))*100;
                        echo $avg; 
                        ?> %</span></h3></center>
            <?php } ?>
          </div><!-- /.col-md-9 -->        
            <?php  }?>
        </div><!-- /.row -->
        </div><!-- /.box-header with-border -->
        </div><!-- /.box -->
        </section><!-- /.content -->
        
            
      </div><!-- /.content-wrapper -->
      
  
    <?php
        include 'footer.php';
    ?>

  
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
        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'questionaire_send.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                window.location.replace('thanks.php');
            });
            e.preventDefault();
            
            
  }
  e.preventDefault();
  });
   });
</script> 
    
  </body>
</html>
