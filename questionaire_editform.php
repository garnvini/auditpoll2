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
            แก้ไขข้อมูลแบบประเมิน
      </h1>
      <ol class="breadcrumb">
          <li><a href="questionaire.php"><i class="fa fa-dashboard"></i> ข้อมูลแบบประเมิน</a></li>
        <li class="active">แก้ไขข้อมูลแบบประเมิน</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">แก้ไขข้อมูลแบบประเมิน</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->

              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box">
            <div class="box-header with-border">
              <h4>หัวข้อการประเมินผู้ตรวจสอบ</h4>
              <?php    
                    $questionaireID = $_GET['questionaireID'];
                    $count = 1;                                   
                    $sql_select = "SELECT * FROM questionType ORDER BY questionTypeID";
                    $result = mysqli_query($link,$sql_select);
                            
                    while ($row = mysqli_fetch_assoc($result)) { ?>
              <hr>
              
              <h5><u><?php echo $row['questionTypeID'] . ". " . $row['questionTypeName']; ?></u></h5>
            <div id="toolbar">
                    <a href="question_addform.php?questionaireID=<?php echo $questionaireID; ?>" class="btn btn-info">เพิ่มคำถาม</a>
                    <button id="remove<?php echo $count ?>" class="btn btn-danger" disabled><i class="glyphicon glyphicon-trash"> ลบรายการ</i></button>
            </div><br>
              <table id = "table<?php echo $count ?>"                      
                     data-toggle="table" 
                     data-url="./json/questionaire2_json.php?questionTypeID=<?php echo $count ?>&questionaireID=<?php echo $questionaireID ?>" 
                     data-reorderable-rows="true">                       
                    <thead>


                        <tr>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-field="questionName">หัวข้อ</th>
                        <th data-field="questionMethodName">รูปแบบคำถาม</th>
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
        
        var $table101 = $('#table101');
        var $remove101 = $('#remove101');
        
        var $table102 = $('#table102');
        var $remove102 = $('#remove102');
        
        var $table103 = $('#table103');
        var $remove103 = $('#remove103');
        
        var $table104 = $('#table104');
        var $remove104 = $('#remove104');
        
        var $table105 = $('#table105');
        var $remove105 = $('#remove105');
        
        
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
        
        $(function(){
            $table101.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove101.prop('disabled', !$table101.bootstrapTable('getSelections').length);
        });
        
        $remove101.click(function(){
             $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                // Code here
                if (e) {
                  var ids = $.map($table101.bootstrapTable('getSelections'), function(row){
                      return row.attitudeQuestionID;
                  });
                  
                  //ajax
                  $.get("attitude_del.php", {"attitudeQuestionID[]": ids} )
                        .done(function(data){
                            $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                            $table101.bootstrapTable('refresh');
                        });   
                  $remove101.prop('disabled', true);
                  $table101.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
                }
              });
        });
        });
        
        $(function(){
            $table102.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove102.prop('disabled', !$table102.bootstrapTable('getSelections').length);
        });
        
        $remove102.click(function(){
             $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                // Code here
                if (e) {
                  var ids = $.map($table102.bootstrapTable('getSelections'), function(row){
                      return row.attitudeQuestionID;
                  });
                  
                  //ajax
                  $.get("attitude_del.php", {"attitudeQuestionID[]": ids} )
                        .done(function(data){
                            $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                            $table102.bootstrapTable('refresh');
                        });   
                  $remove102.prop('disabled', true);
                  $table102.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
                }
              });
        });
        });
        
        $(function(){
            $table103.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove103.prop('disabled', !$table103.bootstrapTable('getSelections').length);
        });
        
        $remove103.click(function(){
             $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                // Code here
                if (e) {
                  var ids = $.map($table103.bootstrapTable('getSelections'), function(row){
                      return row.attitudeQuestionID;
                  });
                  
                  //ajax
                  $.get("attitude_del.php", {"attitudeQuestionID[]": ids} )
                        .done(function(data){
                            $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                            $table103.bootstrapTable('refresh');
                        });   
                  $remove103.prop('disabled', true);
                  $table103.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
                }
              });
        });
        });
        
        $(function(){
            $table104.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove104.prop('disabled', !$table104.bootstrapTable('getSelections').length);
        });
        
        $remove104.click(function(){
             $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                // Code here
                if (e) {
                  var ids = $.map($table104.bootstrapTable('getSelections'), function(row){
                      return row.attitudeQuestionID;
                  });
                  
                  //ajax
                  $.get("attitude_del.php", {"attitudeQuestionID[]": ids} )
                        .done(function(data){
                            $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                            $table104.bootstrapTable('refresh');
                        });   
                  $remove104.prop('disabled', true);
                  $table104.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
                }
              });
        });
        });
        
        $(function(){
            $table105.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove105.prop('disabled', !$table105.bootstrapTable('getSelections').length);
        });
        
        $remove105.click(function(){
             $.smkConfirm({text:'แน่ใจว่าต้องการลบข้อมูล',accept:'ตกลง', cancel:'ยกเลิก'},function(e){
                // Code here
                if (e) {
                  var ids = $.map($table105.bootstrapTable('getSelections'), function(row){
                      return row.attitudeQuestionID;
                  });
                  
                  //ajax
                  $.get("attitude_del.php", {"attitudeQuestionID[]": ids} )
                        .done(function(data){
                            $.smkAlert({text: data.message ,type: data.status , position:'top-right' });
                            $table105.bootstrapTable('refresh');
                        });   
                  $remove105.prop('disabled', true);
                  $table105.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
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
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
