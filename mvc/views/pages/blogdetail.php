        <!-- Blog Main Area Start Here -->
        <div class="blog-main-area">
            <div class="container container-default custom-area">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9 col-12 col-custom widget-mt">
                        <!-- Blog Details wrapper Area Start -->
                        <div class="blog-post-details">
                            <figure class="blog-post-thumb mb-5">
                                <img src="<?= BASE_URL ?>/public/assets/images/blog/<?= $data['blog']['image'] ?>" alt="Blog Image">
                            </figure>
                            <section class="blog-post-wrapper product-summery">
                                <div class="section-content">
                                    <h2 class="title-1 mb-3"><?= $data['blog']['title'] ?></h2>
                                    <p class="mb-4">
                                        <?= $data['blog']['content'] ?>
                                    </p>
                                </div>
                                <div class="social-share" style="padding-bottom:100px">
                                    <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                                    <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                                    <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                                    <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                                </div>
                            </section>
                        </div>
                        <!-- Blog Comments Area End -->
                    </div>
                    <div class="col-lg-3 col-12 col-custom">
                        <!-- Sidebar Widget Start -->
                        <aside class="sidebar_widget mt-no-text">
                            <div class="widget_inner">
                                <div class="widget-list widget-mb-4">
                                    <h3 class="widget-title">Bài viết khác</h3>
                                    <div class="sidebar-body">
                                        <?php foreach ($data['getblogdifferent'] as $item) { ?>
                                            <div class="sidebar-product align-items-center">
                                                <a href="product-details.html" class="image">
                                                    <img src="<?= BASE_URL ?>/public/assets/images/blog/<?= $item['image'] ?>" alt="blog">
                                                </a>
                                                <div class="product-content">
                                                    <div class="product-title">
                                                        <h4 class="title-2"> <a href="<?= BASE_URL ?>/blogdetail/show/<?= $item['slug'] ?>"><?= $item['title'] ?></a></h4>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="text-desc">
                                                            <?= $item['description'] ?>

                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php  } ?>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- Sidebar Widget End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Main Area End Here -->