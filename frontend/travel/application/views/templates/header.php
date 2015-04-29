<html>
<head>
	<meta charset="utf-8">
        <?php if(isset($desktop) && !$desktop){ ?> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <?php }else{ ?>
        <meta name="viewport" content="width=1024" />
        <?php }?>
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        
        
	<title>Travel Agent Administration - Ticketing and Finance</title>
        <style type="text/css">
            
            #map-canvas { height: 100% }
        </style>
        <!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" />
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- PageGuide -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- Tagsinput -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/tagsinput/jquery.tagsinput.css">
	<!-- chosen -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/chosen/chosen.css">
	<!-- multi select -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/multiselect/multi-select.css">
	<!-- timepicker -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- colorpicker -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/colorpicker/colorpicker.css">
	<!-- Datepicker -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/datepicker/datepicker.css">
	<!-- Daterangepicker -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/daterangepicker/daterangepicker.css">
	<!-- Plupload -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/plupload/jquery.plupload.queue.css">
	<!-- select2 -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/select2/select2.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/themes.css">
        <!-- colorbox -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/colorbox/colorbox.css">
        <!-- Notify -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/gritter/jquery.gritter.css">

        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/jquery.fileupload.css">
        <!-- gmap -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins/gmap/gmap3-menu.css">
        
        <style>
            #randomFeed > tbody > tr > td > ul.timeline-images > li > a > img {
                max-width: 100px;
                
            }
            
            #randomFeed > tbody > tr > td > ul.timeline-images > li{
                clear : both;
                list-style: none;
            }
            
            

            #pac-input {
              background-color: #fff;
              padding: 0 11px 0 13px;
              width: 400px;
              font-family: Roboto;
              font-size: 15px;
              font-weight: 300;
              text-overflow: ellipsis;
            }

            #pac-input:focus {
              border-color: #4d90fe;
              margin-left: -1px;
              padding-left: 14px;  /* Regular padding-left + 1. */
              width: 401px;
            }

            .pac-container {
              font-family: Roboto;
            }

            #type-selector {
              color: #fff;
              background-color: #4d90fe;
              padding: 5px 11px 0px 11px;
            }

            #type-selector label {
              font-family: Roboto;
              font-size: 13px;
              font-weight: 300;
            }
      

          </style>

        
        <!-- jQuery -->
	<script src="<?php echo base_url();?>js/jquery.min.js"></script>
        
        <!-- jQuery -->
	<script src="<?php echo base_url();?>js/plugins/md5.js"></script>
        
</head>

<body class="theme-orange">
    
    <div id="modalpassword" class="modal hide">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="user-infos">Ganti Password</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				
				<div class="span10">
                                    <div class="control-group">
                                        <label for="ket" class="control-label">Password Lama</label>
                                        <div class="controls">
                                            <input type="password" name="oldpassword" id="oldpassword" class="input-large">
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label for="ket" class="control-label">Password baru</label>
                                        <div class="controls">
                                            <input type="password" name="newpassword" id="newpassword" class="input-large">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="ket" class="control-label">Password baru(ulangi)</label>
                                        <div class="controls">
                                            <input type="password" name="newpassword_rep" id="newpassword_rep" class="input-large">
                                        </div>
                                    </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Cancel</button>
                        <button class="btn" onclick="gantipassword();" data-dismiss="modal">Submit</button>
		</div>
	</div>
        
    <script type="text/javascript">
//        function gantipassword(){
//            $.get("<?php //echo NODE_URL."gantipassword" ?>",{
//                userid : "<?php //echo $userid; ?>",
//                oldpassword : md5($("#oldpassword").val()),
//                newpassword : md5($("#newpassword").val())
//            },function(res){
//                var data = JSON.parse(res);
//                if(data.status == 1){
//                    alert("password telah terupdate");
//                }else{
//                    alert(data.error);
//                }
//            });
//        }
        
        
    </script>
	<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand">Inti Raya Agent Back Office</a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li class='active'>
					<a href="<?php echo base_url();?>">
						<span>Dashboard</span>
					</a>
				</li>
                                 <?php if($ismaster){ ?>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Master Agent</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li class="dropdown-submenu">
							<a href="<?php echo base_url();?>#" class='dropdown-toggle' data-toggle='dropdown'>Sub Agent Management</a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                    <a href="<?php echo base_url();?>index.php/sub-agent/list">Daftar Sub Agent</a>
                                                            </li>
                                                            <li>
                                                                    <a href="<?php echo base_url();?>index.php/ticket/refund">Refund Request</a>
                                                            </li>
                                                        </ul>
						</li>
                                               
                                                <li class="dropdown-submenu"   >
							<a href="<?php echo base_url();?>#" class='dropdown-toggle' data-toggle='dropdown'>Master Data</a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                    <a href="<?php echo base_url();?>index.php/master-data/airline">Master Penerbangan</a>
                                                            </li>
                                                            <li>
                                                                    <a href="<?php echo base_url();?>index.php/master-data/akun">Master Akun</a>
                                                            </li>
                                                            <li>
                                                                    <a href="<?php echo base_url();?>index.php/maskapai/listlogin">List Login maskapai</a>
                                                            </li>
                                                            <li>
                                                                    <a href="<?php echo base_url();?>index.php/master-data/payment">Master cara bayar</a>
                                                            </li>
                                                        </ul>
						</li>
                                                
                                                <li class="dropdown-submenu">
                                                    <a href="#" data-toggle="dropdown" class='dropdown-toggle'>Finance</a>
                                                    <ul class="dropdown-menu">
                                                            <li>
                                                                    <a href="<?php echo base_url();?>index.php/finance/verifikasi-topup">Verifikasi Topup Agent</a>
                                                            </li>
                                                            <li>
                                                                    <a href="<?php echo base_url();?>index.php/finance/topup-airline">Topup Airline</a>
                                                            </li>
                                                            <li class="dropdown-submenu">
                                                                    <a href="<?php echo base_url();?>#" data-toggle="dropdown" class='dropdown-toggle'>Report</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                                <a href="<?php echo base_url();?>index.php/report/subagent-balance">Balance Sub-agent</a>
                                                                        </li>
                                                                        <li>
                                                                                <a href="<?php echo base_url();?>index.php/ticket/bookings">Laporan Transaksi Ticket</a>
                                                                        </li>
                                                                    </ul>
                                                            </li>
                                                    </ul>
                                                </li>
						
					</ul>
				</li>
				<?php } ?>
                                <li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Master Data Sub Agent</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li class="dropdown-submenu">
							<a href="<?php echo base_url();?>index.php/profile-agent" data-toggle="dropdown" class='dropdown-toggle'>Profil Agent</a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                    <a href="<?php echo base_url();?>index.php/sub-agent/profil">Atur Profile dan Harga tiket</a>
                                                            </li>
                                                        </ul>
						</li>
                                                <li>
							<a href="<?php echo base_url();?>index.php/agent/role-access">Role dan Hak Akses</a>
						</li>
                                                
						<li>
							<a href="<?php echo base_url();?>index.php/user/userlist">Manajemen user</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Finance</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url();?>index.php/agent/finance/topup">Topup Deposit</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>index.php/agent/finance/transaction-report">Laporan Transaksi Ticket</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Ticketing</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">

						<li class="dropdown-submenu">
                                                    <a href="<?php echo base_url();?>index.php/ticket/booking" data-toggle="dropdown" class="dropdown-toggle">Reservasi Ticket</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo base_url();?>index.php/search">Pencarian dan booking</a></li>
                                                        
                                                        <li><a href="<?php echo base_url();?>index.php/ticket/cancel?search=1">Issue Ticket by Booking</a></li>
                                                        <li><a href="<?php echo base_url();?>index.php/ticket/bookings">My Tickets</a></li>
                                                    </ul>
							
						</li>
                                                <li>
                                                    <a href="<?php echo base_url();?>index.php/ticket/refund" >Refund Ticket</a>
                                                </li>
						
					</ul>
				</li>
                                
			</ul>
                        <div class="user">
<!--				<ul class="icon-nav">
					<li class='dropdown'>
                                            <a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-envelope"></i><span class="label label-lightred"><?php //echo $notification; ?></span></a>
						<ul class="dropdown-menu pull-right message-ul">
                                                    <?php //foreach ($tasks as $obj){?>
							<li>
								<a href="<?php //echo base_url().$obj->link;?>">
									
									<div class="details">
										<div class="name">Alert</div>
										<div class="message">
											<?php // echo $obj->description; ?>
										</div>
									</div>
								</a>
							</li>
                                                    <?php //} ?>
							
							
						</ul>
					</li>
					
					
					
				</ul>-->
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown">
                                            <?php echo $nama; ?> 
<!--                                            <img style="max-width: 27px;max-height: 27px" src="<?php echo base_url();?>employee/<?php echo $gambar; ?>" alt="">-->
                                        </a>
					<ul class="dropdown-menu pull-right">
<!--						<li>
							<a href="#modalpassword" data-toggle="modal">Ganti Password</a>
						</li>
                                                <li>
                                                        <a href="#modalprofile" data-toggle="modal">Edit Data pribadi</a>
                                                </li>-->
                                                
						<li>
							<a href="<?php echo base_url();?>index.php/login/logout">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
			
		</div>
	</div>
    
<form action="<?php echo base_url();?>index.php/editprofile" method="POST" enctype="multipart/form-data">
        <div id="modalprofile" class="modal hide">
            
                <div class="modal-header">
<!--                        <input type="button" class="close" data-dismiss="modal" aria-hidden="true">×</input>-->
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="user-infos">Editdata pribadi</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
                            
				<div class="span10">
                                    <div class="control-group">
                                        <label  class="control-label">user id</label>
                                        <div class="controls">
                                            <label  class="control-label"><?php echo $userid; ?></label>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label for="ket" class="control-label">Nama</label>
                                        <div class="controls">
                                            <input type="text" name="nama"  id="nama_user" class="input-large" value="<?php echo $nama; ?>">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="ket" class="control-label">Email</label>
                                        <div class="controls">
                                            <input type="text" name="email"  id="email_user" class="input-large" value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="ket" class="control-label">Telepon</label>
                                        <div class="controls">
                                            <input type="text" name="telepon"  id="telepon_user" class="input-large" value="<?php echo $telepon; ?>">
                                            <input type="hidden" name="url" value="<?php echo uri_string(); ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="ket" class="control-label">Photo</label>
                                        <div class="controls">
                                            <input type="file" name="gambar"  id="photo_user">
                                        </div>
                                    </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
                        <button class="btn" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn"  >Submit</button>
		</div>            
            
		
	</div>
     </form>