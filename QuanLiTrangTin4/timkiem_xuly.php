<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                     																								
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link type="text/css" rel="stylesheet" href="css/style.css">

        <title>Tìm tin tức</title>
  
    </head>

    <body>
    
        <div class="main" >
            
            <?php include 'navbar.php'; ?>
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead>
                        <tr class="align-middle text-center" >	
                            <th width="5%">Mã bài viết</th>
                            <th width="20%">Tiêu đề</th>
                            <th width="50%">Tóm tắt</th>
                            <th width="100%">Nội dung</th>		
                            <th width="10%">Ngày đăng</th>
                            <th width="25%">Hình ảnh</th>	
                        </tr>
                </thead>
                <tbody id='Hienthi'></tbody>
             </table>
            <div id="content" class = "content"></div>
        </div>  
       
        <?php include 'javascript.php'; ?>
        
        <?php include 'javascript.php'; ?>
        <script type="module">
            
            import { getFirestore, collection, getDocs } from  'https://www.gstatic.com/firebasejs/9.6.8/firebase-firestore.js';
            const db = getFirestore();

            const querySnapshot = await getDocs(collection(db, 'baiviet'));
            const key = '<?php echo $_POST['txtSearch']; ?>';
            var output = '';
            var bviet = '';
            querySnapshot.forEach((doc) => {
                bviet = doc.data().TenBaiViet;
                if(!bviet.includes(key)){
                    return;
                }
                    output +='<tr>'
                    output += '<th><option value="' + doc.id + '">' + doc.data().MaBaiViet + '</th>';
                    output += '<th><option value="' + doc.id + '">' + doc.data().TenBaiViet + '</th>';
                    output += '<th><option value="' + doc.id + '">' + doc.data().TomTat + '</th>';
                    output += '<th><option value="' + doc.id + '">' + doc.data().NoiDung + '</th>';
                    output += '<th><option value="' + doc.id + '">' + doc.data().NgayDang+ '</th>';
                    output += '<td class="align-middle text-center" ><img width="50pt" src="images/' + doc.data().HinhAnh+ '"></td>';                                  
                    output +='</tr>'
                    document.getElementById('Hienthi').innerHTML=output;
                    
                });
        </script> 
    </body>
</html>