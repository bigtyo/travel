/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var json = '['+
    '{'+
        '"kota": "Surabaya",'+
        '"area": "Darmahusada",'+
        '"tipe": "Ruko",'+
        '"range" : "500 jt - 1 M",'+
        '"luast" : "200 M - 600 M",'+
        '"luasb" : "160 M - 560 M",'+
        '"kt" : "0",'+
        '"tanggal": "03-07-2013",'+
        '"match": "3 Matched"'+
    '},'+
     '{'+
        '"kota": "Sidoarjo",'+
        '"area": "Mulyosari",'+
        '"tipe": "Rumah",'+
        '"range" : "500 jt - 1 M",'+
        '"luast" : "200 M - 600 M",'+
        '"luasb" : "160 M - 560 M",'+
        '"kt" : "2 - 3",'+
        '"tanggal": "3 Matched",'+
        '"match": "3 Matched"'+
    '},'+
     '{'+
        '"kota": "Surabaya",'+
        '"area": "Gunung sari",'+
        '"tipe": "Rumah",'+
        '"range" : "500 jt - 1 M",'+
        '"luast" : "200 M - 600 M",'+
        '"luasb" : "160 M - 560 M",'+
        '"kt" : "2 - 3",'+
        '"tanggal": "3 Matched",'+
        '"match": "3 Matched"'+
        
    
    '}'+
']';

function getdata()
{
    debugger;
    var data = $.parseJSON(json);
    var row = "";
    for(var i =0;i<data.length;i++)
    {
        row += '<tr>'+
           //'<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>'+
           '<td>'+data[i].tanggal+'</td>'+
           '<td>'+data[i].kota+'</td>'+
           '<td>'+data[i].area+'</td>'+
           '<td >'+data[i].tipe+'</td>'+
           '<td >'+data[i].range+'</td>'+
           '<td >'+data[i].luast+'</td>'+
           '<td >'+data[i].luasb+'</td>'+
           '<td >'+data[i].kt+'</td>'+
           '<td ><a href="listing_match.php">'+data[i].match+'</a></td>'+
         '</tr>';
    }
    
    $("#history").html(row);
    
    return;
}

$(document).ready(function(){
    
   getdata(); 
   
   
});
