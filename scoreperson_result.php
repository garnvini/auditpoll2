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
            คะแนนประเมินรายบุคคล
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li><a href="#">คะแนนประเมินรายบุคคล</a></li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">
           <?php  
            //if ($s_admin != 'admin'){
           //     echo '<div class="text-danger">คุณไม่มีสิทธิ์ใช้งานหน้านี้</div>';
                
           // }
           // else {
        ?>

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ข้อมูลคะแนนประเมินรายบุคคล</h3>           
            </div>
            <div class="box-body">
              <!--Start creating your amazing application!-->
              <table id = "table" 
                     data-toggle="table" 
                     data-url="./json/scoreperson_result_json.php" 
                     data-filter-control="true" 
                     data-reorderable-rows="true" 
                     data-search="true" 
                     data-pagination="true" 
                     data-detail-view="true"
                     data-detail-formatter="detailFormatter" 
                     data-page-list="[10, 25, 50, 100, ALL]">                       
                    <thead>
                        <tr>
                        <th data-field="pwaBranchName">หน่วยรับตรวจ</th>    
                        <th data-field="processName" data-width="250">กระบวนการ</th>
                        <th data-field="auditorCode">รหัส</th>
                        <th data-field="auditorName">ชื่อ</th>
                        <th data-field="auditorLastname">สกุล</th>                        
                        <th data-field="fiscalYear" data-width="30" data-filter-control="select" data-align="center" >ปีงบประมาณ</th>
                        <th data-field="quarter" data-width="50" data-filter-control="select" data-align="center" >ไตรมาส</th>
                        <th data-field="operate" data-align="center" data-events="operateEvents" data-formatter="operateFormatter">รายละเอียด</th>
                    </tr>
                </thead>
            </table>
              
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
    <script src="./bootstraptable/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
    
    <script>
        
        var $table = $('#table');
        
        function detailFormatter(index, row) {
        var html = [];
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
        }
        
        function imageFormatter(value, row) {
        if (value === ''){ 
            return '<img class="img-thumbnail" src="./assets/img/default-50x50.gif" width="70" />';
        } else
            return '<img class="img-thumbnail" src="./assets/img/'+value+'" width="60" />';
        }

  
        

        function operateFormatter(value, row, index) {
             return [
                 '<a class="edit" href="javascript:void(0)" title="แก้ไข">',
                 '<i class="glyphicon glyphicon-eye-open"></i>',
                 '</a>  '
             ].join('');
         }
    
    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            window.location.replace('scoreperson_result_detail.php?auditorID=' 
                    + [row.auditorID] + '&processID=' + [row.processID] 
                    + '&questionaireID=' + [row.questionaireID]);
        },

    };
</script>   
 
       
  </body>
</html>
