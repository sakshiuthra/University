<!DOCTYPE html>
   <?php 
include('../includes/connection.php');
include('../includes/common.php');
include("../includes/head.php");
include("../includes/leftbar.php");
include("../plugins/jQuery/common.js");
?> 
<?php
if($_GET['val'] == "del")
{	
			    $data			=	$_POST;		
            $where			=	" fabric_range_id =". $_GET['fabric_range_id'];		
				$tbl			=   "fabric_range_tbl";				
				$insert_id		=	delete_data($tbl, $where);
				$qry = mysql_query($insert_id);
				if($insert_id > 0)
				{
					?>
                     <script type="text/javascript">
					 alert("Fabric Range Deleted Succssfully");
					window.location.href= "general/fabric_range.php";
						 </script>
                    <?php     
					} }
								 ?> 
<?php

	$time= time();		
if(isset($_POST['edit']))
{	     

				 $data			=	$_POST;
				$fabric_range    =   implode(",", $_POST['fabric_range']);
				$data['fabric_range']     =   $fabric_range;
				$fields				=	 array("fabric_range");
				$static				=	" , fabric_range_addedon='". $time ."', fabric_range_status='1'";
                $where				=	" fabric_range_id='1'";
				$tbl				=   "fabric_range_tbl";  
				$insert_id			=	update($tbl, $fields, $static, $data, $where);
				$qry = mysql_query($insert_id);
				if($insert_id > 0)
				{
					?>
                    <script type="text/javascript">
						 alert("Fabric Range Updated Succssfully");
						 </script>
                    <?php     
					}  }
								 ?>  
  

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Fabric Range
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Special Category</a></li>
        <li class="active">Fabric By Range</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div>         
            <!-- /.box-header -->
            <div>             
              <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Fabric Range</h3>
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="box-body">
			    <?php 
	if(isset($_GET['fabric_range_id']) && isset($_GET['val']))
	{
	 if($_GET['val']  == "edit")
	 {
	  	
				$data				=	$_GET['fabric_range_id'];			
				$static				=	"fabric_range_id";				
				$tbl				=   "fabric_range_tbl";
				$insert_id			=	selectpardata($tbl,$static,$data);		
				extract($insert_id);	
	
	?>
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Multiple Fabric</label>
                <div class="col-sm-10">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select Fabric" style="width: 100%;" id="multi_drop" name="fabric_range[]">
                    <option>Select Fabric</option>
                    <?php 
                    $tbl = "third_category_tbl";
                    $insert_id = selectdata($tbl); 
                    foreach($insert_id as $ins)
                    {
                    ?>
                    <option value="<?php echo $ins['third_cat_id']; ?>"
                    <?php
                    $fabrics = explode(",", $fabric_range);
                    foreach($fabrics as $fab)
                    {
                        if($fab == $ins['third_cat_id'])
                        {
                    
                    ?>
                    selected = "selected"
                    <?php }} ?>
                    ><?php echo $ins['third_cat_name']; ?></option>
                    <?php } ?>
                </select>
                </div>
              </div>
				 </div>
              <!-- /.box-body -->
              <div class="box-footer">                
                <button type="submit" class="btn btn-info pull-right" name="<?php echo $_GET['val']; ?>">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
			<?php } } else { ?>
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Fabric Range</label>
                <div class="col-sm-10">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select Fabrics" style="width: 100%;" id="multi_drop" name="fabric_range[]">
                    <option>Select Fabrics</option>
                    <?php 
                    $tbl = "third_category_tbl";
                    $insert_id = selectdata($tbl); 
                    foreach($insert_id as $ins)
                    {
                    ?>
                    <option value="<?php echo $ins['third_cat_id']; ?>"
                    ><?php echo $ins['third_cat_name']; ?></option>
                    <?php } ?>
                </select>
                </div>
              </div>
				 </div>
              <!-- /.box-body -->
              <div class="box-footer">                
                <button type="submit" class="btn btn-info pull-right" name="edit">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
			<?php } ?>
      </div>
      <!-- /.box -->
      <!-- /.row -->
    </section>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Fabric by Range</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped example1">
                <thead>
                <tr>
				  <th style="display:none;"><input type ="checkbox" id="check_all" name="check_all" class="check_all"></th>
                  <th style="display:none;">Fabric Range ID</th>
                  <th>Fabric Range</th>
                  <th>Fabric Range Addedon</th>
                  <th>Fabric Range Status</th>                 
				  <th>Update</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$tbl				=   "fabric_range_tbl";				
				$insert_id			=	selectdata($tbl);
				$fabric_range_id          =   array_column($insert_id, 'fabric_range_id');
		$fabric_range        =   array_column($insert_id, 'fabric_range');
				$fabric_range_addedon = array_column($insert_id, 'fabric_range_addedon');	
                $fabric_range_status = array_column($insert_id, 'fabric_range_status');
				$count = count($fabric_range_id);				
				for($i =0; $i<$count; $i++)
				{
								 ?> 
                <tr>
				   <td style="display:none;"><input type ="checkbox" id="fabric_range_id" name="fabric_range_id" class="fabric_range_id" value="<?php echo $fabric_range_id[$i]; ?>"></td>
            <td style="display:none;"><?php echo $fabric_range_id[$i]; ?></td>
				  <td>
				  <?php
				  $new_fabric = " ";
				  $fabrics = array();
				  $fabrics = explode(",", $fabric_range[$i]);
				  foreach($fabrics as $fabric)
				  {
				  $tbl = "third_category_tbl";
				  $static = "third_cat_id";
				  $data = $fabric;
				  $latest_fabric = select_data($tbl,$static,$data);
				  foreach($latest_fabric as $latest)
				  {
				    echo $latest['third_cat_name']."<br/>";
				  }
				  }
				  ?>
				  </td>	
			<td><?php echo date('m/d/Y', $fabric_range_addedon[$i]); ?></td>
				  <td><?php echo $fabric_range_status[$i]; ?> </td>		
				  <td style="cursor:pointer;"><input type="hidden" name="edit_icon" class="edit_icon" value="<?php echo $feature_fabric_id[$i]; ?>">
				  <i class="glyphicon glyphicon-pencil icons718" ></i>&nbsp; &nbsp;<i class="glyphicon glyphicon-trash del_icons718"></i>
				  </td>	
                </tr>
                     <?php } ?>       
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.11
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Education</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
