var page = require('webpage').create();
//set page pixel
page.viewportSize = {
    width: 1920,
    height: 1080
};
 

var system = require('system');
var args = system.args;
var url = "https://book.citilink.co.id/loginagency.aspx";
var login = "0038000423";
var password = "LiNeLuCNCt!1";

var page = require('webpage').create(),
	server = url,
	data = 'ControlGroupLoginAgencyView$AgentLoginLoginAgencyView$TextBoxUserID='+login+'&ControlGroupLoginAgencyView$AgentLoginLoginAgencyView$PasswordFieldPassword='+password+'';

page.open(server,function () {
	page.includeJs("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", function() { //load jquery module untuk selector
		 
	    //update cek apakah page nanti sudah di load semua
	    page.onLoadFinished = function(status) {
	    	var res = page.evaluate(function(){
	    		$("#ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_TextBoxUserID").val(login);
	    		$("#ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_PasswordFieldPassword").val(password);
	    		
	    		return res;
	    	});
	    	console.log(res);
	    	phantom.exit();
	    };
	});
	
	
});

