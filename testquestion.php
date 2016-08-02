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
            $processID = 45;
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
          
          <form id="form1" action="testsend.php" method="post" class="form">
              
            
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
                        
                        
                        
                        <tr>
                            <td>fwefsdkfjsdfwefdsf
                              </td>
                            <td style="text-align:center"><input type="radio" name="teamanswer" value="1" required></td>
                            <td style="text-align:center"><input type="radio" name="teamanswer" value="2" required></td>
                            <td style="text-align:center"><input type="radio" name="teamanswer" value="3" required></td>
                            <td style="text-align:center"><input type="radio" name="teamanswer" value="4" required></td>
                            <td style="text-align:center"><input type="radio" name="teamanswer" value="5" required></td>
                        
                        </tr>
                         
              </table>
              <hr>
            </div><!-- box-body -->
              
              
                <input type="text" class="form-control" >
                <button id="btn1" type="submit" class="btn btn-default">บันทึก</button>
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
                url: 'testsend.php',
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
