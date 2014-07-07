jQuery(document).ready(function($) {
	$( "#contact_container" ).hide();
	contacButtonPos();
	//submit contact us form function 
	function submitform(postVals)
	{
		$.ajax('contactform.php',{
			type:"POST",
			data:postVals,
			success: function(response) {
			if(response.indexOf("contact-form-message")>-1)
			{ 
				$('#contact_container').html(response).promise().done(function() {
				 contacformResize($("#inner-container"));
				 setTimeout(function() {$("#inner-container" ).remove();$( "#contact_container" ).hide();}, 5000);
				});
			}
			else
			{
				 $('#contact_container').html(response).promise().done(function() {
				 contacformResize($("#inner-container" )); 
				});
			}
		  }
		})
	  .fail(function() {
		alert( "error" );
	  })
	};
	//responsive positioning for contact butoon
	function contacButtonPos()
	{
		var currentLeft=0; 
		currentLeft = $(".Product_Display_Container_JP" ).width()+parseInt($(".Product_Display_Container_JP" ).css("margin-left"))+10; 
		document.getElementById('contactbutton').style.left=currentLeft+'px';
	}
	//contact form div reposition function
	function contacformResize(contactform)
	{
		var currentHeight=0; 
		currentHeight = ($("#contact_container" ).height()-contactform.outerHeight())/2; 
		document.getElementById('inner-container').style.margin=currentHeight+'px auto';
	}
	
	//load contact us form button click
	$( "#contact_button" ).click(function() {
		$( "#contact_container" ).show();
		$( "#contact_container" ).load('contactform.php', function() {
		contacformResize($("#inner-container" ));
		});
	});
    //contact us form close button click
	$(document).delegate('#contact-form-close-button','click',function(){

	
		$("#inner-container" ).remove();
		$( "#contact_container" ).hide();
	});
	//responsive resize 
	$( window ).resize(function() {
		contacButtonPos();
		contacformResize($("#inner-container" ));
	});	
	

	//contact us form submit button click 
	$(document).delegate('#techPro_CForm_cubmit','click',function(){
		$('#loader').show();
		$('#techPro_CForm').submit(function(e){
			return false;
			});
			var postVals = $('#techPro_CForm').serialize();
			submitform(postVals);
	});
	
});