$(document).ready(function(){
    $("#btnLogin").click(function(){
       var user = $("#userid").val();
       var pass = md5($("#password").val());
       
       $.post('login/signin',{
           username : user,
           password : pass
       },
       function(res){
           var json = res;
           
           if(Number(json.status) === 1)
           {
               window.location= json.referrer.toString();
           }
       });
   }); 

});


