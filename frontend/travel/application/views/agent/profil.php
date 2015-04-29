<form action="../sub-agent/savemaskapai" method="post" enctype="multipart/form-data">
<div id="modalAktivitas" class="modal hide fade" tabindex="-1" role="dialog"   aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel" >Markup Agent</h3>
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
						<h1>Sub Agent</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="/travel">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Agent</a>
							<i class="icon-angle-right"></i>
						</li>
                                                <li>
							<a href="<?php echo base_url(); ?>index.php/sub-agent/profil">Profil Agent</a>
							
							
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#">
							<i class="icon-remove"></i>
						</a>
					</div>
				</div>

                                 <div class="row-fluid">
                                     <div class="span12">
						<div class="box box-bordered">
							<div class="box-title">
								<h3><i class="icon-th-list"></i>Agent Profil</h3>
							</div>
                                                </div>
                                         <div class="box-content nopadding">
                                             <form action="../sub-agent/saveprofil" method="post" class="form-horizontal form-striped" enctype="multipart/form-data">
                                                 <div class="row-fluid" >
                                                     <div class="span2">
                                                         
                                                         <img src="<?php if(isset($agent)){ echo $agent->gambar; } ?>" class="img" />
                                                         <input type="file" name="gambar" />
                                                         
                                                     </div>
                                                     
                                                     <div class="span10">
                                                         <input id="idagent" name="idagent" type="hidden" value="<?php if(isset($agent)) echo $agent->idagent; ?>" />
                                                        <div class="control-group">
                                                             <label for="namaagen" class="control-label">Agent Name</label>
                                                             <div class="controls">
                                                                     <input type="text" name="namaagen" id="namaagen" 
                                                                         <?php if(isset($agent)){
                                                                             echo "value='".$agent->namaagen."'";
                                                                             }?> class="input-large text"  >
                                                             </div>
                                                         </div>


                                                         <div class="control-group">
                                                             <label for="alamat" class="control-label">Alamat</label>
                                                             <div class="controls">
                                                                     <input type="text" name="alamat" id="alamat" 
                                                                         <?php if(isset($agent)){
                                                                             echo "value='".$agent->alamat."'";
                                                                         }?> class="input-large">
                                                             </div>
                                                         </div>
                                                         <div class="control-group">
                                                             <label for="telepon" class="control-label">Telepon</label>
                                                             <div class="controls">
                                                                     <input type="text" name="telepon" id="telepon" 
                                                                         <?php if(isset($agent)){
                                                                             echo "value='".$agent->telepon."'";
                                                                         }?> class="input-large">
                                                             </div>
                                                         </div>
                                                         <div class="control-group">
                                                             <label for="email" class="control-label">Email</label>
                                                             <div class="controls">
                                                                     <input type="text" name="email" id="email" 
                                                                         <?php if(isset($agent)){
                                                                             echo "value='".$agent->email."'";
                                                                         }?> class="input-large">
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>

                                                
                                                

                                                <button class="btn btn-primary" id="btnSimpan" >Simpan Profil</button>



                                            </form>
                                         </div>
                                         
                                     </div>
                                     
                                     <br/>
                                     <h3>Setting Maskapai</h3>
                                     
                                         <table class="table table-bordered table-force-topborder table-colored-header table-condensed">
                                             <thead>
                                                 <tr>
                                                     <td>Nama Maskapai</td>
                                                     <td>Tipe Markup</td>
                                                     <td>Persentase</td>
                                                     <td>Nilai Fix</td>
                                                     <td>Plafon Markup</td>
                                                     
                                                     <td>Action</td>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach($listmaskapai as $maskapaiagent){ ?>
                                                 <tr id="tr_<?php echo $maskapaiagent->idagent_maskapai; ?>">
                                                     <td><?php echo $maskapaiagent->namamaskapai; ?></td>
                                                     <td><?php if($maskapaiagent->tipemarkup == 1){ echo "Persentase";}else{ echo "Harga Fix";}; ?></td>
                                                     <td><?php echo number_format($maskapaiagent->persen_markup); ?> % </td>
                                                     <td>Rp. <?php echo number_format($maskapaiagent->fix_markup); ?></td>
                                                     <td>Rp. <?php echo number_format($maskapaiagent->plafon_markup,2); ?></td>
                                                     
                                                     <td>
                                                         
                                                         <a href="#modalAktivitas" data-toggle="modal" onclick="edit(<?php echo $maskapaiagent->idagent_maskapai ?>);">Edit</a>
                                                     </td>    
                                                 </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     
                                     </div>
                                 
                                
                                
			</div>
		</div>
	</div>


<script type="text/javascript">
    function addnew(){
        $.get('<?php echo base_url(); ?>index.php/sub-agent/addmaskapai',null,function(res){
            $("#modalContent").html(res);
        });
    }
    
    function edit(iddeposit){
        $.get('<?php echo base_url(); ?>index.php/sub-agent/addmaskapai',{ id : iddeposit },function(res){
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