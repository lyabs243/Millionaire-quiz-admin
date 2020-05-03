<!DOCTYPE html>
<html>
<?php
$data['title'] = 'Millionaire Quiz | Quiz';
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
						<h1 class="m-0 text-dark">Manage Quiz</h1>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
            <?php
            if(isset($success)) {
	            ?>
                <div class="card-tools">
                    <div class="alert <?php if($success) echo 'alert-success'; else echo 'alert-danger';?>" role="alert">
                        <?php echo $message; ?>
                    </div>
                </div>
	            <?php
            }
            ?>
			<div class="card-tools">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-question">
					Add new Question
				</button>
			</div>
		</div>

		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
		</section>
		<!-- /.content -->
	</div>
	<!-- Modal add question -->
	<div class="modal fade" id="add-question" role="dialog" >
		<div class="modal-dialog" role="document">
			<form method="post" action="<?php echo base_url(); ?>index.php/question/add">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add question</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea maxlength="1000" name="question" class="form-control" id="question" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="level">Question level</label>
                            <select class="form-control" id="level" name="level">
                                <option value="0">Easy</option>
                                <option value="1">Medium</option>
                                <option value="2">Hard</option>
                            </select>
                        </div>
						<label>Answers</label>
						<div class="row">
							<div class="col-8">
                                <textarea placeholder="First answer" maxlength="1000" name="answer-1" class="form-control" id="answer-1" rows="2"></textarea>
							</div>
							<div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="correct-answer" id="gridRadios1" value="1" checked>
                                    <label class="form-check-label" for="gridRadios1">Correct answer</label>
                                </div>
							</div>
						</div><br>
                        <div class="row">
                            <div class="col-8">
                                <textarea placeholder="Second answer" maxlength="1000" name="answer-2" class="form-control" id="answer-2" rows="2"></textarea>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="correct-answer" id="gridRadios2" value="2">
                                    <label class="form-check-label" for="gridRadios2">Correct answer</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-8">
                                <textarea placeholder="Third answer" maxlength="1000" name="answer-3" class="form-control" id="answer-3" rows="2"></textarea>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="correct-answer" id="gridRadios3" value="3">
                                    <label class="form-check-label" for="gridRadios3">Correct answer</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-8">
                                <textarea placeholder="Fourth answer" maxlength="1000" name="answer-4" class="form-control" id="answer-4" rows="2"></textarea>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="correct-answer" id="gridRadios4" value="4">
                                    <label class="form-check-label" for="gridRadios4">Correct answer</label>
                                </div>
                            </div>
                        </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<?php $this->view('admin_footer'); ?>
</div>
<!-- ./wrapper -->

<?php $this->view('admin_scripts'); ?>
</body>
</html>
