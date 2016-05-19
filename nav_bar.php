          <!-- Content Navbar -->
    <div class="navbar md-whiteframe-z1 no-radius blue">
	
				  
<script src="../scripts/countItem.js"></script>
<script>
 $(document).ready(function(){
     setInterval(ajaxcall, 100);
 });
 function ajaxcall(){
     $.ajax({
         url: 'unattend_item_count.php',
         success: function(data) {
             $('#uattenderd_count').html(data[0]);
             $('#pend_count').html(data[1]);
         }
     });
 } 
</script>
		
      <!-- Open side - Naviation on mobile -->
      <a md-ink-ripple  data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
      <!-- / -->
      <!-- Page title - Bind to $state's title -->
       <div class=" navbar-item pull-left h3 " style="color:#475069;">
			<i class="fa fa-bell text-lg"></i>
			<b class="badge bg-warning up">
			<span id="uattenderd_count">0</span></b>
			<b class="badge bg-danger up" style="margin-left: 4px;">
			<span id="pend_count">0</span></b>
	   </div> 
      <!-- / -->
      <!-- Common tools -->
      <ul class="nav nav-sm navbar-tool pull-right">
       

        <li>
          <a md-ink-ripple href="../lockme.php">
          <i class="icon mdi-action-exit-to-app i-20"></i>
          <span>Logout</span>
          </a>
        </li>
       <!--  <li>
          <a md-ink-ripple data-toggle="modal" data-target="#user">
            <i class="mdi-social-person-outline i-24"></i>
          </a>
        </li> -->
       
      </ul>
      <div class="pull-right" ui-view="navbar@"></div>
      <!-- / -->
      <!-- Search form -->
      <div id="search" class="pos-abt w-full h-full blue hide">
        <div class="box">
          <div class="box-col w-56 text-center">
            <!-- hide search form -->
            <a md-ink-ripple class="navbar-item inline"  ui-toggle-class="show" target="#search"><i class="mdi-navigation-arrow-back i-24"></i></a>
          </div>
          <div class="box-col v-m">
            <!-- bind to app.search.content -->
            <input class="form-control input-lg no-bg no-border" placeholder="Search" ng-model="app.search.content">
          </div>
          <div class="box-col w-56 text-center">
            <a md-ink-ripple class="navbar-item inline"><i class="mdi-av-mic i-24"></i></a>
          </div>
        </div>
      </div>
      <!-- / -->
    </div>
    <!-- Content -->