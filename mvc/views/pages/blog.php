<!-- Blog Main Area Start Here -->
<div class="blog-main-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-12 col-custom mt-no-text">
                        <!-- Blog Wrapper Start -->
                        <div class="row">
                            <?php foreach($data['blog'] as $blog): ?>
                            <div class="col-lg-4 col-md-6 col-custom mb-4">
                                <div class="single-blog">
                                    <div class="single-blog-thumb">
                                        <a href="">
                                            <img src="<?php BASE_URL ?>/public/assets/images/blog/<?=$blog['image']?>" alt="Blog Image">
                                        </a>
                                    </div>
                                    <div class="single-blog-content position-relative">
                                        <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                            <span>14</span>
                                            <span>01</span>
                                        </div>
                                        <div class="post-meta">
                                            <span class="author">Author: Obrien Demo Admin</span>
                                        </div>
                                        <h2 class="post-title">
                                            <a href=""><?=$blog['title']?></a>
                                        </h2>
                                        <p class="desc-content"><?=$blog['description']?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <!-- Blog Wrapper End -->
                        <!-- Bottom Toolbar Start -->
                        <div class="row mb-no-text">
                            <div class="col-sm-12 col-custom">
                                <div class="toolbar-bottom mb-0">
                                    <nav class="pagination pagination-wrap mb-10 mb-sm-0">
                                        <ul class="pagination">
                                            <li class="disabled prev">
                                                <i class="ion-ios-arrow-thin-left"></i>
                                            </li>
                                            <li class="active"><a>1</a></li>
                                            <li>
                                                <a href="#">2</a>
                                            </li>
                                            <li class="next">
                                                <a href="#" title="Next >>"><i class="ion-ios-arrow-thin-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- Bottom Toolbar End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Main Area End Here -->