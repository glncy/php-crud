<?php
include('auth.php');
include('functions.php');

// HEADER
include('layout/header.php');
?>
<div class="row justify-content-center">
	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<span><strong>Diary Entries</strong></h5>
						<button class="btn btn-success btn-sm float-right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_modal">Add Entry</button>
					</div>
					<ul class="list-group list-group-flush" id="fetch_data">
						<?php
						include('config/connection.php');
						$sql = "SELECT * FROM cp_data ORDER BY id DESC";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
						?>
						<li class="list-group-item">
							<h5 class="card-title"><?php echo $row['title']; ?></h5>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo date("m/d/Y h:i a", $row['up_date']); ?></h6>
							<p class="card-text"><?php echo $row['body']; ?></p>
							<a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-pill badge-success p-3">Edit</a>
                			<a href="#" class="badge badge-pill badge-danger p-3" role="button" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</a>
						</li>
						<?php
							}
						}
						else {
						?>
						<li class="list-group-item">
							<h5 class="card-title">No Diary Entry</h5>
							<h6 class="card-subtitle mb-2 text-muted">Click Add Entry to begin.</h6>
						</li>
						<?php
						}
						?>
  					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
// FOOTER
include('layout/footer.php')
?>