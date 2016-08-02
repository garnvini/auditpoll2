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
            ทีมผู้ตรวจสอบ
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li><a href="#">ทีมผู้ตรวจสอบ</a></li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">
          <a href="team_addform.php" class="btn btn-success">เพิ่มทีมผู้ตรวจสอบ</a><br><br>
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ข้อมูลทีมผู้ตรวจสอบ</h3>
              <div class="box-tools pull-right">
                </div>
            </div>
              
            <div class="box-body">               
                <?php    
                $sql_team = "SELECT teamID, head, member1, member2, member3 FROM team WHERE userID = '$s_userID'";
                $result_team = mysqli_query($link,$sql_team);   
                while ($row_team = mysqli_fetch_assoc($result_team))                         
                        { 
                        $teamID = $row_team['teamID'];
                    ?>
              
              <div class="row">
                <div class="col-md-12"> 
                    <div class="box-tools pull-right">
                    <a href="team_editform.php?teamID=<?php echo $teamID ?>" class="btn btn-adn">แก้ไขทีมผู้ตรวจสอบ</a>
                    </div>
                    <?php   
                            $sql_job = "SELECT job.jobName, division.divisionName, party.partyName "
                                    . "FROM `user` , job , division , party "
                                    . "WHERE `user`.jobID = job.jobID "
                                    . "AND job.divisionID = division.divisionID "
                                    . "AND division.partyID = party.partyID "
                                    . "AND `user`.userID = '$s_userID'";
                            $result_job = mysqli_query($link,$sql_job);
                            while ($row_job = mysqli_fetch_assoc($result_job)) { ?>                                  
                            <p><?php echo $row_job['jobName']. " " .$row_job['divisionName']. " " .$row_job['partyName']; ?></p>
                            <br>
                                <?php  }  ?>
                </div>                    
              </div>
                
              <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <?php        
                            
                            $head = $row_team['head']; 
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
                        </div><!-- /.caption -->
                    </div><!-- /.thumbnail -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption">                                      
                            <?php         
                            $member1 = $row_team['member1']; 
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
                        </div><!-- /.caption -->
                    </div><!-- /.thumbnail -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <?php         
                            $member2 = $row_team['member2']; 
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
                        </div><!-- /.caption -->
                    </div><!-- /.thumbnail -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                                      <?php         
                                        $member3 = $row_team['member3']; 
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
                        </div><!-- /.caption -->
                    </div><!-- /.thumbnail -->                    
                </div><!-- /.col-md-3 -->   
            </div><!-- /.row -->   
              
            <?php  echo "<hr>";
                    }  ?>
              </div><!-- /.box-body -->
            
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
    
    <script>
        
        var $table = $('#table');
        
        function detailFormatter(index, row) {
        var html = [];
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
        }   


   function operateFormatter(value, row, index) {
        return [
            '<a class="edit" href="javascript:void(0)" title="แก้ไข">',
            '<i class="glyphicon glyphicon-pencil"></i>',
            '</a>  '
        ].join('');
    }
    
    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            window.location.replace('process_editform.php?processID=' + [row.processID]);
        },

    };
    
    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];
        if (index % 2 === 0 && index / 2 < classes.length) {
            return {
                classes: classes[index / 2]
            };
        }
        return {};
        }
</script>   
 
       
  </body>
</html>
