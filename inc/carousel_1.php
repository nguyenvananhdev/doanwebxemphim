<?php require("../inc/config.php") ?>
<div class="widget hotest">
        <div class="container">
            <div class="items">
<?php
 $result = mysqli_query($Nhan_connect,"SELECT * FROM phim WHERE loaiphim = 'Anime' ORDER BY RAND()");
                if($result)
                {
                while($row = mysqli_fetch_assoc($result))
                {
                    $tap = mysqli_num_rows(mysqli_query($Nhan_connect,"SELECT `id` FROM tap WHERE link = '".$row['link']."'"));
                    echo '<div class="item">
                        <div class="poster">
                            <a title="'.$row['mota'].'" href="/phim/'.$row['link'].'">
                                <img alt="'.$row['tenphim'].'" src="'.$row['thumbnail'].'">
                            </a>
                        </div>
                        <div class="status">Tập '.$tap.' Vietsub</div>
                        <div class="info">
                            <a title="'.$row['mota'].'" href="/phim/'.$row['link'].'">'.$row['tenphim'].'</a>
                            <dfn>'.$row['loaiphim'].'</dfn>
                        </div>
                        <i class="dub"></i>
                    </div>';
                }}
				?>
                                
                                                 
                            </div>
        </div>
    </div>