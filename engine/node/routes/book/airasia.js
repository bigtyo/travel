var casper = require('casper').create({
    verbose: true,
    logLevel: "debug",
    pageSettings: {
	    loadImages: false,
	    loadPlugins: true,
	    //userAgent: 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1588.0 Safari/537.36',
	    webSecurityEnabled: false
	  }
});

var fs = require('fs');
var CookieJar = "cookiejar_airasia.json";
var pageResponses = {};

var options = casper.cli.options;

var url = "http://www.airasia.com/id/id/login/travel-agent.page";
var login = options['login'];
var pass = options['password'];
var tanggalawal = options['tanggalawal'];
var tanggalakhir = options['tanggalakhir'];
var dari = options['dari'];
var tujuan = options['tujuan'];
var dewasa = options['dewasa'];
var infant = options['infant'];
var istwoway = options['twoway'];
var direction = "RoundTrip";
var isloginfailed = false;

function pecahtanggal(tanggal){
	var temp = tanggal.split('-');
	var result = {};
	result.bulan = temp[0] + "-" +temp[1];
	result.tanggal = temp[2];
	
	return tanggal;
}

function e_val(tgla,tglb){
	casper.echo("evaluation url : " + casper.getCurrentUrl());
	casper.waitForSelector("#AvailabilitySearchInputBookingListView_ButtonSubmit",function(){
		
		casper.evaluate(function(tgl_a, tgl_b) {
		    $("#AvailabilitySearchInputBookingListVieworiginStation1").val(dari);
		    $("#AvailabilitySearchInputBookingListVieworiginStation1").change();
		    //this.echo($("#AvailabilitySearchInputBookingListVieworiginStation1").val());
		    $("#AvailabilitySearchInputBookingListViewdestinationStation1").val(tujuan);
		    $("#AvailabilitySearchInputBookingListViewdestinationStation1").change();
		    
		    //AvailabilitySearchInputBookingListView_RoundTrip
		    //AvailabilitySearchInputBookingListView_OneWay
		    
		    //tgl brkt
		    $("#AvailabilitySearchInputBookingListView_DropDownListMarketDay1").val(tgl_a.tanggal);
		    $("#AvailabilitySearchInputBookingListView_DropDownListMarketDay1").change();
		    $("#AvailabilitySearchInputBookingListView_DropDownListMarketMonth1").val(tgl_a.bulan);
		    $("#AvailabilitySearchInputBookingListView_DropDownListMarketMonth1").change();
		    
		    
		    //tgl pulang
		    $("#AvailabilitySearchInputBookingListView_DropDownListMarketDay2").val(tgl_b.tanggal);
		    $("#AvailabilitySearchInputBookingListView_DropDownListMarketDay2").change();
		    $("#AvailabilitySearchInputBookingListView_DropDownListMarketMonth2").val(tgl_b.bulan);
		    $("#AvailabilitySearchInputBookingListView_DropDownListMarketMonth2").change();
		    
		    //adult
		    //AvailabilitySearchInputBookingListView_DropDownListPassengerType_ADT
		    $("#AvailabilitySearchInputBookingListView_DropDownListPassengerType_ADT").val(dewasa);
		    $("#AvailabilitySearchInputBookingListView_DropDownListPassengerType_ADT").change();
		    
		    //child
		    //AvailabilitySearchInputBookingListView_DropDownListPassengerType_CHD
		    
		    //infant
		    //AvailabilitySearchInputBookingListView_DropDownListPassengerType_INFANT
		    $("#AvailabilitySearchInputBookingListView_DropDownListPassengerType_INFANT").val(infant);
		    $("#AvailabilitySearchInputBookingListView_DropDownListPassengerType_INFANT").change();
		    
		    $("#AvailabilitySearchInputBookingListView_ButtonSubmit").submit();
		    $("#AvailabilitySearchInputBookingListView_ButtonSubmit").click();
		    
		}, tgla, tglb);
	},
	function then(){
		
	},
	function timeout(){
		
	});
	
}

if(fs.isFile(CookieJar))
    Array.prototype.forEach.call(JSON.parse(fs.read(CookieJar)), function(x){
        phantom.addCookie(x);
    });
casper.onResourceReceived = function(response) {
    pageResponses[response.url] = response.status;
    fs.write(CookieJar, JSON.stringify(phantom.cookies), "w");
};
casper.start(url);



casper.waitForSelector("#form1",function(){
	this.echo("login form found");
	if(!istwoway){
		direction = "OneWay";
	}
	//this.page.switchToParentFrame();	
	/*this.evaluate(function(user,passw){
    	this.echo("user : " + user);
    	this.echo("pass : " + passw);
    	window.$("#ControlGroupLoginAgentView_AgentLoginView_TextBoxUserID").val(user);
    	window.$("#ControlGroupLoginAgentView_AgentLoginView_PasswordFieldPassword").val(passw);
    	__utils__.mouseEvent("click", "#ControlGroupLoginAgentView_AgentLoginView_LinkButtonLogIn");
    },login,pass);*/
//	this.fill('form#SkySales',{
//    	'ControlGroupLoginAgentView$AgentLoginView$TextBoxUserID' : login,
//		'ControlGroupLoginAgentView$AgentLoginView$PasswordFieldPassword' : pass
//    	//'input[type=text]' : login,
//    	//'input[type=password]' : pass
//    },true);
    
    
    
//    this.then(function(){
//    	this.evaluate(function(){
//    		this.echo("submit login now");
//    		window.$("#ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_ButtonLogIn").submit();
//        	window.$("#ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_ButtonLogIn").click();
//    		
//    	});
//    });
//    
});

casper.thenEvaluate(function(user,passw){
	//.evaluate(function(user,passw){
    	this.echo("user : " + user);
    	this.echo("pass : " + passw);
    	window.$("#ControlGroupLoginAgentView_AgentLoginView_TextBoxUserID").val(user);
    	window.$("#ControlGroupLoginAgentView_AgentLoginView_PasswordFieldPassword").val(passw);
    	__utils__.mouseEvent("click", "#ControlGroupLoginAgentView_AgentLoginView_LinkButtonLogIn");
    //},login,pass);
},login,pass);

casper.waitForSelector('.errorSectionHeader',
	function(){
		this.echo("error");
		
		this.echo(this.getHTML("#errorSectionContent"));
		isloginfailed = true;
		//e_val(tgla,tglb);
	//	this.fill('form#SkySales',{
	//		AvailabilitySearchInputBookingListView$DropDownListMarketDay1:tgla.tanggal,
	//		AvailabilitySearchInputBookingListView$DropDownListMarketDay2:tglb.tanggal,
	//		AvailabilitySearchInputBookingListView$DropDownListMarketMonth1:tgla.bulan,
	//		AvailabilitySearchInputBookingListView$DropDownListMarketMonth2:tglb.bulan,
	//		//AvailabilitySearchInputBookingListView$DropDownListPassengerType_ADT:dewasa,
	//		//AvailabilitySearchInputBookingListView$DropDownListPassengerType_CHD:0,
	//		//AvailabilitySearchInputBookingListView$DropDownListPassengerType_INFANT:infant,
	//		AvailabilitySearchInputBookingListView$RadioButtonMarketStructure:direction,
	//		AvailabilitySearchInputBookingListView$TextBoxMarketDestination1:tujuan,
	//		AvailabilitySearchInputBookingListView$TextBoxMarketOrigin1:dari,
	//		AvailabilitySearchInputBookingListViewdestinationStation1:tujuan,
	//		AvailabilitySearchInputBookingListVieworiginStation1:dari
	//		//date_picker:tanggalawal,
	//		//date_picker:tanggalakhir
	//	},true);
		
		
		
		
	},
	function then(){
		
	},
	function timeout(){
		isloginfailed = false;
		//this.unwait();
	}
	
);

casper.thenBypassIf(function() {
	this.echo('bypass mode = ' + isloginfailed);
    return isloginfailed;
}, 2);

casper.then(function(){
	var tgla = pecahtanggal(tanggalawal);
	var tglb = pecahtanggal(tanggalakhir);
	this.echo(tgla);
	e_val(tgla, tglb);
	
	
});


casper.then(function(){
	
	this.waitForSelector('#availabilityTable0',function(){
		//this.then(function(){
		console.log("submit berhasil");
    		this.echo(this.getHTML());
    	//});
	});
});
//casper.userAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X)');
casper.options.waitTimeout = 30000;
casper.run(function(){
	this.echo(this.getCurrentUrl());
	this.exit();
});

