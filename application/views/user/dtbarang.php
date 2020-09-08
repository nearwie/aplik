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

          							<?= $this->session->flashdata('message'); ?>
          							<?= $this->session->flashdata('pesan'); ?>

										<div class="widget-box transparent">
											<div class="widget-header widget-header-large">
												<h3 class="widget-title grey lighter">
													<i class="ace-icon "></i>
													Data Barang
												</h3>

												<!-- #section:pages/invoice.info -->
												<div class="widget-toolbar no-border invoice-info">
													<span class="invoice-info-label">Laporan</span>
													<span class="red">Bulanan</span>

													<br />
													<span class="invoice-info-label">Tanggal</span>
													<span class="blue"><?= tanggal()?></span>
												</div>

												<div class="widget-toolbar hidden-480">
													<a href="<?= base_url('laporan/createpdf')?>">
														<i class="ace-icon fa fa-print"></i>
													</a>
												</div>

												<!-- /section:pages/invoice.info -->
											</div>
										<div class="pull-right tableTools-container"></div>
										</div>
										<div class="col-auto">
							                <a href="<?= base_url('detailbrg/tambah'); ?>" class="btn btn-success">
							                    <span class="icon">
							                        <i class="fa fa-plus"></i>
							                    </span>
							                    <span class="text">
							                       Tambah Barang
							                    </span>
							                </a>
							            </div>

										<div class="clearfix">

										<div class="table-header">
											Detail Barang
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>No</th>
														<th>Kode</th>
														<th>Nama</th>
														<th>Jenis</th>
														<th>Stok</th>
														<th>Satuan</th>
														<th>S/N</th>
														
														
														<th >Opsi</th>

													
													</tr>
												</thead>

												<tbody>
													<tr>
														 <?php $i = 1;  ?>
				  											<?php foreach ($barangs as $a) :?>
														

														<td>
															<?= $i;?>
														</td>
															<td ><?= $a['kode_brg'];?></td>
													      <td><?= $a['nama_brg'];?></td>
													      <td style="text-align: center;" ><?= $a['nama_jenis'];?></td>
													      <td style="text-align: center;"><?= $a['stok'];?></td>
													     <td style="text-align: center;" ><?= $a['nama_satuan'];?></td>
													     <td nowrap><?= $a['no_seri'];?></td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																

																<a class="green" href="<?php echo base_url('detailbrg/edit/'.$a['kode_brg']) ?>" class="badge badge-success">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" href="<?php echo base_url('detailbrg/delete/'.$a['kode_brg']) ?>" onclick="javascript: return confirm('Apakah yakin menghapus')" class="badge badge-danger">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		
																		<li>
																			<a href="<?php echo base_url('barang/edit/'.$a['kode_brg']) ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="<?php echo base_url('barang/delete/'.$a['kode_brg']) ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>

													
													

														

														<?php $i++; ?>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								
													
												
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
							


									<!-- /section:basics/sidebar.options -->
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

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
			

			<!-- inline scripts related to this page -->
		<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">SI-GUDANG</span>
							Application &copy;  <?= date ('Y'); ?>
						</span>

						&nbsp; &nbsp;
						
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
	<!--[i	<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?= base_url('assets/'); ?>js/jquery.js'>"+"<"+"/script>");
		</script>
	

		<!-- <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url('assets/'); ?>js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="<?= base_url('assets/'); ?>js/bootstrap.js"></script>




		<!-- page specific plugin scripts -->
		<script src="<?= base_url('assets/') ;?>js/dataTables/jquery.dataTables.js"></script>
		<script src="<?= base_url('assets/') ;?>js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="<?= base_url('assets/') ;?>js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="<?= base_url('assets/') ;?>js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

		<!-- ace scripts -->
		<script src="<?= base_url('assets/') ;?>js/ace/elements.scroller.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.colorpicker.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.fileinput.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.typeahead.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.wysiwyg.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.spinner.js"></script>
		<script src="<?= base_url('assets/') ;?>s/ace/elements.treeview.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.wizard.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.aside.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.ajax-content.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.touch-drag.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.sidebar.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.submenu-hover.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.widget-box.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.settings.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.settings-rtl.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.settings-skin.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.widget-on-reload.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.searchbox-autocomplete.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(document).ready(function() {
   			 $('#example').DataTable();
				} );
		</script>
		
		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="<?= base_url('assets/') ;?>css/ace.onpage-help.css" >
		<link rel="stylesheet" href="<?= base_url('assets/') ;?>docs/assets/js/themes/sunburst.css" >

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.onpage-help.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.onpage-help.js"></script>
		<script src="<?= base_url('assets/') ;?>docs/assets/js/rainbow.js"></script>
		<script src="<?= base_url('assets/') ;?>docs/assets/js/language/generic.js"></script>
		<script src="<?= base_url('assets/') ;?>docs/assets/js/language/html.js"></script>
		<script src="<?= base_url('assets/') ;?>docs/assets/js/language/css.js"></script>
		<script src="<?= base_url('assets/') ;?>docs/assets/js/language/javascript.js"></script>
	</body>
</html>
