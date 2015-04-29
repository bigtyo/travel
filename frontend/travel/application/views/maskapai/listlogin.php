<form action="../maskapai/simpanlogin " method="post" enctype="multipart/form-data">
<div id="modalAktivitas" class="modal hide fade" tabindex="-1" role="dialog"   aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel" >Login Maskapai</h3>
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
						<h1>Manajemen Login maskapai</h1>
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
							<a href="#">List Login Maskapai</a>
							
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#">
							<i class="icon-remove"></i>
						</a>
					</div>
				</div>

                                 <div class="row-fluid">
                                     
                                     
                                         <table class="table table-bordered table-force-topborder table-condensed table-colored-header">
                                             <thead>
                                                 <tr>
                                                     <td>Nomor Maskapai</td>
                                                     <td>Nama Maskapai</td>
                                                     <td>Login</td>
                                                     <td>Password</td>
                                                     <td>Action</td>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach($maskapailist as $agent){ ?>
                                                 <tr id="tr_<?php echo $agent->idmasterloginmaskapai; ?>">
                                                     <td><?php echo $agent->idmastermaskapai; ?></td>
                                                     <td><?php echo $agent->namamaskapai; ?></td>
                                                     <td><?php echo $agent->login; ?></td>
                                                     <td>******</td>
                                                     
                                                     <td><a href="#modalAktivitas" data-toggle="modal" onclick="edit(<?php echo $agent->idmasterloginmaskapai ?>);">edit</a></td>
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
        $.get('<?php echo base_url(); ?>index.php/maskapai/addlogin',null,function(res){
            $("#modalContent").html(res);
        });
    }
    
    function edit(idagent){
        $.get('<?php echo base_url(); ?>index.php/maskapai/addlogin',{ id : idagent },function(res){
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