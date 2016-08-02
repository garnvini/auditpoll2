      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <?php 
              if($s_userTypeID  == "1") { 
                include 'leftside_admin.php';
              }
              else if($s_userTypeID  == "2") { 
                include 'leftside_head.php';} 
              else if($s_userTypeID  == "3" || $s_userTypeID  == "7" ) { 
                include 'leftside_administrator.php';
              } 
              else if($s_userTypeID  == "5") { 
                include 'leftside_devsupport.php';
              }
              else if($s_userTypeID  == "4") { 
                include 'leftside_pwaBranch.php';
              } 
              else if($s_userTypeID  == "6") { 
                include 'leftside_auditor.php';
              } 
              ?>
            
            
            
            </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
