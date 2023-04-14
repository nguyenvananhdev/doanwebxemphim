<?php
$sql = "SELECT * FROM phim WHERE link = '$url_phim'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) {
?>
                                                <?php
                                                
                                                $tap2 = mysqli_num_rows(mysqli_query($Nhan_connect,"SELECT `id` FROM tap WHERE link = '".$row['link']."'"));
                                                ?>
<div class="breadcrumb">
                    <div class="item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="<?php echo $trangchu ?>" title="Xem Phim" itemprop="url">
                            <span itemprop="title">Xem Phim</span>
                        </a>
                    </div>
                    <div class="item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="<?php echo $trangchu ?>/danh-sach/<?php echo $row['loaiphim']?>" title="<?php echo $row['loaiphim']?>" itemprop="url">
                            <span itemprop="title"><?php echo $row['loaiphim']?></span>
                        </a>
                    </div>
                    <div class="item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <span itemprop="title"><?php echo $row['tenphim']?></span>
                    </div>
                </div>
                <div class="widget list">
                    <div class="widget-body">
                        <div class="widget info">
                            <div id="media">
                                <div class="media main-controls">
                                    <div class="thumb">
                                       <img src="<?php echo $row['thumbnail']?>" alt="<?php echo $row['tenphim']?>">
                                    </div>
                                    <div class="details" itemscope="" itemtype="http://schema.org/Movie">
                                        <h1 itemprop="name"><a href="<?php echo $trangchu ?>/phim/<?php echo $row['link']?>" title="<?php echo $row['mota']?>"><?php echo $row['tenphim']?></a></h1>
                                        <h2><?php echo $row['tenkhac']?></h2>
                                        <dl>
                                            <dt>Đang chiếu:</dt> <dd style="color:black">HD | VIETSUB</dd>
                                                                                
                                            <dt>Thể loại:</dt> <dd><a href="#" title="<?php echo $row['theloai']?>"><?php echo $row['theloai']?></a></dd>
                                            
                                            <dt>Thời lượng:</dt> <dd><?php echo $row['thoiluong']?></dd>
                                            
                                            <dt>Năm phát hành:</dt> <dd><?php echo $row['namphim']?></dd>
                                            
                                            <meta itemprop="uploadDate" content="">
                                            <meta itemprop="description" content="<?php echo $row['mota']?>">
                                            <div class="box-rating" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                                                <div>
                                                    <span class="hidden-vt" id="average" itemprop="ratingValue">10</span>
                                                    <span class="hidden-vt" id="rate_count" itemprop="reviewCount">0</span>
                                                </div>
                                                <meta itemprop="bestRating" content="10">
                                                <meta itemprop="worstRating" content="1">
                                            </div>
                                        </dl>
                                        <h4 class="play">
                                           
<?php $sql = "SELECT * FROM tap WHERE link = '$url_phim' ORDER BY id ASC";$result = $conn->query($sql);if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
                   <li class="item-xem-phim">
<a target="_blank" id="btn-film-watch" style="border: 1px solid #5d5d5d;" class="btn btn-blue" href="<?php echo $row['player']?>"><?php echo $row['tap']?></a>
                    </li>	<?php
				}}
			?>
						
                                                
                                            
                                            </li>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
$sql = "SELECT * FROM phim WHERE link = '$url_phim'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) {
?>
                <div class="widget info">
                                            <div class="thongbao-lichchieu">
                            <span style="color:black"><b>Thông tin về phim <?php echo $row['tenphim']?> :</b></span><br>
                            <b>Cập nhật gần nhất vào <?php echo $row['thoigian']?></b>
                        </div>
                                        <div class="widget-title clear-top">
                        <div class="tabs" data-target=".widget-body .content">
                            <div class="tab active" data-name="content"><span>Nội dung</span></div>
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="content" data-name="content">
                            <div id="pagetext" data-min-height="300">
                                <?php echo $row['theloai']?>: <b><?php echo $row['tenphim']?> | <?php echo $row['tenkhac']?></b> (<?php echo $row['namphim']?>) <br>
                                <?php echo $row['mota']?>
                                                            </div>
                            <div class="keywords">
                                Từ khóa: <a href="<?php echo $hientai ?>" title="<?php echo $row['tenphim']?> | <?php echo $row['tenkhac']?>"><?php echo $row['tag']?></a>
                                                            </div>
                        </div>
                    </div>    <?php }}}} ?>
 <?php require("../inc/related.php"); ?>
                        </ul>
                    </div>
                </div>
             