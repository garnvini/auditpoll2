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
          <h1>ผลการประเมินทีมผู้ตรวจสอบ</h1>
          <ol class="breadcrumb">
              <li><a href="questionaire_result.php"><i class="fa fa-dashboard"></i> การประเมินทีม</a></li>
            <li><a href="#">ผลการประเมินทีมผู้ตรวจสอบ</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
            <div class="box-header with-border">
            <div class="box-tools pull-right">
                  <div class="box-tools pull-right">
                      <?php    
                        $processID = filter_input(INPUT_GET, 'processID');
                        ?>
                      <a href="./pdf/questionaire_result_pdf.php&processID=<?php echo $processID ?>" target="_blank"><span class="label label-primary">ส่งออก PDF</span>
              </a>
               
            </div><!-- /.box-tools -->    
            </div>
            <?php    
            $questionaireID = filter_input(INPUT_GET, 'questionaireID');
            $sql_process = "SELECT process.processName, team.head, "
                    . "team.member1, team.member2, team.member3, "
                    . "process.beginDate, process.finishDate, process.`quarter`, "
                    . "process.fiscalYear, scoreteam.submitDate, scoreteam.editDate, "
                    . "scoreteam.editBy, job.jobName, division.divisionName, "
                    . "party.partyName, pwaBranch.pwaBranchName "
                    . "FROM process , scoreteam , job , division , "
                    . "party , team , auditor , pwaBranch "
                    . "WHERE process.processID = scoreteam.processID "
                    . "AND process.processID = '$processID' "
                    . "AND process.teamID = team.teamID "
                    . "AND team.head = auditor.auditorID "
                    . "AND auditor.jobID = job.jobID "
                    . "AND job.divisionID = division.divisionID "
                    . "AND division.partyID = party.partyID "
                    . "AND process.pwaBranchID = pwaBranch.pwaBranchID "
                    . "GROUP BY process.processID";
            $result_process = mysqli_query($link,$sql_process);   
            while ($row_process = mysqli_fetch_assoc($result_process)) { ?> 
            <div class="row">
                <div class="col-md-6">
                    <h4>รายละเอียดหน่วยรับตรวจ</h4>
                    <p><b>หน่วยรับตรวจ</b> : <?php echo $row_process['pwaBranchName']; ?></p>
                    <p><b>ตรวจสอบกระบวนการ : </b><?php echo $row_process['processName']; ?></p>
                    <p><b>ระยะเวลาเข้าตรวจ ตั้งแต่วันที่</b> : <?php echo $row_process['beginDate']; ?> <b>ถึงวันที่</b> : <?php echo $row_process['finishDate']; ?></p>                      
                    <hr>
                </div><!-- /.col-md-12 --> 
            
                <div class="col-md-6">
                    <h4>รายละเอียดผู้ตรวจสอบ</h4>
                    <p><b>งาน</b> : <?php echo $row_process['jobName']; ?> </p>
                    <p><b>กอง</b> : <?php echo $row_process['divisionName']; ?> </p>
                    <p><b>ฝ่าย</b> : <?php echo $row_process['partyName']; ?></p>
                    <hr>
                </div><!-- /.col-md-12 --> 
            </div><!-- /.row --> 
<!------------------------------------- รายละเอียดผู้ตรวจสอบ -------------------------------------------------->

        <?php         
            $head = $row_process['head'];                                   
            $member1 = $row_process['member1'];       
            $member2 = $row_process['member2'];   
            $member3 = $row_process['member3'];
            }
        ?>

<!------------------------------------- คะแนนประเมินทีม -------------------------------------------------->                         
        <div class="row">
          <div class="col-md-12">
              <div class="alert alert-success" role="alert"><h4>การประเมินทีมผู้ตรวจสอบ</h4></div>
                <table id = "table" 
                     data-toggle="table" 
                     data-url="./json/scoreteam_json.php?processID=<?php echo $processID; ?>&questionaireID=<?php echo $questionaireID; ?>">                       
                    <thead>
                        <tr>
                        <th data-align="center" data-field="num">ลำดับที่</th> 
                        <th data-field="questionName">คำถาม</th>
                        <th data-align="center"  data-field="scorePoint">คะแนน</th>
                    </tr>
                    </thead>
                </table>
              </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
         <div class="row">
            <div class="col-md-12">
                <center>
                    <?php 
                    $sql_evaluate = "SELECT SUM(scoreteam.scorePoint) "
                            . "AS 'sum', AVG(scoreteam.scorePoint) AS 'avg', "
                            . "COUNT(*) AS 'cnt' "
                            . "FROM  scoreteam ,  question "
                            . "WHERE  scoreteam.questionID = question.questionID "
                            . "AND scoreteam.questionaireID = question.questionaireID "
                            . "AND scoreteam.processID = '$processID' "
                            . "AND scoreteam.questionaireID = '$questionaireID'";
                    $result_evaluate = mysqli_query($link,$sql_evaluate);   
                while ($row_evaluate = mysqli_fetch_assoc($result_evaluate)) { ?>                     
                <h3><span class="label label-danger"> คะแนนรวม <?php  echo $row_evaluate['sum'] ?></span>
                <span class="label label-danger"> คะแนนเฉลี่ย <?php  echo $row_evaluate['avg'] ?></span>
                <span class="label label-danger"> คิดเป็นเปอร์เซ็นต์
                        <?php  
                        $avg = ($row_evaluate['sum']/($row_evaluate['cnt']*5))*100;
                        echo $avg; 
                        ?> %</span></h3>
                <?php } ?>
                </center>
                </div><!-- /.col-md-12 -->
                
          </div><!-- /.row -->  
          <hr>
<!------------------------------------- หัวหน้าทีม -------------------------------------------------->    
        <div class="row">
            <div class="col-md-12">
            <div class="alert alert-success" role="alert"><h4>การประเมินผู้ตรวจสอบรายบุคคล</h4></div>
            </div>
        </div>
        <div class="row">
            <?php    
            $sql_auditor = "SELECT auditor.auditorCode, auditor.auditorPre, "
                    . "auditor.auditorName, auditor.auditorLastname, "
                    . "auditor.auditorPicture, auditor.auditorPosition, "
                    . "auditor.auditorLevel, auditor.auditorOption, "
                    . "process.processName, job.jobName, process.beginDate, process.finishDate, "
                    . "division.divisionName, party.partyName, pwabranch.pwaBranchName "
                    . "FROM scoreperson , auditor , process , "
                    . "job , division , party , pwabranch "
                    . "WHERE scoreperson.auditorID = '$head' "
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
              <table id = "table" 
                     data-toggle="table" 
                     data-url="./json/scoreperson_result_detail_json.php?auditorID=<?php echo $head; ?>&processID=<?php echo $processID; ?>&questionaireID=<?php echo $questionaireID; ?>">                       
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
                            . "WHERE scoreperson.auditorID = '$head' "
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
        <hr>
<!------------------------------------- ผู้ตรวจสอบ 1 -------------------------------------------------->
        <div class="row">
            <?php    
            $sql_auditor = "SELECT auditor.auditorCode, auditor.auditorPre, "
                    . "auditor.auditorName, auditor.auditorLastname, "
                    . "auditor.auditorPicture, auditor.auditorPosition, "
                    . "auditor.auditorLevel, auditor.auditorOption, "
                    . "process.processName, job.jobName, process.beginDate, process.finishDate, "
                    . "division.divisionName, party.partyName, pwabranch.pwaBranchName "
                    . "FROM scoreperson , auditor , process , "
                    . "job , division , party , pwabranch "
                    . "WHERE scoreperson.auditorID = '$member1' "
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
              <table id = "table" 
                     data-toggle="table" 
                     data-url="./json/scoreperson_result_detail_json.php?auditorID=<?php echo $member1; ?>&processID=<?php echo $processID; ?>&questionaireID=<?php echo $questionaireID; ?>">                       
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
                            . "WHERE scoreperson.auditorID = '$member1' "
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
        <hr>
<!------------------------------------- ผู้ตรวจสอบ 2 -------------------------------------------------->
        <div class="row">
            <?php    
            $sql_auditor = "SELECT auditor.auditorCode, auditor.auditorPre, "
                    . "auditor.auditorName, auditor.auditorLastname, "
                    . "auditor.auditorPicture, auditor.auditorPosition, "
                    . "auditor.auditorLevel, auditor.auditorOption, "
                    . "process.processName, job.jobName, process.beginDate, process.finishDate, "
                    . "division.divisionName, party.partyName, pwabranch.pwaBranchName "
                    . "FROM scoreperson , auditor , process , "
                    . "job , division , party , pwabranch "
                    . "WHERE scoreperson.auditorID = '$member2' "
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
              <table id = "table" 
                     data-toggle="table" 
                     data-url="./json/scoreperson_result_detail_json.php?auditorID=<?php echo $member2; ?>&processID=<?php echo $processID; ?>&questionaireID=<?php echo $questionaireID; ?>">                       
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
                            . "WHERE scoreperson.auditorID = '$member2' "
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
        <hr>
<!------------------------------------- ผู้ตรวจสอบ 3 -------------------------------------------------->
        <div class="row">
            <?php    
            $sql_auditor = "SELECT auditor.auditorCode, auditor.auditorPre, "
                    . "auditor.auditorName, auditor.auditorLastname, "
                    . "auditor.auditorPicture, auditor.auditorPosition, "
                    . "auditor.auditorLevel, auditor.auditorOption, "
                    . "process.processName, job.jobName, process.beginDate, process.finishDate, "
                    . "division.divisionName, party.partyName, pwabranch.pwaBranchName "
                    . "FROM scoreperson , auditor , process , "
                    . "job , division , party , pwabranch "
                    . "WHERE scoreperson.auditorID = '$member3' "
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
              <table id = "table" 
                     data-toggle="table" 
                     data-url="./json/scoreperson_result_detail_json.php?auditorID=<?php echo $member3; ?>&processID=<?php echo $processID; ?>&questionaireID=<?php echo $questionaireID; ?>">                       
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
                    $sql_evaluate = "SELECT SUM(scoreperson.scorePoint) AS 'sum', "
                            . "AVG(scoreperson.scorePoint) AS 'avg', "
                            . "COUNT(*) AS 'cnt' "
                            . "FROM scoreperson "
                            . "WHERE scoreperson.auditorID = '$member3' "
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
        <hr>

            
            
            
            
        </div><!-- /.box-header with-border -->
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
