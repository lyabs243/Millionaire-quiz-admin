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
						<h1 class="m-0 text-dark">Dashboard</h1>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-lg-4 col-6">
						<!-- small box -->
						<div class="small-box bg-info">
							<div class="inner">
								<h3>150</h3>

								<p>Easy questions</p>
							</div>
							<div class="icon">
								<i class="fa fa-question-circle"></i>
							</div>
						</div>
					</div>
					<!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>250</h3>

                                <p>Medium questions</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-question-circle"></i>
                            </div>
                        </div>
                    </div>
					<!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>150</h3>

                                <p>Difficult questions</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-question-circle"></i>
                            </div>
                        </div>
                    </div>
					<!-- ./col -->
				</div>
				<!-- /.row -->
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-7 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">
									<i class="fas fa-question-circle mr-1"></i>
									Questions Overview
								</h3>
								<div class="card-tools">
									<ul class="nav nav-pills ml-auto">
										<li class="nav-item">
											<a class="nav-link active" href="#revenue-chart" data-toggle="tab">Manage</a>
										</li>
									</ul>
								</div>
							</div><!-- /.card-header -->
							<div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Qui est le meilleur buteur du championnat de football francais?</li>
                                    <li class="list-group-item">Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Morbi leo risus Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Porta ac consectetur ac Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Vestibulum at eros Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in</li>
                                </ul>
							</div><!-- /.card-body -->
						</div>
						<!-- /.card -->

						<!--/.direct-chat -->
						<!-- /.card -->
					</section>
					<!-- /.Left col -->
					<!-- right col (We are only adding the ID to make the widgets sortable)-->
					<section class="col-lg-5 connectedSortable">

						<!-- Map card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-user mr-1"></i>
                                    Admin Users
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Manage</a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Admin admin</li>
                                    <li class="list-group-item">John Doe</li>
                                    <li class="list-group-item">Jane Dow</li>
                                    <li class="list-group-item">Loic Yabili</li>
                                </ul>
                            </div><!-- /.card-body -->
                        </div>
						<!-- /.card -->
					</section>
					<!-- right col -->
				</div>
				<!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<?php $this->view('admin_footer'); ?>
</div>
<!-- ./wrapper -->

<?php $this->view('admin_scripts'); ?>
</body>
</html>
