<form action="../user/simpanuser" method="POST" enctype="multipart/form-data">
<div id="modalAktivitas" class="modal hide fade" tabindex="-1" role="dialog"   aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel" >Detail User</h3>
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
						<h1>Manajemen User</h1>
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
							<a href="#">List User</a>
							
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
                                                     <td>Login</td>
                                                     <td>Nama User</td>
                                                     
                                                     <td>Email</td>
                                                     <td>Alamat</td>
                                                     <td>Telepon</td>
                                                     <td>Action</td>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach($userlist as $agent){ ?>
                                                 <tr id="tr_<?php echo $agent->username; ?>">
                                                     <td><?php echo $agent->username; ?></td>
                                                     <td><?php echo $agent->nama; ?></td>
                                                     <td><?php echo $agent->email; ?></td>
                                                     <td><?php echo $agent->alamat; ?></td>
                                                     <td><?php echo $agent->telepon; ?></td>
                                                     
                                                     
                                                     <td><a href="#modalAktivitas" data-toggle="modal" onclick="edit('<?php echo $agent->username ?>');">edit</a></td>
                                                 </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     <a href="#modalAktivitas" data-toggle="modal" class="btn btn-primary" onclick="addnew();">Tambah User</a>
                                     </div>
                                 
                                
                                
			</div>
                        
		</div>
	</div>


<script type="text/javascript">
    function addnew(){
        $.get('<?php echo base_url(); ?>index.php/user/adduser',null,function(res){
            $("#modalContent").html(res);
        });
    }
    
    function edit(idagent){
        $.get('<?php echo base_url(); ?>index.php/user/adduser',{ id : idagent },function(res){
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