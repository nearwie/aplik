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
								<a href="#">Data Barang</a>
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
								<div class="space-6"></div>

								<div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<!-- #section:pages/invoice -->
										<div class="widget-box transparent">
											<div class="widget-header widget-header-large">
												<h3 class="widget-title grey lighter">
													<i class="ace-icon fa fa-leaf green"></i>
													Form Laporan
												</h3>

												<!-- #section:pages/invoice.info -->
												

												<!-- /section:pages/invoice.info -->
											</div>

											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">
														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
																	<b>Barang Masuk</b>
																</div>
															</div>

															<div>
																
															</div>
														</div><!-- /.col -->

														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-danger arrowed-in arrowed-right">
																	<b>Barang Keluar</b>
																</div>
															</div>

															<div>
																
															</div>
														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="hr hr8 hr-double hr-dotted"></div>


													<div class="space"></div>

													<div>
														<div class="card-body">
											                <?= $this->session->flashdata('pesan'); ?>
											                <?= form_open(); ?>
											                <div class="row form-group">
											                    <label class="col-md-3 text-md-right" for="transaksi">Laporan Mutasi</label>
											                    <div class="col-md-9">
											                        <div class="custom-control custom-radio">
											                            <input value="barang_masuk" type="radio" id="barang_masuk" name="transaksi" class="custom-control-input">
											                            <label class="custom-control-label" for="barang_masuk">Barang Masuk</label>
											                        </div>
											                        <div class="custom-control custom-radio">
											                            <input value="barang_keluar" type="radio" id="barang_keluar" name="transaksi" class="custom-control-input">
											                            <label class="custom-control-label" for="barang_keluar">Barang Keluar</label>
											                        </div>
											                        <?= form_error('transaksi', '<span class="text-danger small">', '</span>'); ?>
											                    </div>
											                </div>
											                <div class="row form-group">
											                    <label class="col-lg-3 text-lg-right" for="tanggal">Tanggal</label>
											                    <div class="col-lg-6">
											                        <div class="input-group">
											                        	<span class="input-group-addon">
																			<i class="fa fa-calendar bigger-110"></i>
																		</span>
											                            <input value="" class="form-control" type="text" name="tanggal" id="tanggal"  placeholder="Periode Tanggal">
											                            <div class="input-group-append">
											                                
											                            </div>
											                        </div>
											                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
											                    </div>
											                </div>
											                <div class="row form-group">
											                    <div class="col-lg-2 offset-lg-3 pull-right">
											                        <button type="submit" class="btn btn-success btn-icon-split">
											                            <span class="icon">
											                                <i class="fa fa-print"></i>
											                            </span>
											                            <span class="text">
											                                Cetak
											                            </span>
											                        </button>
											                    </div>
											                </div>
											                <?= form_close(); ?>
											            </div>
																									
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="row">
														
														
													</div>

													<div class="space-6"></div>
													
												</div>
											</div>
										</div>

										<!-- /section:pages/invoice -->
									</div>
								</div>

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

		<script src="<?= base_url('assets/') ;?>js/jquery-ui.custom.js"></script>
		<script src="<?= base_url('assets/') ;?>js/jquery.ui.touch-punch.js"></script>
		<script src="<?= base_url('assets/') ;?>js/chosen.jquery.js"></script>
		<script src="<?= base_url('assets/') ;?>js/fuelux/fuelux.spinner.js"></script>
		<script src="<?= base_url('assets/') ;?>js/date-time/bootstrap-datepicker.js"></script>
		<script src="<?= base_url('assets/') ;?>js/date-time/bootstrap-timepicker.js"></script>
		<script src="<?= base_url('assets/') ;?>js/date-time/moment.js"></script>
		<script src="<?= base_url('assets/') ;?>js/date-time/daterangepicker.js"></script>
		<script src="<?= base_url('assets/') ;?>js/date-time/bootstrap-datetimepicker.js"></script>
		<script src="<?= base_url('assets/') ;?>js/bootstrap-colorpicker.js"></script>
		<script src="<?= base_url('assets/') ;?>js/jquery.knob.js"></script>
		<script src="<?= base_url('assets/') ;?>js/jquery.autosize.js"></script>
		<script src="<?= base_url('assets/') ;?>js/jquery.inputlimiter.1.3.1.js"></script>
		<script src="<?= base_url('assets/') ;?>js/jquery.maskedinput.js"></script>
		<script src="<?= base_url('assets/') ;?>js/bootstrap-tag.js"></script>

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
		
		<script type="text/javascript">
		$(function() {

		    var start = moment().subtract(29, 'days');
		    var end = moment();

		    function cb(start, end) {
		        $('#tanggal').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		    }

		    $('#tanggal').daterangepicker({
		        startDate: start,
		        endDate: end,
		        ranges: {
		           'Today': [moment(), moment()],
		           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		           'This Month': [moment().startOf('month'), moment().endOf('month')],
		           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		        }
		    }, cb);

		    cb(start, end);

		});
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
