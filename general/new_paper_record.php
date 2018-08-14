<?php
session_start();
if(!isset($_SESSION['ins_id']) && !$_SESSION['ins_id']){
header('location:../index.php');
}else{
?>  
   <?php 
include("../includes/head.php");
include("../includes/leftbar.php");
include("../plugins/jQuery/common.js");
?> 
<!DOCTYPE html>
<?php
if(isset($_GET['val']) && $_GET['val'] == "del")
{	
			   $data			    =	"status = 0";		
        $where	        =	" paper_record_id =". $_GET['paper_record_id'];			
				$tbl				    = "tbl_paper_record";				
				$insert_id			= $classSave->update_record($tbl, $data, $where);				
				if($insert_id)
				{
					?>
            <script type="text/javascript">
						 alert("Paper Record Deleted Succssfully");
						 window.location.href= "general/new_paper_record.php";
						 </script>
                    <?php     
					} }
								 ?> 
<?php

	$time= time();		
if(isset($_POST['edit']))
{	     

				 $data			  =	$_POST;	
				$fields				=	 array("paper_id", "no_of_papers", "activity");
				$static_fields =	" , addedon='". $time ."', status='1'";              
        $where				=	" paper_record_id='". $_GET['paper_record_id'] ."'";	
				$tbl				=       "tbl_paper_record";                			
				$insert_id			=	$classSave->update($tbl,$fields,$static_fields,$data,$where);				
				if($insert_id)
				{
					?>
                    <script type="text/javascript">
						 alert("Paper Record Updated Succssfully");
						 </script>
                    <?php     
					}  }
								 ?>  
<?php
	$time= time();		
if(isset($_POST['submit']))
{	
		
				$data				=	$_POST;			
				$fields				=	array("paper_id", "no_of_papers","activity");
				$static_fields		=	" , addedon='". $time ."', status='1'";				
				$tbl				=       "tbl_paper_record";			 
				$insert_id			=	$classSave->insert($tbl, $fields, $static_fields, $data, "");				
				if($insert_id > 0)
				{
					?>
                       <script type="text/javascript">
						 alert("Paper Record Added Succssfully");                                                
						 </script>
                    <?php     
					} }
								 ?> 
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      New Paper Record
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Paper Record</a></li>
        <li class="active">New Paper Record</li>
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
          <h3 class="box-title">Paper Record</h3>
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="box-body">
			    <?php 
	if(isset($_GET['paper_record_id']) && isset($_GET['val']))
	{
	 if($_GET['val']  == "edit")
	 {	  	
							
				$where				=	"paper_record_id =".$_GET['paper_record_id'];				
				$table				=   "tbl_paper_record";
				$insert_id			=	$classFetch->select_Record_Where($table,$where);		
				foreach($insert_id as $ins){	
	
	?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Papers</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="paper_id" name="paper_id" required>
                    <option value = "0">Select Papers</option>
                    <?php 
                    $table = "tbl_paper";
										$where = "status = 1";
                    $papers = $classFetch->select_Record_Where($table,$where);
                    foreach($papers as $paper)
                    {
                   ?>
                    <option value = "<?php echo $paper['paper_id']; ?>" <?php if($ins['paper_id'] == $paper['paper_id']){ ?> selected = "selected" <?php } ?>><?php echo $paper['name']; ?>( <?php echo $paper['paper_code']; ?> )</option>
                    <?php } ?>
                    </select>
                  </div>				  
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Activity</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="activity" name="activity" required>
                    <option value="0">Select Activity</option>
                    <option value = "1" <?php if($ins['activity'] == 1){ ?> selected = "selected" <?php } ?>>Received</option>
                    <option value = "2" <?php if($ins['activity'] == 2){ ?> selected = "selected" <?php } ?>>Issued</option>
                    </select>
                  </div>				  
                </div>           
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No of Papers</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_of_papers" name="no_of_papers" placeholder="No of Papers" value="<?php echo $ins['no_of_papers']; ?>" required>
                  </div>				  
                </div>	
               </div>
              <!-- /.box-body -->
              <div class="box-footer">                
                <button type="submit" class="btn btn-info pull-right" name="<?php echo $_GET['val']; ?>">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
				<?php }  } } else { ?>
                         <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Papers</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="paper_id" name="paper_id" required>
                    <option value="">Select Papers</option>
                    <?php 
                    $table = "tbl_paper";
										$where = "status = 1";
                    $papers = $classFetch->select_Record_Where($table,$where);
                    foreach($papers as $paper)
                    {
                   ?>
                    <option value = "<?php echo $paper['paper_id']; ?>"><?php echo $paper['name']; ?> ( <?php echo $paper['paper_code']; ?> )</option>
                    <?php } ?>
                    </select>
                  </div>				  
                </div>  
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                   <span id="papers_available" style="display:none; font-weight:bold;"></span>
                  </div>				  
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Activity</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="activity" name="activity" required>
                    <option value = "">Select Activity</option>
                    <option value = "1">Received</option>
                    <option value = "2">Issued</option>
                    </select>
                  </div>				  
                </div>                
			          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No of Papers</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_of_papers" name="no_of_papers" placeholder="No of Papers" required>
                    <span id="papers_error" style="color:red; display:none;"></span>
                  </div>				  
                </div> 
				 </div>
              <!-- /.box-body -->
              <div class="box-footer">                
                <button type="submit" class="btn btn-info pull-right" name="submit" id="btn_submit">Save</button>
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
              <h3 class="box-title">All Paper Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped example1">
                <thead>
                <tr>
		  <th style="display:none;"><input type ="checkbox" id="check_all" name="check_all" class="check_all"></th>
                  <th style="display:none;">Session ID</th>
                  <th>Paper Name</th>              
                  <th>Activity</th>
                  <th>No of Papers</th>                    				  
                  <th>Paper Record Addedon</th>                                
		              <th>Update</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$table				  =   "tbl_paper_record";
				$where          =   "status = 1";				
				$insert_id			=    $classFetch->select_Record_Where($table,$where);				
				$paper_record_id     =   array_column($insert_id, 'paper_record_id');				
				$paper_id         =   array_column($insert_id, 'paper_id');
        $activity        =   array_column($insert_id, 'activity');                
				$no_of_papers = array_column($insert_id, 'no_of_papers');	
        $addedon = array_column($insert_id, 'addedon');				
				$count = count($paper_record_id);				
				for($i =0; $i<$count; $i++)
				{
								 ?> 
                <tr>
				   <td style="display:none;"><input type ="checkbox" id="paper_record_id" name="paper_record_id" class="paper_record_id" value="<?php echo $paper_record_id[$i]; ?>"></td>
                  <td style="display:none;"><?php echo $paper_record_id[$i]; ?></td>
				  <td><?php 
                                  $table = "tbl_paper";
                                  $where = "paper_id =".$paper_id[$i];                                  
                                  $papers = $classFetch->select_Record_Where($table,$where);
                                  foreach($papers as $paper)
                                  {
                                  echo $paper['name'];
                                  } 
                                  ?></td>
                                  
           <td><?php if($activity[$i] == 1){
						echo "Received"; 
					 }else{
						 echo "Issued";
					 }?></td> 
           <td><?php echo $no_of_papers[$i]; ?></td>                                  				 
				  <td><?php echo date("d-m-Y H:i:s", $addedon[$i]); ?></td>				  		  
				  <td style="cursor: pointer;"><input type="hidden" name="edit_icon" class="edit_icon" value="<?php echo $session_id[$i]; ?>">
				  <!--<i class="glyphicon glyphicon-pencil icons55" ></i> -->&nbsp; &nbsp;<i class="glyphicon glyphicon-trash del_icons55"></i>
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
    <strong>Copyright &copy; 2018-2019 <a href="#">Admin Panel</a>.</strong> All rights
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
<?php } ?>