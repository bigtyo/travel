var page = require('webpage').create();
//set page pixel
page.viewportSize = {
    width: 1920,
    height: 1080
};
 

var system = require('system');
var args = system.args;
var url = "http://www.tiket.com/pesawat/cari?";
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
	//console.log(strnum);
	if(parseInt(strnum) < 10){
		strnum = "0"+ parseInt(strnum,10);
		//console.log(strnum);
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
//dari=Balikpapan-BPN&ke=Surabaya-SUB&maskapai=ALL&tgl=2014-12-12&dewasa=1&child=1&infant=1
//url += "ap="+origin+"."+destination;
//url += "&dt="+tgl_awal.tanggal+"-"+tgl_awal.bulan+"-"+tgl_awal.tahun+"."+tgl_akhir.tanggal+"-"+tgl_akhir.bulan+"-"+tgl_akhir.tahun;
//url += "&ps="+dewasa+"."+child+"."+infant;


//console.log(url);
//url += "dari=x-"+origin;
//url += "&ke=x-"+destination;
//url += "&maskapai=ALL";
//url += "&dewasa="+dewasa;
//url += "&child="+child;
//url += "&infant="+infant;

url += "d="+origin+"&a="+destination+"&date="+brkt_tgl+"&ret_date="+plg_tgl+"&adult=1&child=1&infant=1";
//console.log(url);
//page traveloka di load hingga selesai (jika onLoadfinished tidak di panggil di dalam page.open kadang dijalankan tidak hingga selesai) jadi scraping dimulai ketika page sudah di load sempurna
page.onLoadFinished = function(status) {
    console.log('Status: ' + "inject scraping script success");
    
	//persiapan untuk write data kedalam file
	var fs = require('fs');
	
	//fungsi utama kita ambil class .flightResultGenerated dengan index outerText
	setTimeout(function(){
		var res = page.evaluate(function() {
		
			var result = {};
			var data = [];
			var datacount = 0;
			
			var datakembali = [];
			//console.log($('table#matcherDepartContainer tr').length);
			//$('table#matcherDepartContainer').html();
			var result = {};
			var data = [];
			var datacount = 0;
			
			var datakembali = [];
			//console.log($('table#matcherDepartContainer tr').length);
			//$('table#matcherDepartContainer').html();
			//var tabelpergi = $('table')[4];
			//var tabelpulang = $('table')[6];
			$("#tbody_depart tr").each(function(obj){
				var json = {};
				json.maskapai = $(this).attr("data-airlinesname");
				if(json.maskapai.toLowerCase().trim() != 'batik'){
					console.log("test");
					json.brkt = $(this).attr("data-depart");
					json.tiba = $(this).attr("data-arrival");
					json.harga = $(this).attr("data-price");
					
					var temp = [];
					var rawkode = $(this).find("td a small").text();
					//temp = rawkode.split("_");
					//var kode_terbang_temp = temp[1];
					//console.log(rawkode);  
					//kode_terbang_temp = kode_terbang_temp.slice(0,-1);
					//kode_terbang_temp = kode_terbang_temp.substr(1);
					var temp_array = rawkode.trim().split(" ");
					json.kode = temp_array[1];
					
					data[datacount] = json;
					datacount++;
				}
			});
			
			var datacountkembali=0;
			$("#tbody_return tr").each(function(obj){
				var json = {};
				json.maskapai = $(this).attr("data-airlinesname);
				if(json.maskapai.toLowerCase().trim() != 'batik'){
					console.log("test");
					json.brkt = $(this).attr("data-depart");
					json.tiba = $(this).attr("data-arrival");
					json.harga = $(this).attr("data-price");
					
					var temp = [];
					var rawkode = $(this).find("td a small").text();
					//temp = rawkode.split("_");
					//var kode_terbang_temp = temp[1];
					//console.log(rawkode);  
					//kode_terbang_temp = kode_terbang_temp.slice(0,-1);
					//kode_terbang_temp = kode_terbang_temp.substr(1);
					var temp_array = rawkode.trim().split(" ");
					json.kode = temp_array[1];
					
					datakembali[datacountkembali] = json;
					datacountkembali++;
				}
				
				
			});
			result.berangkat = data;
			result.kembali = datakembali;
			//console.log(JSON.stringify(result));
			return result;
			
		
		});
		var path = 'outputgeneral'+searchid+'.json';
		var content = JSON.stringify(res);
		fs.write(path, content, 'w');
		phantom.exit();
	},100);
	//fungsi dump untuk dumping object
	//console.log(JSON.stringify(res));
	//res.url = url;
	//print data ke file
	

	//screen capture halaman web
	//page.render('outputtravel.png');
	//console.log('lihat pada directori')
	
   };
page.open(url, function() {
    page.includeJs("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", function() { //load jquery module untuk selector
		//console.log(url);
		//update cek apakah page nanti sudah di load semua
    
    });
});