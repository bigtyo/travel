$(document).ready(function(){
    
    $.ajax({
	url: "data/listing.json",
	type:'GET',
	success: function( data ) {
                
                var row = "";
                for(var i = 0;i<data.length;i++)
                 {
                    var classwarna = "";
                    if(data[i].status == "Active"){
                        classwarna = "label-satgreen";
                    }
                    else if(data[i].status == "Inactive"){
                        classwarna = "label-lightred";
                    }else{
                        classwarna = "label-satblue";
                    }
                    
                    row += '<tr >'+
                    
                    '<td style="cursor:pointer"><a href="listingdetail.php">'+data[i].gambar+'</a></td>'+
                    '<td>'+data[i].email+'</td>'+
                    '<td class="hidden-350">'+data[i].tipe+'</td>'+
                    '<td >'+data[i].lokasi+'</td>'+
                    '<td>'+data[i].harga+'</td>'+
                    '<td><span class="label '+classwarna+'">'+data[i].status+'</span></td>'+
                  '</tr>';
                 }
                 
                 //$("#datalisting").html(row);
                 
                 
            }});
		
  
});