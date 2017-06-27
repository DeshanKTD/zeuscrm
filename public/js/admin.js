

// Main Window - Table - Del Btn
$(document).on('click','.delBtn',function (d){
    var uid = this.parentElement.parentElement.childNodes[3].innerHTML;
    
    //deleteuser ajax
    var json = { "email" : uid };
    $.ajax({
        url : main_url+'/removeuser',
        dataType: "json",
        data : json,
        type : "POST",
        success:function(data,textStatus,jqXHR){
            location.reload();
        }
        
    })
    //add code to give confirmation to delete
});
		

