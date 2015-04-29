<form action="../refund/simpan" method="post" enctype="multipart/form-data">
<div id="modalAktivitas" class="modal hide fade" tabindex="-1" role="dialog"   aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel" >Refund Agent</h3>
			</div>
			<div class="modal-body" id='modalContent'>
				
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
				<button class="btn btn-primary" id="btnSimpan" >Save changes</button>
			</div>
</div>
</form>

<div class="container-fluid nav-hidden" id="content">
		
		<div id="main">
			<div class="container-fluid ">
				<div class="page-header">
					<div class="pull-left">
						<h1>Refund Management</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="/travel">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Master Agent</a>
							<i class="icon-angle-right"></i>
						</li>
                                                <li>
							<a href="#">Refund Sub Agent</a>
							
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#">
							<i class="icon-remove"></i>
						</a>
					</div>
				</div>

                                 <div class="row-fluid">
                                     
                                     
                                         <table class="table table-bordered table-force-topborder table-colored-header table-condensed">
                                             <thead>
                                                 <tr>
                                                     <td>Nomor refund</td>
                                                     <td>Tanggal Request</td>
                                                     <td>Kode Agen</td>
                                                     <td>Nama Agen</td>
                                                     <td>Maskapai</td>
                                                     <td>Kode Booking</td>
                                                     <td>Nilai Refund</td>
                                                     <td>Status</td>
                                                     <td>Action</td>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach($refunds as $agent){ ?>
                                                 <tr id="tr_<?php echo $agent->idrefund; ?>">
                                                     <td><?php echo $agent->idrefund; ?></td>
                                                     <td><?php echo $agent->tanggalrequest; ?></td>
                                                     <td><?php echo $agent->agentid; ?></td>
                                                     <td><?php echo $agent->namaagen; ?></td>
                                                     <td><?php echo $agent->namamaskapai; ?></td>
                                                     <td><?php echo $agent->kodebooking; ?></td>
                                                     <td>Rp. <?php echo number_format($agent->nilairefund,2); ?></td>
                                                     <td><?php echo $agent->status; ?></td>
                                                     <td>
                                                         <?php if($agent->status == "Request") { ?>
                                                         <a href="#modalAktivitas" data-toggle="modal" onclick="edit(<?php echo $agent->idrefund ?>);">
                                                             <?php if($ismaster){ ?>Verifikasi<?php } else { ?> Edit <?php } ?></a> &nbsp
                                                         <?php }else { echo "none"; } ?>
                                                     </td>    
                                                 </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     <a href="#modalAktivitas" class="btn btn-primary" data-toggle="modal" onclick="addnew();">Permohonan Refund baru</a>
                                     </div>
                                 
                                
                                
			</div>
		</div>
	</div>


<script type="text/javascript">
    function addnew(){
        $.get('<?php echo base_url(); ?>index.php/refund/addrefund',{},function(res){
            $("#modalContent").html(res);
        });
    }
    
    function edit(iddeposit){
        $.get('<?php echo base_url(); ?>index.php/refund/addrefund',{ id : iddeposit },function(res){
            $("#modalContent").html(res);
        });
    }
    
    function active(idagent,active){
        if(confirm("anda yakin ingin menghapus data agent ini?")){
            $.post('<?php echo base_url(); ?>index.php/sub-agent/activate',{
                idagent : idagent,
                active : active
            },function(res){
                if(res.status === 1){
                    $("#tr_"+idagent).remove();
                }else{
                    alert("gagal menghapus data");
                }
            });
        }
        
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
</script>