<form action="../master-data/akun/simpan " method="post" enctype="multipart/form-data">
<div id="modalAktivitas" class="modal hide fade" tabindex="-1" role="dialog"   aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel" >Akun</h3>
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
						<h1>Kode Akun</h1>
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
							<a href="#">Kode akun</a>
							
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
                                                     <td>Kode Akun</td>
                                                     <td>Nama Akun</td>
                                                     <td>Parent</td>
                                                     
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach($acounts as $acount){ ?>
                                                 <tr id="tr_<?php echo $acount->kodeakun; ?>">
                                                     <td><?php echo $acount->kodeakun; ?></td>
                                                     <td><?php echo $acount->namaakun; ?></td>
                                                     <td><?php echo $acount->parent; ?></td>
                                                     
                                                     <td><a href="#modalAktivitas" data-toggle="modal" onclick="edit(<?php echo $acount->kodeakun ?>);">edit</a> &nbsp <a href="#" style="display: none" onclick="active(<?php echo $acount->kodeakun; ?>,0);">delete</a></td>
                                                 </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     <a href="#modalAktivitas" class="btn btn-primary" data-toggle="modal" onclick="addnew();">Akun baru</a>
                                     </div>
                                 
                                
                                
			</div>
		</div>
	</div>


<script type="text/javascript">
    function addnew(){
        $.get('<?php echo base_url(); ?>index.php/master-data/akun/addakun',null,function(res){
            $("#modalContent").html(res);
        });
    }
    
    function edit(kodeakun){
        $.get('<?php echo base_url(); ?>index.php/master-data/akun/addakun',{ id : kodeakun },function(res){
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