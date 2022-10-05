<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Bài viết</title>
	</head>
	<body>
		<div class="main">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Bài Viết</div>
				<div class="card-body">
					<a href="baiviet_them.php" class="btn btn-success mb-2">Thêm mới</a>
					<a href="baiviet_nhap.php" class="btn btn-warning mb-2">Nhập từ Excel</a>
					<table class="table table-bordered table-hover table-sm mb-0">
						<thead>
							<tr class="align-middle text-center">					
								<th width="5%">Mã bài viết</th>
								<th width="12%">Chủ đề</th>
								<th width="20%">Tiêu đề</th>
								<th width="15%">Tóm tắt</th>
								<th width="29%">Nội dung</th>		
								<th width="10%">Ngày đăng</th>
								<th width="25%">Hình ảnh</th>										
								<th width="5%">Sửa</th>
								<th width="5%">Xóa</th>
							</tr>
						</thead>
						<tbody id="HienThi">
							
						</tbody>
					</table>
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
			<?php include 'javascript.php'; ?>
		</div>
		
		<script type="module">
			import { getFirestore, collection, getDocs, getDoc } from 'https://www.gstatic.com/firebasejs/9.6.8/firebase-firestore.js';
			const db = getFirestore();
			
			async function getDanhSachBaiViet() {
				const querySnapshot = await getDocs(collection(db, 'baiviet'));
				const promises = querySnapshot.docs.map(doc => getRefData(doc));
				return Promise.all(promises)
			}
			
			async function getRefData(doc) {
				var baiViet = doc.data();
				baiViet.id = doc.id;
				var Chuded = await getDoc(baiViet.MaChuDe);
				baiViet.cd = { ...Chuded.data() };
				return baiViet;
			}		
			await getDanhSachBaiViet().then(results => {
				var output = '';
				results.forEach((d) => {
					output += '<tr>';
						output += '<td class="align-middle">' + d.MaBaiViet + '</td>';
						output += '<td class="align-middle">' + d.cd.TenChuDe + '</td>';
						output += '<td class="align-middle">' + d.TenBaiViet + '</td>';
						output += '<td class="align-middle">' + d.TomTat + '</td>';
						output += '<td class="align-middle">' + d.NoiDung + '</td>';
						output += '<td class="align-middle">' + d.NgayDang + '</td>';
						output += '<td class="align-middle text-center" ><img width="100pt" src="images/' + d.HinhAnh+ '"></td>';
						output += '<td class="align-middle text-center"><a href="baiviet_sua.php?id=' + d.id + '">Sửa</a></td>';
						output += '<td class="align-middle text-center"><a onclick="return confirm(\'Bạn có muốn xóa bài viết: ' + d.TenBaiViet + ' hông á ?\')" href="baiviet_xoa.php?id=' + d.id + '">Xóa</a></td>';
					output += '</tr>';
				});
				$('#HienThi').html(output);
			});
		</script>
	</body>
</html>