$(document).ready(function(){
    
    $.ajax({
	url: "data/users.json",
	type:'GET',
	success: function( data ) {
                
                var row = "";
                for(var i = 0;i<data.length;i++)
                 {
                    var classwarna = "";
                    if(data[i].status == "Active"){
                        classwarna = "label-satgreen";
                    }
                    else {
                        classwarna = "label-lightred";
                    }
                    
                    row += '<tr >'+
                    
                    
                    '<td><a href="userdetail.php?action=edit"><span>'+data[i].userid+'</span></a></td>'+
                    '<td>'+data[i].realname+'</td>'+
                    '<td class="hidden-350">'+data[i].tipe+'</td>'+
                    '<td><span class="label '+classwarna+'">'+data[i].status+'</span></td>'+
                  '</tr>';
                 }
                 
                 $("#datalisting").html(row);
                 
                 
            }});
		
  
});