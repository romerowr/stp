/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(".form-reg input [name=email]").on('change', function(){ 
   var email=$("input[name=email]").val();
   var md5 = $.md5(email);
   var dataString='email='+email;
   
   $.ajax({
       type: "POST",
       url: "/storypub.dev/app/controllers/register/valemail",
       data: dataString,
       success: function(data){
           dat=JSON.parse(data);
           $(".msg").html("<h3>"+dat.msg+"</h3>");
       }
   });
});

