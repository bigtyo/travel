

<div class="container-fluid nav-hidden" id="content">
		
		<div id="main">
			<div class="container-fluid ">
				<div class="page-header">
					<div class="pull-left">
						<h1>Transaksi Ticket</h1>
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
							<a href="#">My Bookings</a>
							
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#">
							<i class="icon-remove"></i>
						</a>
					</div>
				</div>

                                 <div class="row-fluid">
                                     <h3>List Transaksi Ticket</h3>
                                     
                                         <table class="table table-bordered table-striped table-colored-header table-force-topborder table-condensed table-invoice">
                                             <thead>
                                                 <tr>
                                                     <td>Nomor</td>
                                                     <td>Tanggal</td>
                                                     <td>Kode Booking</td>
                                                     <td>Nama Maskapai</td>
                                                     <td>Total</td>
                                                     <td>Status</td>
                                                     <td>Created By</td>
                                                     <td>Action</td>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach($tickets as $agent){ ?>
                                                 <tr id="tr_<?php echo $agent->idticketing; ?>">
                                                     <td><a href="#" onclick="getdetail(<?php echo $agent->idticketing; ?>)"><?php echo $agent->idticketing; ?></a></td>
                                                     <td><?php echo $agent->tanggal; ?></td>
                                                     <td><?php echo $agent->kodebooking; ?></td>
                                                     <td><?php echo $agent->namamaskapai; ?></td>
                                                     <td>Rp. <?php echo number_format($agent->total,2); ?></td>
                                                     <td><?php echo $agent->status; ?></td>
                                                     <td><?php echo $agent->createdby; ?></td>
                                                     <td></td> 
                                                 </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     
                                         
                                     </br>
                                     
                                     </div>
                                 
                                
                                
			</div>
		</div>
	</div>


<script type="text/javascript">
    function addnew(){
        $.get('<?php echo base_url(); ?>index.php/deposit/adddeposit',null,function(res){
            $("#modalContent").html(res);
        });
    }
    
    function edit(iddeposit){
        $.get('<?php echo base_url(); ?>index.php/deposit/adddeposit',{ id : iddeposit },function(res){
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
    
    function getdetail(idticketing){
        $("#tbl_detail_"+idticketing).parent().remove();
        $.post('<?php echo base_url(); ?>index.php/ticket/bookings/detail',{
            idticketing : idticketing
        },function(res){
            var html = "<tr><td colspan='7'>";
            html += res;
            html += "</td></tr>";
            $("#tr_"+idticketing).after(html);
        });
    
    }
    
    function closethis(idticketing){
        $("#tbl_detail_"+idticketing).parent().remove();
    }
</script>