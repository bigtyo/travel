var casper = require('casper').create({
    verbose: true,
    logLevel: "debug"
});
var options = casper.cli.options;

var url = "http://www.traveloka.com/fulltwosearch?ap=BPN.SUB&dt=09-12-2014.11-12-2014&ps=1.1.1";

var tanggalawal = options['tanggalawal'];
var tanggalakhir = options['tanggalakhir'];
var dari = options['dari'];
var tujuan = options['tujuan'];
var dewasa = options['dewasa'];
var infant = options['infant'];
var child = options['child'];
var istwoway = options['twoway'];
var direction = "RoundTrip";
var isloginfailed = false;



function pecahtanggal(tanggal){
	var temp = tanggal.split('-');
	var result = {};
	result.bulan = normalizenum(temp[1]);
	result.tanggal = normalizenum(temp[2]);
	result.tahun = normalizenum(temp[0]);
	console.log(temp);
	
	return tanggal;
}

function normalizenum(strnum){
	if(parseInt(strnum) < 10){
		strnum = "0"+ parseInt(strnum);
	}
	
	return strnum;
}



var temp_tglawal = pecahtanggal(tanggalawal)
var temp_tglakhir = pecahtanggal(tanggalakhir)
console.log(tanggalawal);
console.log(JSON.stringify(temp_tglawal));
//url += "?ap="+dari+"."+tujuan+"&dt="+temp_tglawal.tanggal+"-"+temp_tglawal.bulan+"-"+temp_tglawal.tahun+"."+
//+temp_tglakhir.tanggal+"-"+temp_tglakhir.bulan+"-"+temp_tglakhir.tahun+"&ps="+dewasa+"."+child+"."+infant;
casper.options.waitTimeout = 60000;
casper.echo(url);
casper.start(url);

casper.waitUntilVisible("#loadingBar",function(){
	this.echo("loading bar found");
},function(){
	
});

var html = "";
casper.waitWhileSelector("#loadingBar",function(){
	this.echo("loading bar done");
	this.evaluate(function(ht){
		
		ht = document.$("#resultContainer").html();
	},html);
});
casper.userAgent('Mozilla/5.0 (Windows NT 6.1; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0');

casper.run(function(){
	this.echo(this.getCurrentUrl());
	this.echo("html: " + html);
	this.exit();
});

