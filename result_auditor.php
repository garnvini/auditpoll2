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
              <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li><a href="#">ผลการประเมินผู้ตรวจสอบรายบุคคล</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
            <div class="box-header with-border">
            <div class="row">
            <?php    
                // แยกปี
                $sql_fy = "SELECT DISTINCT process.fiscalYear FROM process";
                $result_fy = mysqli_query($link,$sql_fy); 
                while ($row_fy = mysqli_fetch_assoc($result_fy)) { 
                    $fy = $row_fy['fiscalYear'];
                    echo '<div class="col-md-12">';
                    echo '<h3>ผลการประเมินการปฏิบัติงาน ปีงบประมาณ ' . $fy . '</h3>';
                    
                    $count_team = 1;
                    // แยกสมาชิกในทีม
                    $sql_team = "SELECT * FROM team WHERE team.userID = '$s_userID'";
                    $result_team = mysqli_query($link,$sql_team); 
                    while ($row_team = mysqli_fetch_assoc($result_team)) {
                        $head = $row_team['head'];
                        $member1 = $row_team['member1'];
                        $member2 = $row_team['member2'];
                        $member3 = $row_team['member3'];
                        
///////////////////////////////// หัวหน้า ///////////////////////////////////
                        $sql_head = "SELECT auditorPre, auditorName, "
                                . "auditorLastname, auditorID, auditorPicture, "
                                . "auditorPosition, auditorOption "
                                . "FROM auditor WHERE auditorID = '$head'";
                        echo '<br><div class="alert alert-info" role="alert"><h4>ทีมที่ ' . $count_team . '</h4></div>';
                        $result_head = mysqli_query($link,$sql_head);
                        while ($row_head = mysqli_fetch_assoc($result_head)) {
                            echo '<div class="row"><hr>';
                            echo '<div class="col-md-3">';
                            echo '<p><img src="assets/img/' . (empty($row_head['auditorPicture'])? 'default.jpg' : $row_head['auditorPicture']) . '" class="img img-bordered" width="250"></p>';
                            echo '</div>'; //col-md-3
                            echo '<div class="col-md-9">';
                            echo '<h4>' . $row_head['auditorPre'].$row_head['auditorName']." ".$row_head['auditorLastname'] . '</h4>';
                            echo '<p>' . $row_head['auditorPosition'] . " " . $row_head['auditorLevel'] . " " . $row_head['auditorOption'];
                            echo $row_head['jobName'] . "  " . $row_head['divisionName'] . "  " . $row_head['partyName'] . '<p>';
                            
                            echo '<table class="table table-bordered"><tr><th>ด้าน</th>';
                            echo '<th style="text-align:center">คะแนนที่ได้</th>';
                            echo '<th style="text-align:center">คะแนนเต็ม</th>';
                            echo '<th style="text-align:center">เฉลี่ย (เต็ม 5)</th>';
                            echo '<th style="text-align:center">เปอร์เซ็นต์</th>';
                            echo '</tr>';
                            
                            $sql_question = "SELECT question.questionID "
                                    . "FROM question WHERE question.questionaireID = 3";
                            $result_question = mysqli_query($link,$sql_question); 
                            $count_question = 1;    
                            while ($row_question = mysqli_fetch_assoc($result_question)) {                                 
                                $questionID = $row_question['questionID'];
                                $sql_score = "SELECT question.questionName, "
                                        . "sum(scoreperson.scorePoint) AS sum , "
                                        . "count(DISTINCT process.processID) AS count "
                                        . "FROM scoreperson , question , process "
                                        . "WHERE scoreperson.questionID = question.questionID "
                                        . "AND scoreperson.processID = process.processID "
                                        . "AND question.questionaireID = 3 "
                                        . "AND scoreperson.auditorID = '$head' "
                                        . "AND question.questionID = '$questionID' "
                                        . "ORDER BY question.questionID";
                                $result_score = mysqli_query($link,$sql_score); 
                                while ($row_score = mysqli_fetch_assoc($result_score)) {
                                    if ($row_score['count'] != 0){
                                        $sum = $row_score['sum'];
                                        $count_process = $row_score['count'] * 5;
                                        $avg = $row_score['sum'] /  $row_score['count'];
                                        $percent = ($avg / 5) * 100;
                                    } 
                                    else {
                                        $count_process = 0;
                                        $avg = 0;
                                        $percent = 0;
                                        $sum = 0;
                                    }
                                        
                                    echo '<tr><td>' . $count_question . '. ' .$row_score['questionName'] . '</td>';
                                    echo '<td align = "center">' . $row_score['sum'] . '</td>';
                                    echo '<td align = "center">' . $count_process . '</td>';
                                    echo '<td align = "center">' . $avg . '</td>';
                                    echo '<td align = "center">' . $percent . '%</td>';
                                    echo '</tr>';
                                    $count_question++;
                                }
                               
                                    
                            }
                            echo '</table>';
                            echo '</div>'; //col-md-9
                            echo '</div>'; //row
                        }
                        
                        
                        
                        
                        ////////////////////////สมาชิก 1///////////////////////////////
                        
                        $sql_head = "SELECT auditorPre, auditorName, "
                                . "auditorLastname, auditorID, auditorPicture, "
                                . "auditorPosition, auditorOption "
                                . "FROM auditor WHERE auditorID = '$member1'";
                        $result_head = mysqli_query($link,$sql_head);
                        while ($row_head = mysqli_fetch_assoc($result_head)) {
                            echo '<div class="row"><hr>';
                            echo '<div class="col-md-3">';
                            echo '<p><img src="assets/img/' . (empty($row_head['auditorPicture'])? 'default.jpg' : $row_head['auditorPicture']) . '" class="img img-bordered" width="250"></p>';
                            echo '</div>'; //col-md-3
                            echo '<div class="col-md-9">';
                            echo '<h4>' . $row_head['auditorPre'].$row_head['auditorName']." ".$row_head['auditorLastname'] . '</h4>';
                            echo '<p>' . $row_head['auditorPosition'] . " " . $row_head['auditorLevel'] . " " . $row_head['auditorOption'];
                            echo $row_head['jobName'] . "  " . $row_head['divisionName'] . "  " . $row_head['partyName'] . '<p>';
                            
                            echo '<table class="table table-bordered"><tr><th>ด้าน</th>';
                            echo '<th style="text-align:center">คะแนนที่ได้</th>';
                            echo '<th style="text-align:center">คะแนนเต็ม</th>';
                            echo '<th style="text-align:center">เฉลี่ย (เต็ม 5)</th>';
                            echo '<th style="text-align:center">เปอร์เซ็นต์</th>';
                            echo '</tr>';
                             
                            $sql_question = "SELECT question.questionID "
                                    . "FROM question WHERE question.questionaireID = 3";
                            $result_question = mysqli_query($link,$sql_question); 
                            $count_question = 1;      
                            while ($row_question = mysqli_fetch_assoc($result_question)) { 
                                
                                $questionID = $row_question['questionID'];
                                $sql_score = "SELECT question.questionName, "
                                        . "sum(scoreperson.scorePoint) AS sum , "
                                        . "count(DISTINCT process.processID) AS count "
                                        . "FROM scoreperson , question , process "
                                        . "WHERE scoreperson.questionID = question.questionID "
                                        . "AND scoreperson.processID = process.processID "
                                        . "AND question.questionaireID = 3 "
                                        . "AND scoreperson.auditorID = '$member1' "
                                        . "AND question.questionID = '$questionID' "
                                        . "ORDER BY question.questionID";
                                $result_score = mysqli_query($link,$sql_score); 
                                while ($row_score = mysqli_fetch_assoc($result_score)) {
                                    if ($row_score['count'] != 0){
                                        $sum = $row_score['sum'];
                                        $count_process = $row_score['count'] * 5;
                                        $avg = $row_score['sum'] /  $row_score['count'];
                                        $percent = ($avg / 5) * 100;
                                    } 
                                    else {
                                        $count_process = 0;
                                        $avg = 0;
                                        $percent = 0;
                                        $sum = 0;
                                    }
                                        
                                    echo '<tr><td>' . $count_question . '. ' . $row_score['questionName'] . '</td>';
                                    echo '<td align = "center">' . $row_score['sum'] . '</td>';
                                    echo '<td align = "center">' . $count_process . '</td>';
                                    echo '<td align = "center">' . $avg . '</td>';
                                    echo '<td align = "center">' . $percent . '%</td>';
                                    echo '</tr>';
                                    $count_question++;  
                                }
                               
                            }
                            echo '</table>';
                            echo '</div>'; //col-md-9
                            echo '</div>'; //row 
                        }
                        
                        
                        ///////////////////////////สมาชิก 2////////////////////////////
                        
                        $sql_head = "SELECT auditorPre, auditorName, "
                                . "auditorLastname, auditorID, auditorPicture, "
                                . "auditorPosition, auditorOption "
                                . "FROM auditor WHERE auditorID = '$member2'";
                        $result_head = mysqli_query($link,$sql_head);
                        while ($row_head = mysqli_fetch_assoc($result_head)) {
                            echo '<div class="row"><hr>';
                            echo '<div class="col-md-3">';
                            echo '<p><img src="assets/img/' . (empty($row_head['auditorPicture'])? 'default.jpg' : $row_head['auditorPicture']) . '" class="img img-bordered" width="250"></p>';
                            echo '</div>'; //col-md-3
                            echo '<div class="col-md-9">';
                            echo '<h4>' . $row_head['auditorPre'].$row_head['auditorName']." ".$row_head['auditorLastname'] . '</h4>';
                            echo '<p>' . $row_head['auditorPosition'] . " " . $row_head['auditorLevel'] . " " . $row_head['auditorOption'];
                            echo $row_head['jobName'] . "  " . $row_head['divisionName'] . "  " . $row_head['partyName'] . '<p>';
                            
                            echo '<table class="table table-bordered"><tr><th>ด้าน</th>';
                            echo '<th style="text-align:center">คะแนนที่ได้</th>';
                            echo '<th style="text-align:center">คะแนนเต็ม</th>';
                            echo '<th style="text-align:center">เฉลี่ย (เต็ม 5)</th>';
                            echo '<th style="text-align:center">เปอร์เซ็นต์</th>';
                            echo '</tr>';
                            
                            $sql_question = "SELECT question.questionID "
                                    . "FROM question WHERE question.questionaireID = 3";
                            $result_question = mysqli_query($link,$sql_question); 
                            $count_question = 1;      
                            while ($row_question = mysqli_fetch_assoc($result_question)) { 
                                
                                $questionID = $row_question['questionID'];
                                $sql_score = "SELECT question.questionName, "
                                        . "sum(scoreperson.scorePoint) AS sum , "
                                        . "count(DISTINCT process.processID) AS count "
                                        . "FROM scoreperson , question , process "
                                        . "WHERE scoreperson.questionID = question.questionID "
                                        . "AND scoreperson.processID = process.processID "
                                        . "AND question.questionaireID = 3 "
                                        . "AND scoreperson.auditorID = '$member2' "
                                        . "AND question.questionID = '$questionID' "
                                        . "ORDER BY question.questionID";
                                $result_score = mysqli_query($link,$sql_score); 
                                while ($row_score = mysqli_fetch_assoc($result_score)) {
                                    if ($row_score['count'] != 0){
                                        $sum = $row_score['sum'];
                                        $count_process = $row_score['count'] * 5;
                                        $avg = $row_score['sum'] /  $row_score['count'];
                                        $percent = ($avg / 5) * 100;
                                    } 
                                    else {
                                        $count_process = 0;
                                        $avg = 0;
                                        $percent = 0;
                                        $sum = 0;
                                    }
                                        
                                    echo '<tr><td>' . $count_question . '. ' . $row_score['questionName'] . '</td>';
                                    echo '<td align = "center">' . $row_score['sum'] . '</td>';
                                    echo '<td align = "center">' . $count_process . '</td>';
                                    echo '<td align = "center">' . $avg . '</td>';
                                    echo '<td align = "center">' . $percent . '%</td>';
                                    echo '</tr>';
                                    $count_question++;  
                                }
                               
                            }
                            echo '</table>';
                            echo '</div>'; //col-md-9
                            echo '</div>'; //row 
                        }
                        
                        
                        
                        //////////////////////////สมาชิก 3/////////////////////////////
                        
                        $sql_head = "SELECT auditorPre, auditorName, "
                                . "auditorLastname, auditorID, auditorPicture, "
                                . "auditorPosition, auditorOption "
                                . "FROM auditor WHERE auditorID = '$member3'";
                        $result_head = mysqli_query($link,$sql_head);
                        while ($row_head = mysqli_fetch_assoc($result_head)) {
                            echo '<div class="row"><hr>';
                            echo '<div class="col-md-3">';
                            echo '<p><img src="assets/img/' . (empty($row_head['auditorPicture'])? 'default.jpg' : $row_head['auditorPicture']) . '" class="img img-bordered" width="250"></p>';
                            echo '</div>'; //col-md-3
                            echo '<div class="col-md-9">';
                            echo '<h4>' . $row_head['auditorPre'].$row_head['auditorName']." ".$row_head['auditorLastname'] . '</h4>';
                            echo '<p>' . $row_head['auditorPosition'] . " " . $row_head['auditorLevel'] . " " . $row_head['auditorOption'];
                            echo $row_head['jobName'] . "  " . $row_head['divisionName'] . "  " . $row_head['partyName'] . '<p>';
                            
                            echo '<table class="table table-bordered"><tr><th>ด้าน</th>';
                            echo '<th style="text-align:center">คะแนนที่ได้</th>';
                            echo '<th style="text-align:center">คะแนนเต็ม</th>';
                            echo '<th style="text-align:center">เฉลี่ย (เต็ม 5)</th>';
                            echo '<th style="text-align:center">เปอร์เซ็นต์</th>';
                            echo '</tr>';
                            
                            $sql_question = "SELECT question.questionID "
                                    . "FROM question WHERE question.questionaireID = 3";
                            $result_question = mysqli_query($link,$sql_question); 
                            $count_question = 1;      
                            while ($row_question = mysqli_fetch_assoc($result_question)) { 
                                
                                $questionID = $row_question['questionID'];
                                $sql_score = "SELECT question.questionName, "
                                        . "sum(scoreperson.scorePoint) AS sum , "
                                        . "count(DISTINCT process.processID) AS count "
                                        . "FROM scoreperson , question , process "
                                        . "WHERE scoreperson.questionID = question.questionID "
                                        . "AND scoreperson.processID = process.processID "
                                        . "AND question.questionaireID = 3 "
                                        . "AND scoreperson.auditorID = '$member3' "
                                        . "AND question.questionID = '$questionID' "
                                        . "ORDER BY question.questionID";
                                $result_score = mysqli_query($link,$sql_score); 
                                while ($row_score = mysqli_fetch_assoc($result_score)) {
                                    if ($row_score['count'] != 0){
                                        $sum = $row_score['sum'];
                                        $count_process = $row_score['count'] * 5;
                                        $avg = $row_score['sum'] /  $row_score['count'];
                                        $percent = ($avg / 5) * 100;
                                    } 
                                    else {
                                        $count_process = 0;
                                        $avg = 0;
                                        $percent = 0;
                                        $sum = 0;
                                    }
                                        
                                    echo '<tr><td>' . $count_question . '. ' . $row_score['questionName'] . '</td>';
                                    echo '<td align = "center">' . $row_score['sum'] . '</td>';
                                    echo '<td align = "center">' . $count_process . '</td>';
                                    echo '<td align = "center">' . $avg . '</td>';
                                    echo '<td align = "center">' . $percent . '%</td>';
                                    echo '</tr>';
                                    $count_question++;
                                }
                               
                            }
                            echo '</table>';
                            echo '</div>'; //col-md-9
                            echo '</div>'; //row 
                            $count_question++;  
                        }
                        
                        $count_team++;
                    }
                        
                        
                    echo '</div>'; //col-md-12
                }
                
            ?>
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
    <script src="./Highcharts-4.2.5/js/highcharts.js"></script>
   
    <script>            

    </script> 
    
  </body>
</html>
