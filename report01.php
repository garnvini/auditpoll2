<?php
 include './mpdf/mpdf.php';
 include './db/database.php';
 ob_start();
?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <div class="text-left">
        <h1>รายงานหน่วยรับตรวจที่ยังไม่ได้ตอบแบบประเมิน</h1>
        </div>
        

            <div class="box-body">
            <?php
                $sql = "SELECT pwabranch.pwaBranchName, process.processName, "
                        . "process.beginDate, process.finishDate FROM process , "
                        . "pwabranch WHERE process.processStatusID = 2 "
                        . "AND process.pwaBranchID = pwabranch.pwaBranchID";
                $result = mysqli_query($link,$sql);
            ?>
              <table class="table table-bordered">
                  <tr>
                      <th>หน่วยรับตรวจ</th>
                      <th>กระบวนการ</th>
                      <th>วันที่เข้าตรวจ</th>
                      <th>วันเสร็จสิ้นการตรวจ</th>
                  </tr>
                  <?php  while($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                      <td>
                          <?php echo $row['pwaBranchName']; ?>
                      </td>
                      <td>
                          <?php echo $row['processName']; ?>
                      </td>
                      <td>
                          <?php echo $row['beginDate']; ?>
                      </td>
                      <td>
                          <?php echo $row['finishDate']; ?>
                      </td>
                  </tr>
                  <?php  }  ?>
                      
                  </tr>
              </table>
            </div><!-- /.box-body -->
            
        </div><!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  
  </div>
  
  
        
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        
        $mpdf = new mPDF('utf-8');
        //$mpdf = new mPDF('utf-8','A4-L');
        //$mpdf = new mPDF('utf-8', array(100,40));
        
        $mpdf->margin_header = 9;
        $mpdf->SetHeader('ระบบประเมินผลการปฏิบัติงานผู้ตรวจสอบ สำนักตรวจสอบ การประปาส่วนภูมิภาค | ออกรายงานเมื่อ'.date('d/m/Y H:i:s'));
        $mpdf->margin_footer = 9;
        $mpdf->SetFooter('หน้าที่ {PAGENO}');
        
        $stylesheet = file_get_contents('./bootstrap/css/printpdf.css');
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,2);
        $mpdf->output();
        
        exit;
        ?>
    </body>        
</html>