var system = require('system');
var args = system.args;
var fs = require('fs');
var CookieJar = "cookiejar_airasia.json";
var pageResponses = {};


if (args.length === 1) {
  console.log('Try to pass some arguments when invoking this script!');
  phantom.exit();
}
var webPage = require('webpage');
var page = webPage.create();
page.settings.userAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36';
var testindex = 0, loadInProgress = false;

page.onConsoleMessage = function(msg) {
  console.log(msg);
};

page.onLoadStarted = function() {
  loadInProgress = true;
  //console.log("<br>load started");
};

page.onLoadFinished = function() {
  loadInProgress = false;
  //console.log("<br>load finished");
};

page.onResourceReceived = function(response) {
    pageResponses[response.url] = response.status;
    fs.write(CookieJar, JSON.stringify(phantom.cookies), "w");
};

page.onError = function(msg, trace) {
    var msgStack = ['ERROR: ' + msg];
    if (trace && trace.length) {
        msgStack.push('TRACE:');
        trace.forEach(function(t) {
            msgStack.push(' -> ' + t.file + ': ' + t.line + (t.function ? ' (in function "' + t.function + '")' : ''));
        });
    }
    // uncomment to log into the console 
     console.error(msgStack.join('\n'));
};

if(fs.isFile(CookieJar))
    Array.prototype.forEach.call(JSON.parse(fs.read(CookieJar)), function(x){
        phantom.addCookie(x);
    });

var steps = [
  function() {
    //Load Login Page
    page.open("http://agent.sriwijayaair.co.id/SJ-Eticket/login.php?action=in");
  },
  function(){
	  page.evaluate(function(args){
		  //console.log(JSON.stringify(args));
		  var user = args[8];
		  var pass = args[9];
		  //window.location.href = "https://booking.airasia.com/LoginAgent.aspx";
		  $("#username").val(user);
		  $("#password").val(pass);
		  
	  },args);
  },
  function(){
	  page.evaluate(function() {
		  $("input[type=submit]").submit();
	      $("input[type=submit]").click();

	    });
  },
//  function(){
//	  page.evaluate(function(){
//		  window.$("#Search").click();
//	  });
//  },
  function() {
    //Enter Credentials
	  console.log(page.url);
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
	  
	  var months = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OKT','NOV','DES'];
	  var isrutevalid = true;
	  //console.log(brkt_bulan);
	  var temp_brkt = brkt_bulan.split("-");
	  var temp_plg = plg_bulan.split("-");
	  
	  var tgl_brkt = brkt_hari + "-" + months[parseInt(temp_brkt[1])-1] + "-" + temp_brkt[0].replace("20","");
	  var tgl_plg = plg_hari + "-" +  months[parseInt(temp_plg[1])-1] + "-" + temp_plg[0].replace("20","");
	  //console.log(twoway);
	  window.jQuery("#ruteBerangkat").val(origin).change();
	  window.jQuery("#ruteBerangkat").change();
	  
	  console.log("origin : " +origin +" - " + destination);
	  console.log("tgl :" + tgl_brkt + " - " +tgl_plg );
	  window.jQuery("#ruteTujuan").val(destination).change();
	  
	  
	  
	  window.jQuery("#tanggalBerangkat").val(tgl_brkt);
	  
	 // console.log(window.jQuery("#tanggalBerangkat").val());
	  
	  if(twoway != 1){
		window.jQuery("div.spRadioOW input").click();
		window.jQuery("#tanggalTujuan").val(tgl_plg);
		
	  }else{
		window.jQuery("#div.spRadioRT input").click();

	  }
	  
	  window.jQuery("#ADT").val(dewasa);
	  window.jQuery("#CHD").val(child);
	  window.jQuery("#INF").val(infant);
	  
	  window.jQuery("#tanggalTujuan").val();
	  console.log(window.jQuery("#ADT").val());
	  
    },args);
  }, 
  function() {
    //Login
    page.evaluate(function() {
      
      window.jQuery("div.spSubmitButton input.searchPanelSubmitButton").submit();
      window.jQuery("div.spSubmitButton input.searchPanelSubmitButton").click();

    });
  }, 
  function() {
	  
	  console.log(page.url);
    // Output content of page to stdout after form has been submitted
    page.evaluate(function() {
		var pergi_exist = window.jQuery(".tableAvailability").length > 0;
//		
		var pulang_exist = window.jQuery("#table_back").length > 0;
		console.log(pergi_exist);
//		var html = "";
//		var count = 0;
//		var jam = new Array();
//		var list = new Array();
//		var listpromo = new Array();
//		var listharga = new Array();
//		var item = new Array();
//		
//		var data = {};
//		var pergi = new Array();
//		var kembali = new Array();
//		var daftar = {};
//		if(pergi_exist){
//			count = 0;
//			listcount = 0;
//			list = new Array();
//			listpromo = new Array();
//			listharga = new Array();
//			
//			window.jQuery("#table_go tr").each(function(){
//			  daftar = {};
//			  daftar.kodeterbang = window.jQUery(this).find("td.flightNum span").text();
//			  var jam = new Array();
//			  var rut = new Array();
//			  var jamcount = 0;
//			  window.jQuery(this).find("arrInfo").each(function(){
//				  jam[jamcount] = window.jQuery(this).find("span")[1].innerText;
//				  rut[jamcount] = window.jQuery(this).find("span")[0].innerText;
//				  jamcount++;
//			  });
//			  daftar.jam = jam[0] + " - " + jam[1];;
//			  daftar.rute = "";
//			  
//			  window.jQuery(this).find("td.selectedAirlineCode div.segmentStation").each(function(){
//				  window.jQuery(this).find('td.arrInfo span').remove();
//				  var jamcount = 0;
//				  window.jQuery(this).find('p').each(function(){
//					  jam[jamcount] = jQuery(this).text();
//					  jamcount++;
//				  });
//				  
//				  
//				  
//				  
//				  
//				  var hargacount = 0;
//				  var listprice = new Array();
//				  window.jQuery(this).find("td.resultFareCell2").each(function(){
//					  var price = window.jQuery(this).find("div.resultFareCell2 div.price")[0];
//					  listprice[hargacount] = price;
//					  hargacount++;
//				  });
//				  
//				  daftar.harga = listprice;
//				  count++;
//			  });
//		      
//			  kembali[datacount] = daftar;
//			  datacount++;
//			});
//			
//			data.pergi = pergi;
//			
//			
//			
//
//
//
//
//		}
//		
//		if(pulang_exist){
//			count = 0;
//			listcount = 0;
//			list = new Array();
//			listpromo = new Array();
//			listharga = new Array();
//			var datacount = 0;
//			window.jQuery("#availabilityInputContent1 table tr.rgRow").each(function(){
//				
//			  window.jQuery(this).find("td.selectedAirlineCode div.segmentStation").each(function(){
//				  window.jQuery(this).find('p span').remove();
//				  var jamcount = 0;
//				  window.jQuery(this).find('p').each(function(){
//					  jam[jamcount] = jQuery(this).text();
//					  jamcount++;
//				  });
//				  
//				  
//				  
//				  daftar = {};
//				  daftar.jam = jam[0] + " - " + jam[1];;
//				  daftar.rute = "";
//				  daftar.kodeterbang = "";
//				  
//				  var hargacount = 0;
//				  var listprice = new Array();
//				  window.jQuery(this).find("td.resultFareCell2").each(function(){
//					  var price = window.jQuery(this).find("div.resultFareCell2 div.price")[0];
//					  listprice[hargacount] = price;
//					  hargacount++;
//				  });
//				 
//				  daftar.harga = listprice;
//				  count++;
//			  });
//		      
//			  kembali[datacount] = daftar;
//			  datacount++;
//			});
//			
//			data.kembali = kembali;
//				//console.log(JSON.stringify(list));
//		}
//		console.log(JSON.stringify(data));
      
    });
  }
];


interval = setInterval(function() {
  if (!loadInProgress && typeof steps[testindex] == "function") {
    //console.log("step " + (testindex + 1));
    steps[testindex]();
    testindex++;
  }
  if (typeof steps[testindex] != "function") {
    //console.log("test complete!");
    phantom.exit();
  }
}, 100);