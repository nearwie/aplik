<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<a href="<?= base_url('user') ;?>" >
							<i class="ace-icon fa fa-bell white"></i>
							</a>
						</button>

						<button class="btn btn-info">
							<a href="<?= base_url('Laporan') ;?>" >
							<i class="ace-icon fa fa-print white"></i>
							</a>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<a href="<?= base_url('profile') ;?>" >
							<i class="ace-icon fa fa-user white"></i>
							</a>
						</button>

						<button class="btn btn-danger">
							<a href="<?= base_url('databarang') ;?>" >
							<i class="ace-icon fa fa-cogs white"></i>
							</a>

						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="<?= base_url('user') ;?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Persediaan Pias
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							

							<li class="">
								<a href="<?= base_url('barangmasuk') ;?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Barang Masuk
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?= base_url('barangkeluar') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Barang Keluar
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Data Barang
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="<?= base_url('laporan') ?>">
											<i class="menu-icon fa fa-leaf green"></i>
											Laporan
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											Daftar Barang
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="<?= base_url('detailbrg/tambah') ;?>">
													<i class="menu-icon fa fa-plus purple"></i>
													Add Barang
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="<?= base_url('detailbrg') ;?>">
													<i class="menu-icon fa fa-eye pink"></i>
													Detail Barang
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>


					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text">
								Persediaan Aset
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							

							<li class="">
								<a href="<?= base_url('asetmasuk') ;?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Aset Masuk 
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?= base_url('asetkeluar') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Aset Keluar 
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Data Aset
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="<?= base_url('laporan') ?>">
											<i class="menu-icon fa fa-leaf green"></i>
											Laporan
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											Daftar Aset
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="<?= base_url('dataaset/tambah') ;?>">
													<i class="menu-icon fa fa-plus purple"></i>
													Add Aset
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="<?= base_url('dataaset') ;?>">
													<i class="menu-icon fa fa-eye pink"></i>
													Detail Aset
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>


					
					

					<li class="">
						<a href="<?= base_url('profile') ;?>">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Profile </span>
						</a>

						<b class="arrow"></b>
					</li>

					
					
					


					
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
