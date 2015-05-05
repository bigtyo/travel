
<div id="modalAktivitas" class="modal hide fade" tabindex="-1" role="dialog"   aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel" >Data penumpang</h3>
			</div>
			<div class="modal-body" id='modalContent'>
				
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
				<a href="#tblpassenger" class="btn btn-primary" id="btnSimpan" onclick="savepassenger()" >Save changes</a>
			</div>
</div>

<div id="modalticketdetail" class="modal hide fade" tabindex="-1" role="dialog"   aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel" >Data Ticket</h3>
			</div>
			<div class="modal-body" id='modalTicketContent'>
				
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
				<a href="#tblpassenger" class="btn btn-primary" id="btnPrint" onclick="issued()" >Issue Ticket</a>
			</div>
</div>


<div class="container-fluid nav-hidden" id="content">
                <input type="hidden" id="isissued" value="0" />
		<div id="main">
			<div class="container-fluid ">
				<div class="page-header">
					<div class="pull-left">
						<h1>Ticket Search</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="/travel">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Ticketing</a>
							<i class="icon-angle-right"></i>
						</li>
                                                <li>
							<a href="#">Ticket Search</a>
							
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#">
							<i class="icon-remove"></i>
						</a>
					</div>
				</div>

                                 <div class="row-fluid">
                                     <input type="hidden" id="idticketing" value="" />
                                     
                                        <div class="box box-bordered">
                                                <div class="box-title">
                                                        <h3><i class="icon-th-list"></i>Booking Form</h3>
                                                </div>
                                                <div class="box-content nopadding">
                                                 <div class="form-horizontal form-column form-bordered" >
                                                     <div class="row-fluid" >


                                                         <div class="span6">

                                                            <div class="control-group">
                                                                 <label for="dari" class="control-label">Dari</label>
                                                                 <div class="controls">
                                                                         <div class="input-xlarge">
                                                                             <select name="dari" id="dari" class='chosen-select'>
                                                                                    <option value="-1">Berangkat Dari</option>
                                                                                    <?php foreach($bandaralist as $bandara) { ?>
                                                                                        <option value="<?php echo $bandara->iata; ?>"><?php echo $bandara->namabandara." , ".$bandara->lokasi; ?></option>
                                                                                    <?php } ?>
                                                                            </select>
                                                                         </div>
                                                                 </div>
                                                             </div>


                                                             <div class="control-group">
                                                                 <label for="tujuan" class="control-label">Tujuan</label>
                                                                 <div class="controls">
                                                                         <div class="input-xlarge">
                                                                             <select name="tujuan" id="tujuan" class='chosen-select'>
                                                                                    <option value="-1">Tujuan</option>
                                                                                    <?php foreach($bandaralist as $bandara) { ?>
                                                                                        <option value="<?php echo $bandara->iata; ?>"><?php echo $bandara->namabandara." , ".$bandara->lokasi; ?></option>
                                                                                    <?php } ?>
                                                                            </select>
                                                                         </div>
                                                                 </div>
                                                             </div>
                                                             <div class="control-group">
                                                                 <label for="rute" class="control-label">Perjalanan</label>
                                                                 <div class="controls">
                                                                     <input type="radio" name="rute" id="oneway" /> <label  class="label">One way</label>
                                                                     <input type="radio" name="rute" id="twoway" checked="checked" /><label  class="label">Two way</label>
                                                                 </div>
                                                             </div>
                                                             <div class="control-group">
                                                                 <label for="rute" class="control-label">Penumpang</label>
                                                                 <div class="controls">
                                                                     <select id="dewasa" class="input-mini" onchange="allowedinfant();" name="dewasa">
                                                                         <option value="1">1</option>
                                                                         <option value="2">2</option>
                                                                         <option value="3">3</option>
                                                                         <option value="4">4</option>
                                                                         <option value="5">5</option>
                                                                     </select> <span>Dewasa</span>
                                                                     <select id="child" class="input-mini" name="child">
                                                                         <option value="0">0</option>
                                                                         <option value="1">1</option>
                                                                         <option value="2">2</option>
                                                                         <option value="3">3</option>
                                                                         <option value="4">4</option>
                                                                         <option value="5">5</option>
                                                                     </select> <span>Child</span>
                                                                     <select id="infant" class="input-mini" name="infant">
                                                                         <option value="0">0</option>
                                                                         <option value="1">1</option>
                                                                     </select> <span>Infant</span>
                                                                 </div>
                                                             </div>

                                                         </div>
                                                         <div class="span6">
                                                             <div class="control-group">
                                                                 <label for="tanggalberangkat" class="control-label">Berangkat</label>
                                                                 <div class="controls">
                                                                         <input type="text" name="tanggalberangkat" id="tanggalberangkat" class="input-medium datepick">
                                                                 </div>
                                                             </div>
                                                             <div class="control-group">
                                                                 <label for="tanggalkembali" class="control-label">Kembali</label>
                                                                 <div class="controls">
                                                                         <input type="text" name="tanggalkembali" id="tanggalkembali" class="input-medium datepick">
                                                                 </div>
                                                             </div>
                                                             <div class="control-group">
                                                                 <label for="rute" class="control-label">Penerbangan</label>
                                                                 <div class="controls">
                                                                     <input type="radio" name="tipe" id="domestik" checked="checked" /> <label  class="label">Domestik</label>
                                                                     <input type="radio" name="tipe" id="internasional"  /><label  class="label">Internasional</label>
                                                                 </div>
                                                             </div>
                                                             <div class="control-group">
                                                                 <label for="rute" class="control-label">Maskapai</label>
                                                                 <div class="controls">
                                                                     <input value="airasia" type="checkbox" class="checkbox" /><span>Air Asia</span>
                                                                     <input value="citilink" type="checkbox" class="checkbox" /><span>Citilink</span>
                                                                     <input value="garuda" type="checkbox" class="checkbox" /><span>Garuda</span>
                                                                     <input value="lion" type="checkbox" class="checkbox" /><span>Lion Group</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         
                                                             
                                                         
                                                         <div class="span12">
                                                             <div class="form-actions">
                                                                 <input type="button" id="btnSearch" class="btn btn-primary" onclick="cari();" value="Search" />
<!--								<a href="#tbl_maskapai" id="btnSearch"  class="btn btn-primary" onclick="cari();" >Search</a>-->
                                                            </div>
                                                             
                                                         </div>
                                                     </div>








                                                </div>
                                             </div>
                                        </div>
                                         
                                         
                                     
                                         
                                     
                                     </div>
                            
                            <div class="row-fluid" >
                                <div class="loading" style="display: none;"><img src="<?php echo base_url()."img/loading.gif"; ?>" /><br/><span>Sedang mencari maskapai, silahkan isi detail dibawah jika perlu sembari menunggu</span></div>
                                
                                <div id="tblpergi" style="display: none;">
                                    <table class="table table-bordered table-force-topborder">
                                        <thead>
                                            <tr class="route"><td colspan="5"></td></tr>
                                            <tr>
                                                <td></td>
                                                <td>Maskapai</td>
                                                <td>Jam</td>
                                                <td>Kode</td>
                                                <td>Harga</td>

                                                
                                            </tr>
                                        </thead>
<!--                                        <tbody id="tbl_<?php //echo $mask->idmastermaskapai; ?>">-->
                                        <tbody id="tbl_maskapai_pergi">
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div id="tblpulang" style="display: none">
                                    <table class="table table-bordered table-force-topborder">
                                            <thead>
                                                <tr class="route"><td colspan="5"></td></tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Maskapai</td>
                                                    <td>Jam</td>
                                                    <td>Kode</td>
                                                    <td>Harga</td>

                                                    
                                                </tr>
                                            </thead>
        <!--                                    <tbody id="tbl_<?php //echo $mask->idmastermaskapai; ?>">-->
                                            <tbody id="tbl_maskapai_pulang">

                                            </tbody>
                                        </table>
                                </div>
                                
                            </div>
                            
                            
                            
<!--                            <div class="row-fluid">
                                <a href="#dataticketing" onclick="addticketing()" class="btn btn-primary" >Data Ticket</a>
                            </div>-->
                            <div class="row-fluid">
                                <div  id="dataticketpergi" class="box box-bordered span6" style="display: none">
                                    <div class="box-title">
                                            <h5><i class="icon-th-list"></i>Ticket Pergi</h5>
                                    </div>
                                    <div class="box-content nopadding">
                                        <h5 class="span3 maskapai" style="margin-left: 20px; text-align: center;">

                                       </h5>
                                       <h5 class="span3 jadwal" style="margin-top: 30px; text-align: center;">

                                       </h5>
                                       <h5 class="span3 harga" style="margin-top: 30px; text-align: center;">

                                       </h5>
                                    </div>

                                </div>
                                <div  id="dataticketpulang" class="box box-bordered span6" style="display: none">
                                    <div class="box-title">
                                            <h5><i class="icon-th-list"></i>Ticket Kembali</h5>
                                    </div>
                                    <div class="box-content nopadding">
                                       <h5 class="span3 maskapai" style="margin-left: 20px; text-align: center;">

                                       </h5>
                                       <h5 class="span3 jadwal" style="margin-top: 30px; text-align: center;">

                                       </h5>
                                       <h5 class="span3 harga" style="margin-top: 30px; text-align: center;">

                                       </h5>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                           <div  id="dataticketing" style="display: none">
                               
                               <div >
                                   <input type="hidden" id="idmaskapaipilihan" value="" />
                                    <div class="box box-bordered">
                                         <div class="box-title">
                                                 <h3><i class="icon-th-list"></i>Data Agen</h3>
                                         </div>

                                        <div class="box-content nopadding">
                                            <div class="form-horizontal  form-bordered form-column form-vertical" >
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                         <div class="control-group">
                                                             <label for="namaagen" class="control-label">Nama Agen</label>
                                                             <div class="controls">
                                                                 <input type="text" name="namaagen" id="namaagen" value="<?php if(isset($agent)){echo $agent->namaagen;} ?>" class="input-xlarge ">
                                                             </div>
                                                         </div>
                                                         <div class="control-group">
                                                             <label for="telepon" class="control-label">telepon</label>
                                                             <div class="controls">
                                                                  <input type="text" name="telepon" id="telepon" value="<?php if(isset($agent)){echo $agent->telepon;} ?>" class="input-xlarge ">
                                                             </div>
                                                         </div>
                                                         <div class="control-group">
                                                             <label for="email" class="control-label">Email</label>
                                                             <div class="controls">
                                                                  <input type="text" name="email" id="email" value="<?php if(isset($agent)){echo $agent->email;} ?>" class="input-xlarge ">
                                                             </div>
                                                         </div>
                                                         <div class="control-group">
                                                             <label for="tanggal" class="control-label">Tanggal Pesan</label>
                                                             <div class="controls">
                                                                  <input type="text" name="tanggal" id="tanggal" class="input-xlarge datepick">
                                                             </div>
                                                         </div>

                                                     </div>
                                                    <div class="span6">
                                                        <div class="control-group">
                                                             <label for="alamat" class="control-label">Alamat 1</label>
                                                             <div class="controls">
                                                                  <input type="text" name="alamat" id="alamat" value="<?php if(isset($agent)){echo $agent->alamat;} ?>" class="input-xlarge ">
                                                             </div>
                                                         </div>
                                                        <div class="control-group">
                                                             <label for="alamat2" class="control-label">Alamat 2</label>
                                                             <div class="controls">
                                                                  <input type="text" name="alamat2" id="alamat2" value="<?php if(isset($agent)){echo $agent->alamat2;} ?>" class="input-xlarge ">
                                                             </div>
                                                         </div>
                                                        <div class="control-group">
                                                             <label for="alamat3" class="control-label">Alamat 3</label>
                                                             <div class="controls">
                                                                  <input type="text" name="alamat3" id="alamat3" value="<?php if(isset($agent)){echo $agent->alamat3;} ?>" class="input-xlarge">
                                                             </div>
                                                         </div>
                                                        <div class="control-group">
                                                             <label for="kota" class="control-label">Kota</label>
                                                             <div class="controls">
                                                                  <input type="text" name="kota" id="kota" value="<?php if(isset($agent)){echo $agent->kota;} ?>" class="input-xlarge ">
                                                             </div>
                                                         </div>
                                                    </div>





                                                </div>
                                            </div>

                                        </div>
                                        
                                        

                                    </div>
                               </div>
                               
                               
                                
                                
                            </div>
                            
                            <div class="row-fluid" id="datapassenger" style="display: none">
                                <div class="span12">
                                    
                                    <div class="box box-bordered">
                                         <div class="box-title">
                                                 <h3><i class="icon-th-list"></i>Data Pesanan</h3>
                                         </div>
                                    </div>
                                    <div class=" box-content nopadding">
                                            <div class="row-fluid">
                                                <div class="span12">
                                                     <table class="table table-bordered table-force-topborder" id="tblpassenger">
                                                          <thead>
                                                              <tr>
<!--                                                                  <td>No</td>-->
                                                                  <td>Tipe</td>
                                                                  <td>Salutation</td>
                                                                  <td>Nama Depan</td>
                                                                  <td>Nama Tengah</td>
                                                                  <td>Nama Belakang</td>
                                                                  <td>Tanggal Lahir</td>
                                                                  <td class="international">Nomor Passport</td>
                                                                  <td class="international">Tanggal Expired</td>
                                                                  <td class="international">Tanggal Issued</td>
                                                                  <td class="international">Tempat Issued</td>
                                                                  
                                                                  <td>Action</td>
                                                              </tr>
                                                          </thead>
                                                          <tbody>

                                                          </tbody>
                                                      </table>
                                                 </div>
                                                <div class="form-horizontal" >
                                                    <div class="control-group">
                                                        <label for="telppenumpang" class="control-label">Telepon Penumpang</label>
                                                        <div class="controls">
                                                             <input type="text" name="telppenumpang" id="telppenumpang" value="" class="input-xlarge ">
                                                        </div>
                                                    </div>
                                                </div>
                                                 
                                            </div>
                                        <div class="row-fluid">
                                            <a href="#tblpassenger"  class="btn btn-primary" onclick="addpassenger();" >Tambah Penumpang</a>
                                            &nbsp;
                                            <a href="#datapassenger"  class="btn btn-purple" onclick="dobooking2();" >Book now</a>
                                            <a href="#modalticketdetail" id="issuebutton"  data-toggle="modal" style="display:none;"  >Issue / Print</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
			</div>
		</div>
	</div>
<div class="modalloading">
    <span class="loadingmessage"></span>
    <div id="captcha" style="display: none;">
        <img src="" id="captchapanel" />
        <input type="text" id="captchainput" />
        <a href="#" id="btncaptcha" class="btn btn-primary" onclick="submitcapcha()" >Submit</a>
    </div>
</div>



<script type="text/javascript">
    Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) {
        var n = this,
            decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
            decSeparator = decSeparator == undefined ? "." : decSeparator,
            thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
            sign = n < 0 ? "-" : "",
            i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
            j = (j = i.length) > 3 ? j % 3 : 0;
        return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
    };
    function complete(idmaskapai,res){
        $("#"+idmaskapai).html(res);
    }
    
    
    
    function addpassenger(tipe){
        //$.post('<?php //echo base_url(); ?>index.php/scrap/addpassenger',{
            
        //},function(res){
        //    $("#modalContent").html(res);
        //});
        var rownum = $("#tblpassenger tbody tr").length + 1;
        
        var isinternational = $("#internasional").is(":checked");
        
        if(!isinternational){
            $(".international").hide();
        }
        
        var html = "";
        
        html+= "<tr>";
        //html+= "<td>"+rownum+"</td>";
        html+= "<td><select id='jenispenumpang_"+rownum+"' class='select input-small jenispenumpang' onchange='changetype(this,"+rownum+")' ></select>";
        html+= "<td><select id='salutation_"+rownum+"' class='select input-small salutation'></select>";
        html+= "<td><input type='text' class='input-small firstname' id='firstname_"+rownum+"' /></td>";
        html+= "<td><input type='text' class='input-small midname' id='midname_"+rownum+"' /></td>";
        html+= "<td><input type='text' class='input-small lastname' id='lastname_"+rownum+"' /></td>";
        html+= "<td><input type='text' class='input-small birthdate' id='birthdate_"+rownum+"' /></td>";
        if(isinternational){
            html+= "<td><input type='text' class='input-small passportid international' id='passportid_"+rownum+"' /></td>";
            html+= "<td><input type='text' class='input-small passportexpirydate international' id='passportexpirydate_"+rownum+"' /></td>";
            html+= "<td><input type='text' class='input-small passportissueddate international' id='passportissueddate_"+rownum+"' /></td>";
            html+= "<td><input type='text' class='input-small passportissuedplace international' id='passportissuedplace_"+rownum+"' /></td>";
        }
        
        html+= "<td><a href='#tblpassenger' onclick='deletepassenger("+rownum+")'>Delete</a></select></td>";
        html+= "</tr>";
        $("#tblpassenger tbody").append(html);
        
        initjenispenumpang(rownum,tipe);
        
        initsalutation("#salutation_"+rownum,tipe);
        
        $(".birthdate").datepicker();
    }
    
    function initjenispenumpang(rownum,tipe){
        var html = "";
        var obj = "#jenispenumpang_" + rownum;
        
        if(tipe == 1){
            html += "<option value='1' selected='selected'>Adult</option>";
        }else{
            html += "<option value='1'>Adult</option>";
        }
        
        if(tipe == 2){
            html += "<option value='2' selected='selected'>Child</option>";
        }else{
            html += "<option value='2'>Child</option>";
        }
        
        if(tipe == 3){
            html += "<option value='3' selected='selected'>Infant</option>";
        }else{
            html += "<option value='3'>Infant</option>";
        }
        
        
        
        $(obj).html(html);
    }
    
    function changetype(obj,rownum){
        var tipe = $(obj).val();
        initsalutation("#salutation_"+rownum,tipe);
    }
    
    function initsalutation(obj,tipe){
        if(obj == ".salutation"){
            tipe = 1;
        }
        
        var html = "";
        if(tipe == 1){
            html += "<option value='Mr' selected='true'>Mr.</option>";
            html += "<option value='Mrs'>Mrs.</option>";
            html += "<option value='Ms'>Ms.</option>";
            
        }else{
            html += "<option value='Mstr' selected='true'>Mstr.</option>";
            html += "<option value='Miss' >Miss.</option>";
        }
        
        
        
        
        $(obj).html(html);
    }

    
    
    
    function deletepassenger(rownum){
        $("#jenispenumpang_"+1).parents("tr").remove();
    }
    
    function editpassenger(idticketingdetail){
        $.post('<?php echo base_url(); ?>index.php/scrap/addpassenger',{
            id : idticketingdetail
        },function(res){
            $("#modalContent").html(res);
        });
    }
    
    function addticketing(){
        $.post("<?php echo base_url(); ?>index.php/ticketing/simpanticketing",{
            id : $("#idticketing").val()
        },function(res){
            $("#idticketing").val(res.data.idticketing);
        });
        $("#dataticketing").show();
        $("#datapassenger").show();
    }
    
    function savepassenger(idticketingdetail){
        
        $.post('<?php echo base_url(); ?>index.php/scrap/simpanpassenger',{
            idticketing_detail : $("#idticketing_detail").val(),
            idticketing : $("#idticketing").val(),
            salutation : $("#salutation").val(),
            firstname : $("#firstname").val(),
            middlename : $("#middlename").val(),
            lastname : $("#lastname").val(),
            infant : $("#infant").val(),
            tanggallahir : parseDatePicker($("#tanggallahir").val())
        },function(res){
            if(res.status == 1){
                var tr = "<tr id='tr_"+res.data.id_ticketing_detail+"'>";
                tr += "<td style='display : none'>"+res.data.id_ticketing+"</td>";
                tr += "<td>"+res.data.salutation+"</td>";
                tr += "<td>"+res.data.firstname+"</td>";
                tr += "<td>"+res.data.middlename+"</td>";
                tr += "<td>"+res.data.lastname+"</td>";
                tr += "<td>"+res.data.tanggallahir+"</td>";
                tr += "<td>"+res.data.infant+"</td>";
                $("#tblpassenger tbody").append(tr);
            }
        });
    }
    
    function allowedinfant(){
        var jmldewasa = $("#dewasa").val();
        
        $("#infant option").remove();
        for(var i = 0; i<= jmldewasa;i++){
            $("#infant").append("<option value='"+i+"'>"+i+"</option>");
        }
    }
    
    function book(idmaskapai,namamaskapai){
        //addticketing();
        var idticketing = $("#idticketing").val();
        $("#idmaskapaipilihan").val(idmaskapai);
        $("#dataticketing").show();
        $("#datapassenger").show();
        if(idticketing == ""){
            $.post("<?php echo base_url(); ?>index.php/ticketing/simpanticketing",{
                id : $("#idticketing").val()
            },function(res){
                $("#idticketing").val(res.idticketing);
                $("#dataticketing").show();
                $("#datapassenger").show();
                //dobooking();
            });
        }else{
            //dobooking();
        }
        
        
        
    }
    
    function dobooking2(){
        //debugger;
        var idticketing = $("#idticketing").val();
        var rownum = 1;
        var datadetails = [];
        $body = $("body");

        //$(document).on({
        //    ajaxStart: function() { $body.addClass("loading");    },
        //     ajaxStop: function() { $body.removeClass("loading"); }    
        //});
        $(".loadingmessage").html("Menyimpan data pesanan");
        $body.addClass("loading");
        $("#tblpassenger tbody tr").each(function(){
            var data = {};
            var salutation = $(this).find(".salutation").val();
            var firstname = $(this).find(".firstname").val();
            var midname = $(this).find(".midname").val();
            var lastname = $(this).find(".lastname").val();
            var birthdate = parseDatePicker($(this).find(".birthdate").val());
            var jenispenumpang = $(this).find(".jenispenumpang").val();
            
            data.salutation = salutation;
            data.firstname = firstname;
            data.middlename = midname;
            data.lastname = lastname;
            data.tanggallahir = birthdate;
            data.jenispenumpang = jenispenumpang;
            data.rute = $("#dari").val() + "-" +$("#tujuan").val();
            
            datadetails[rownum-1] = data;
            rownum++;
        });
        if(idticketing == ""){
            if(dtpergi == {}){
                alert("harap pilih penerbangan terlebih dahulu");
                return;
            }
            var twoway = $("#twoway").is(":checked");
            if(twoway && dtpulang == {}){
                alert("harap pilih penerbangan kembali terlebih dahulu");
                return;
            }
            
            
            $.post("<?php echo base_url(); ?>index.php/ticketing/simpanticketing",{
                id : $("#idticketing").val(),
                details : JSON.stringify(datadetails),
                teleponpelanggan : $("#telppenumpang").val(),
                datapergi : JSON.stringify(dtpergi),
                datapulang : JSON.stringify(dtpulang)
            },function(res){
                //debugger;
                var details = res.details;
                $("#idticketing").val(res.idticketing);
                var detailcount = 0;
                $("#tblpassenger tbody tr").each(function(){
                    if($(this).find("td.idticketing_detail").length == 0){
                        $(this).append("<td class='idticketing_detail' style='display:none;'>"+details[detailcount].idticketing_detail+"</td>");
                    }else{
                        $(this).find("td.idticketing_detail").html(details[detailcount].idticketing_detail);
                    }
                    
                    detailcount++;
                });
                //$("#dataticketing").show();
                //$("#datapassenger").show();
                //dobooking();
                var pergi = $("td.pergi");
                var pulang = $("td.pulang");
                
                bookingticket(res.idticketing);
            });
        }else{
            bookingticket(idticketing);
            //$("body").removeClass("loading");
        }
    }
    
    function bookingticket(idticketing){
        if(kodebookings.length > 0){
            return;
        }
        $.post("<?php echo base_url(); ?>index.php/scrap/booking",{
            idticketing : idticketing
        },function(res){
            
            var route = "<?php echo base_url(); ?>index.php/scrap/book/" + res.rpergi;
            $(".loadingmessage").html("Menghubungi maskapai untuk proses booking");
            
            if(res.rpergi == "lion"){
                $.post(route,{
                    idticketing : idticketing,
                    mode : res.r1mode
                },function(resbooking){
                    //$("body").removeClass("loading");

                    
                    
                });
                getcaptcha();
            }else{
                $.post(route,{
                    idticketing : idticketing,
                    mode : res.r1mode
                },function(resbooking){
                    //$("body").removeClass("loading");


                    if(!checkkodebooking(resbooking.kodebooking)){
                        $("#modalTicketContent").html($("#modalTicketContent").html() + resbooking.html);
                        kodebookings.push(resbooking.kodebooking);
                        routes.push(res.rpergi);
                    }



                    
                });
            }
            
            
            
            if(res.rpulang != res.rpergi && res.rpulang != null && res.rpulang != ""){
                var route = "<?php echo base_url(); ?>index.php/scrap/book/" + res.rpulang;
                $(".loadingmessage").html("Menghubungi maskapai untuk proses booking");
                $.post(route,{
                    idticketing : idticketing,
                    mode : res.r2mode
                },function(resbooking2){
                    //$("body").removeClass("loading");
                    
                    if(!checkkodebooking(resbooking2.kodebooking)){
                        $("#modalTicketContent").html($("#modalTicketContent").html() + resbooking2.html);
                        kodebookings.push(resbooking2.kodebooking);
                        routes.push(res.rpulang);
                    }
                    
                    //$("#issuebutton").click();
                    //$("#issuebutton").show();
                });
            }
            
            //$body.removeClass("loading");
        });
    }
    
    function checkkodebooking(kode){
        for(var i = 0;i<=kodebookings.length ; i++){
            if(kodebookings[i] == kode){
                return true;
            }
        }
        
        return false;
    }
    var intervatl = {};
    function getcaptcha(){
        intervatl = setInterval(function(){
            $.get("<?php echo base_url(); ?>index.php/scrap/checkcaptcha",{
                idticketing : $("#idticketing").val()
            },function(res){
                if(res.status == 1){
                    captchainput();
                    clearInterval(intervatl);
                }
            });
        },1000)
    }
    
    function captchainput(){
        $("#captchapanel").attr("src","<?php echo base_url()."/result/"; ?>" + $("#idticketing").val() + ".jpg");
        $("#captcha").show();
    }
    
    function submitcapcha(){
        $("#btncaptcha").attr("disabled","disabled");
        $.post("<?php echo base_url(); ?>index.php/scrap/submitcaptcha",{
            input : $("#captchainput").val(),
            idticketing : $("#idticketing").val()
        },function(res){
           if(res.success){
               $("#captcha").hide();
               $("#btncaptcha").removeAttr("disabled");
           } 
        });
    }
    
    function dobooking(){
        var isanypassenger = $("#tblpassenger tbody").length > 0;
        var idticketing = $("#idticketing").val();
        
        $(".loadingmessage").html("Menghubungi system booking maskapai");
        if(!isanypassenger){
            alert("tidak ada penumpang yang terdaftar");
            return;
        }
        
        var datapassenger = new Array();
        var datainfant = new Array();
        
        var rawpassengers = $("#tblpassenger tbody tr");
        for(var i = 0;i< rawpassengers.length; i++){
            var td = $(rawpassengers[i]).find("td");
            
            var data = {};
            data.salutation = $(td[1]).text();
            data.firstname = $(td[2]).text();
            data.middlename = $(td[3]).text();
            data.lastname = $(td[4]).text();
            data.tanggallahir = $(td[5]).text();
            
            if(td[6] == "Yes"){
                datainfant[0] = data;
            }else{
                datapassenger[i] = data;
            }
            
        }
        //datapassenger = JSON.stringify(datapassenger);
        //datainfant = JSON.stringify(datainfant);
        
        var tgla = pecahtanggal($("#tanggalberangkat").val());
        var tglb = pecahtanggal($("#tanggalkembali").val());
        
        
        $.post('<?php echo "http://localhost/scrap/bookcitilink.php" ?>',{
            dari : $("#dari").val(),
            tujuan : $("#tujuan").val(),
            brkt_tgl : tgla.tanggal,
            brkt_bln : tgla.bulan,
            pergi_tgl : tglb.tanggal,
            pergi_bln : tglb.bulan,
            isoneway : true,
            idmaskapai : $("#idmaskapaipilihan").val(),
            dewasa : 1,
            child : 0,
            infant : 0,
            value_a : $("input[type=radio]:checked").val(),
            value_b : "",
            datainfant : JSON.stringify(datainfant),
            datapassenger : JSON.stringify(datapassenger)
        },function(res){
           //alert("booking success data : "+res.toString());
           for(var i=0;i<datainfant.length;i++){
               datapassenger[datapassenger.length + i] = datainfant[i];
           }
           $(".loadingmessage").html("Update status pemesanan");
           $.post('<?php echo base_url(); ?>index.php/ticketing/booking',{
               details : JSON.stringify(datapassenger)
           },function(res){
               $(".loadingmessage").html("Status Updated");
               
           });
        });
    }
    
    function cari(){
        //debugger;
        window.location = "#tbl_maskapai";
        var tglbrkt = $("#tanggalberangkat").val();
        var tglpergi = $("#tanggalkembali").val();
        var isoneway = $("#oneway").is(":checked");
        
        if(tglbrkt == ""){
            alert("masukkan tanggal keberangkatan");
            $("#tanggalberangkat").focus();
            return;
        }
        
        if(tglpergi == "" && !isoneway){
            alert("masukkan tanggal kembali");
            $("#tanggalkembali").focus();
            return;
        }
        
        var isoneway = $("#oneway").is(":checked");
        
        var tgla = pecahtanggal($("#tanggalberangkat").val());
        var tglb = pecahtanggal($("#tanggalkembali").val());
        
        if(isoneway){
            tglb = tgla;
        }
        
        $(".loading").show();
        $("#dataticketing").show();
        //var jumlahpassenger = 0;
        var jumlahadult = 0;
        var jumlahchild = 0;
        var jumlahinfant = 0;
        jumlahadult += parseInt($("#dewasa").val());
        jumlahchild += parseInt($("#child").val());
        jumlahinfant += parseInt($("#infant").val());
        debugger;
        if(!$("#tblpassenger tbody tr").length > 0){
           for(var i=0;i<jumlahadult;i++){
                addpassenger(1);
            }
            
            for(var i=0;i<jumlahchild;i++){
                addpassenger(2);
            }
            
            for(var i=0;i<jumlahinfant;i++){
                addpassenger(3);
            }
        }
        
        $("#btnSearch").attr("disabled",true);
        $("#datapassenger").show();
       
          $.post('<?php echo base_url(); ?>index.php/scrap/general',{
            dari : $("#dari").val(),
            tujuan : $("#tujuan").val(),
            brkt_tgl : tgla.tanggal,
            brkt_bln : tgla.bulan,
            pergi_tgl : tglb.tanggal,
            pergi_bln : tglb.bulan,
            tgl_awal : parseDatePicker($("#tanggalberangkat").val()),
            tgl_akhir : parseDatePicker($("#tanggalkembali").val()),
            isoneway : isoneway,           
            dewasa : 1,
            child : 0,
            infant : 0
        },function(res){
            //debugger;
            $("#btnSearch").attr("disabled",false);
            var datalist = JSON.parse(res);
            if(datalist.berangkat.length > 0){
                filltabel("pergi",datalist.berangkat);
                var rute = $("#dari option:selected").val() + " <--> " +$("#tujuan option:selected").val() + " " + $("#tanggalberangkat").val();
                
                $("#tblpergi tr.route td").html(rute);

                
            }
            
            if(datalist.kembali.length > 0 && !isoneway){
                filltabel("pulang",datalist.kembali);
                var rute = $("#tujuan option:selected").val() + " <--> " +$("#dari option:selected").val() + " " + $("#tanggalkembali").val();
                $("#tblpulang tr.route td").html(rute);
                $("#tblpergi").addClass("span5");
                $("#tblpulang").addClass("span5");
            }else{
                $("#tblpergi").addClass("span12");
            }
            
            $(".loading").hide();
            
        });
        
    
        
    }
    
    
    
    function cari2(){
        $(".loading").show();
        
        $.get('http://localhost:85/beginscrap/general',{
            dari : $("#dari").val(),
            tujuan : $("#tujuan").val(),
            //brkt_tgl : tgla.tanggal,
            //brkt_bln : tgla.bulan,
           // pergi_tgl : tglb.tanggal,
           // pergi_bln : tglb.bulan,
            tgl_awal : parseDatePicker($("#tanggalberangkat").val()),
            tgl_akhir : parseDatePicker($("#tanggalkembali").val()),
            isoneway : true,
           // idmaskapai : <?php //echo $mask->idmastermaskapai; ?>,
            dewasa : 1,
            child : 0,
            infant : 0,
            ispergi : 1
        },function(res){
            //debugger;
            $("#tblpergi").html(res);
            
        });
        
        $.get('<?php echo base_url(); ?>index.php/scrap/general',{
            dari : $("#dari").val(),
            tujuan : $("#tujuan").val(),
           //brkt_tgl : tgla.tanggal,
            //brkt_bln : tgla.bulan,
            //pergi_tgl : tglb.tanggal,
            //pergi_bln : tglb.bulan,
            tgl_awal : parseDatePicker($("#tanggalberangkat").val()),
            tgl_akhir : parseDatePicker($("#tanggalkembali").val()),
            isoneway : true,
           // idmaskapai : <?php //echo $mask->idmastermaskapai; ?>,
            dewasa : 1,
            child : 0,
            infant : 0,
            ispergi : 0
        },function(res){
            //debugger;
            $("#tblpulang").html(res);
            
        });
    }
    
    function pecahtanggal(tanggal){
        tanggal = parseDatePicker(tanggal);
	var temp = tanggal.split('-');
	var result = {};
	result.bulan = temp[0] + "-" +temp[1];
	result.tanggal = temp[2];
	
	return result;
    }
    
    function parseDatePicker(tanggal)
    {
        //$("#"+elementid).datepicker();
        var raw = tanggal;
        var array =  raw.split("/");
        var year = array[2];
        var month = array[0];
        var day = array[1];

        return ""+year + "-" + month +"-" + day;
    }
    
    function addpergi(obj,maskapai){
        var tr = $(obj).parents("tr");
        dtpergi.kodemaskapai = maskapai;
        dtpergi.jam = $(tr).find(".jam").text();
        
        
        var date_awal = parseDatePicker($("#tanggalberangkat").val());
        //var date_akhir = parseDatePicker($("#tanggalkembali").val());
        
        dtpergi.tanggalberangkat = date_awal + " " + dtpergi.jam.split(" - ")[0];
        dtpergi.kodeterbang = $(tr).find(".kodeterbang").text();
        dtpergi.harga = $(tr).find(".harga").text();
        
        
        
        $("#dataticketpergi .maskapai").html('<img style="width : 120px; height : 60px" src="<?php echo base_url(); ?>img/airline/'+maskapai+'.jpg" /></br>'+dtpergi.kodeterbang);
        $("#dataticketpergi .jadwal").html($("#tanggalberangkat").val()+"<br/> "+dtpergi.jam);
        $("#dataticketpergi .harga").html('Rp. ' + parseFloat(dtpergi.harga).formatMoney(2,'.',','));
        $("#dataticketpergi").show();
        //$(tr).find(".kodeterbang").text();
    }
    
    function addpulang(obj,maskapai){
        var tr = $(obj).parents("tr");
        dtpulang.kodemaskapai = maskapai;
        dtpulang.jam = $(tr).find(".jam").text();
        
        
        //var date_awal = parseDatePicker($("#tanggalberangkat").val());
        var date_akhir = parseDatePicker($("#tanggalkembali").val());
        
        dtpulang.tanggalberangkat = date_akhir + " " + dtpulang.jam.split(" - ")[0];
        dtpulang.kodeterbang = $(tr).find(".kodeterbang").text();
        dtpulang.harga = $(tr).find(".harga").text();
        
        $("#dataticketpulang .maskapai").html('<img style="width : 120px; height : 60px" src="<?php echo base_url(); ?>img/airline/'+maskapai+'.jpg" /></br>'+dtpulang.kodeterbang);
        $("#dataticketpulang .jadwal").html($("#tanggalkembali").val()+"<br/> "+dtpulang.jam);
        $("#dataticketpulang .harga").html('Rp. ' + parseFloat(dtpulang.harga).formatMoney(2,'.',','));
        $("#dataticketpulang").show();
    }
    
    function filltabel(tujuan,data){
        
        var html = "";
        for(var i = 0;i<data.length;i++){
            //$("").send
            html += '<tr>';
            html += '<td><input type="radio" name="peberbangan_'+tujuan+'" onclick="add'+tujuan+'(this,\''+data[i].maskapai+'\');" /></td>';
            html += '<td><img style="width : 120px; height : 60px" src="<?php echo base_url(); ?>img/airline/'+data[i].maskapai+'.jpg" /></td>';
            html += '<td class="jam" >'+data[i].brkt + ' - '+ unixtotime(data[i].tiba) +'</td>';
            html += '<td class="kodeterbang" >'+data[i].kode+'</td>';
            html += '<td >';
//                    var listharga = berangkat[i].harga;
//                    for(var y=0;y<listharga.length; y++){
//                        html += '<div style="border: 1px solid; background: none repeat scroll 0% 0% rgb(163, 163, 163); text-align: center; width: 150px; float: left;"><input type="radio" name="hargacitilink" value="'+listharga[y].value+'" />'+listharga[y].text+'</div>'
//                    }

            html += 'Rp. ' + parseFloat(data[i].harga).formatMoney(2,'.',',');
            html += '</td>';
            html += '<td style="display:none" class="harga" >'+data[i].harga+'</td>';
            //html += '<td><a href="#dataticketing" class="btn btn-purple" onclick="book(\''+data[i].maskapai+'\',\''+data[i].maskapai+'\')">Booking</a></td>';
            html += '</tr>';

        }
        
        //$("#tbl_maskapai tr").not(".loading").remove();
        $("#tbl_maskapai_"+tujuan).html(html);
        $("#tbl"+tujuan).show();
    }
    
    function unixtotime(unixts){
        var date = new Date(unixts*1000);
        return formatnumber(date.getHours()) + ":" + formatnumber(date.getMinutes());
    }
    
    function formatnumber(number){
        if(number < 10){
            return "0" + number;
        }else{
            return "" + number;
        }
    }
    
    function completion(){
        completion_stat ++;
        
        if(completion_stat >= 2){
            $("body").removeClass("loading");
            $("#issuebutton").click();
            $("#issuebutton").show();
        }
    }
    
    function issued(){
        var issued = $("#isissued").val() == "1";
        if(issued){
            $("#btnPrint").html("Print");
        }else{
            alert(JSON.stringify(kodebookings));
            alert(JSON.stringify(routes));
//            for(var i = 0;i< kodebookings.length;i++){
//                $.post("<?php echo base_url(); ?>index.php/scrap/issued/"+routes[i],{
//                    kodebooking : kodebookings[i]
//                },function(res){
//                    if(res.success === 1){
//                        $("#isissued").val("1");
//                        $("#btnPrint").html("Print");
//                    }else{
//                        Alert("issued ticket gagal");
//                    }
//
//                });
//            }
            
            
        }
    }
    
    var completion_stat = 0;
    
    var dtpergi = {};
    var dtpulang = {};
    var routes = [];
    var kodebookings = [];
</script>