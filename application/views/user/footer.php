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
		

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?= base_url('assets/'); ?>js/jquery.js'>"+"<"+"/script>");
		</script>
	

		<!-- <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url('assets/'); ?>js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="<?= base_url('assets/'); ?>js/bootstrap.js"></script>
		 <?php if ($this->uri->segment(1) == 'user') : ?>
        <!-- Chart -->
        <script src="<?= base_url(); ?>assets/chart.js/Chart.min.js"></script>

        <script type="text/javascript">
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                    datasets: [{
                            label: "Total Barang Masuk",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "#49b32e",
                            pointRadius: 3,
                            pointBackgroundColor: "#49b32e",
                            pointBorderColor: "#49b32e",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "#5a5c69",
                            pointHoverBorderColor: "#5a5c69",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: <?= json_encode($cbm); ?>,
                        },
                        {
                            label: "Total Barang Keluar",
                            lineTension: 0.3,
                            backgroundColor: "rgba(231, 74, 59, 0.05)",
                            borderColor: "#e74a3b",
                            pointRadius: 3,
                            pointBackgroundColor: "#e74a3b",
                            pointBorderColor: "#e74a3b",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "#5a5c69",
                            pointHoverBorderColor: "#5a5c69",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: <?= json_encode($cbk); ?>,
                        }
                    ],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: 5
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                            }
                        }
                    }
                }
            });

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Barang Masuk", "Barang Keluar"],
                    datasets: [{
                        data: [<?= $barang_masuk; ?>, <?= $barang_keluar; ?>],
                        backgroundColor: ['#49b32e', '#e74a3b'],
                        hoverBackgroundColor: ['#acf29b', '#eb8383'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });
        </script>
    <?php endif; ?>





		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		
		

		<!-- page specific plugin scripts -->
		<script src="<?= base_url('assets/');?>js/jquery-ui.custom.js"></script>
		<script src="<?= base_url('assets/');?>js/jquery.ui.touch-punch.js"></script>
		<script src="<?= base_url('assets/');?>js/jquery.gritter.js"></script>
		<script src="<?= base_url('assets/');?>js/bootbox.js"></script>
		<script src="<?= base_url('assets/');?>js/jquery.easypiechart.js"></script>
		<script src="<?= base_url('assets/');?>js/date-time/bootstrap-datepicker.js"></script>
		<script src="<?= base_url('assets/');?>js/jquery.hotkeys.js"></script>
		<script src="<?= base_url('assets/');?>js/bootstrap-wysiwyg.js"></script>
		<script src="<?= base_url('assets/');?>js/select2.js"></script>
		<script src="<?= base_url('assets/');?>js/fuelux/fuelux.spinner.js"></script>
		<script src="<?= base_url('assets/');?>js/x-editable/bootstrap-editable.js"></script>
		<script src="<?= base_url('assets/');?>js/x-editable/ace-editable.js"></script>
		<script src="<?= base_url('assets/');?>js/jquery.maskedinput.js"></script>


		<!-- ace scripts -->
		<script src="<?= base_url('assets/'); ?>js/ace/elements.scroller.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/elements.colorpicker.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/elements.fileinput.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/elements.typeahead.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/elements.wysiwyg.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/elements.spinner.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/elements.treeview.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/elements.wizard.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/elements.aside.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.ajax-content.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.touch-drag.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.sidebar.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.submenu-hover.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.widget-box.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.settings.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.settings-rtl.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.settings-skin.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.widget-on-reload.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.searchbox-autocomplete.js"></script>

		<!-- inline scripts related to this page -->

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/ace.onpage-help.css" >
		<link rel="stylesheet" href="<?= base_url('assets/'); ?>docs/assets/js/themes/sunburst.css" >

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="<?= base_url('assets/'); ?>js/ace/elements.onpage-help.js"></script>
		<script src="<?= base_url('assets/'); ?>js/ace/ace.onpage-help.js"></script>
		<script src="<?= base_url('assets/'); ?>docs/assets/js/rainbow.js"></script>
		<script src="<?= base_url('assets/'); ?>docs/assets/js/language/generic.js"></script>
		<script src="<?= base_url('assets/'); ?>docs/assets/js/language/html.js"></script>
		<script src="<?= base_url('assets/'); ?>docs/assets/js/language/css.js"></script>
		<script src="<?= base_url('assets/'); ?>docs/assets/js/language/javascript.js"></script>




	</body>
</html>
