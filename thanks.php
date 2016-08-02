<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบประเมินผลการปฏิบัติงานผู้ตรวจสอบ สำนักตรวจสอบ กปภ.</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    
    <!-- Smoke -->
    <link rel="stylesheet" href="bootstrap/css/smoke.min.css">


  </head>
  <body class="hold-transition login-page">
      <div class="row">
          <div class="col-md-12">
              <center><div class="alert alert-success" role="alert"><h2>ขอบคุณสำหรับการให้คะแนนประเมิน</h2></div>
          </div>              
      </div>
    


    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <script src="bootstrap/js/smoke.min.js"></script>
    
    <script>
        
       $(document).ready(function(){
           
        $("#userName").focus();
        
        $('#form1').on("submit",function(e) {
             if ($('#form1').smkValidate()) {
                 $.post("login_go.php", $("#form1").serialize() )
                                .done(function( data ) {
                                    if (data.status === "danger") {
                                        $.smkAlert({text: data.message , type: data.status});
                                        $('#form1').smkClear();
                                        $("#userName").focus();
                                    } else {
                                        $(location).attr('href', 'index.php');
                                    }
                                });                       
                  e.preventDefault();
             }
             e.preventDefault();
        });

      });
    </script>
  </body>
</html>