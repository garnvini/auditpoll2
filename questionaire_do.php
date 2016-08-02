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
      <?php    
            $processID = $_GET['processID'];
            $questionaireID = 2;
            $sql_process = "SELECT * FROM process, team "
                    . "WHERE process.teamID = team.teamID "
                    . "AND processID = '$processID'";
            $result_process = mysqli_query($link,$sql_process);   
            while ($row_process = mysqli_fetch_assoc($result_process)) { ?> 
      
      <div class="content-wrapper">
          
        <section class="content-header">
          <h1>
          <?php    
            $sql_questionaire = "SELECT questionaireName FROM questionaire "
                    . "WHERE questionaireID = '$questionaireID'";
            $result_questionaire = mysqli_query($link,$sql_questionaire);   
            while ($row_questionaire = mysqli_fetch_assoc($result_questionaire)) {     
            echo $row_questionaire['questionaireName'];
            }
            ?>
            <small><?php echo $row_process['processName']; ?></small>
          </h1>
        </section>
        <form id="form1" action="questionaire_send.php" method="post" class="form">
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="alert alert-success" role="alert"><h4>การประเมินทีมผู้ตรวจสอบ</h4></div>
              <input id="questionaireID" name="questionaireID" value = "<?php echo $questionaireID; ?>" hidden>
              <input id="processID" name="processID" value = "<?php echo $row_process['processID']; ?>" hidden>
            </div><!-- box-header with-border -->
            <div class="box-body">  
              <table class="table table-bordered">
                      <tr class="success">
                        <th>ประเด็นวัดความพึงพอใจ</th>
                        <th width="80px" style="text-align:center">ปรับปรุง</th>
                        <th width="80px" style="text-align:center">พอใช้</th>
                        <th width="80px" style="text-align:center">ปานกลาง</th>
                        <th width="80px" style="text-align:center">ดี</th>
                        <th width="80px" style="text-align:center">ดีมาก</th>
                      </tr>
                        <?php    
                          $countteamques = 1;                          
                          $countsubanswer = 0;
                          $sql_questionType = "SELECT * FROM questionType WHERE questionaireID = '$questionaireID'";
                          $result_questionType = mysqli_query($link,$sql_questionType);   
                          while ($row_questionType = mysqli_fetch_assoc($result_questionType)) { 
                              $questionTypeNo = $row_questionType['questionTypeID'];
                              ?> 
                        <tr class="active">
                            <td><b><?php echo $row_questionType['questionTypeName']; ?></b></td>
                            <td style="text-align:center">1</td>
                            <td style="text-align:center">2</td>
                            <td style="text-align:center">3</td>
                            <td style="text-align:center">4</td>
                            <td style="text-align:center">5</td>
                        </tr>
                  
                        <?php    
                                       
                          $sql_question2 = "SELECT * FROM question WHERE questionTypeID = '$questionTypeNo' AND questionaireID = '$questionaireID' ORDER BY questionID";
                          $result_question2 = mysqli_query($link,$sql_question2);   
                          while ($row2 = mysqli_fetch_assoc($result_question2)) { ?> 
                        <tr>
                            <td><?php echo $countteamques . ". " . $row2['questionName']; ?>
                                <input name="questionteamID[<?php echo $countsubanswer; ?>]" value="<?php echo $row2['questionID']; ?>" hidden>
                            </td>
                            <td style="text-align:center"><input type="radio" name="teamanswer[<?php echo $countsubanswer; ?>]" value="1" required></td>
                            <td style="text-align:center"><input type="radio" name="teamanswer[<?php echo $countsubanswer; ?>]" value="2" required></td>
                            <td style="text-align:center"><input type="radio" name="teamanswer[<?php echo $countsubanswer; ?>]" value="3" required></td>
                            <td style="text-align:center"><input type="radio" name="teamanswer[<?php echo $countsubanswer; ?>]" value="4" required></td>
                            <td style="text-align:center"><input type="radio" name="teamanswer[<?php echo $countsubanswer; ?>]" value="5" required></td>
                        <?php 
                            $countteamques++; 
                            $countsubanswer++;
                        ?>
                        </tr>
                          <?php } 
                                $questionTypeNo++;
                          ?>
                <?php } ?>
              </table>
              <hr>
            </div><!-- box-body -->
            
            <div class="box-header with-border">
              <div class="alert alert-success" role="alert"><h4>การประเมินทีมผู้ตรวจสอบรายบุคคล</h4></div>
             </div><!-- box-header with-border -->
            
               <?php    
                $countMember = 1;
                $countsubanswer = 0;
                $head = $row_process['head'];
                $member1 = $row_process['member1'];
                $member2 = $row_process['member2'];
                $member3 = $row_process['member3'];
                $sql_auditor = "SELECT * FROM auditor WHERE auditorID = '$head' "
                        . "OR auditorID = '$member1' OR auditorID = '$member2' OR auditorID = '$member3'";
                $result_auditor = mysqli_query($link,$sql_auditor);   
                while ($row_auditor = mysqli_fetch_assoc($result_auditor)) { ?>
              
              <hr> 
              <div class="box-body">
              <div class="row">
                  <div class="col-md-3">
                      <p><b><?php echo $countMember . ". " ?>ชื่อ-สกุล ผู้ตรวจสอบ</b></p>
                      <p><input name="auditorID<?php echo $countMember ?>" size="3" value="<?php echo $row_auditor['auditorID']; ?>" hidden>
                          <?php echo $row_auditor['auditorPre'] . $row_auditor['auditorName'] . " " . $row_auditor['auditorLastname']; ?></p>
                      <p><img src="./assets/img/<?php echo $row_auditor['auditorPicture']; ?>" width="228px" class="img img-bordered"></p>
                  </div> <!-- col-md-3 -->
                  <div class="col-md-9">
                      <p><b>การประเมินผลรายบุคคล</b></p>
                      <p>วันที่ปฏิบัติงาน <?php echo "&nbsp;&nbsp;".$row_process['beginDate']."&nbsp;&nbsp;"; ?> ถึงวันที่ <?php echo "&nbsp;&nbsp;".$row_process['finishDate']; ?></p>
                      <table class="table table-bordered">
                          <tr>
                              <th rowspan="2">พฤติกรรมการปฏิบัติงาน</th>
                              <th width="80px" style="text-align:center">ปรับปรุง</th>
                              <th width="80px" style="text-align:center">พอใช้</th>
                              <th width="80px" style="text-align:center">ปานกลาง</th>
                              <th width="80px" style="text-align:center">ดี</th>
                              <th width="80px" style="text-align:center">ดีมาก</th>
                          </tr>
                          <tr>
                              <th style="text-align:center">1</th>
                              <th style="text-align:center">2</th>
                              <th style="text-align:center">3</th>
                              <th style="text-align:center">4</th>
                              <th style="text-align:center">5</th>
                          </tr>
                          
                          <?php    
                              $countindques = 1;                              
                              $sql_question3 = "SELECT * FROM question WHERE questionaireID = 3 ORDER BY questionID";
                              $result_question3 = mysqli_query($link,$sql_question3);   
                              while ($row3 = mysqli_fetch_assoc($result_question3)) { ?> 
                        <tr>
                            <td><?php echo $countindques . ". " . $row3['questionName'];
                                ?>
                                <input name="questionID<?php echo $countMember; ?>[]" value="<?php echo $row3['questionID']; ?>" hidden>
                                <?php 
                                $countindques++;                                
                                ?>                                
                            </td>            
                            <td style="text-align:center"><input type="radio" name="indanswer<?php echo $countMember; ?>[<?php echo $countsubanswer; ?>]" value="1"></td>
                            <td style="text-align:center"><input type="radio" name="indanswer<?php echo $countMember; ?>[<?php echo $countsubanswer; ?>]" value="2"></td>
                            <td style="text-align:center"><input type="radio" name="indanswer<?php echo $countMember; ?>[<?php echo $countsubanswer; ?>]" value="3"></td>
                            <td style="text-align:center"><input type="radio" name="indanswer<?php echo $countMember; ?>[<?php echo $countsubanswer; ?>]" value="4"></td>
                            <td style="text-align:center"><input type="radio" name="indanswer<?php echo $countMember; ?>[<?php echo $countsubanswer; ?>]" value="5"></td>
                        <?php $countsubanswer++; ?>
                        </tr>
                          <?php } 
                          $countMember++;
                          $countsubanswer = 0;
                          ?>
                      </table>
                      </div><!-- col-md-9 -->
              </div><!-- row -->
                      <?php } 
                      $questionTypeNo++;
                      ?>
              <hr>
                <button id="btn1" type="submit" class="btn btn-default">บันทึก</button>
            </div><!-- box-body -->  
            </div><!-- /.box -->
            
        </section><!-- /.content -->
        </form>
             
      </div><!-- /.content-wrapper -->
      
    <?php } ?>
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
    
    <script>
    $(document).ready(function(){    
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
                //window.location.replace('thanks.php');
            });
            e.preventDefault();
            }
  e.preventDefault();
  });
   });
</script> 
    
  </body>
</html>
