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
              <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li><a href="#">ผลการประเมินทีมผู้ตรวจสอบ</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
            <div class="box-header with-border">
            <?php    
                // แยกปี
                $count_team = 1;
                $sql_fy = "SELECT DISTINCT process.fiscalYear FROM process";
                $result_fy = mysqli_query($link,$sql_fy); 
                while ($row_fy = mysqli_fetch_assoc($result_fy)) { 
                    $fy = $row_fy['fiscalYear'];
                    
                    echo '<h3>ผลการประเมินการปฏิบัติงาน ปีงบประมาณ ' . $fy . '</h3>';
                    echo '<div class="row">';
                    // แยกทีม
                    $sql_team = "SELECT * FROM team WHERE team.userID = '$s_userID'";
                    $result_team = mysqli_query($link,$sql_team); 
                    while ($row_team = mysqli_fetch_assoc($result_team)) {                         
                        $teamID = $row_team['teamID'];
                        $head = $row_team['head']; 
                        $member1 = $row_team['member1']; 
                        $member2 = $row_team['member2'];
                        $member3 = $row_team['member3'];
                        echo '<div class="col-md-12">';
                        echo '<br><div class="alert alert-info" role="alert"><h4>ทีมที่ ' . $count_team . '</h4></div>';
                        $sql_head = "SELECT auditorPre, auditorName, "
                                . "auditorLastname, auditorID, auditorPicture, "
                                . "auditorPosition, auditorOption "
                                . "FROM auditor WHERE auditorID = '$head'";
                        $result_head = mysqli_query($link,$sql_head);
                        while ($row_head = mysqli_fetch_assoc($result_head)) { 
                            echo '<div class="col-md-3" align="center">';
                            echo '<p><img src="assets/img/' . $row_head['auditorPicture'] . '" class="img img-bordered" width="200"></p>';
                            echo '<p>' . $row_head['auditorPre'].$row_head['auditorName']." ".$row_head['auditorLastname'] . '</p>';
                            echo '</div>';
                        }     
                        
                        $sql_member1 = "SELECT auditorPre, auditorName, "
                                . "auditorLastname, auditorID, auditorPicture, "
                                . "auditorPosition, auditorOption "
                                . "FROM auditor WHERE auditorID = '$member1'";
                        $result_member1 = mysqli_query($link,$sql_member1);
                        while ($row_member1 = mysqli_fetch_assoc($result_member1)) { 
                            echo '<div class="col-md-3" align="center">';
                            echo '<p><img src="assets/img/' . $row_member1['auditorPicture'] . '" class="img img-bordered" width="200"></p>';
                            echo '<p>' . $row_member1['auditorPre'].$row_member1['auditorName']." ".$row_member1['auditorLastname'] . '</p>';
                            echo '</div>';
                        }  
                        
                        $sql_member2 = "SELECT auditorPre, auditorName, "
                                . "auditorLastname, auditorID, auditorPicture, "
                                . "auditorPosition, auditorOption "
                                . "FROM auditor WHERE auditorID = '$member2'";
                        $result_member2 = mysqli_query($link,$sql_member2);
                        while ($row_member2 = mysqli_fetch_assoc($result_member2)) { 
                            echo '<div class="col-md-3" align="center">';
                            echo '<p><img src="assets/img/' . $row_member2['auditorPicture'] . '" class="img img-bordered" width="200"></p>';
                            echo '<p>' . $row_member2['auditorPre'].$row_member2['auditorName']." ".$row_member2['auditorLastname'] . '</p>';
                            echo '</div>';
                        }  
                        
                        $sql_member3 = "SELECT auditorPre, auditorName, "
                                . "auditorLastname, auditorID, auditorPicture, "
                                . "auditorPosition, auditorOption "
                                . "FROM auditor WHERE auditorID = '$member3'";
                        $result_member3 = mysqli_query($link,$sql_member3);
                        while ($row_member3 = mysqli_fetch_assoc($result_member3)) { 
                            echo '<div class="col-md-3" align="center">';
                            echo '<p><img src="assets/img/' . $row_member3['auditorPicture'] . '" class="img img-bordered" width="200"></p>';
                            echo '<p>' . $row_member3['auditorPre'].$row_member3['auditorName']." ".$row_member3['auditorLastname'] . '</p>';
                            echo '</div>';
                        } 
                                
                        echo '</div><div class = "col-md-12"><hr></div>'; //col-md-12
                        $count_questionType = 1;
                        echo '<div class = "col-md-12">';
                        echo '<table class="table table-bordered"><tr><th>ด้าน</th>';
                        echo '<th style="text-align:center">คะแนนที่ได้</th>';
                        echo '<th style="text-align:center">คะแนนเต็ม</th>';
                        echo '<th style="text-align:center">เฉลี่ย (เต็ม 5)</th>';
                        echo '<th style="text-align:center">เปอร์เซ็นต์</th>';
                        echo '</tr>';
                        // แยกด้าน
                        $sql_questionType = "SELECT * FROM questionType WHERE questionaireID = 2";
                        $result_questionType = mysqli_query($link,$sql_questionType);   
                        while ($row_questionType = mysqli_fetch_assoc($result_questionType)) {  
                            // คะแนน    
                            $questionTypeID = $row_questionType['questionTypeID'];
                            $sql_score = "SELECT SUM(scoreteam.scorePoint) AS sum, "
                                    . "AVG(scoreteam.scorePoint) AS avg, "
                                    . "COUNT(DISTINCT question.questionID) AS count_question, "
                                    . "COUNT(DISTINCT process.processID) AS count_process "
                                    . "FROM scoreteam , question , questiontype , process , team "
                                    . "WHERE scoreteam.questionID = question.questionID "
                                    . "AND question.questionTypeID = questiontype.questionTypeID "
                                    . "AND question.questionTypeID = '$questionTypeID' "
                                    . "AND scoreteam.processID = process.processID "
                                    . "AND process.fiscalYear = '$fy' "
                                    . "AND process.teamID = team.teamID "
                                    . "AND team.teamID = '$teamID'";
                            $result_score = mysqli_query($link,$sql_score);   
                            
                            while ($row_score = mysqli_fetch_assoc($result_score)) { 
                                $total = 5 * $row_score['count_question'] * $row_score['count_process'];
                                $avg = $row_score['sum'] / $row_score['count_question'];
                                $percent = ($avg / 5) * 100;
                                echo '<tr><td>' . $count_questionType . '. ' .$row_questionType['questionTypeName'] . '</td>';
                                echo '<td align = "center">' . $row_score['sum'] . '</td>';
                                echo '<td align = "center">' . $total . '</td>';
                                echo '<td align = "center">' . $avg . '</td>';
                                echo '<td align = "center">' . $percent . '%</td>';
                                echo '</tr>';
                                $count_questionType ++;
                            } 
                            
                        } 
                        echo '</table>';
                        echo '</div>'; // col-md-6, row 
                        $count_team++;
                    }
                    
                    echo '</div>';
                }
                
            ?>
                
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
