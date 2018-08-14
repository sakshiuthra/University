
		<?php include_once('main_header.php'); ?> 
		<?php include_once('includes/config.php'); ?>  
		<?php include_once('includes/common.php'); ?>            
    <?php
$catt_id	=	$_GET['cat_id'];
if(isset($_GET['action']) == 'edit' && $_GET['cat_id'] !="")
{
	    $del = "select *  FROM category WHERE cat_id= '".$catt_id."'";
	   $sql = mysql_query($del);
   		if($sql>0)
		while($pr	=	mysql_fetch_assoc($sql))
		{
			extract($pr);
			$update=1;
			}
}
?>     
		
        <!--ADD AND UPDATE START  -->       
			
			<?php
			
if(isset($_POST['submit']))
{
	extract($_POST);
	$cat_namee = $_POST['cat_name'];
	$time				=	time();
	
		if($update	==	"1")
		{
			
			$data				=	$_POST;
			$fields				=	array("cat_name");
			$static				=	"";	
			$where				=	" cat_id='". $catt_id ."'";
			 $update_id			=	update('category', $fields, $static, $data, $where);
			
			if($update_id)
			{
				?>
                    <script type="text/javascript">
						 alert("Category Updated Successfully");
						 </script>
                         <?php 
			}
		}
		else
		{
		
				$data				=	$_POST;			
				$fields				=	array("cat_name");
				$static				=	" , added_on='". $time ."', status='1'";
				 $sel = "select cat_name from category where cat_name='".$cat_namee."'";
				$qry = mysql_query($sel);
				if(mysql_affected_rows()>0){ ?>  
				<script type="text/javascript">
						 alert("Sorry! Category Allready Exist");
						 </script> <?php } 
				else{
				$insert_id			=	insert('category', $fields, $static, $data, "");
				}
				if($insert_id > 0)
				{
					?>
                    <script type="text/javascript">
						 alert("Category Added Succssfully");
						 </script>
                         <?php 
					}
			
		}
	
}
?>
  
			
			
		<!--ADD AND UPDATE END  -->   	
			
			
			
            
            <div class="main-content">
				<div class="main-content-inner">
					
					<div class="page-content">
						
                        
                        	<?php include_once('side_setting.php'); ?>
                        

						<div class="page-header">
							<h1>
								Category
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									add new category
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category Name </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Enter Category Name" name="cat_name" value="<?php echo $cat_name;?>" class="col-xs-10 col-sm-5" required/>
										</div>
									</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit" name="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
									</form>

								<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">Category All Data</h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Results for "Latest Category"
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>Category Id</th>
														<th>Category Name</th>
														<th>
															<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
															Added on
														</th>
														<th class="hidden-480">Status</th>

														<th></th>
													</tr>
												</thead>

												<tbody>
												<?php $select= "select * from category order by cat_id desc";
													$selquery = mysql_query($select);
													while($row=mysql_fetch_assoc($selquery)){
													
													$cat_id = $row['cat_id'];
													
													if($row['status'] == '1')
						{	
							$label	=	'Active';
							$s=0;
							}
							else
							{
								$label	=	'Inactive';
								$s=1;
								}
													
													
													?>
													<tr>
													
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td><?php echo $row['cat_id'];?></td>
														
														<td><?php echo ucfirst($row['cat_name']);?></td>

														<td><?php $time1 = $row['date']; echo date('d M, Y',$time1);?></td>

														<td class="hidden-480"><a href="category.php?action=status&s=<?php echo $s; ?>&s_id=<?php echo $cat_id; ?>">
															<span class="label label-sm label-warning"><?php  if($row['status']==1){ $s="0"; echo "Active";}else{ $s="1";
															echo "Inactive";}?></span></a>
														</td>
                                                      
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="blue" href="#">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a>

																<a class="green" href="category.php?cat_id=<?php echo $cat_id; ?>&action=edit">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" href="#">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																		
																			<a href="category.php?cat_id=<?php echo $cat_id; ?>&action=edit" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>

													<?php } ?>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div id="modal-table" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Results for "Latest Registered Domains
												</div>
											</div>

											
											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>

												<ul class="pagination pull-right no-margin">
													<li class="prev disabled">
														<a href="#">
															<i class="ace-icon fa fa-angle-double-left"></i>
														</a>
													</li>

													<li class="active">
														<a href="#">1</a>
													</li>

													<li>
														<a href="#">2</a>
													</li>

													<li>
														<a href="#">3</a>
													</li>

													<li class="next">
														<a href="#">
															<i class="ace-icon fa fa-angle-double-right"></i>
														</a>
													</li>
												</ul>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

								
								

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
            
            
            
            
            
		<?php include_once('main_footer.php'); ?>
		<?php
if((($_GET['action']) == 'status') && (($_GET['s_id']) !=""))
{
	   echo $update = "update tbl_category set status='".$_GET['s']."' WHERE cat_id='".$_GET['s_id']."'";
	   $sql = mysql_query($update);
   		if($sql>0)
		{
		
			?>
                  
                    <script type="text/javascript">
						alert("Status Changed Successfully");
  window.location.href="category.php";

						 </script>
                         <?php 
			}
}
?>