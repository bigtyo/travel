/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var json = '['+
    '{'+
        '"nama": "Raditya",'+
        '"email": "mochammad.raditya@gmail.com",'+
        '"phone": "085646162619",'+
        '"tanggal": "03-07-2013"'+
    '},'+
     '{'+
        '"nama": "Bagus",'+
        '"email": "bagus.raditya@gmail.com",'+
        '"phone": "085646152619",'+
        '"tanggal": "03-07-2013"'+
    '},'+
     '{'+
        '"nama": "Pratama",'+
        '"email": "pratama.raditya@gmail.com",'+
        '"phone": "085614322619",'+
        '"tanggal": "03-02-2011"'+
    '},'+
     '{'+
        '"nama": "Budi",'+
        '"email": "budi@gmail.com",'+
        '"phone": "085612345325",'+
        '"tanggal": "03-02-2012"'+
    '},'+
     '{'+
        '"nama": "Santoso",'+
        '"email": "santoso@gmail.com",'+
        '"phone": "0856443256319",'+
        '"tanggal": "03-01-2012"'+
    '},'+
     '{'+
        '"nama": "Efendi",'+
        '"email": "Efendi@gmail.com",'+
        '"phone": "085645431119",'+
        '"tanggal": "03-02-2009"'+
    '},'+
     '{'+
        '"nama": "Bambang",'+
        '"email": "bambang@gmail.com",'+
        '"phone": "085621324519",'+
        '"tanggal": "03-08-2013"'+
    '},'+
     '{'+
        '"nama": "Rocky Balboa",'+
        '"email": "Rocky.Balboa@gmail.com",'+
        '"phone": "085646162619",'+
        '"tanggal": "03-01-2007"'+
    '},'+
     '{'+
        '"nama": "John Doe",'+
        '"email": "John.Doe@gmail.com",'+
        '"phone": "085646123122",'+
        '"tanggal": "03-07-2006"'+
    '},'+
     '{'+
        '"nama": "Sally Hauser",'+
        '"email": "Sally.Hauser@gmail.com",'+
        '"phone": "085622145619",'+
        '"tanggal": "01-07-2013"'+
    '},'+
     '{'+
        '"nama": "Robert Downey",'+
        '"email": "Robert.Downey@gmail.com",'+
        '"phone": "08564777777",'+
        '"tanggal": "03-03-2013"'+
    '},'+
     '{'+
        '"nama": "Gareth Block",'+
        '"email": "Gareth.Block@gmail.com",'+
        '"phone": "081245425435",'+
        '"tanggal": "03-02-2013"'+
    '},'+
     '{'+
        '"nama": "Rasya Atsaqof",'+
        '"email": "Rasya.Atsaqof@gmail.com",'+
        '"phone": "085646162619",'+
        '"tanggal": "08-05-2011"'+
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
           '<td>'+data[i].nama+'</td>'+
           '<td>'+data[i].email+'</td>'+
           '<td class="hidden-350">'+data[i].phone+'</td>'+
           '<td class="hidden-350">'+data[i].tanggal+'</td>'+
           '<td class="hidden-350">'+
                '<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>'+
                '<a href="#" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>'+
                '<a href="#" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>' +
           '</td>'+
         '</tr>';
    }
    
    $("#datatblCustomer").html(row);
    
    return;
}

$(document).ready(function(){
    
   //getdata(); 
   $("#btnupload").click(function(){
       $("#btnupload").fadeOut();
       $("#frmupload").fadeIn();
       window.location = "#frmupload";
   });
   
   $(":radio").click(function(){
       
       if($("#all").is(":checked"))
       {
           $("#receiver").slideUp();
       }
       
       if($("#some").is(":checked"))
       {
           $("#receiver").slideDown();
       }
   });
   
   $("#istemplate").click(function(){
       if($("#istemplate").is(":checked")){
            $("#controlmsg").slideUp(400,function(){
                 $("#controltemplate").slideDown();
            });
        }
        else
        {
            $("#controltemplate").slideUp(400,function(){
                 $("#controlmsg").slideDown();
            });
        }
   });
   
   
});