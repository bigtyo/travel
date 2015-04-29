/**
 * New node file
 */
var request = require('request');
var cheerio = require('cheerio');
var mysql = require('mysql');
var uuid = require('node-uuid');
var fs = require("fs");


var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : 'radityabp',
  database : 'travel'
});
//var databasename = "tangga.";

request = request.defaults({jar: true});
//win
//var pj_path = "phantomjs-1.9.7-windows\\";

//unix
var pj_path = "routes/book/";

exports.scrap = function(req,res){
	res.render('scrap',{ title : "scrap engine", isrc : '/search'} );
};


exports.search = function(req,res){
var url1 = 'https://book.citilink.co.id/search.aspx';
	
    request(url1, function(err, resp, body) {
        if (err)
            throw err;
        $ = cheerio.load(body);
        //console.log(pool);
        // TODO: scraping goes here!
        var html = "<html><head>";
        html += $("head").html();
//        html += "<meta name='viewport' content='width=device-width initial-scale=1.0' />";
//        html += "<link rel='stylesheet', href='/css/bootstrap-theme.min.css' />";
//        html += "<link rel='stylesheet' href='/css/bootstrap.min.css' />";
//        html += "<link rel='stylesheet' href='/css/style.css' />";
//        html += "<script type='text/javascript' src='/js/jquery.min.js' ></script>";
//        html += "<script type='text/javascript' src='/js/bootstrap.min.js' ></script>";
        html += "</head>";
        html += "<body>";
        html += $("#flightSearchContainer").html();
        html += "<div><img src='images/ajax-loader.gif' class='loading' style='display:none' /></div>";
        html += "<div id='res_page'></div>";
        html += '<script src="js/jquery.min.js" type="text/javascript"></script>';
        html += '<script src="js/Citilink/helper3.js" type="text/javascript"></script>';
        html += '<script src="js/Citilink/main.js" type="text/javascript"></script>';
        html += '<script src="js/Citilink/lib.js" type="text/javascript"></script>';
        html += '<script type="text/javascript" src="js/Citilink/helper.js"></script>';
        
        html += '<script type="text/javascript" src="js/Citilink/helper2.js"></script>';
        html += '<script type="text/javascript" src="js/Citilink/post.js"></script>';
        
        html += "</body>";
        html += "</html>";
        res.send(html);
        
    });
};

exports.getlang = function(req,res){
	res.render('ifa',{ title : "scrap engine", isrc : '/search'} );
};

exports.beginscrap = function(req,res){
	var origin = req.body.dari;
	var destination = req.body.tujuan;
	var tgl_awal = req.body.tgl_awal;
	var tgl_akhir = req.body.tgl_akhir;
	
	var istwoway = req.body.istwoway;
	//var idmaskapai = req.body.idmaskapai;
	var dewasa = req.body.dewasa;
	var child = req.body.child;
	var infant = req.body.infant;
	var pergi = req.body.ispergi;
	//var user = req.body.login;
	//var password = req.body.password;
	var idsearch = uuid.v4();
	
	var exec = require('child_process').exec,child;
    
	
	//win
    //var cmd = pj_path +'phantomjs.exe ' + pj_path + 'scrap.js ' + args;
	
	//unix
    var direction = "pergi";
    if(pergi != 1){
    	direction = "pulang";
    }
   // getmaskapai(idmaskapai, function(obj){
	//	if(obj.status == 1){
			var args = origin + " " + destination + " " + tgl_awal + " " + tgl_akhir+ " " +
			istwoway+ " " + dewasa+ " " + child+ " " + infant+ " " + idsearch;
			var cmd = 'phantomjs.exe ' + pj_path + "general2.js " + args;
			
			console.log(cmd);
			child = exec(cmd,
					function (error, stdout, stderr) {
						console.log('stdout: ' + stdout);
						
						if (error !== null) {
						  console.log('exec error: ' + error);
						}
						if(stderr !== null && stderr !== ""){
							console.log('stderr: ' + stderr);
						}else{
							console.log("masuk");
							var filename= "outputgeneral"+idsearch+".json";
							if(fs.lstatSync(filename).isFile()){
								fs.readFile(filename, function (err, data) {
									  if (err) throw err;
									  res.send(data);
								});
								
							}
							    
						}
						
					}
			);
		//}else{
			//res.send(JSON.stringify(obj));
		//}
    	
   // });
    
	
	
	
	
};

function getmaskapai(idmaskapai,callback){
	var data = {};
	var select = "SELECT b.* FROM mastermaskapai a join masterloginmaskapai b on a.idmastermaskapai = b.idmastermaskapai where a.idmastermaskapai = " + idmaskapai;
	connection.query(select,function(err,rows,fields){
		if(err){
			data.status = 505;
			data.message = "get maskapai system error";
			data.error = err;
			callback(data);
		}else{
			if(rows.length > 0){
				data.status = 1;
				data.data = rows[0];
				callback(data);
			}else{
				data.status = 0;
				data.message = "maskapai not exists in our system";
				callback(data);
			}
		}
	});
}