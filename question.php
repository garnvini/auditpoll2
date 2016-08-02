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
            หัวข้อการประเมิน
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li><a href="#">หัวข้อการประเมิน</a></li>
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
              <h4>หัวข้อการประเมินผู้ตรวจสอบ</h4>
              <?php    
                    $count = 1;   
                                
                    $sql_select = "SELECT * FROM questionType ORDER BY questionTypeID";
                    $result = mysqli_query($link,$sql_select);
                            
                    while ($row = mysqli_fetch_assoc($result)) { ?>
              <hr>
              
              <h5><u><?php echo $row['questionTypeID'] . ". " . $row['questionTypeName']; ?></u></h5>
            <div id="toolbar">
                    <a href="question_addform.php" class="btn btn-info">เพิ่มคำถาม</a>
                    <button id="remove<?php echo $count ?>" class="btn btn-danger" disabled><i class="glyphicon glyphicon-trash"> ลบรายการ</i></button>
            </div><br>
              <table id = "table<?php echo $count ?>" 
                     
                     data-toggle="table" 
                     data-url="./json/question_json.php?questionTypeID=<?php echo $count ?>" 
                     data-reorderable-rows="true">                       
                    <thead>

                        <tr>
                            <th data-field=""></th>
                            <th data-field="" data-halign="left"></th>
                            <th data-field="" data-halign="center">ปรับปรุง</th>
                            <th data-field="" data-halign="center">พอใช้</th>
                            <th data-field="" data-halign="center">ปานกลาง</th>
                            <th data-field="" data-halign="center">ดี</th>
                            <th data-field="" data-halign="center">ดีมาก</th>
                            <th data-field=""></th>
                        </tr>

                        <tr>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-field="questionName">ประเด็นวัดความพึงพอใจ</th>
                        <th data-field="operate" data-halign="center" data-align="center">1</th>
                        <th data-field="operate" data-halign="center" data-align="center">2</th>
                        <th data-field="operate" data-halign="center" data-align="center">3</th>
                        <th data-field="operate" data-halign="center" data-align="center">4</th>
                        <th data-field="operate" data-halign="center" data-align="center">5</th>
                        <th data-field="operate" data-align="center" data-events="operateEvents" data-formatter="operateFormatter">จัดการ</th>
                    </tr>
                </thead>
            </table>
            <br>
            <?php  
                $count++;
                } 
            ?>
            
            
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
        var $table1 = $('#table1');
        var $remove1 = $('#remove1');
        
        var $table2 = $('#table2');
        var $remove2 = $('#remove2');
        
        var $table3 = $('#table3');
        var $remove3 = $('#remove3');
        
        var $table4 = $('#table4');
        var $remove4 = $('#remove4');
        
        var $table5 = $('#table5');
        var $remove5 = $('#remove5');
        
        
        $(function(){
            $table1.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove1.prop('disabled', !$table1.bootstrapTable('getSelections').length);
        });
        
        $remove1.click(function(){
             $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                // Code here
                if (e) {
                  var ids = $.map($table1.bootstrapTable('getSelections'), function(row){
                      return row.questionID;
                  });
                  
                  //ajax
                  $.get("question_del.php", {"questionID[]": ids} )
                        .done(function(data){
                            $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                            $table1.bootstrapTable('refresh');
                        });   
                  $remove1.prop('disabled', true);
                  $table1.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
                }
              });
        });
        });
        
        $(function(){
        $table2.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove2.prop('disabled', !$table2.bootstrapTable('getSelections').length);
        });
        
        $remove2.click(function(){
                 $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                    // Code here
                    if (e) {
                      var ids = $.map($table2.bootstrapTable('getSelections'), function(row){
                          return row.questionID;
                      });

                      //ajax
                      $.get("question_del.php", {"questionID[]": ids} )
                            .done(function(data){
                                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                                $table2.bootstrapTable('refresh');
                            });   
                      $remove2.prop('disabled', true);
                      $table2.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
                    }
                  });
            });
        });
        
        $(function(){
        $table3.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove3.prop('disabled', !$table3.bootstrapTable('getSelections').length);
        });
        
        $remove3.click(function(){
                 $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                    // Code here
                    if (e) {
                      var ids = $.map($table3.bootstrapTable('getSelections'), function(row){
                          return row.questionID;
                      });

                      //ajax
                      $.get("question_del.php", {"questionID[]": ids} )
                            .done(function(data){
                                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                                $table3.bootstrapTable('refresh');
                            });   
                      $remove3.prop('disabled', true);
                      $table3.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
                    }
                  });
            });
        });
        
        $(function(){
        $table4.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove4.prop('disabled', !$table4.bootstrapTable('getSelections').length);
        });
        
        $remove4.click(function(){
                 $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                    // Code here
                    if (e) {
                      var ids = $.map($table4.bootstrapTable('getSelections'), function(row){
                          return row.questionID;
                      });

                      //ajax
                      $.get("question_del.php", {"questionID[]": ids} )
                            .done(function(data){
                                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                                $table4.bootstrapTable('refresh');
                            });   
                      $remove4.prop('disabled', true);
                      $table4.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
                    }
                  });
            });
        });
        
        $(function(){
        $table5.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove5.prop('disabled', !$table5.bootstrapTable('getSelections').length);
        });
        
        $remove5.click(function(){
                 $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                    // Code here
                    if (e) {
                      var ids = $.map($table5.bootstrapTable('getSelections'), function(row){
                          return row.questionID;
                      });

                      //ajax
                      $.get("question_del.php", {"questionID[]": ids} )
                            .done(function(data){
                                $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                                $table5.bootstrapTable('refresh');
                            });   
                      $remove5.prop('disabled', true);
                      $table5.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
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
            window.location.replace('question_editform.php?questionID=' + [row.questionID]);
        },

    };
     </script>     
 
       
  </body>
</html>
