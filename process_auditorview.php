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
            การออกตรวจ
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li><a href="#">กระบวนการ</a></li>
          </ol>
            
        </section>

        <!-- Main content -->
        <section class="content">
            <a href="process_addform.php" class="btn btn-success">เพิ่มการออกตรวจ</a><br><br>
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ข้อมูลการออกตรวจ</h3>
              <div class="box-tools pull-right">
                  <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <?php
                    $sql = "SELECT COUNT(*) AS COUNTPROCESS FROM process";
                    $result = mysqli_query($link, $sql);
                    $count_process = mysqli_fetch_assoc($result);
                ?>
                <span class="label label-primary">ทั้งหมด <?= $count_process['COUNTPROCESS']; ?> รายการ</span>
              </div><!-- /.box-tools -->
                </div>
            </div>
            <div class="box-body">
              <table id = "table" 
                     data-toggle="table" 
                     data-url="./json/process_auditor_json.php?userID=<?php echo $s_userID; ?>" 
                     data-filter-control="true" 
                     data-reorderable-rows="true" 
                     data-search="true" 
                     data-pagination="true" 
                     data-detail-view="true"
                     data-detail-formatter="detailFormatter" 
                     data-page-list="[10, 25, 50, 100, ALL]"
                     >                       
                    <thead>
                        <tr>
                        <th data-field="pwaBranchName">หน่วยรับตรวจ</th>
                        <th data-field="processName">กระบวนการ</th>
                        <th data-field="beginDate">ตั้งแต่วันที่</th>
                        <th data-field="finishDate">ถึงวันที่</th>
                        <th data-field="processStatusName">สถานะ</th>
                        <th data-field="operate" data-align="center" data-events="operateEvents" data-formatter="operateFormatter">แก้ไข</th>
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
