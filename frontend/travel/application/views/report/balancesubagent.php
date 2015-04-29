<div class="container-fluid nav-hidden" id="content">
		
		<div id="main">
			<div class="container-fluid ">
				<div class="page-header">
					<div class="pull-left">
						<h1>Balance Sub Agent</h1>
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
							<a href="#">Verify topup agent</a>
							
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#">
							<i class="icon-remove"></i>
						</a>
					</div>
				</div>
                                
                                 <div class="row-fluid">
                                     
                                     
                                         <table class="table table-bordered table-force-topborder table-colored-header dataTable" style="width: 100%">
                                             <thead>
                                                 <tr>
                                                     <td>Nama Agen</td>
                                                     <td>Alamat</td>
                                                     <td>Telepon</td>
                                                     <td>Email</td>
                                                     <td>Balance</td>
                                                     
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach($balances as $agent){ ?>
                                                 <tr id="tr_<?php echo $agent->idagent; ?>">
                                                     <td><?php echo $agent->namaagen; ?></td>
                                                     <td><?php echo $agent->alamat; ?></td>
                                                     <td><?php echo $agent->telepon; ?></td>
                                                     <td><?php echo $agent->email; ?></td>
                                                     <td>Rp. <?php echo number_format($agent->balance,2); ?></td>
                                                        
                                                 </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     
                                     </div>
                                 
                                
                                
			</div>
		</div>
	</div>