var system = require('system');
var args = system.args;

if (args.length === 1) {
  console.log('Try to pass some arguments when invoking this script!');
  phantom.exit();
}
var webPage = require('webpage');
var page = webPage.create();
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

var steps = [
  function() {
    //Load Login Page
    page.open("https://book.citilink.co.id/LoginAgency.aspx");
  },
  function(){
	  page.evaluate(function(args){
		  //console.log(JSON.stringify(args));
		  var user = args[8];
		  var pass = args[9];
		  
		  window.$("#ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_TextBoxUserID").val(user);
		  window.$("#ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_PasswordFieldPassword").val(pass);
		  
	  },args);
  },
  function(){
	  page.evaluate(function() {
	      window.$("#ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_ButtonLogIn").submit();
	      window.$("#ControlGroupLoginAgencyView_AgentLoginLoginAgencyView_ButtonLogIn").click();

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
	  
	  //console.log(twoway);
	  window.$("#AvailabilitySearchInputBookingListVieworiginStation1").val(origin);
	  window.$("#AvailabilitySearchInputBookingListVieworiginStation1").change();
	  
	  
	  window.$("#AvailabilitySearchInputBookingListViewdestinationStation1").val(destination);
	  window.$("#AvailabilitySearchInputBookingListViewdestinationStation1").change();
	  //console.log("<br>Destination :" + window.$("#Destination").val());
	  
	  window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketMonth1").val(brkt_bulan);
	  //console.log("<br>bulan :" + window.$("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1").val());
	  window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketDay1").val(brkt_hari);
	  
	  if(twoway == 1){
		window.$("#AvailabilitySearchInputSearchView_RoundTrip").click();
		window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketMonth2").val(plg_bulan);
		//console.log("<br>bulan :" + window.$("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1").val());
		window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketDay2").val(plg_hari);
		//console.log("<br>hari :" + window.$("#AvailabilitySearchInputSearchView_DropDownListMarketDay1").val());
		
//		console.log("<br>Rute 2 way : " + window.$("#AvailabilitySearchInputBookingListVieworiginStation1").val() + " - " + 
//				window.$("#AvailabilitySearchInputBookingListViewdestinationStation1").val() + 
//				"<br> tanggal pergi : "+window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketMonth1").val() + "-" +window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketDay1").val()
//		+ "<br> tanggal kembali : "+window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketMonth2").val() + "-" +window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketDay2").val());
	  }else{
		//window.$("#AvailabilitySearchInputSearchView_OneWay").click();
//		console.log("<br>Rute 1 way : " + window.$("#AvailabilitySearchInputBookingListVieworiginStation1").val() + " - " + 
//				window.$("#AvailabilitySearchInputBookingListViewdestinationStation1").val() + 
//				"<br> tanggal pergi : "+window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketMonth1").val() + "-" +window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketDay1").val()
//		+ "<br> tanggal kembali : "+window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketMonth2").val() + "-" +window.$("#AvailabilitySearchInputBookingListView_DropDownListMarketDay2").val());
	  }
	  
	  
	  
    },args);
  }, 
  function() {
    //Login
    page.evaluate(function() {
      window.$("#AvailabilitySearchInputBookingListView_ButtonSubmit").submit();
      window.$("#AvailabilitySearchInputBookingListView_ButtonSubmit").click();

    });
  }, 
  function() {
    // Output content of page to stdout after form has been submitted
    page.evaluate(function() {
		var pergi_exist = window.$("#availabilityTable0").length > 0;
		//console.log("pergi ada : " + pergi_exist);
		var pulang_exist = window.$("#availabilityTable1").length > 0;
		var html = "";
		var count = 0;
		var listcount = 0;
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
			window.$("#availabilityTable0 tr td.center").each(function(){
			  
			  
			  if(count % 3 == 0){
			    
			    listcount++;
			    item = new Array();
			    item[0] = $(this).html();
			    list[listcount-1] = item;
			    
			    
			  }else{
				list[listcount-1][count % 3] = window.$(this).html();
				//item.rute = $(this).html();
				//item.flights = $(this).html();
				
			  }
			  count++;
			  
			});
			count = 0;
			window.$("#availabilityTable1 tr td.fareCol1 p").each(function(){
				var hargacount = 0;
				var harga = new Array();
				$(this).find("p").each(function(){
					
					hargatemp = $(this).text().split("\n");
					harga[hargacount] = hargatemp[0] + "( " + hargatemp[hargatemp.length -2].trim();
					hargacount++;
				});
				listpromo[count] = harga;
			});

			count = 0;
			$("#availabilityTable1 tr td.fareCol2").each(function(){
				
				//listharga[count] =
				var hargacount = 0;
				var harga = new Array();
				$(this).find("p").each(function(){
					
					hargatemp = $(this).text().split("\n");
					harga[hargacount] = hargatemp[0] + "( " + hargatemp[hargatemp.length -2].trim();
					hargacount++;
				});
				listharga[count] = harga;
				count++;
			});
			
			for(var i = 0;i<list.length -1 ;i++){
				daftar = {};
				daftar.jam = list[i][0];
				daftar.rute = list[i][1];
				daftar.kodeterbang = list[i][2];
				daftar.promo = listpromo;
				daftar.harga = listharga;
				pergi[i] = daftar;
			}
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
			item = new Array();
			window.$("#availabilityTable1 tr td.center").each(function(){
				  
				  
				  if(count % 3 == 0){
				    
				    listcount++;
				    item = new Array();
				    item[0] = $(this).html();
				    list[listcount-1] = item;
				    
				    
				  }else{
					list[listcount-1][count % 3] = window.$(this).html();
					//item.rute = $(this).html();
					//item.flights = $(this).html();
					
				  }
				  count++;
				  
			});
			count = 0;
			window.$("#availabilityTable1 tr td.fareCol1 p").each(function(){
				var hargacount = 0;
				var harga = new Array();
				$(this).find("p").each(function(){
					
					hargatemp = $(this).text().split("\n");
					harga[hargacount] = hargatemp[0] + "( " + hargatemp[hargatemp.length -2].trim();
					hargacount++;
				});
				listpromo[count] = harga;
			});

			count = 0;
			$("#availabilityTable1 tr td.fareCol2").each(function(){
				
				//listharga[count] =
				var hargacount = 0;
				var harga = new Array();
				$(this).find("p").each(function(){
					var hargatemp;
					hargatemp = $(this).text().split("\n");
					harga[hargacount] = hargatemp[0] + "( " + hargatemp[hargatemp.length -2].trim();
					hargacount++;
				});
				listharga[count] = harga;
				count++;
			});
			for(var i = 0;i<list.length -1 ;i++){
				daftar = {};
				daftar.jam = list[i][0];
				daftar.rute = list[i][1];
				daftar.kodeterbang = list[i][2];
				daftar.promo = listpromo[i];
				daftar.harga = listharga[i];
				kembali[i] = daftar;
			}
			data.kembali = kembali;
				//console.log(JSON.stringify(list));
		}
		console.log(JSON.stringify(data));
      
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
}, 1000);