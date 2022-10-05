<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Sửa Bài Viết - Trang Tin Tức</title>
	</head>
	<body>
		<div class="main">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Thêm Chủ Đề</div>
				<div class="card-body">
					<form action="baiviet_sua_xuly.php" method="post" class="needs-validation" novalidate>
						<div class="mb-3">
							<label for="MaBaiViet" class="form-label">Mã bài viết:</label>
							<input type="text" class="form-control" id="MaBaiViet" name="MaBaiViet" required />
						</div>

						<div class="mb-3">
							<label for="MaChuDe" class="form-label">Chủ đề</label>
							<select class="form-select" id="MaChuDe" name="MaChuDe" required>
								<option value="">-- Chọn --</option>
							</select>
						</div>

						<div class="mb-3">
							<label for="TenBaiViet" class="form-label">Tiêu đề:</label>
							<input type="text" class="form-control" id="TenBaiViet" name="TenBaiViet" value="" required>
						</div>

						<div class="mb-3">
							<label for="TomTat" class="form-label">Tóm tắt bài viết:</label>
							<textarea class="form-control" id="TomTat" name="TomTat" required></textarea>
						</div>
						<div class="mb-3">
							<label for="NoiDung" class="form-label">Nội dung bài viết:</label>
							<textarea class="form-control ckeditor" id="NoiDung" name="NoiDung" required></textarea>
						</div>
						<div class="mb-3">
							<label for="NgayDang" class="form-label">Ngày đăng:</label>
							<input type="date" class="form-control" id="NgayDang" name="NgayDang" value="" required>
						</div>

						<div class="mb-3">
							<label for="HinhAnh" class="form-label">Chọn hình ảnh</label>
							<input class="form-control" type="file" id="HinhAnh" name="HinhAnh">
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
			import { getFirestore, doc, collection, getDocs, getDoc } from 'https://www.gstatic.com/firebasejs/9.6.8/firebase-firestore.js';
			const db = getFirestore();
			
			const chuDe = await getDocs(collection(db, 'chude'));
			var output = '';
			chuDe.forEach((d) => {
				output += '<option value="' + d.id + '">' + d.data().TenChuDe + '</th>';
			});
			$('#MaChuDe').append(output);
			
			const docRef = doc(db, 'baiviet', '<?php echo $_GET['id']; ?>');
			const docSnap = await getDoc(docRef);
			if (docSnap.exists()) {
				const loai = await getDoc(docSnap.data().MaChuDe);
				$('#id').val(docSnap.id);
				$('#MaBaiViet').val(docSnap.data().MaBaiViet);
				$('#MaChuDe').val(loai.id);
				$('#TenBaiViet').val(docSnap.data().TenBaiViet);				
				$('#TomTat').val(docSnap.data().TomTat);
				$('#NoiDung').val(docSnap.data().NoiDung);
				$('#NgayDang').val(docSnap.data().NgayDang);
				$('#HinhAnh').val(docSnap.data().HinhAnh);

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