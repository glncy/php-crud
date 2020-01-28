	</div>
	<br/>
	<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Diary Entry</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
				<form action="add_process.php" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control" name="titleText">
						</div>
						<div class="form-group">
							<label>Title</label>
							<textarea rows="10" class="form-control" name="bodyText"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" name="submitData" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?= baseURL(); ?>js/popper.min.js"></script>
	<script type="text/javascript" src="<?= baseURL(); ?>js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function search_entry() {
			var entry = document.getElementById('search_entry').value;
			$.ajax({
				url: "<?php echo baseURL(); ?>fetch_data.php",
				method: 'post',
				data: {
					search_entry: entry
				},
				success: function(result){
					$('#fetch_data').html(result);
				}
			});
		}
		function confirmDelete(id){
			if (confirm("Delete this Entry?")) {
				window.location.href = "delete.php?id="+id;
			}
			else {
				alert("Cancelled.");
			}
		}
	</script>
</body>
</html>