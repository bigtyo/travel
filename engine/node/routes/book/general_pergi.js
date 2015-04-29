var page = require('webpage').create();
//set page pixel
page.viewportSize = {
    width: 1920,
    height: 1080
};
 

var system = require('system');
var args = system.args;
var url = "http://flight.sinar-soft.com/search/?";
var origin = args[1];
var destination = args[2];
var brkt_tgl = args[3];
var plg_tgl = args[4];
var twoway = args[5];
var dewasa = args[6];
var child = args[7];
var infant = args[8];
var searchid = args[9];


function pecahtanggal(tanggal){
	var temp = tanggal.split('-');
	var result = {};
	result.bulan = normalizenum(temp[1]);
	result.tanggal = normalizenum(temp[2]);
	result.tahun = normalizenum(temp[0]);
	
	
	return result;
}

function pecahtanggal2(tanggal){
	var temp = tanggal.split('-');
	var result = {};
	result.bulan = temp[1];
	result.tanggal = temp[2];
	result.tahun = temp[0];
	
	
	return result;
}

function normalizenum(strnum){
	
	if(parseInt(strnum) < 10){
		strnum = "0"+ parseInt(strnum);
	}
	
	return strnum;
}

var tgl_awal = pecahtanggal(brkt_tgl);
var tgl_akhir = pecahtanggal(plg_tgl);
//var tgl_awal = pecahtanggal2(brkt_tgl);
//var tgl_akhir = pecahtanggal2(plg_tgl);

if(!twoway){
	tgl_akhir = tgl_awal;
}


url += "dari=x-"+origin;
url += "&ke=x-"+destination;
url += "&maskapai=ALL";
url += "&dewasa="+dewasa;
url += "&child="+child;
url += "&infant="+infant;
url += "&tgl="+brkt_tgl;


//page traveloka di load hingga selesai (jika onLoadfinished tidak di panggil di dalam page.open kadang dijalankan tidak hingga selesai) jadi scraping dimulai ketika page sudah di load sempurna
page.open(url, function() {
    page.includeJs("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", function() { //load jquery module untuk selector
 
    //update cek apakah page nanti sudah di load semua
    page.onLoadFinished = function(status) {
    console.log('Status: ' + url);
 
        //persiapan untuk write data kedalam file
        var fs = require('fs');
        
        //fungsi utama kita ambil class .flightResultGenerated dengan index outerText
        var res = page.evaluate(function() {
        	var result;
        	var data;
        	//var datacount = 0;
        	
        	
        	//console.log($('table#matcherDepartContainer tr').length);
        	data = $('table.table').html();
        	result = data;
        	
        	
        	return result;
        });
 
        //fungsi dump untuk dumping object
        //console.log(JSON.stringify(res));
        //res.url = url;
        //print data ke file
        var path = 'output_pergi'+searchid+'.json';
        var content = res;
        fs.write(path, content, 'w');
 
        //screen capture halaman web
        //page.render('outputtravel.png');
        //console.log('lihat pada directori')
        phantom.exit();
       };
    });
});