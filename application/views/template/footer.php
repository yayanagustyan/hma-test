
				<footer class="footer text-right">
					&copy; <?= date('Y') ?>. All rights reserved.
				</footer>

			</div>
		</div>

		<script>
		  var resizefunc = [];
		</script>

		<!-- jQuery  -->
		<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
		<script src="<?= base_url('assets/js/popper.min.js')?>"></script><!-- Popper for Bootstrap -->
		<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>

		<script src="<?= base_url('assets/js/detect.js')?>"></script>
		<script src="<?= base_url('assets/js/fastclick.js')?>"></script>
		<script src="<?= base_url('assets/js/jquery.slimscroll.js')?>"></script>
		<script src="<?= base_url('assets/js/waves.js')?>"></script>
		<script src="<?= base_url('assets/js/wow.min.js')?>"></script>
		<script src="<?= base_url('assets/js/jquery.nicescroll.js')?>"></script>

	  <script src="<?php echo base_url('assets/js/select2/js/select2.js?v=').time()?>"></script>

		<!-- jQuery  -->
		<script src="<?= base_url('plugins/waypoints/lib/jquery.waypoints.min.js')?>"></script>

		<script src="<?= base_url('plugins/custombox/js/custombox.min.js?v=') . time()?>"></script>
		<script src="<?= base_url('plugins/custombox/js/custombox.legacy.min.js?v=') . time()?>"></script>

		<script src="<?= base_url('assets/js/jquery.core.js')?>"></script>
		<script src="<?= base_url('assets/js/jquery.app.js?v=') . time() ?>"></script>

    <script src="<?= base_url('assets/js/main.js?v=') . time() ?>"></script>

		<?php $version = time(); ?>

	  <?php
	  if (isset($js)) {
	    for ($i=0; $i < count($js) ; $i++) { 
	      echo "<script src='". $js[$i]. "?v=". $version ."'></script>";
	    }
	  }

	  if (isset($module)) {
	    for ($i=0; $i < count($module) ; $i++) { 
	      echo "<script type='module' src='" . $module[$i] . "?v=" . $version . "'></script>";
	    }
	  }

	  ?>

		<script type="text/javascript">

			$(".select2").select2({
				placeholder:"Pilih",
			});
		</script>

	</body>
</html>