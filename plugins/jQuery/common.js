<script>
$(document).ready(function(){
    $("#paper_id").change(function(){
			$("#activity").val("");
			$("#no_of_papers").val("");
     var paper_id = $("#paper_id option:selected"). val();
		 if(paper_id != ""){
			 $.ajax({ 
    type: 'POST', 
    url: 'general/get_total_papers.php', 
    data: { paper_id: paper_id }, 
    dataType: 'json',
    success: function (data) {	
					$("#papers_available").show(); 
					$("#papers_available").html("Papers Available = "+data);		 
    		}
			});
		 }else{
			 $("#papers_available").hide(); 
			 }
		 });
});

$(document).ready(function(){
    $("#activity").change(function(){
    $("#no_of_papers").val("");
		$("#papers_error").hide();
 		 });
});

$(document).ready(function(){
    $("#no_of_papers").change(function(){
			 $('#btn_submit').attr('disabled',false);
			$("#papers_error").hide();
		var activity_id = $("#activity option:selected"). val();			
   if(activity_id == 2){
    var papers_entered = $(this).val();
		var papers_available_text = $("#papers_available").html();
		var papers_available = papers_available_text.match(/-?\d+\.?\d*/);
	
		if(parseInt(papers_available) < parseInt(papers_entered)){			
			$("#papers_error").show();
			$("#papers_error").html("Available Papers Balance is Low!!!");
			$('#btn_submit').attr('disabled',true);
		}else{		
				$("#papers_error").hide();
				$('#btn_submit').attr('disabled',false);
		}
	}
		 });
});

	 
$(document).ready(function(){
    $("#product_pic").change(function(){
    $("#product_picc").val($(this).val());
    });
});
$(document).ready(function(){
    $("#slider_pic").change(function(){
    $("#slider_picc").val($(this).val());
    });
});
$(document).ready(function(){
    $("#product_images").change(function(){
    $("#product_imagess").val($(this).val());
    });
});
$(document).ready(function(){
    $("#third_cat_pic").change(function(){
    $("#third_cat_picc").val($(this).val());
    });
});
$(document).ready(function(){
    $("#tech_spec").change(function(){
    $("#tech_specc").val($(this).val());
    });
});
$(document).ready(function(){
    $("#sub_cat_pic").change(function(){
    $("#sub_cat_picc").val($(this).val());
    });
});


$(document).ready(function(){
    $("#brochure").change(function(){
    $("#brochuree").val($(this).val());
    });
});

$(document).ready(function(){
    $("#cat_id").change(function(){        
	var cat_id = $(this).val();		
	$.ajax({ 
    type: 'POST', 
    url: 'general/get_sub_cat.php', 
    data: { cat_id: cat_id }, 
    dataType: 'json',
    success: function (data) { 
	    var listItems= "";
	    var abc = "<option value='0'>Select Sub Category</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option  value='" + element.subcat_id + "'>" + element.subcat_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#subcat_id").html(ss);		 
    }
});

	   });
});

$(document).ready(function(){
    $("#subcat_id").change(function(){
	var subcat_id = $(this).val();		
	$.ajax({ 
    type: 'POST', 
    url: 'general/get_product.php', 
    data: { subcat_id: subcat_id }, 
    dataType: 'json',
    success: function (data) { 
	    var listItems= "";
	    var abc = "<option value='0'>Select Product</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option  value='" + element.product_id + "'>" + element.product_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#product_id").html(ss);		 
    }
});

	   });
});

$(document).ready(function(){
    $("#single").click(function(){
    $("#single_upload").show();
    $("#multiple_upload").hide();
    });
   $("#multiple").click(function(){
    $("#single_upload").hide();
    $("#multiple_upload").show();
    });
});

$(document).ready(function(){
    $("#inst_state").change(function(){
	var state_id = $(this).val();
	var cat_id = $("#main_category").val();
	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/get_inst.php', 
    data: { a: state_id, b: cat_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Select Institutes</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.inst_id + "'>" + element.inst_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#inst").html(ss);		 
    }
});
 });
});

$(document).ready(function(){
    $("#school_state").change(function(){
	var state_id = $(this).val();
	var cat_id = $("#main_category").val();
	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/get_school.php', 
    data: { a: state_id, b: cat_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Select School</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.school_id + "'>" + element.school_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#school").html(ss);		 
    }
});
 });
});

$(document).ready(function(){
    $("#college_state").change(function(){
	var state_id = $(this).val();
	var cat_id = $("#main_category").val();
	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/get_college.php', 
    data: { a: state_id, b: cat_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Select College</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.college_id + "'>" + element.college_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#college").html(ss);		 
    }
});
 });
});

$(document).ready(function(){
    $("#college_city").change(function(){
	var city_id = $(this).val();
	var cat_id = $("#main_category").val();
	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/get_colleges.php', 
    data: { a: city_id, b: cat_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Select College</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.college_id + "'>" + element.college_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#college").html(ss);		 
    }
});
 });
});

$(document).ready(function(){
    $("#school_city").change(function(){
	var city_id = $(this).val();
	var cat_id = $("#main_category").val();
	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/get_schools.php', 
    data: { a: city_id, b: cat_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Select School</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.school_id + "'>" + element.school_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#school").html(ss);		 
    }
});
 });
});

$(document).ready(function(){
    $("#inst_city").change(function(){
	var city_id = $(this).val();
	var cat_id = $("#main_category").val();
	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/get_institutes.php', 
    data: { a: city_id, b: cat_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Select Institutes</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.inst_id + "'>" + element.inst_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#inst").html(ss);		 
    }
});
 });
});


$(document).ready(function(){
$('#hor_ad1').change( function() {
$('#hor_ad11').val($(this).val());
});
$('#hor_ad2').change( function() {
$('#hor_ad22').val($(this).val());
});
$('#hor_ad3').change( function() {
$('#hor_ad33').val($(this).val());
});
$('#vert_ad1').change( function() {
$('#vert_ad11').val($(this).val());
});
$('#vert_ad2').change( function() {
$('#vert_ad22').val($(this).val());
});
$('#vert_ad3').change( function() {
$('#vert_ad33').val($(this).val());
});
});

$(document).ready(function(){
$('#trend_test_icon').change( function() {
$('#trend_test_iconn').val($(this).val());
});
});

$(document).ready(function(){
$('#college_radio').click( function() {
$('#college_form').show();
$('#school_form').hide();
$('#inst_form').hide();
});
$('#school_radio').click( function() {
$('#college_form').hide();
$('#school_form').show();
$('#inst_form').hide();
});
$('#inst_radio').click( function() {
$('#college_form').hide();
$('#school_form').hide();
$('#inst_form').show();
});
});	


$(document).ready(function(){
$('#image1').change( function() {
$('#images11').val($(this).val());
});
$('#image2').change( function() {
$('#images22').val($(this).val());
});
$('#image3').change( function() {
$('#images33').val($(this).val());
});
$('#image4').change( function() {
$('#images44').val($(this).val());
});
$('#image5').change( function() {
$('#images55').val($(this).val());
});
});	


$(document).ready(function(){
$('.college_status').click( function() {
 var college_status = $(this).val();
 var college_id = $(this).parent().prev().prev().prev().prev().prev().prev().html();
 var $t = $(this);
 	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/update_college.php', 
    data: { a: college_status, b: college_id }, 
    success: function (data) { 
     if(data == 1)
     {
      $t.text("Not Verified");
      $t.val(0);
      $t.removeClass("btn btn-success");
      $t.addClass("btn btn-danger");
     }
     if(data == 3)
     {
      $t.val(1);
      $t.text("Verified");
      $t.removeClass("btn btn-danger");
      $t.addClass("btn btn-success");
     }
    }
});
});
});	

$(document).ready(function(){
$('.school_status').click( function() {
 var school_status = $(this).val();
 var school_id = $(this).parent().prev().prev().prev().prev().prev().html();
 var $t = $(this);
 	$.ajax({ 
    type: 'POST', 
    url: 'school_filter/update_school.php', 
    data: { a: school_status, b: school_id }, 
    success: function (data) { 
     if(data == 1)
     {
      $t.text("Not Verified");
      $t.val(0);
      $t.removeClass("btn btn-success");
      $t.addClass("btn btn-danger");
     }
     if(data == 3)
     {
      $t.val(1);
      $t.text("Verified");
      $t.removeClass("btn btn-danger");
      $t.addClass("btn btn-success");
     }
    }
});
});
});	

$(document).ready(function(){
$('.inst_status').click( function() {
 var inst_status = $(this).val();
 var inst_id = $(this).parent().prev().prev().prev().prev().prev().html();
 var $t = $(this);
 	$.ajax({ 
    type: 'POST', 
    url: 'institute_filter/update_inst.php', 
    data: { a: inst_status, b: inst_id }, 
    success: function (data) { 
     if(data == 1)
     {
      $t.text("Not Verified");
      $t.val(0);
      $t.removeClass("btn btn-success");
      $t.addClass("btn btn-danger");
     }
     if(data == 3)
     {
      $t.val(1);
      $t.text("Verified");
      $t.removeClass("btn btn-danger");
      $t.addClass("btn btn-success");
     }
    }
});
});
});	

$(document).ready(function(){
    $("#logo").change(function(){
	var logo = $(this).val();
	$("#logoo").val($(this).val());
    });
});	
$(document).ready(function(){
    $("#category").change(function(){
	var cat_id = $(this).val();
	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/get_courses.php', 
    data: { a: cat_id }, 
    dataType: 'json',
    success: function (data) {
        
		var listItems= "";
	    var abc = "<option value='0'>Select Course</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + (index+1) + "'>" + element.course_name + "</option>"; 
	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/get_stream.php', 
    data: { a: element.course_id }, 
    dataType: 'json',
    success: function (dataa) { 
		var listItems1= "";
	    var abc = "<option value='0'>Select Stream</option>";
        $.each(dataa, function(index, elementt) {
	    listItems1+= "<option  value='" + elementt.stream_id + "'>" + elementt.stream_name + "</option>"; 
        });
        var sss= abc + listItems1;
        $('#multi_drop'+index).html(sss);		 
    }
});
        });
        var ss= abc + listItems;
		  $("#multi_drop").html(ss);		 
    }
});
 });
});

$(document).ready(function(){
    $("#image").change(function(){
    $("#images").val($(this).val());
 });
});


$(document).ready(function(){
    $("#multi_drop").change(function(){
    var abc = $(this).val();
    $("#drop0").hide();
     $("#fee0").hide();
    $("#drop1").hide();
     $("#fee1").hide();
     $("#drop2").hide();
     $("#fee2").hide();
     $("#drop3").hide();
     $("#fee3").hide();
     $("#drop4").hide();
     $("#fee4").hide();
    $.each(abc, function(index, element) {
    var inc = element;
        $("#drop"+inc).show();
        $("#fee"+inc).show();
  });
 });
});

$(document).ready(function(){
    $("#inst_category").change(function(){
	var cat_id = $(this).val();
	$.ajax({ 
    type: 'POST', 
    url: 'institute_content/get_inst.php', 
    data: { a: cat_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Institute Name</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option  value='" + element.inst_name + "'>" + element.inst_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#name").html(ss);		 
    }
});

	   });
});

$(document).ready(function(){
    $("#school_category").change(function(){
	var cat_id = $(this).val();
	$.ajax({ 
    type: 'POST', 
    url: 'school_content/get_school.php', 
    data: { a: cat_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>School Name</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option  value='" + element.school_name + "'>" + element.school_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#name").html(ss);		 
    }
});

	   });
});

$(document).ready(function(){
    $("#course_cat").change(function(){
	var cat_id = $(this).val();
	$.ajax({ 
    type: 'POST', 
    url: 'page_content/get_college.php', 
    data: { a: cat_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>College Name</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option  value='" + element.college_name + "'>" + element.college_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#name").html(ss);		 
    }
});

	   });
});

$(document).ready(function(){
    $("#cat_id").change(function(){
	var cat_id = $(this).val();
	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/get_courses.php', 
    data: { a: cat_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Course Name</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option  value='" + element.course_id + "'>" + element.course_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#course_id").html(ss);		 
    }
});

	   });
});

$(document).ready(function(){
    $("#bulk_click").click(function(){
    $("#bulk_upload").show();
    $("#single_upload").hide();
	   });
	   
   $("#single_click").click(function(){
    $("#bulk_upload").hide();
    $("#single_upload").show();
	   });
});


$(document).ready(function(){
    $("#school_state").change(function(){
	var state = $(this).val();
	$.ajax({ 
    type: 'POST', 
    url: 'school_filter/get_city.php', 
    data: { a: state }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Select City</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option  value='" + element.city_id + "'>" + element.city_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#school_city").html(ss);		 
    }
});

	   });
});


$(document).ready(function(){
    $("#school_image").change(function(){
    $("#sch_image").val($(this).val());
    });
}); 


$(document).ready(function(){
    $("#college_state").change(function(){
	var state = $(this).val();
	$.ajax({ 
    type: 'POST', 
    url: 'college_filter/get_city.php', 
    data: { a: state }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Select City</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option  value='" + element.city_id + "'>" + element.city_name + "</option>"; 
        });
        var ss= abc + listItems;
		  $("#college_city").html(ss);		 
    }
});

	   });
});

$(document).ready(function(){
    $("#college_image").change(function(){
    $("#clg_image").val($(this).val());
    });
}); 

$(document).ready(function(){
    $("#state_id").change(function(){
	var state_id = $(this).val();
	$.ajax({ 
    type: 'POST', 
    url: 'general/get_sub_city.php', 
    data: { a: state_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
		var abc = "<option value='0'>Select District</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.city_id + "'>" + element.city_name + "</option>"; 
        });
		  $("#city_id").html(abc+listItems);		 
    }
});

	   });
});

$(document).ready(function(){
    $("#city_id").change(function(){
	var city_id = $(this).val();
	$.ajax({ 
    type: 'POST', 
    url: 'center/get_sub_city1.php', 
    data: { a: city_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
	    var abc = "<option value='0'>Select City</option>";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.sub_city_id + "'>" + element.sub_city_name + "</option>"; 
        });
		  $("#sub_city_id").html(listItems);		 
    }
});

	   });
});

$(document).ready(function(){
   $(".check_pid").click(function(){
   var page_id= $(this).val();
      alert(page_id);
      
    });
});
$(document).ready(function(){
   $(".check_all").click(function(){
  $(".check_pid").attr("checked", "checked");
      
    });
});
$(document).ready(function(){
   $("#file").change(function(){
   var file_name= $(this).val();
   $("#file1").val(file_name);
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons192', function(){
   var school_header_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "school_content/new_header.php?school_header_id=" + school_header_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', 'del_icons192', function(){
   var school_header_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "school_content/new_header.php?school_header_id=" + school_header_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons162', function(){
   var inst_header_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "institute_content/new_header.php?inst_header_id=" + inst_header_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', 'del_icons162', function(){
   var inst_header_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "institute_content/new_header.php?inst_header_id=" + inst_header_id + "&val=" +val;
    });
});


$(document).ready(function(){
   $(".example1").on('click', '.icons145', function(){
   var sch_fac_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "school_content/set_facilities.php?sch_fac_id=" + sch_fac_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons145', function(){
   var sch_fac_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "school_content/set_facilities.php?sch_fac_id=" + sch_fac_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons144', function(){
   var school_course_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "school_filter/create_course.php?school_course_id=" + school_course_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons144', function(){
   var school_course_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "school_filter/create_course.php?school_course_id=" + school_course_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons187', function(){
   var blog_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "blog/create_blog.php?blog_id=" + blog_id + "&val=" +val;
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons187', function(){
   var blog_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "blog/create_blog.php?blog_id=" + blog_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons188', function(){
   var images_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/new_images.php?images_id=" + images_id + "&val=" +val;
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons188', function(){
   var images_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/new_images.php?images_id=" + images_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons22', function(){
   var course_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/new_course.php?course_id=" + course_id+ "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons22', function(){
   var course_id= $(this).closest('tr').find('td input').val();    
    var val="del";
	  window.location.href= "general/new_course.php?course_id=" + course_id+ "&val=" +val;
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.icons33', function(){	
   var session_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/new_session.php?session_id=" + session_id+ "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons33', function(){
   var session_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/new_session.php?session_id=" + session_id+ "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons373', function(){
   var test_detail_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/create_test_detail.php?test_detail_id=" + test_detail_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', 'del_icons373', function(){
   var test_detail_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/create_test_detail.php?test_detail_id=" + test_detail_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons44', function(){
   var id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/new_paper.php?id=" + id+ "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons44', function(){
   var id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/new_paper.php?id=" + id+ "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons484', function(){
   var institute_cat_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "institute_filter/create_category.php?institute_cat_id=" + institute_cat_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").click('click', '.del_icons484', function(){
   var institute_cat_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "institute_filter/create_category.php?institute_cat_id=" + institute_cat_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons55', function(){
   var paper_record_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/new_paper_record.php?paper_record_id=" + paper_record_id+ "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons55', function(){
   var paper_record_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/new_paper_record.php?paper_record_id=" + paper_record_id+ "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons66', function(){
   var shade_card_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/new_tech_spec.php?shade_card_id=" + shade_card_id+ "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons66', function(){
   var shade_card_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/new_tech_spec.php?shade_card_id=" + shade_card_id+ "&val=" +val;
    });
});


$(document).ready(function(){
   $(".example1").on('click', '.icons77', function(){
   var product_images_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/product_images.php?product_images_id=" + product_images_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons77', function(){
   var product_images_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/product_images.php?product_images_id=" + product_images_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons717', function(){
   var feature_fabric_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/feature_fabric.php?feature_fabric_id=" + feature_fabric_id+ "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons717', function(){
   var feature_fabric_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/feature_fabric.php?feature_fabric_id=" + feature_fabric_id+ "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons718', function(){
   var fabric_range_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/fabric_range.php?fabric_range_id=" + fabric_range_id+ "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons718', function(){
   var fabric_range_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/fabric_range.php?fabric_range_id=" + fabric_range_id+ "&val=" +val;
    });
});


$(document).ready(function(){
   $(".example1").on('click', '.icons719', function(){
   var latest_inst_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "institute_filter/latest_institute.php?latest_inst_id=" + latest_inst_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons719', function(){
   var latest_inst_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "institute_filter/latest_institute.php?latest_inst_id=" + latest_inst_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons787', function(){
   var inst_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "institute_filter/create_institute.php?inst_id=" + inst_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons787', function(){
   var inst_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "institute_filter/create_institute.php?inst_id=" + inst_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons88', function(){
   var var_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/new_variation.php?var_id=" + var_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons88', function(){
   var var_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/new_variation.php?var_id=" + var_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons99', function(){
   var var_value_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/new_variation_value.php?var_value_id=" + var_value_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons99', function(){
   var var_value_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/new_variation_value.php?var_value_id=" + var_value_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons101', function(){
   var product_variation_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/product-wise-variation.php?product_variation_id=" + product_variation_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".del_icons101").click(function(){
   var product_variation_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/product-wise-variation.php?product_variation_id=" + product_variation_id+ "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons130', function(){
   var school_brochure_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "school_filter/upload_brochure.php?school_brochure_id=" + school_brochure_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons130', function(){
   var school_brochure_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "school_filter/upload_brochure.php?school_brochure_id=" + school_brochure_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons140', function(){
   var inst_brochure_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "institute_filter/upload_brochure.php?inst_brochure_id=" + inst_brochure_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons140', function(){
   var inst_brochure_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "institute_filter/upload_brochure.php?inst_brochure_id=" + inst_brochure_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons120', function(){
   var college_brochure_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "college_filter/upload_brochure.php?college_brochure_id=" + college_brochure_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons120', function(){
   var college_brochure_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "college_filter/upload_brochure.php?college_brochure_id=" + college_brochure_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1451', function(){
   var test_name_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/create_test_name.php?test_name_id=" + test_name_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1451', function(){
   var test_name_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/create_test_name.php?test_name_id=" + test_name_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1452', function(){
   var trend_test_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/trend_test.php?trend_test_id=" + trend_test_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1452', function(){
   var trend_test_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/trend_test.php?trend_test_id=" + trend_test_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1453', function(){
   var college_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/state_college.php?college_id=" + college_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1453', function(){
   var college_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/state_college.php?college_id=" + college_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1454', function(){
   var clg_ads_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/state_ads.php?clg_ads_id=" + clg_ads_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1454', function(){
   var clg_ads_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/state_ads.php?clg_ads_id=" + clg_ads_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1455', function(){
   var college_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/city_college.php?college_id=" + college_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1455', function(){
   var college_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/city_college.php?college_id=" + college_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1456', function(){
   var clg_city_ads_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/city_ads.php?clg_city_ads_id=" + clg_city_ads_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1456', function(){
   var clg_city_ads_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/city_ads.php?clg_city_ads_id=" + clg_city_ads_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1457', function(){
   var school_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/state_school.php?school_id=" + school_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1457', function(){
   var school_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/state_school.php?school_id=" + school_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1458', function(){
   var sch_state_ads_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/state_school_ads.php?sch_state_ads_id=" + sch_state_ads_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1458', function(){
   var sch_state_ads_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/state_school_ads.php?sch_state_ads_id=" + sch_state_ads_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1459', function(){
   var school_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/city_school.php?school_id=" + school_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1459', function(){
   var school_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/city_school.php?school_id=" + school_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1460', function(){
   var sch_city_ads_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/city_school_ads.php?sch_city_ads_id=" + sch_city_ads_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1460', function(){
   var sch_city_ads_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/city_school_ads.php?sch_city_ads_id=" + sch_city_ads_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1461', function(){
   var inst_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/state_inst.php?inst_id=" + inst_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1461', function(){
   var inst_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/state_inst.php?inst_id=" + inst_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1462', function(){
   var inst_state_ads_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/state_inst_ads.php?inst_state_ads_id=" + inst_state_ads_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1462', function(){
   var inst_state_ads_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/state_inst_ads.php?inst_state_ads_id=" + inst_state_ads_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1463', function(){
   var inst_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/city_institute.php?inst_id=" + inst_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1463', function(){
   var inst_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/city_institute.php?inst_id=" + inst_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1464', function(){
   var inst_city_ads_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "general/city_inst_ads.php?inst_city_ads_id=" + inst_city_ads_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.del_icons1464', function(){
   var inst_city_ads_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/city_inst_ads.php?inst_city_ads_id=" + inst_city_ads_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons111', function(){
   var feature_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "page_content/set_feature.php?feature_id=" + feature_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons111', function(){
   var feature_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "page_content/set_feature.php?feature_id=" + feature_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons1119', function(){
   var feature_id= $(this).closest('tr').find('td input').val();
   var val="edit";
   window.location.href= "institute_content/set_feature.php?feature_id=" + feature_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons1119', function(){
   var feature_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "institute_content/set_feature.php?feature_id=" + feature_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons222', function(){
   var clg_course_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "page_content/new_course.php?clg_course_id=" + clg_course_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons222', function(){
   var clg_course_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "page_content/new_course.php?clg_course_id=" + clg_course_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons333', function(){
   var highlight_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "page_content/new_highlights.php?highlight_id=" + highlight_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons333', function(){
   var highlight_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "page_content/new_highlights.php?highlight_id=" + highlight_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons454', function(){
   var facilities_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "school_content/new_facilities.php?facilities_id=" + facilities_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons454', function(){
   var facilities_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "school_content/new_facilities.php?facilities_id=" + facilities_id + "&val=" +val;
    });
});

$(document).ready(function(){
    $(".example1").on('click', '.icons444', function(){
   var facilities_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "page_content/new_facilities.php?facilities_id=" + facilities_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
    $(".example1").on('click', '.del_icons444', function(){
   var facilities_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "page_content/new_facilities.php?facilities_id=" + facilities_id + "&val=" +val;
    });
});

$(document).ready(function(){
    $(".example1").on('click', '.icons447', function(){
   var clg_feature_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "page_content/create_feature.php?clg_feature_id=" + clg_feature_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
    $(".example1").on('click', '.del_icons447', function(){
   var clg_feature_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "page_content/create_feature.php?clg_feature_id=" + clg_feature_id + "&val=" +val;
    });
});

$(document).ready(function(){
    $(".example1").on('click', '.icons4417', function(){
   var inst_feature_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "institute_content/create_feature.php?inst_feature_id=" + inst_feature_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
    $(".example1").on('click', '.del_icons4417', function(){
   var inst_feature_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "institute_content/create_feature.php?inst_feature_id=" + inst_feature_id + "&val=" +val;
    });
});

$(document).ready(function(){
    $(".example1").on('click', '.icons555', function(){
   var reviews_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "page_content/new_reviews.php?reviews_id=" + reviews_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
    $(".example1").on('click', '.del_icons555', function(){
   var reviews_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "page_content/new_reviews.php?reviews_id=" + reviews_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons133', function(){
   var highlight_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "page_content/new_highlight.php?highlight_id=" + highlight_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
    $(".example1").on('click', '.del_icons133', function(){
   var highlight_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "page_content/new_highlight.php?highlight_id=" + highlight_id + "&val=" +val;
    });
});

$(document).ready(function(){
   $(".example1").on('click', '.icons139', function(){
   var highlight_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "school_content/new_highlights.php?highlight_id=" + highlight_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
    $(".example1").on('click', '.del_icons139', function(){
   var highlight_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "school_content/new_highlights.php?highlight_id=" + highlight_id + "&val=" +val;
    });
});

$(document).ready(function(){
    $(".example1").on('click', '.icons175', function(){
   var clg_fac_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "page_content/set_facilities.php?clg_fac_id=" + clg_fac_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
    $(".example1").on('click', '.del_icons175', function(){
   var clg_fac_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "page_content/set_facilities.php?clg_fac_id=" + clg_fac_id + "&val=" +val;
    });
});

$(document).ready(function(){
    $(".example1").on('click', '.icons172', function(){
   var gallery_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "page_content/new_gallery.php?gallery_id=" + gallery_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
    $(".example1").on('click', '.del_icons172', function(){
   var gallery_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "page_content/new_gallery.php?gallery_id=" + gallery_id + "&val=" +val;
    });
});

$(document).ready(function(){
    $(".example1").on('click', '.icons176', function(){
   var notification_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "general/new_notification.php?notification_id=" + notification_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
   $(".example1").on('click', '.del_icons176', function(){
   var notification_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "general/new_notification.php?notification_id=" + notification_id + "&val=" +val;
    });
});

$(document).ready(function(){
    $(".example1").on('click', '.icons178', function(){
   var gallery_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "school_content/new_gallery.php?gallery_id=" + gallery_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
    $(".example1").on('click', '.del_icons178', function(){
   var gallery_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "school_content/new_gallery.php?gallery_id=" + gallery_id + "&val=" +val;
    });
});

$(document).ready(function(){
    $(".example1").on('click', '.icons1789', function(){
   var gallery_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "institute_content/new_gallery.php?gallery_id=" + gallery_id + "&val=" +val;
      
    });
});
$(document).ready(function(){
    $(".example1").on('click', '.del_icons1789', function(){
   var gallery_id= $(this).closest('tr').find('td input').val();    
      var val="del";
	  window.location.href= "institute_content/new_gallery.php?gallery_id=" + gallery_id + "&val=" +val;
    });
});

$(document).ready(function(){
    $(".example1").on('click', '.icons19', function(){
   var set_doc_id= $(this).closest('tr').find('td input').val();
   var val="edit";
	  window.location.href= "services/set_documents.php?set_doc_id=" + set_doc_id + "&val=" +val;
      
    });
});

$(document).ready(function(){
    $("#c_acc_id").change(function(){		
	var acc_id = $(this).val();		 
    var tbl_name= "admin_level2_tbl";
    var static_id= "c_acc_id";    
	$.ajax({ 
    type: 'POST', 
    url: 'balance/get_sub_category.php', 
    data: { a: acc_id, b: tbl_name, c: static_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.level2_id + "'>" + element.level2_name + "</option>"; 
        });
		  $("#level2_id").html(listItems);		 
    }
});

	   });
});
$(document).ready(function(){
    $("#level2_id").change(function(){		
	var acc_id = $(this).val();		 
    var tbl_name= "admin_level3_tbl";
    var static_id= "level2_id";    
	$.ajax({ 
    type: 'POST', 
    url: 'balance/get_sub_category.php', 
    data: { a: acc_id, b: tbl_name, c: static_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.level3_id + "'>" + element.level3_child_name + "</option>"; 
        });
		  $("#level3_id").html(listItems);		 
    }
});

	   });
});
$(document).ready(function(){
    $("#level3_id").change(function(){		
	var acc_id = $(this).val();		 
    var tbl_name= "admin_level4_tbl";
    var static_id= "level3_id";    
	$.ajax({ 
    type: 'POST', 
    url: 'balance/get_sub_category.php', 
    data: { a: acc_id, b: tbl_name, c: static_id }, 
    dataType: 'json',
    success: function (data) { 
		var listItems= "";
        $.each(data, function(index, element) {
	    listItems+= "<option value='" + element.level4_id + "'>" + element.level4_child_name + "</option>"; 
        });
		  $("#level4_id").html(listItems);		 
    }
});

	   });
});

$(document).ready(function(){
   $("#plan1_status").change(function(){
	   if($(this). prop("checked") == true){
        $("#plan1_div").show();
	   }
	   else
	   {
	   $("#plan1_div").hide();
	   }
    });
	 $("#plan2_status").change(function(){
	   if($(this). prop("checked") == true){
        $("#plan2_div").show();
	   }
	   else
	   {
	   $("#plan2_div").hide();
	   }
    });
	 $("#plan3_status").change(function(){
	   if($(this). prop("checked") == true){
        $("#plan3_div").show();
	   }
	   else
	   {
	   $("#plan3_div").hide();
	   }
    });
	 $("#all_status").change(function(){
	   if($(this). prop("checked") == true){
        $("#plan1_div").show();
		$("#plan2_div").show();
		$("#plan3_div").show();
	   }
	   else
	   {
	   $("#plan1_div").hide();
	   $("#plan2_div").hide();
	   $("#plan3_div").hide();
	   }
    });
});

$(document).ready(function(){
    $(".off_icon").click(function(){
    var signup_id = $(this).closest('td').prev().prev().prev().html();
    var status = 1;
    var ss = $(this);
   $.ajax({ 
    type: 'POST', 
    url: 'center/change_center_status.php', 
    data: { a: signup_id, b: status }, 
    success: function (data) { 
	
		if(data == 1){
		 ss.closest('td').hide();
	     ss.closest('td').next().show();
		}
    }
});
   
	   });
$(".on_icon").click(function(){
    var signup_id = $(this).closest('td').prev().prev().prev().html();
    var status = 0;
    var ss = $(this);
   $.ajax({ 
    type: 'POST', 
    url: 'center/change_center_status.php', 
    data: { a: signup_id, b: status }, 
    success: function (data) { 
		
		if(data == 1){
		 ss.closest('td').hide();
	     ss.closest('td').next().next().show();
		}
    }
});
   
	   });
});
$(document).ready(function(){
    $(".offf_icon").click(function(){
    var signup_id = $(this).closest('td').prev().prev().prev().prev().prev().html();
    var status = 1;
    var ss = $(this);
   $.ajax({ 
    type: 'POST', 
    url: 'center/change_center_status.php', 
    data: { a: signup_id, b: status }, 
    success: function (data) { 
	
		if(data == 1){
		 ss.closest('td').hide();
	     ss.closest('td').prev().prev().show();
		}
    }
});
   
	   });
$(".onn_icon").click(function(){
    var signup_id = $(this).closest('td').prev().prev().prev().prev().html();
    var status = 0;
    var ss = $(this);
   $.ajax({ 
    type: 'POST', 
    url: 'center/change_center_status.php', 
    data: { a: signup_id, b: status }, 
    success: function (data) { 
		
		if(data == 1){
		 ss.closest('td').hide();
	     ss.closest('td').prev().show();
		}
    }
});
   
	   });
});
$(document).ready(function(){
    $("#payment_made").change(function(){
    var total_fees = $("#pending_amount").val();
    var payment  = $(this).val();
    var balance =  total_fees - payment;
       $("#balance").val(balance);
    });
});  

$(document).ready(function(){
    $("#center_id").change(function(){
    var vendor_id = $(this).val();
      $.ajax({ 
    type: 'POST', 
    url: 'general/get_fees.php', 
    data: { a: vendor_id }, 
    success: function (data) { 
	   $("#total_fees").val(data);
	$.ajax({ 
    type: 'POST', 
    url: 'general/get_amount.php', 
    data: { a: vendor_id }, 
    success: function (dataa) { 
	   if(dataa == 0)
	   {
	    $("#pending_amount").val(data);    
	   }
	   else
	   {
	     var final_pending = data - dataa;
	     $("#pending_amount").val(final_pending);      
	   }
		}
});
}
});
   });
});  

$(document).ready(function(){  
  $(".mobile").on("change", function(){
        var mobNum = $(this).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;
          if (filter.test(mobNum)) {
            if(mobNum.length==10){
                  //alert("valid");              
             } else {
                alert('Please put 10  digit mobile number');               
                return false;
              }
            }
            else {
              alert('Not a valid number');              
              return false;
           }
    
  });  
});

$(document).ready(function(){
   $("#example1").on('click', '.detail_icon', function(){
   var student_dtl_id= $(this).closest('tr').find('td input').val();
	  window.location.href= "admission/view_admission.php?student_dtl_id=" + student_dtl_id;
    });
});

$(document).ready(function() {
   var count = $("#box_count").val();
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".abc"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    if(typeof count == 'undefined')
    {
    var x = 1; //initlal text box count
    }
    else
    {
       var x = count;  
    }
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<br/><div><input type="text" name="stream_name[]" id="stream_name" class="form-control" /><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});


</script>