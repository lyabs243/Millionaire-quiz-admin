<!DOCTYPE html>
<html>
<?php
    $data['title'] = 'Millionaire Quiz | Terms of use';
    $this->view('admin_head', $data);
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="<?php echo base_url(); ?>" class="brand-link">
			<img src="<?php echo base_url(); ?>images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				 style="opacity: .8">
			<span class="brand-text font-weight-light">Millionaire Quiz</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<li class="nav-item">
						<a href="#millionaire-quiz" class="nav-link">
							<i class="far meetup nav-icon"></i>
							<p>Millionaire Quiz</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="#terms" class="nav-link">
							<i class="nav-icon fas fa-book"></i>
							<p>
								Terms of use
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#connection" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Sign in</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#without-session" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Use without session</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#with-session" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Use with session</p>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- /.content-header -->
		<main role="main" class="container">
			<div class="row">
				<div class="col-md-8 blog-main">
					<div class="pb-3 mb-4 font-italic border-bottom">
					</div>

					<div class="blog-post">
						<h2 class="blog-post-title" id="millionaire-quiz">Millionaire Quiz</h2>

						<p>Millionaire quiz is a fun mobile multiple choice question game based on the concept of the popular TV game Who Wants to be a millionaire. </p>
						<hr>
						<h2 id="terms">Terms of use</h2>
						<h3 id="connection">Sign in</h3>
						<p>It is possible to play Millionaire Quiz by being connected or without being connected.</p>
						<div class="offset-2">
							<img src="<?php echo base_url(); ?>images/screenshots/screen-login.JPG" width="229" height="400">
						</div><br>
						<h4 id="without-session">Use without session</h4>
						<p>By playing this game without logging in, you are entitled to different features:</p>
						<ul>
							<li>Play the game</li>
							<li>See your latest results</li>
						</ul>
						<p>But you cannot participate in the daily and weekly global ranking.</p>
						<h4 id="with-session">Use with session</h4>
						<p>When you decide to play by logging in, you are entitled to all of the game's features including: </p>
						<ul>
							<li>Play the game</li>
							<li>See your latest results</li>
							<li>The overall ranking of players per week</li>
							<li>The overall ranking of players by month</li>
						</ul>
						<p>It is possible to connect from a Google account, when you do so Millionaire Quiz will only collect the information below:</p>
						<ol>
							<li>Your full name</li>
							<li>Your profile photo</li>
							<li>Your email address</li>
						</ol>
						<div class="alert alert-primary" role="alert">
							Please note that the email address will not be visible in the application under any circumstances. As for the full name and your profile picture, these will only be visible on the global ranking screen.
							<p>This information will not be shared outside of the application.</p>
						</div>
					</div><!-- /.blog-post -->

				</div><!-- /.blog-main -->

			</div><!-- /.row -->

		</main>

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
