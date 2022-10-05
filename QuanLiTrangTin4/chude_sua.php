<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Sửa chủ để - Trang Tin Tức</title>
	</head>
	<body>
		<div class="main">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Sửa chủ đề</div>
				<div class="card-body">
					<form action="chude_sua_xuly.php" method="post" class="needs-validation" novalidate>
						<input type="text" id="id" name="id" hidden />
						
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
											
						<button type="submit" class="btn btn-primary">Cập nhật</button>
					</form>
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getFirestore, doc, getDoc } from 'https://www.gstatic.com/firebasejs/9.6.8/firebase-firestore.js';
			const db = getFirestore();
			const docRef = doc(db, 'chude', '<?php echo $_GET['id']; ?>');
			const docSnap = await getDoc(docRef);
			if (docSnap.exists()) {
				$('#id').val(docSnap.id);
				$('#MaChuDe').val(docSnap.data().MaChuDe);
				$('#TenChuDe').val(docSnap.data().TenChuDe);
				
			} else {
				console.log('No such document!');
			}
		</script>
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