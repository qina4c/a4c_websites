jQuery(document).ready(function($) {

var counter = 1;
var iconCount = 1;
var icons;

$('#techProReview_2').hide();
$('#techProReview_3').hide();
$('#techProReview_4').hide();
$('#techProReview_5').hide();
$('#techProinfo_2').hide();
$('#techProinfo_3').hide();
$('#techProinfo_4').hide();
$('#techProinfo_5').hide();
$('#point_jp2').hide();
$('#point_jp3').hide();
$('#point_jp4').hide();
$('#point_jp5').hide();
document.getElementById('icon_TP_jp2').style.opacity='0.2';
document.getElementById('icon_TP_jp3').style.opacity='0.2';
document.getElementById('icon_TP_jp4').style.opacity='0.2';
document.getElementById('icon_TP_jp5').style.opacity='0.2';

setInterval(function() { 
$('#techProReview_'+counter).fadeOut(0)
counter++;
if (counter == 6)
{
counter--;	
$('#techProReview_'+counter).fadeOut(0);
counter = 1;
$('#techProReview_'+counter).fadeIn(3000)}

else
{
$('#techProReview_'+counter).fadeIn(3000)
}

},  9000);

icons = setInterval(function ()
{
	$('#techProinfo_'+iconCount).fadeOut(0)
	$('#point_jp'+iconCount).fadeOut(0)
	document.getElementById('icon_TP_jp'+iconCount).style.opacity='0.2';
	iconCount++;
if (iconCount == 6)
{
iconCount--;	
$('#techProinfo_'+iconCount).fadeOut(0);
$('#point_jp'+iconCount).fadeOut(0);
document.getElementById('icon_TP_jp'+iconCount).style.opacity='0.2';
iconCount = 1;
$('#techProinfo_'+iconCount).fadeIn(3000)
$('#point_jp'+iconCount).fadeIn(3000)
document.getElementById('icon_TP_jp'+iconCount).style.opacity='1'
$('#icon_TP_jp'+iconCount).hide()
$('#icon_TP_jp'+iconCount).fadeIn(3000)}

else
{
$('#techProinfo_'+iconCount).fadeIn(3000)
$('#point_jp'+iconCount).fadeIn(3000)
document.getElementById('icon_TP_jp'+iconCount).style.opacity='1'
$('#icon_TP_jp'+iconCount).hide()
$('#icon_TP_jp'+iconCount).fadeIn(3000)}
}, 5000);

function clickedIcon(id)
{
	$('#icon_TP_jp'+id).click(function()
	{
		clearInterval(icons);
		$('#techProinfo_'+iconCount).stop()
		$('#point_jp'+iconCount).stop()
		$('#icon_TP_jp'+iconCount).stop()
		$('#techProinfo_'+iconCount).hide()
		$('#point_jp'+iconCount).hide()
		document.getElementById('icon_TP_jp'+iconCount).style.opacity='0.2';
		
		iconCount=id;
		$('#techProinfo_'+iconCount).fadeIn(0)
		$('#point_jp'+iconCount).fadeIn(0)
		document.getElementById('icon_TP_jp'+iconCount).style.opacity='1'
		$('#icon_TP_jp'+iconCount).hide()
		$('#icon_TP_jp'+iconCount).fadeIn(0)
		})
	}
	
clickedIcon(1);
clickedIcon(2);
clickedIcon(3);
clickedIcon(4);
clickedIcon(5);

});

