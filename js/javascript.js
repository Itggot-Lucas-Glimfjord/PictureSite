function getCookie(name){
    var cookies = document.cookie.split(";");
    var cname = name + "=";
    for(var i=0; i<name.length; i++){
        var cookie = cookies [i];
        if(cookie != undefined){
            while (cookie.charAt(0) == " ") cookie = cookie.substring(1);
            if (cookie.search(name) == 0) return cookie.substring(name.length+1, cookie.length);
        }
    }
    return "";       
}

function toggleCookie(name){
    cValue = getCookie(name);
    if(cValue == "true"){
        nValue = name + "=false";
    }else{
        nValue = name +"=true"; 
    }
    document.cookie=nValue;
}


$(document).ready(function () {	
    if( getCookie("uploadVisibility") == "true"){
        console.log("true");
        $("#settingsCol").show();
        $(".setting").show(); 
        $(".30").removeClass("grid-30 30").addClass("grid-25 25");
    }else{
        console.log("false");
        $("#settingsCol").hide();
        $(".setting").hide();
    }

    
	$("#upload").click(function(){
	    
        $("#settingsCol").slideToggle(function(){
            toggleCookie("uploadVisibility");
            $("#uploadForm").slideToggle();  
            
            
        });
    
		$(".30").switchClass("grid-30 30", "grid-25 25", 200);
		$(".25").switchClass("grid-25 25", "grid-30 30", 200);

    
    });
    
    $(".uploadedIMGArticle").click(function(){
        $(this).switchClass("uploadedIMGArticle", "activeIMG", 200);        
    });
    
    $(".activeIMG").click(function(){
        console.log
        $(this).switchClass("activeIMG", "uploadedIMGArticle", 200);
  
    });

});
