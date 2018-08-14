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
                                     $where	                =	" shade_card_id =". $_GET['shade_card_id'];			
				$tbl				=   "tech_spec_tbl";				
				$insert_id			=    delete_data($tbl, $where);
				$qry = mysql_query($insert_id);
				if($insert_id > 0)
				{
					?>
                     <script type="text/javascript">
						 alert("Technical Specification Deleted Succssfully");
						 window.location.href= "general/new_tech_spec.php";
						 </script>
                    <?php     
					} }
								 ?> 
<?php

	$time= time();		
if(isset($_POST['edit']))
{	     

				 $data			=	$_POST;	
				$fields				=	 array("cat_id", "sub_cat_id", "third_cat_id", "range", "content", "width", "weight", "abrasi", "colour_fast", "colour_match", "flammable", "suitability");
				$static				=	" , shade_card_addedon='". $time ."', shade_card_status='1'";                              
                                $where				=	" shade_card_id='". $_GET['shade_card_id'] ."'";	
				$tbl				=       "tech_spec_tbl";                			
				$insert_id			=	update($tbl, $fields, $static, $data, $where);
				$qry = mysql_query($insert_id);
				if($insert_id > 0)
				{
					?>
                    <script type="text/javascript">
						 alert("Technical Specification Updated Succssfully");
						 </script>
                    <?php     
					}  }
								 ?>  
<?php
	$time= time();		
if(isset($_POST['submit']))
{	
		
				$cat_id				=	$_POST['cat_id'];	
                                $sub_cat_id                     =       $_POST['sub_cat_id'];
                                $third_cat_id                   =       $_POST['third_cat_id'];	                              
    $filename=$_FILES["tech_spec"]["tmp_name"];
    if($_FILES["tech_spec"]["size"] > 0)
    {
        $file = fopen($filename, "r");        
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {         
            $sql = "INSERT INTO `tech_spec_tbl`(`cat_id`, `sub_cat_id`, `third_cat_id`, `range`, `content`, `width`, `weight`, `abrasi`, `colour_fast`, `colour_match`, `flammable`, `suitability`, `shade_card_addedon`, `shade_card_status`) values('$cat_id','$sub_cat_id','$third_cat_id','$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$time','1')";
         $qry = mysql_query($sql);
        }
        fclose($file); 	
				if($qry > 0)
				{
					?>
                                                  <script type="text/javascript">
						 alert("Technical Specification Added Succssfully");
						 </script>
                    <?php     
					} } }
								 ?>  

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      New Technical Specification
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">General</a></li>
        <li class="active">New Technical Specification</li>
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
          <h3 class="box-title">Technical Specification</h3>
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="box-body">
			    <?php 
	if(isset($_GET['shade_card_id']) && isset($_GET['val']))
	{
	 if($_GET['val']  == "edit")
	 {
	  	
				$data				=	$_GET['shade_card_id'];			
				$static				=	"shade_card_id";				
				$tbl				=       "tech_spec_tbl";
				$insert_id			=	selectpardata($tbl,$static,$data);		
				extract($insert_id);	
	
	?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="cat_id" name="cat_id">
                    <option>Select Category</option>
                    <?php 
                    $tbl = "category_tbl";
                    $category = selectdata($tbl);
                    foreach($category as $cat)
                    {
                   ?>
                    <option value = "<?php echo $cat['cat_id']; ?>" <?php if($cat_id == $cat['cat_id']){ ?> selected = "selected" <?php } ?>><?php echo $cat['cat_name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>				  
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sub Category</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="sub_cat_id" name="sub_cat_id">
                    <option>Select Sub Category</option>
                    <?php 
                    $tbl = "sub_category_tbl";
                    $static = "cat_id";
                    $data = $cat_id;
                    $sub_category = select_data($tbl,$static,$data);
                    foreach($sub_category as $sub_cat)
                    {
                   ?>
                    <option value = "<?php echo $sub_cat['sub_cat_id']; ?>" <?php if($sub_cat_id == $sub_cat['sub_cat_id']){ ?> selected = "selected" <?php } ?>><?php echo $sub_cat['sub_cat_name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>				  
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Fabric Category</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="third_cat_id" name="third_cat_id">
                    <option>Select Third Category</option>
                    <?php 
                    $tbl = "third_category_tbl";
                    $static = "sub_cat_id";
                    $data = $sub_cat_id;
                    $sub_category = select_data($tbl,$static,$data);
                    foreach($sub_category as $sub_cat)
                    {
                   ?>
                    <option value = "<?php echo $sub_cat['third_cat_id']; ?>" <?php if($third_cat_id == $sub_cat['third_cat_id']){ ?> selected = "selected" <?php } ?>><?php echo $sub_cat['third_cat_name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>				  
                </div>                  
                                     <br/><center><h4>Technical Specification</h4></center><br/>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Range</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="range" name="range" placeholder="Range" value="<?php echo $range; ?>">
                  </div>				  
                </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="content" name="content" placeholder="Content" value="<?php echo $content ?>">
                  </div>				  
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Weight</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight" value="<?php echo $weight; ?>">
                  </div>				  
                </div>  
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Width</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="width" name="width" placeholder="Width" value="<?php echo $width; ?>">
                  </div>				  
                </div>  
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Abrasi On Resistance</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="abrasi" name="abrasi" placeholder="Abrasi" value="<?php echo $abrasi; ?>">
                  </div>				  
                </div>   
            <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Colour Fastness</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="colour_fast" name="colour_fast" placeholder="Colour Fastness" value="<?php echo $colour_fast; ?>">
                  </div>				  
                </div>  
           <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Colour Matching</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="colour_match" name="colour_match" placeholder="Colour Matching" value="<?php echo $colour_match; ?>">
                  </div>				  
                </div>  
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Flammability</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="flammable" name="flammable" placeholder="Flammability" value="<?php echo $flammable; ?>">
                  </div>				  
                </div>  
         <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Suitable For</label>
                  <div class="col-sm-10">
                 <input type="text" class="form-control" id="suitability" name="suitability" placeholder="Suitable For"  value="<?php echo $suitability; ?>">
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="cat_id" name="cat_id">
                    <option>Select Category</option>
                    <?php 
                    $tbl = "category_tbl";
                    $category = selectdata($tbl);
                    foreach($category as $cat)
                    {
                   ?>
                    <option value = "<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>				  
                </div>
			 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sub Category</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="sub_cat_id" name="sub_cat_id">
                    <option>Select Sub Category</option>
                    
                    </select>
                  </div>				  
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Fabric Category</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="third_cat_id" name="third_cat_id">
                    <option>Select Third Category</option>                    
                    </select>
                  </div>				  
                </div>              
                              <br/><center><h4>Technical Specification</h4></center><br/>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Technical Specification</label>
                  <div class="col-sm-10">
                    <input type="file" id="tech_spec" name="tech_spec">
                  </div>				  
                </div>
          
				 </div>
              <!-- /.box-body -->
              <div class="box-footer">                
                <button type="submit" class="btn btn-info pull-right" name="submit">Save</button>
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
              <h3 class="box-title">All Technical Specification</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped example1">
                <thead>
                <tr>
		  <th style="display:none;"><input type ="checkbox" id="check_all" name="check_all" class="check_all"></th>
                  <th style="display:none;">Shade Card ID</th>
                  <th>Category Name</th>
                  <th>Sub Category Name</th>
                  <th>Fabric Category Name</th>                 			  
                  <th>Technical Specification Addedon</th>
                  <th>Technical Specification Status</th>                 
		  <th>Update</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$tbl				=   "tech_spec_tbl";				
				$insert_id			=    selectdata($tbl);
				$shade_card_id          =   array_column($insert_id, 'shade_card_id');
				$cat_id        =   array_column($insert_id, 'cat_id');
                                $sub_cat_id        =   array_column($insert_id, 'sub_cat_id');
                                $third_cat_id        =   array_column($insert_id, 'third_cat_id');                               
				$shade_card_addedon = array_column($insert_id, 'shade_card_addedon');	
                                $shade_card_status = array_column($insert_id, 'shade_card_status');
				$count = count($shade_card_id);				
				for($i =0; $i<$count; $i++)
				{
								 ?> 
                <tr>
				   <td style="display:none;"><input type ="checkbox" id="shade_card_id" name="shade_card_id" class="shade_card_id" value="<?php echo $shade_card_id[$i]; ?>"></td>
                  <td style="display:none;"><?php echo $shade_card_id[$i]; ?></td>
				  <td><?php 
                                  $tbl = "category_tbl";
                                  $static = "cat_id";
                                  $data = $cat_id[$i];
                                  $category = select_data($tbl,$static,$data);
                                  foreach($category as $cat)
                                  {
                                  echo $cat['cat_name'];
                                  } 
                                  ?></td>
                                  <td><?php 
                                  $tbl = "sub_category_tbl";
                                  $static = "sub_cat_id";
                                  $data = $sub_cat_id[$i];
                                  $category = select_data($tbl,$static,$data);
                                  foreach($category as $cat)
                                  {
                                  echo $cat['sub_cat_name'];
                                  } 
                                  ?></td>
                                  <td><?php 
                                  $tbl = "third_category_tbl";
                                  $static = "third_cat_id";
                                  $data = $third_cat_id[$i];
                                  $category = select_data($tbl,$static,$data);
                                  foreach($category as $cat)
                                  {
                                  echo $cat['third_cat_name'];
                                  } 
                                  ?></td>                                  				 
				  <td><?php echo date("d-m-Y", $shade_card_addedon[$i]); ?></td>
				  <td><?php echo $shade_card_status[$i]; ?></td>				  
				  <td style="cursor: pointer;"><input type="hidden" name="edit_icon" class="edit_icon" value="<?php echo $shade_card_id[$i]; ?>">
				  <i class="glyphicon glyphicon-pencil icons66" ></i>&nbsp; &nbsp;<i class="glyphicon glyphicon-trash del_icons66"></i>
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
    <strong>Copyright &copy; 2018-2019 <a href="http://nexgenfabrics.com">Nexgen Fabrics Pvt. Ltd.</a>.</strong> All rights
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
