<!--<div class="widget serial-list">
                <div class="widget-title">
                    <div class="xtabs" data-target=".widget.serial-list .item">
                        <div class="tab active" data-name="new">Anime mới</div>
                        <div class="tab" data-name="completed">Hoàn thành</div>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="item active" id="new">
                        <div class="box">
                            <div class="title">Anime mới cập nhật</div>
                            <ul>
                              
   <?php require("top.php");?>
                            </ul>
                        </div>
                    </div>
                    <div class="item" id="completed">
                        <div class="box">
                            <div class="title">Mới ra mắt</div>
                            <ul>
                              <?php require("top1.php");?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>-->
<div class="widget update">
                <div class="widget-title">
                    <h3 class="title">Phim mới cập nhật</h3>
                    <div class="tabs" data-target=".widget.update .widget-body .content">
                        <div class="tab active" data-name="all"><span>Tất cả anime</span></div>
                        <div class="tab" data-name="movies">
                            <span>Sắp chiếu</span>
                        </div>
                        <div class="tab" data-name="serials">
                            <span>Hentai</span>
                        </div>
                    </div>
                </div>

                <div class="widget-body">
                    <div class="content" id="all" data-name="all">
                        <ul class="list-film">
                            <?php require("../inc/list_phim1.php"); ?>

                        </ul>
                            <script type="text/javascript" src="<?php echo $trangchu ?>/assets/js/loadmore.js"></script>

                      
                    </div>

                    <div class="content hide" id="movies" data-name="movies">
                        <ul class="list-film">
 <?php require("../inc/list_phim2.php"); ?>
                        </ul>
                        <div class="more">
                            <a title="Phim lẻ hay" href="http://www.vtv16.com/danh-sach/phim-le">Phim lẻ »</a>
                        </div>
                    </div>

                    <div class="content hide" id="serials" data-name="serials">
                        <ul class="list-film">
                            <?php require("../inc/list_phim3.php"); ?>
                        </ul>
                        <div class="more">
                            <a title="Phim bộ hay" href="http://www.vtv16.com/danh-sach/phim-bo">Phim bộ »</a>
                        </div>
                    </div>
                </div>
            </div>
    
           <!-- <div class="widget update">
                <div class="widget-title">
                    <h3 class="title">AMV & OPENING SONG</h3>
                </div>
                <div class="widget-body">
                  <?php require("../inc/youtube.php"); ?>
                 
                </div>
            </div>-->