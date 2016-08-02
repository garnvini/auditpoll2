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
            รายงาน
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
            <li><a href="#">รายงาย</a></li>
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
            <div class="box-body">
              <!--Start creating your amazing application!-->
            <div class="container-fluid">  
                <div class="table table-striped">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>รายงาน</th>
                            <th>ไตรมาส</th>
                            <th>ปีงบประมาณ</th>
                            <th>PDF</th>
                            <th>Excel</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>รายงานหน่วยรับตรวจที่ยังไม่ได้ตอบแบบประเมิน</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="report01.php" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="excel01.php" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>รายงานหน่วยรับตรวจตอบแบบประเมิน</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>รายงานรายละเอียดการได้รับแจ้งเข้าตรวจ และการลงเวลาการปฏิบัติงาน</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>รายงานรายละเอียดความพึงพอใจการปฏิบัติงาน</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>รายงานรายละเอียดความพึงพอใจการปฏิบัติงาน - ด้านพฤติกรรมการปฏิบัติงาน</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>รายงานสรุปคะแนนผลการปฏิบัติงาน</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>รายงานระยะเวลาในการรับผลการตรวจสอบฉบับสมบูรณ์</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td>รายงานระยะเวลาในการเข้าตรวจ</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td>รายงานสรุปผลการประเมินการปฏิบัติงาน</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td>รายละเอียดข้อคิดเห็นจากหน่วยรับตรวจ</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>11.</td>
                            <td>รายละเอียดคะแนนแต่ละสาขา(excel)</td>
                            <td>
                                <select>
                                    <option>ไตรมาส 1</option>
                                    <option>ไตรมาส 2</option>
                                    <option>ไตรมาส 3</option>
                                    <option>ไตรมาส 4</option>
                                </select>
                            </td>
                            <td>
                                <select>
                                    <option>2559</option>
                                </select>
                            </td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-list-alt"></i></a></td>
                            <td><a href="" target="_blank"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                    </table>
                  </div>
              
            </div>
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
        
</script>   
 
       
  </body>
</html>
