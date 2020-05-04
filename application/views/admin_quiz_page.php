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
            <div class="row">
                <div class="col-md-4 col-md-offset-3">
                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/question/">
                        <div class="form-group has-feedback">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" name="search" id="search" placeholder="search">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if(isset($search)) {
	            ?>
                <div>
                    <h3>Result for: <?php echo $search; ?></h3>
                </div>
	            <?php
            }
            ?>
            <div>
                <label>Filter by question level:</label>
                <a href="<?php echo base_url(); ?>index.php/admin/question/" class="btn <?php if($level == -1){ echo 'btn-primary'; } else{ echo 'btn-outline-primary'; } ?> btn-sm">All levels</a>
                <a href="<?php echo base_url(); ?>index.php/admin/question/1" class="btn <?php if($level == 0){ echo 'btn-primary'; } else{ echo 'btn-outline-primary'; } ?> btn-sm">Easy</a>
                <a href="<?php echo base_url(); ?>index.php/admin/question/2" class="btn <?php if($level == 1){ echo 'btn-primary'; } else{ echo 'btn-outline-primary'; } ?> btn-sm">Medium</a>
                <a href="<?php echo base_url(); ?>index.php/admin/question/3" class="btn <?php if($level == 2){ echo 'btn-primary'; } else{ echo 'btn-outline-primary'; } ?> btn-sm">Hard</a>
            </div>
            <?php
            if(isset($pagination))
            {
                echo '<div class="col-md-12 row d-flex justify-content-center">' . $pagination . '</div>';
            }
            ?><br>
            <table class="table table-striped">
                <thead style="background-color: #343a40; color: white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">Level</th>
                    <th scope="col">Add by</th>
                    <th scope="col">Answers</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$index = $first_index;
				foreach ($questions as $question) {
				    $answers = $this->Question_model->get_answers($question->id);
					?>
                    <tr>
                        <th scope="row"><?php echo $index; ?></th>
                        <td><?php echo $question->description; ?></td>
                        <td>
                            <?php
                            if($question->level == 2)
                            {
                                $badge = 'Hard';
                                $badgeClass = 'badge-danger';
                            }
                            else if($question->level == 1)
                            {
	                            $badge = 'Medium';
	                            $badgeClass = 'badge-warning';
                            }
                            else
                            {
	                            $badge = 'Easy';
	                            $badgeClass = 'badge-primary';
                            }
                            ?>
                            <h5><span class="badge badge-pill <?php echo $badgeClass; ?>"><?php echo $badge; ?></span></h5>
                        </td>
                        <td><?php echo $question->first_name . ' ' . $question->last_name; ?></td>
                        <td>
                            <a href="" data-toggle="collapse" data-target="#answers-<?php echo $question->id; ?>">
                                <img src="<?php echo base_url(); ?>images/icons/ic_eye.png" width="30" height="20"
                                     alt="delete" title="View answers">
                            </a>
                        </td>
                        <td>
                            <a href="" data-toggle="modal" data-target="#edit-question-<?php echo $question->id; ?>">
                                <img src="<?php echo base_url(); ?>images/icons/ic_edit.png" width="30" height="30"
                                     alt="edit" title="Edit">
                            </a>
                        </td>
                        <td>
                            <a href="" data-toggle="modal" data-target="#delete-question-<?php echo $question->id; ?>">
                                <img src="<?php echo base_url(); ?>images/icons/ic_delete.png" width="30" height="30"
                                     alt="delete" title="Delete">
                            </a>
                        </td>
                    </tr>
                    <tr class="collapse" id="answers-<?php echo $question->id; ?>">
                        <td colspan="7">
                            <table class="col-md-8 offset-2">
                                <?php
                                foreach ($answers as $answer) {
	                                ?>
                                    <tr>
                                        <td><?php echo $answer->description; ?></td>
                                        <td>
                                            <?php
                                            $icon = 'ic_false.png';
                                            if($answer->is_valid_answer)
                                            {
                                                $icon = 'ic_correct.png';
                                            }
                                            ?>
                                            <img src="<?php echo base_url(); ?>images/icons/<?php echo $icon; ?>" width="30" height="40"
                                                 alt="Icon result">
                                        </td>
                                    </tr>
	                                <?php
                                }
                                ?>
                            </table>
                        </td>
                    </tr>
                    <tr></tr>
					<?php
					$index++;
				}
				?>
                </tbody>
            </table><br>
			<?php
			if(isset($pagination))
			{
				echo '<div class="col-md-12 row d-flex justify-content-center">' . $pagination . '</div>';
			}
			?>
		</section>
		<!-- /.content -->
	</div>
    <!-- modal update/delete question -->
    <?php
    foreach ($questions as $question) {
	    $answersQst = $this->Question_model->get_answers($question->id);
	    ?>
        <div class="modal fade" id="edit-question-<?php echo $question->id; ?>" role="dialog" >
            <div class="modal-dialog" role="document">
                <form method="post" action="<?php echo base_url(); ?>index.php/question/update/<?php echo $question->id; ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="question">Question</label>
                                <textarea maxlength="1000" name="question" class="form-control" id="question" rows="3"><?php echo $question->description; ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="level">Question level</label>
                                <select class="form-control" id="level" name="level">
                                    <option value="0" <?php if($question->level == 0){ echo 'selected'; } ?>>Easy</option>
                                    <option value="1" <?php if($question->level == 1){ echo 'selected'; } ?>>Medium</option>
                                    <option value="2" <?php if($question->level == 2){ echo 'selected'; } ?>>Hard</option>
                                </select>
                            </div>
                            <label>Answers</label>
                            <?php
                            $index = 1;
                            foreach ($answersQst as $answer) {
	                            ?>
                                <div class="row">
                                    <div class="col-8">
                                        <textarea placeholder="Answer" maxlength="1000" name="answer-<?php echo $index; ?>"
                                                  class="form-control" id="answer-<?php echo $index; ?>" rows="2"><?php echo $answer->description; ?></textarea>
                                    </div>
                                    <input type="hidden" name="id-<?php echo $index; ?>" value="<?php echo $answer->id; ?>">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="correct-answer"
                                                   id="gridRadios1" value="1" <?php if($answer->is_valid_answer){ echo  'checked'; } ?>>
                                            <label class="form-check-label" for="gridRadios1">Correct answer</label>
                                        </div>
                                    </div>
                                </div><br>
	                            <?php
                                $index++;
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal delete -->
        <div class="modal fade" id="delete-question-<?php echo $question->id; ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="<?php echo base_url(); ?>index.php/question/delete/<?php echo $question->id; ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label>Do you want to delete  "<?php echo $question->description; ?>" ?</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	    <?php
    }
    ?>
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
