<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('user/head') ;?>


	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->

		<?php $this->load->view('user/navbar'); ?>
		

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->

			<?php $this->load->view('user/sidebar'); ?>
			
				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>
			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?= base_url('user');?>">Home</a>
							</li>

						
							<li class="active">User Profile</li>
						</ul><!-- /.breadcrumb -->


						<!-- #section:basics/content.searchbox -->
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<div class="ace-settings-container" id="ace-settings-container">
							<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								My Profile 
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									<?= $this->session->flashdata('message'); ?>
          							<?= $this->session->flashdata('pesan'); ?>
								

								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-md-2 center">
											<div >
												
												<!-- #section:pages/profile.picture -->
												<span class="profile-picture center">
													<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?= base_url('assets/img/profile/'). $user['image']; ?>" >
												</span>
												

												<!-- /section:pages/profile.picture -->
												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white"><?= $user['name']; ?></span>
														</a>

														
													</div>
												</div>
											</div>

											<div class="space-6"></div>

											<!-- #section:pages/profile.contact -->
											<div class="profile-contact-info">
												<div class="profile-contact-links align-left">
													<a href="<?= base_url ('addbrgmasuk') ;?>" class="btn btn-link">
														<i class="ace-icon fa fa-plus-circle bigger-80 green"></i>
														 Barang Masuk
													</a>

													<a href="<?= base_url ('addbrgkeluar') ;?>" class="btn btn-link">
														<i class="ace-icon fa fa-plus-circle bigger-80 red"></i>
														 Barang Keluar
													</a>

													<a href="" data-toggle="modal" data-target="#newEditProfile" class="btn btn-link">
														<i class="ace-icon fa fa-edit bigger-85 purple"></i>
														Edit My Profile
													</a>
												</div>

												<div class="space-6"></div>


												<div class="profile-social-links align-center">
													
												</div>
											</div>

											<!-- /section:pages/profile.contact -->
											

											<!-- #section:custom/extra.grid -->
											

											<!-- /section:custom/extra.grid -->
											<div ></div>
										</div>

										<div class="col-xs-12 col-sm-9">
											<div class="center">
												

											</div>




										<div class="col-xs-12 col-sm-9">
											<div class="center">
												<span class="btn btn-app btn-sm btn-light no-hover">
													
												</span>

												<span class="btn btn-app btn-sm btn-yellow no-hover">
													
												</span>

												<span class="btn btn-app btn-sm btn-pink no-hover">
													
												</span>

												<span class="btn btn-app btn-sm btn-grey no-hover">
													
												</span>

												<span class="btn btn-app btn-sm btn-success no-hover">
													
												</span>

												<span class="btn btn-app btn-sm btn-primary no-hover">
													
												</span>
											</div>

											<div class="space-12"></div>

											<!-- #section:pages/profile.info -->
											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Nama </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?= $user['name']; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Email </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker light-orange bigger-110"></i>
														<span class="editable" id="country"><?= $user['email']; ?></span>
													
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Member Since </div>

													<div class="profile-info-value">
														<span class="editable" id="age"><?= date ('d F Y', $user['date_created']); ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Last Online </div>

													<div class="profile-info-value">
														<i class="fa fa-info-circle light-green bigger-110"></i>
														<span class="editable" id="age"><?= $user['last_login']; ?></span>
													</div>
												</div>

												
											</div>
											</div>
									


											<!-- /section:pages/profile.info -->
											

								</div>



						
						<!-- /section:settings.box -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->


								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			</div>

			<!-- Modal -->
				<div class="modal fade" id="newEditProfile" tabindex="-1" role="dialog" aria-labelledby="newEditProfileLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="newEditProfileLabel">Edit Profile</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form  action="<?= base_url('user/editprofile') ?>" method="post" enctype="multipart/form-data">
				        <div class="modal-body">
				            <div class="form-group">
				              <label for="email">Email</label>
				            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'];?>" readonly >
				        </div>
				        
				        <div class="form-group">
				             <label for="name">Nama</label>
				            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'];?>">

				              
				        </div>

				        <div class="form-group" >
				          <label for="image">Gambar</label>
				          <div class="row">
				              <div class="col-sm-3">
				                <img src="<?= base_url('assets/img/profile/'). $user ['image'];?>" class="img-thumbnail">
				              </div>
				              <div class="col-sm-9">
				                <div class="custom-file">
				                <input type="file" class="custom-file-input" id="image" name="image">
				                <label class="custom-file-label" for="image">Choose file</label>
				                </div>
				              </div>
				          </div>
				        </div>
				      
				        
				        <div class="modal-footer">
				          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				          <button type="submit" value="upload" name="upload" class="btn btn-primary">Simpan</button>
				        </div>
				      </form>
				    </div>
				  </div>
				</div>


			<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?= base_url('assets/'); ?>js/jquery.js'>"+"<"+"/script>");
		</script>
	

		<!-- <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url('assets/'); ?>js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		

			

			

				

<?php $this->load->view('user/footer') ;?>