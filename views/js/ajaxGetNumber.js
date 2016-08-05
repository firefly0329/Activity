setInterval(function(){
    Aid = $("#Aid").attr("value");
    // alert(Aid);
    $.ajax({
        url: "/Activity/back_con/ajaxGetNumber/" + Aid,
        type:"POST",
        success: function(data){
            // alert(data);
            data = JSON.parse(data);
            // alert(data);
            $("#changeNumber").text(data);
        },
    });
},1000);

