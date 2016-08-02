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
            ผู้ตรวจสอบ
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li><a href="#">ผู้ตรวจสอบ</a></li>
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
            
            <a href="auditor_addform.php" class="btn btn-success">เพิ่มผู้ตรวจสอบ</a><br><br>
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ข้อมูลผู้ตรวจสอบ</h3>
              <div class="box-tools pull-right">
                  <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <?php
                    $sql = "SELECT COUNT(*) AS COUNTAUDITOR FROM auditor";
                    $result = mysqli_query($link, $sql);
                    $count_auditor = mysqli_fetch_assoc($result);
                ?>
                <span class="label label-primary">ทั้งหมด <?= $count_auditor['COUNTAUDITOR']; ?> รายการ</span>
              </div><!-- /.box-tools -->
                </div>
            </div>
            <div class="box-body">
              <!--Start creating your amazing application!-->
              <div class="toolbar">
                    <button id="remove" class="btn btn-danger" disabled><i class="glyphicon glyphicon-trash"> ลบรายการ</i></button>
             
              </div>
              <table id = "table" 
                     data-toggle="table" 
                     data-url="./json/auditor_json.php" 
                     data-filter-control="true" 
                     data-reorderable-rows="true" 
                     data-search="true" 
                     data-pagination="true" 
                     data-detail-view="true"
                     data-detail-formatter="detailFormatter" 
                     data-page-list="[10, 25, 50, 100, ALL]">                       
                    <thead>
                        <tr>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-width="80" data-field="ชื่อไฟล์ภาพ" data-formatter="imageFormatter">รูป</th>
                        <th data-field="รหัสพนักงาน">รหัส</th>
                        <th data-field="ชื่อ">ชื่อ</th>
                        <th data-field="นามสกุล">นามสกุล</th>
                        <th data-field="ตำแหน่ง">ตำแหน่ง</th>
                        <th data-field="ชั้น">ชั้น</th>
                        <th data-field="กอง">กอง</th>
                        <th data-field="operate" data-align="center" data-events="operateEvents" data-formatter="operateFormatter">จัดการ</th>
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
        var $remove = $('#remove');
        
        function detailFormatter(index, row) {
        var html = [];
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
    }

        function imageFormatter(value, row) {
        if (value === ''){ 
            return '<img class="img-thumbnail" src="./assets/img/default-50x50.gif" width="60" />';
        } else
            return '<img class="img-thumbnail" src="./assets/img/'+value+'" width="60" />';
        }
         
        // Delete

        $(function(){
        $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
        });
        
        $remove.click(function(){
             $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                // Code here
                if (e) {
                  var ids = $.map($table.bootstrapTable('getSelections'), function(row){
                      return row.auditorID;
                  });
                  
                  //ajax
                  $.get("auditor_del.php", {"auditorID[]": ids} )
                        .done(function(data){
                            $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                            $table.bootstrapTable('refresh');
                        });   
                  $remove.prop('disabled', true);
                  $table.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
                }
              });
        });
    });

   function operateFormatter(value, row, index) {
        return [
            '<a class="edit" href="javascript:void(0)" title="แก้ไข">',
            '<i class="glyphicon glyphicon-pencil"></i>',
            '</a>  '
        ].join('');
    }
    
    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            window.location.replace('auditor_editform.php?auditorID=' + [row.auditorID]);
        },

    };
</script>   
 
       
  </body>
</html>
