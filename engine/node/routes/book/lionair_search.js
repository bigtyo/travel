var system = require('system');
var args = system.args;

if (args.length === 1) {
  console.log('Try to pass some arguments when invoking this script!');
  phantom.exit();
}
var webPage = require('webpage');
var page = webPage.create();
//page.settings.userAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36';
page.settings.javascriptEnabled = true;

var testindex = 0, loadInProgress = false;



page.onLoadStarted = function() {
  loadInProgress = true;
  //console.log("<br>load started");
};

page.onLoadFinished = function() {
  loadInProgress = false;
  //console.log("<br>load finished");
};

page.onResourceTimeout = function(request) {
    console.log('Response (#' + request.id + '): ' + JSON.stringify(request));
};

page.onResourceError = function(resourceError) {
	  console.log('Unable to load resource (#' + resourceError.id + 'URL:' + resourceError.url + ')');
	  console.log('Error code: ' + resourceError.errorCode + '. Description: ' + resourceError.errorString);
};

var steps = [
  function() {
	  //Load Login Page
	  page.open("https://agent.lionair.co.id/LionAirAgentsPortal/Default.aspx",function(){
		  page.render('example.png');
	  });
	  
  },
  function(){
	  //console.log(page.plainText);
	  page.evaluate(function(args){
		  //console.log(JSON.stringify(args));
		  var user = args[8];
		  var pass = args[9];
		  //window.location.href = "https://booking.airasia.com/LoginAgent.aspx";
		  $("ControlGroupLoginAgentView_AgentLoginView_TextBoxUserID").value = user;
		  $("ControlGroupLoginAgentView_AgentLoginView_PasswordFieldPassword").value = pass;
		  //page.frameContent;
		  
	  },args);
  },
  function(){
	  page.evaluate(function() {
		  getElementById("ControlGroupLoginAgentView_AgentLoginView_LinkButtonLogIn").click();
	      //__doPostBack('ControlGroupLoginAgentView$AgentLoginView$LinkButtonLogIn','');

	    });
  },
  function(){
	  page.evaluate(function(){
		  window.$("#Search").click();
	  });
  },
  function() {
    //Enter Credentials
    page.evaluate(function(args) {

      
      var i;
	  var origin = args[1];
	  var destination = args[2];
	  var brkt_hari = args[3];
	  var brkt_bulan = args[4];
      var plg_hari = args[5];
	  var plg_bulan = args[6];
	  var twoway = args[7];
	  var dewasa = args[10];
	  var child = args[11];
	  var infant = args[11];
	  
	  var isrutevalid = true;
	  
	  var temp_brkt = brkt_bulan.split("-");
	  var temp_plg = plg_bulan.split("-");
	  
	  var tgl_brkt = brkt_hari + "/" + temp_brkt[1] + "/" + temp_brkt[0];
	  var tgl_plg = plg_hari + "/" + temp_plg[1] + "/" + temp_plg[0];
	  //console.log(twoway);
	  window.$("#ControlGroupSearchView_AvailabilitySearchInputSearchVieworiginStationMultiColumn1_1").val(origin).keyup();
	  //window.$("#AvailabilitySearchInputBookingListVieworiginStation1").change();
	  if(window.$(".multicoldd-item a").lenght > 0){
		  window.$(".multicoldd-item a").click();
	  }else{
		  isrutevalid = false;
	  }
	  
	  
	  window.$("#ControlGroupSearchView_AvailabilitySearchInputSearchViewdestinationStationMultiColumn1_1").val(destination).keyup();
	  
	  if(window.$(".multicoldd-item a").lenght > 0){
		  window.$(".multicoldd-item a").click();
	  }else{
		  isrutevalid = false;
	  }
	  
	  if(!isrutevalid){
		  var data = {};
		  
		  console.log(JSON.stringify(data));
		  phantom.exit();
	  }
	  
	  window.$("#ControlGroupSearchView_AvailabilitySearchInputSearchViewdate_picker_display_id_1").val(tgl_brkt);
	  
	  
	  
	  if(twoway == 1){
		window.$("#ControlGroupSearchView_AvailabilitySearchInputSearchView_RoundTrip").click();
		window.$("#ControlGroupSearchView_AvailabilitySearchInputSearchViewdate_picker_display_id_2").val(tgl_plg);
		
	  }else{
		window.$("#ControlGroupSearchView_AvailabilitySearchInputSearchView_OneWay").click();

	  }
	  
	  
	  
    },args);
  }, 
  function() {
    //Login
    page.evaluate(function() {
      window.$("#ControlGroupSearchView_ButtonSubmit").submit();
      window.$("#ControlGroupSearchView_ButtonSubmit").click();

    });
  }, 
  function() {
    // Output content of page to stdout after form has been submitted
    page.evaluate(function() {
		var pergi_exist = window.$("#availabilityInputContent1").length > 0;
		//console.log("pergi ada : " + pergi_exist);
		var pulang_exist = window.$("#availabilityInputContent2").length > 0;
		var html = "";
		var count = 0;
		var jam = new Array();
		var list = new Array();
		var listpromo = new Array();
		var listharga = new Array();
		var item = new Array();
		
		var data = {};
		var pergi = new Array();
		var kembali = new Array();
		var daftar = {};
		if(pergi_exist){
			count = 0;
			listcount = 0;
			list = new Array();
			listpromo = new Array();
			listharga = new Array();
			var datacount = 0;
			window.$("#availabilityInputContent1 table tr.rgRow").each(function(){
				
			  window.$(this).find("td.selectedAirlineCode div.segmentStation").each(function(){
				  window.$(this).find('p span').remove();
				  var jamcount = 0;
				  window.$(this).find('p').each(function(){
					  jam[jamcount] = $(this).text();
					  jamcount++;
				  });
				  
				  
				  
				  daftar = {};
				  daftar.jam = jam[0] + " - " + jam[1];;
				  daftar.rute = "";
				  daftar.kodeterbang = "";
				  
				  var hargacount = 0;
				  var listprice = new Array();
				  window.$(this).find("td.resultFareCell2").each(function(){
					  var price = window.$(this).find("div.resultFareCell2 div.price")[0];
					  listprice[hargacount] = price;
					  hargacount++;
				  });
				  //var price = window.$(this).find("td.resultFareCell2 div.resultFareCell2 div.price")[0];
				  //$(price).find("span").text();
				  //daftar.promo = listpromo;
				  daftar.harga = listprice;
				  count++;
			  });
		      
			  kembali[datacount] = daftar;
			  datacount++;
			});
			
			data.pergi = pergi;
			
			
			



//			html += $(window.$(".select-flight")[0]).html();
//			html += '<div class="pergi"><table class="w99 availabilityTable" id="availabilityTable0">';
//			html += window.$("#availabilityTable0").html();
//			html+= '</table></div>';
		}
		
		if(pulang_exist){
			count = 0;
			listcount = 0;
			list = new Array();
			listpromo = new Array();
			listharga = new Array();
			var datacount = 0;
			window.$("#availabilityInputContent1 table tr.rgRow").each(function(){
				
			  window.$(this).find("td.selectedAirlineCode div.segmentStation").each(function(){
				  window.$(this).find('p span').remove();
				  var jamcount = 0;
				  window.$(this).find('p').each(function(){
					  jam[jamcount] = $(this).text();
					  jamcount++;
				  });
				  
				  
				  
				  daftar = {};
				  daftar.jam = jam[0] + " - " + jam[1];;
				  daftar.rute = "";
				  daftar.kodeterbang = "";
				  
				  var hargacount = 0;
				  var listprice = new Array();
				  window.$(this).find("td.resultFareCell2").each(function(){
					  var price = window.$(this).find("div.resultFareCell2 div.price")[0];
					  listprice[hargacount] = price;
					  hargacount++;
				  });
				  //var price = window.$(this).find("td.resultFareCell2 div.resultFareCell2 div.price")[0];
				  //$(price).find("span").text();
				  //daftar.promo = listpromo;
				  daftar.harga = listprice;
				  count++;
			  });
		      
			  kembali[datacount] = daftar;
			  datacount++;
			});
			
			data.kembali = kembali;
				//console.log(JSON.stringify(list));
		}
		console.log(JSON.stringify(data));
      
    });
  }
];


interval = setInterval(function() {
  if (!loadInProgress && typeof steps[testindex] == "function") {
    console.log("step " + (testindex + 1));
    steps[testindex]();
    testindex++;
  }
  if (typeof steps[testindex] != "function") {
    //console.log("test complete!");
    phantom.exit();
  }
}, 100);