$(document).ready(function () {
	$("#button-videos").click(function(){
		$("#ac-panel-videos").toggleClass('ac-active ac-panel-videos');
		// $('.ac-panel-videos').toggle("slide", {direction:"right"}, 500);
		$('#button-videos-i').toggleClass('fa-arrow-right fa-arrow-left');
	});
});