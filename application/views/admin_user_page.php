<!DOCTYPE html>
<html>
<?php
$data['title'] = 'Millionaire Quiz | Dashboard';
$this->view('admin_head', $data);
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<?php $this->view('admin_navbar'); ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Manage Users</h1>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">

		</section>
		<!-- /.content -->
	</div>
	<?php $this->view('admin_footer'); ?>
</div>
<!-- ./wrapper -->

<?php $this->view('admin_scripts'); ?>
</body>
</html>
