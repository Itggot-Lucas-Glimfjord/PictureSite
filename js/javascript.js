
$(document).ready(function () {	
    $("#uploadForm").hide();
    
	$("#upload").click(function(){
	    $("#uploadForm").slideToggle();
		$(".30").switchClass("grid-30 30", "grid-25 25");
		$(".25").switchClass("grid-25 25", "grid-30 30");

    
    });

});
