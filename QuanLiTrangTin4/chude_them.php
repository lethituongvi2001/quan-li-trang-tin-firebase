<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Thêm chủ đề - Trang Tin Tức</title>
	</head>
	<body>
		<div class="main">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Thêm chủ đề</div>
				<div class="card-body">
					<form action="chude_them_xuly.php" method="post" class="needs-validation" novalidate>
						<div class="mb-3">
							<label for="MaChuDe" class="form-label">Mã chủ đề</label>
							<input type="text" class="form-control" id="MaChuDe" name="MaChuDe" required />
							<div class="invalid-feedback">Mã chủ đề không được bỏ trống.</div>
						</div>

						<div class="mb-3">
							<label for="TenChuDe" class="form-label">Tên chủ đề</label>
							<input type="text" class="form-control" id="TenChuDe" name="TenChuDe" required />
							<div class="invalid-feedback">Tên chủ đề không được bỏ trống.</div>
						</div>						
						
						<button type="submit" class="btn btn-primary">Thêm mới</button>
					</form>
				</div>
			</div>
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script>
			(function() {
				'use strict';
				var forms = document.querySelectorAll('.needs-validation');
				Array.prototype.slice.call(forms).forEach(function(form) {
					form.addEventListener('submit', function(event) {
						if (!form.checkValidity()) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			})();
		</script>
	</body>
</html>