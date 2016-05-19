  <!-- aside -->
  <aside id="aside" class="app-aside modal fade " role="menu">
    <div class="left">
      <div class="box bg-white">
        <div class="navbar md-whiteframe-z1 no-radius blue">
            <!-- brand -->
            <a class="navbar-brand" href="test.php">
             
              <img src="../images/logo1.png" alt="WORK ACCESS">
           <!--    <span class="hidden-folded m-l inline">Ridemee</span> -->
            </a>
            <!-- / brand -->
        </div>
			
      <div class="box-row">
      <div class="box-cell scrollable hover">
		<div class="box-inner">
				  <div class="r-t pos-rlt waves-effect" style="background:url(../images/a0.jpg) center center; background-size:cover; width:240px;height:250px">
					<div class="p-lg bg-white-overlay text-center r-t">
					  <a href="update_profile.php" class="w-xs inline">
					  
					  <?php 
				$result = mysql_query("SELECT image FROM login WHERE id=$id"); 
				while($row = mysql_fetch_assoc($result))
					$patty = $row['image'];					
					$image = "../$patty";
				{ 
			     
				?>
						<img src="<?php echo "$image";?>" class="img-circle img-responsive imageMyOwn">
				<?php } ?>
				
					  </a>
					  <div class="m-b m-t-sm h9">
						<span class=""> <?php echo $screename;  ?>.</span>
					  </div>
					</div>
				  </div>
         <div id="nav">
			  
		
<style>

.imageMyOwn {
    cursor: pointer;
    transition: 0.3s;
}

.imageMyOwn:hover {opacity: 0.7;}

</style>
	  
			 <!-- menu nave utis-->
                <nav ui-nav>
                  <ul class="nav">
                 	<li>
                     <a md-ink-ripple href="test.php">
                        <i class="icon mdi-action-settings-input-svideo i-20"></i>
                        <span class="font-normal">Dashboard</span>
                      </a>
                    </li>
                 	<li>
                     <!--  <a md-ink-ripple href="cpanel.php">
                        <i class="icon mdi-content-create i-20"></i>
                        <span class="font-normal">Request Items</span>
                      </a>-->
                    </li>
                    <li>
                      <a md-ink-ripple href="request_items.php" >
						<i class="icon mdi-editor-format-list-bulleted i-20"></i>
                        <span class="font-normal">Manage Items</span>
                      </a>
                    </li>
                  </ul>
                </nav>
				<!-- /menu nave utis-->
				
              </div>
              <div id="account" class="hide m-v-xs">
                <nav>
                  <ul class="nav">
                    <li>
                      <a md-ink-ripple href="page.profile.html">
                        <i class="icon mdi-action-perm-contact-cal i-20"></i>
                        <span>My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple href="page.settings.html">
                        <i class="icon mdi-action-settings i-20"></i>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple href="../lockme.php">
                        <i class="icon mdi-action-exit-to-app i-20"></i>
                        <span>Logout</span>
                      </a>
                    </li>
                    <li class="m-v-sm b-b b"></li>
                    <li>
                      <div class="nav-item" ui-toggle-class="folded" target="#aside">
                        <label class="md-check">
                          <input type="checkbox">
                          <i class="purple no-icon"></i>
                          <span class="hidden-folded">Folded aside</span>
                        </label>
                      </div>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
       

        <nav>
          <ul class="nav b-t b">
            <li>
              <a href="http://jssmedia.net" target="_blank" md-ink-ripple>
                <i class="icon mdi-action-help i-20"></i>
                <span>Help &amp; Feedback</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </aside>
  <!-- / aside -->
