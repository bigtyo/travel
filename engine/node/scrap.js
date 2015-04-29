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
		  console.log(JSON.stringify(args));
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
	  
	  //console.log(twoway);
	  window.$("#AvailabilitySearchInputBookingListVieworiginStation1").val(origin);
	  window.$("#AvailabilitySearchInputBookingListVieworiginStation1").change();
	  
	  
	  window.$("#AvailabilitySearchInputBookingListViewdestinationStation1").val(destination);
	  window.$("#AvailabilitySearchInputBookingListViewdestinationStation1").change();
	  //console.log("<br>Destination :" + window.$("#Destination").val());
	  
	  window.$("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1").val(brkt_bulan);
	  //console.log("<br>bulan :" + window.$("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1").val());
	  window.$("#AvailabilitySearchInputSearchView_DropDownListMarketDay1").val(brkt_hari);
	  
	  if(twoway == 1){
		//window.$("#AvailabilitySearchInputSearchView_RoundTrip").click();
		//window.$("#AvailabilitySearchInputSearchView_DropDownListMarketMonth2").val(plg_bulan);
		//console.log("<br>bulan :" + window.$("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1").val());
		//window.$("#AvailabilitySearchInputSearchView_DropDownListMarketDay2").val(plg_hari);
		//console.log("<br>hari :" + window.$("#AvailabilitySearchInputSearchView_DropDownListMarketDay1").val());
		
		console.log("<br>Rute : " + window.$("#AvailabilitySearchInputBookingListVieworiginStation1").val() + " - " + 
				window.$("#AvailabilitySearchInputBookingListViewdestinationStation1").val() + 
				"<br> tanggal pergi : "+window.$("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1").val() + "-" +window.$("#AvailabilitySearchInputSearchView_DropDownListMarketDay1").val()
		+ "<br> tanggal kembali : "+window.$("#AvailabilitySearchInputSearchView_DropDownListMarketMonth2").val() + "-" +window.$("#AvailabilitySearchInputSearchView_DropDownListMarketDay2").val());
	  }else{
		//window.$("#AvailabilitySearchInputSearchView_OneWay").click();
		console.log("<br>Rute : " + window.$("#Origin").val() + " - " + 
				window.$("#AvailabilitySearchInputBookingListViewdestinationStation1").val() + 
				"<br> tanggal pergi : "+window.$("#AvailabilitySearchInputSearchView_DropDownListMarketMonth1").val() + "-" +window.$("#AvailabilitySearchInputSearchView_DropDownListMarketDay1").val()
		+ "<br> tanggal kembali : "+window.$("#AvailabilitySearchInputSearchView_DropDownListMarketMonth2").val() + "-" +window.$("#AvailabilitySearchInputSearchView_DropDownListMarketDay2").val());
	  }
	  
	  
	  
    },args);
  }, 
  function() {
    //Login
    page.evaluate(function() {
      window.$("#AvailabilitySearchInputSearchView_ButtonSubmit").submit();
      window.$("#AvailabilitySearchInputSearchView_ButtonSubmit").click();

    });
  }, 
  function() {
    // Output content of page to stdout after form has been submitted
    page.evaluate(function() {
		var pergi_exist = window.$("#availabilityTable0").length > 0;
		//console.log("pergi ada : " + pergi_exist);
		var pulang_exist = window.$("#availabilityTable1").length > 0;
		var html = "";
		if(pergi_exist){
			html += $(window.$(".select-flight")[0]).html();
			html += '<div class="pergi"><table class="w99 availabilityTable" id="availabilityTable0">';
			html += window.$("#availabilityTable0").html();
			html+= '</table></div>';
		}
		
		if(pulang_exist){
			html += $(window.$(".select-flight")[1]).html();
			html += '<div class="pulang"><table class="w99 availabilityTable" id="availabilityTable1">';
			html += window.$("#availabilityTable1").html();
			html+= '</table></div>';
		}
		
      console.log(html);
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