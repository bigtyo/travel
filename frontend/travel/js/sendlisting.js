/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    $("#selectall").click(function(){
        $("#datalisting").find(":checkbox").click();
        
    });
    $.ajax({
	url: "data/listing.json",
	type:'GET',
	success: function( data ) {
                debugger;
                var row = "";
                for(var i = 0;i<data.length;i++)
                 {
                    row += '<tr>'+
                    '<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>'+
                    '<td>'+data[i].gambar+'</td>'+
                    '<td>'+data[i].email+'</td>'+
                    '<td class="hidden-350">'+data[i].tipe+'</td>'+
                    '<td >'+data[i].lokasi+'</td>'+
                    '<td>'+data[i].harga+'</td>'+
                  '</tr>';
                 }

                 $("#datalisting").html(row);
            }});
		
  
});