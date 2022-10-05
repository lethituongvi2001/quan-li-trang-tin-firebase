<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="https://kit.fontawesome.com/d899a74ef7.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="sidenav"> 
  <a href="#"><h2>Báo Tuổi Trẻ<h2></a>
  <script> 
  
  </script> 
  <form action="timkiem_xuly.php" method="post" class="d-flex">
				<input class="form-control me-2" id="txtSearch" type="text" placeholder="Tìm tin tức" name="txtSearch">
				<button class="btn btn-outline-success" type="submit"><img src="images/search.png" alt="search" /></button>				
			</form>
	<a href="index.php"><i class="fa-solid fa-city"></i>  Trang chủ</a>
	<a href="tinmoinhat.php"><i class="fa-solid fa-newspaper"></i>  Tin mới nhất...</a>
 
				
				<?php
					session_start();
					if(!isset($_SESSION['uid'])) {
				?>
						 <button class="dropdown-btn"><i class="fa-solid fa-user-plus"></i>  Tài khoản 
						<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<a href="dangky.php"> Đăng ký</a>
							<a href="dangnhap.php">Đăng nhập</a>							
						</div>

						<a href="Rambutan1.php"><i class="fa-solid fa-people-roof"></i>  Rambutan</a>
				<?php
					} else {
				?>
					
						<button class="dropdown-btn"><i class="fa-solid fa-user-injured"></i>  Quản lý 
							<i class="fa fa-caret-down"></i>
						</button>

						<div class="dropdown-container">
							<a href="chude.php">Chủ đề</a>
							<a href="baiviet.php">Bài viết</a>								
						</div>
							<a href="dangxuat.php"><?php echo $_SESSION['email'] ?>[Đăng xuất]  <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
							<a href="Rambutan1.php"><i class="fa-solid fa-people-roof"></i> Rambutan</a>
						
				<?php
					}
				?>
		
</div>

<script>
/* Lặp tất cả các nút thả xuống để chuyển đổi giữa ẩn và hiển thị nội dung thả xuống - cho mình có nhiều menu thả xuống mà không bị xung đột */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}


</script>


</body>
</html> 