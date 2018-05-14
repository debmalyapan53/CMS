<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- JQuery UI --> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Latest compiled and minified JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- TinyMCE -->
<script src="js/tinymce/tinymce.min.js"></script>
<!--Dropzone.js-->
<script src="js/dropzone.js"></script>
<script>
$(document).ready(function(){
	$("#console-debug").hide();
	$("#btn-debug").click(function(){
		$("#console-debug").toggle();
	});
	$(".btn-delete").on("click",function(){
		var selected=$(this).attr("id");
		var pageid=selected.split("del_").join("");
		var confirmed= confirm("Do you want to delete this page?");
		if(confirmed==true){
		$.get("ajax/pages.php?id="+pageid);
		$("#page_"+pageid).remove();
		}
	});		
	$("#sort-nav").sortable({
		cursor:"move",
		update: function(){
			var order = $(this).sortable("serialize");
			$.get("ajax/list-sort.php",order);
		}
	});		
	$('.nav-form').submit(function(event){
		var navData= $(this).serializeArray();
		$.ajax({
			url:"ajax/navigation.php",
			type:"POST",
			data:navData
		});	
		event.preventDefault();
	});
		
});	
tinymce.init({ 
	selector:'.editor',
	plugins:[ "code image lists print preview hr anchor spellchecker",
		  "searchreplace wordcount fullscreen insertdatetime media",
		  "save table emoticons paste textcolor"
		]
});
</script>