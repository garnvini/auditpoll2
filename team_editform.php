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
            แก้ไขข้อมูลทีมผู้ตรวจสอบ
      </h1>
      <ol class="breadcrumb">
          <li><a href="team.php"><i class="fa fa-dashboard"></i> ข้อมูลทีมผู้ตรวจสอบ</a></li>
        <li class="active">แก้ไขข้อมูลทีมผู้ตรวจสอบ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
        <div class="box box-default">
          
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <form id="form1" action="process_update.php" method="post" class="form"  enctype="multipart/form-data" novalidate>
                        <?php    
                        $teamID = $_GET['teamID'];             
                        $sql_select = "SELECT * FROM team WHERE teamID = '$teamID'";
                        $result = mysqli_query($link,$sql_select);
                            
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                            <input name="teamID" value = "<?php echo $row['teamID']; ?>" hidden>
                            
                            <legend>ผู้ตรวจสอบ</legend>
                            
                            <div class="form-group">                            
                            <label for="head">หัวหน้าทีม</label><br/>
                            <select style="width: 100%" class="select2" name="head" id="head" disabled>
                            <?php         
                            $head = $row['head']; 
                            $sql_select2 = "SELECT auditor.auditorPre, auditor.auditorName, "
                                . "auditor.auditorLastname, auditor.auditorID "
                                . "FROM auditor WHERE auditor.auditorID = '$head'";
                            $result2 = mysqli_query($link,$sql_select2);
                            while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                                <option value="<?php echo $head; ?>"><?php echo $row2['auditorPre'].$row2['auditorName']." ".$row2['auditorLastname']; ?></option>
                            <?php  }  ?>
                            </select>
                            </div>
                            <div class="form-group">                            
                            <label for="member1">สมาชิกในทีม</label><br/>
                            <select style="width: 100%" class="select2" name="member1" required data-smk-msg="กรุณาเลือกสมาชิกในทีม">
                            <?php         
                            $member1 = $row['member1']; 
                            $sql_select3 = "SELECT auditor.auditorPre, auditor.auditorName, "
                                . "auditor.auditorLastname, auditor.auditorID "
                                . "FROM auditor WHERE auditor.auditorID = '$member1'";
                            $result3 = mysqli_query($link,$sql_select3);
                            while ($row3 = mysqli_fetch_assoc($result3)) { 
                                echo '<option value="'.$row['member1'].'">'.$row3['auditorPre'].$row3['auditorName']." ".$row3['auditorLastname']. '</option>';
                                }                                
                                    $sql_1 = "SELECT * FROM auditor";
                                    $result_1 = mysqli_query($link, $sql_1);
                                    while ($row_1 = mysqli_fetch_assoc($result_1)){
                                        echo '<option value="'.$row_1['auditorID'].'">'.$row_1['auditorPre'].$row_1['auditorName']." ".$row_1['auditorLastname'].'</option>';       
                                    }
                                ?>    
                                
                            </select>
                            </div>
                            <div class="form-group">                            
                            <label for="member2">สมาชิกในทีม</label><br/>
                            <select style="width: 100%" class="select2" name="member2" id="member2" required data-smk-msg="กรุณาเลือกสมาชิกในทีม">
                            <?php         
                            $member2 = $row['member2']; 
                            $sql_select4 = "SELECT auditor.auditorPre, auditor.auditorName, "
                                . "auditor.auditorLastname, auditor.auditorID "
                                . "FROM auditor WHERE auditor.auditorID = '$member2'";
                            $result4 = mysqli_query($link,$sql_select4);
                            while ($row4 = mysqli_fetch_assoc($result4)) { 
                                echo '<option value="'.$row['member2'].'">'.$row4['auditorPre'].$row4['auditorName']." ".$row4['auditorLastname'].'</option>';
                            }  
                            $sql_2 = "SELECT * FROM auditor WHERE auditorID <> $member1";
                                    $result_2 = mysqli_query($link, $sql_2);
                                    while ($row_2 = mysqli_fetch_assoc($result_2)){
                                        echo '<option value="'.$row_2['auditorID'].'">'.$row_2['auditorPre'].$row_2['auditorName']." ".$row_2['auditorLastname'].'</option>';       
                                    }
                            ?> 
                                
                                
                            </select>
                            </div>
                            <div class="form-group">                            
                            <label for="member3">สมาชิกในทีม</label><br/>
                            <select style="width: 100%" class="select2" name="member3" id="member3" required data-smk-msg="กรุณาเลือกสมาชิกในทีม">
                            <?php         
                            $member3 = $row['member3']; 
                            $sql_select5 = "SELECT auditor.auditorPre, auditor.auditorName, "
                                . "auditor.auditorLastname, auditor.auditorID "
                                . "FROM auditor WHERE auditor.auditorID = '$member3'";
                            $result5 = mysqli_query($link,$sql_select5);
                            while ($row5 = mysqli_fetch_assoc($result5)) { 
                                echo '<option value="'.$row['member3'].'">'.$row5['auditorPre'].$row5['auditorName']." ".$row5['auditorLastname'].'</option>';
                            }  
                            $sql_3 = "SELECT * FROM auditor WHERE auditorID <> $member1 AND auditorID <> $member2";
                                    $result_3 = mysqli_query($link, $sql_3);
                                    while ($row_3 = mysqli_fetch_assoc($result_3)){
                                        echo '<option value="'.$row_3['auditorID'].'">'.$row_3['auditorPre'].$row_3['auditorName']." ".$row_3['auditorLastname'].'</option>';       
                                    }
                            ?> 
                            </select>
                            </div>

                            
                            <?php  }  ?>
                            <button id="btn1" type="submit" class="btn btn-default">บันทึก</button>
                        </form>
                    </div>
                    
                </div>
              
            </div><!-- /.box-body -->
            <div class="box-footer">
                
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
<script src="./dist/js/select2.min.js"></script>

<script>
       
    $(document).ready(function(){
        $(".select2").select2();
        
        
        $('#form1').on("submit",function(e) {
        if ($('#form1').smkValidate()) {
            $.ajax({
                url: 'team_update.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json'
            }).done(function(data){
                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                window.location.replace('team.php');
            });
            e.preventDefault();
  }
  e.preventDefault();
  });
   });     
</script>
</body>
</html>
