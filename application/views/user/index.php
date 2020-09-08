<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('user/head') ?>


	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->

		<?php $this->load->view('user/navbar') ?>
		

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->

			<?php $this->load->view('user/sidebar') ?>
			
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
								<a href="#">Home</a>
							</li>

							<li>
								<a href="<?= base_url ('detailbrg') ;?>">Data Barang</a>
							</li>
							<li class="active">Daftar Barang</li>
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" >
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
							

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<!-- #section:settings.skins -->
									

									<!-- /section:settings.skins -->

									<!-- #section:settings.navbar -->
									

									<!-- /section:settings.container -->
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<!-- #section:basics/sidebar.options -->
									
									<!-- /section:basics/sidebar.options -->
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->
						<!-- /section:settings.box -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">

								<div class="col-sm-12 infobox-container">
										<!-- #section:pages/dashboard.infobox -->
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-inbox"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $barang; ?></span>
												<div class="infobox-content">Total Data Barang</div>
											</div>

											<!-- #section:pages/dashboard.infobox.stat -->
											

											<!-- /section:pages/dashboard.infobox.stat -->
										</div>

										<div class="infobox infobox-orange">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-filter"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $stok; ?></span>
												<div class="infobox-content">Total Stok Barang</div>
											</div>

											
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">8</span>
												<div class="infobox-content">Total User</div>
											</div>
											
										</div>

										

										

										
								</div>
							</div>
							<div class="space-6"></div>

								<div class="row">
									<!-- #section:pages/pricing.large -->
									<div class="col-xl-8 col-sm-6 pricing-box">
										<div class="widget-box widget-color-purple">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Total Transaksi Barang Perbulan pada Tahun <?= date('Y'); ?></h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
															<div class="card-body">
									                            <div class="chart-area">
									                                <div class="chartjs-size-monitor">
									                                    <div class="chartjs-size-monitor-expand">
									                                        <div class=""></div>
									                                    </div>
									                                    <div class="chartjs-size-monitor-shrink">
									                                        <div class=""></div>
									                                    </div>
									                                </div>
									                                <canvas id="myAreaChart" width="400" height="320" class="chartjs-render-monitor" style="display: block; width: 669px; height: 320px;"></canvas>
									                            </div>
									                        </div>
									                    </div>
									               
																

													<hr />
													
												</div>

												
											</div>
										</div>
									
									<div class="col-xl-4 col-sm-6 pricing-box">
										<div class="widget-box widget-color-blue">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Transaksi Barang</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
														<div class="card-body">
								                            <div class="chart-pie pt-4 pb-2">
								                                <div class="chartjs-size-monitor">
								                                    <div class="chartjs-size-monitor-expand">
								                                        <div class=""></div>
								                                    </div>
								                                    <div class="chartjs-size-monitor-shrink">
								                                        <div class=""></div>
								                                    </div>
								                                </div>
								                                <canvas id="myPieChart" width="302" height="245" class="chartjs-render-monitor" style="display: block; width: 302px; height: 297px;"></canvas>
								                            </div>
								                            <div class="mt-4 text-center small">
								                                <span class="mr-2">
								                                    <i class="ace-icon fa fa-circle fa-2x red"></i> Barang Keluar
								                                </span>

								                                <span class="mr-2">
								                                    <i class="ace-icon fa fa-circle fa-2x green"></i> Barang Masuk
								                                </span>
								                            </div>
								                        </div>
								                    </div>
													<hr />
													
												</div>

												
											</div>
										</div>
									</div>

								<div class="space-6"></div>

			

									<!-- /section:pages/pricing.large -->
								</div>


						
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<!-- #section:pages/pricing.large -->
									<div class="col-xs-6 col-sm-4 pricing-box">
										<div class="widget-box widget-color-dark">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Stok Barang Minimum</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
												
								                            <table class="table mb-0 text-center table-striped table-sm">
								                                <thead>
								                                    <tr>
								                                        <th>Barang</th>
								                                        <th>Stok</th>
								                                        <th>Pasok</th>
								                                    </tr>
								                                </thead>
								                                <tbody>
								                                    <?php
								                                    if ($barang_min) :
								                                        foreach ($barang_min as $b) :
								                                            ?>
								                                            <tr>
								                                                <td><?= $b['nama_brg']; ?></td>
								                                                <td><?= $b['stok']; ?></td>
								                                                <td>
								                                                    <a href="<?= base_url('barangmasuk/add/') . $b['kode_brg'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></a>
								                                                </td>
								                                            </tr>
								                                        <?php endforeach; ?>
								                                    <?php else : ?>
								                                        <tr>
								                                            <td colspan="3" class="text-center">
								                                                Tidak ada barang stok minim
								                                            </td>
								                                        </tr>
								                                    <?php endif; ?>
								                                </tbody>
								                            </table>
								                       

													<hr />
													
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-6 col-sm-4 pricing-box">
										<div class="widget-box widget-color-green">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Transaksi Terakhir Barang Masuk</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<table class="table mb-0 table-sm table-striped text-center">
						                                <thead>
						                                    <tr>
						                                        <th>Tanggal</th>
						                                        <th>Barang</th>
						                                        <th>Jumlah</th>
						                                    </tr>
						                                </thead>
						                                <tbody>
						                                    <?php foreach ($transaksi['barang_masuk'] as $tbm) : ?>
						                                        <tr>
						                                            <td><strong><?= $tbm['tanggal_masuk']; ?></strong></td>
						                                            <td><?= $tbm['nama_brg']; ?></td>
						                                            <td><span class="badge badge-success"><?= $tbm['jumlah_masuk']; ?></span></td>
						                                        </tr>
						                                    <?php endforeach; ?>
						                                </tbody>
						                            </table>
													<hr />
													
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-6 col-sm-4 pricing-box">
										<div class="widget-box widget-color-red">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">5 Transaksi Terakhir Barang Keluar</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													 <table class="table mb-0 table-sm table-striped text-center">
						                                <thead>
						                                    <tr>
						                                        <th>Tanggal</th>
						                                        <th>Barang</th>
						                                        <th>Jumlah</th>
						                                    </tr>
						                                </thead>
						                                <tbody>
						                                    <?php foreach ($transaksi['barang_keluar'] as $tbk) : ?>
						                                        <tr>
						                                            <td><strong><?= $tbk['tanggal_keluar']; ?></strong></td>
						                                            <td><?= $tbk['nama_brg']; ?></td>
						                                            <td><span class="badge badge-danger"><?= $tbk['jumlah_keluar']; ?></span></td>
						                                        </tr>
						                                    <?php endforeach; ?>
						                                </tbody>
						                            </table>

													<hr />
													
												</div>

												
											</div>
										</div>
									</div>

					
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<?php $this->load->view('user/footer') ?>

			