<header class="main-header">
        <!-- Logo -->
        <a href="./index.php" class="logo">
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <span class="logo-lg"><a href="./index.php"><img src="./assets/pics/logo2.png"></a></span>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo "ยินดีต้อนรับคุณ  "." ".$s_userFullname." ". $s_userLastname; ?> </a></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="./assets/users/<?php echo (empty($s_userPicture)? 'default.jpg' : $s_userPicture)?>" class="img img-rounded">
                    <p>
                      <?php echo $s_userFullname . " " . $s_userLastname; ?>
                      <small><?php echo $s_userPosition; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-12 text-center">
                      <a href="#">สิทธิ์การใช้งาน : <?php echo $s_userTypeName ?></a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="index.php" class="btn btn-default btn-flat">ข้อมูลส่วนตัว</a>
                    </div>
                    <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">ออกจากระบบ</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>