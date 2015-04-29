$(document).ready(function(){
    
    $.ajax({
	url: "data/roles.json",
	type:'GET',
	success: function( data ) {
                
                var row = "";
                for(var i = 0;i<data.length;i++)
                 {
                    
                    
                    
                    row += '<tr >'+
                    
                    
                    '<td><a href="roledetail.php?action=edit"><span>'+data[i].roleid+'</span></a></td>'+
                    '<td>'+data[i].rolename+'</td>'+
                    '<td >'+data[i].deskripsi+'</td>'+
                    
                  '</tr>';
                 }
                 
                 $("#datalisting").html(row);
                 
                 
            }});
		
  
});