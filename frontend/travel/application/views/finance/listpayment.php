<form action="../master-data/simpanpaymenttype" method="post" enctype="multipart/form-data">
<div id="modalAktivitas" class="modal hide fade" tabindex="-1" role="dialog"   aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel" >Cara Bayar</h3>
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
						<h1>Master Tipe Pembayaran</h1>
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
							<a href="#">Master data</a>
							<i class="icon-angle-right"></i>
						</li>
                                                <li>
							<a href="#">Tipe Pembayaran</a>
							
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
                                                     <td>Kode Tipe</td>
                                                     <td>Nama Tipe Transasksi</td>
                                                     <td>% Modifier</td>
                                                     <td>Action</td>
                                                     
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach($payments as $payment){ ?>
                                                 <tr id="tr_<?php echo $payment->idmastertransaksi; ?>">
                                                     <td><?php echo $payment->idmastertransaksi; ?></td>
                                                     <td><?php echo $payment->namatransaksi; ?></td>
                                                     <td><?php echo $payment->persenmod; ?></td>
                                                     
                                                     <td><a href="#modalAktivitas" data-toggle="modal" onclick="edit(<?php echo $payment->idmastertransaksi ?>);">edit</a> &nbsp <a href="#" onclick="active(<?php echo $payment->idmastertransaksi; ?>,0);">delete</a></td>
                                                 </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     <a href="#modalAktivitas" class="btn btn-primary" data-toggle="modal" onclick="addnew();">Tipe pembayaran baru</a>
                                     </div>
                                 
                                
                                
			</div>
		</div>
	</div>


<script type="text/javascript">
    function addnew(){
        $.get('<?php echo base_url(); ?>index.php/master-data/addpayment',null,function(res){
            $("#modalContent").html(res);
        });
    }
    
    function edit(idpayment){
        $.get('<?php echo base_url(); ?>index.php/master-data/addpayment',{ id : idpayment },function(res){
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
</script>