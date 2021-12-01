<!-- Blog Main Area Start Here -->
<div class="blog-main-area">
            <div class="container container-default-2 custom-area">
                <div class="row flex-row-reverse">
                    <div class="col-12 col-custom mt-no-text">
                        <!-- Blog Details wrapper Area Start -->
                        <div class="blog-post-details">
                            <figure class="blog-post-thumb mb-5">
                                <img class="w-100" src="assets/images/blog/large-size/1.jpg" alt="Blog Image">
                            </figure>
                            <section class="blog-post-wrapper product-summery">
                                <div class="section-content">
                                    <h2 class="title-1 mb-3"><?php echo $data['blog']['title'] ?></h2>
                                    <p class="mb-4"><?php echo $data['blog']['description'] ?></p>
                                    <p class="mb-5"><?php echo $data['blog']['content'] ?></p>
                                </div>
                                <div class="share-article">
                                    <span class="left-side">
                                    <a href="#"> <i class="fa fa-long-arrow-left"></i> Older Post</a>
                                </span>
                                    <h6 class="text-uppercase">Share this article</h6>
                                    <span class="right-side">
                                   <a href="#">Newer Post <i class="fa fa-long-arrow-right"></i></a>
                                </span>
                                </div>
                                <div class="social-share">
                                    <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                                    <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                                    <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                                    <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                                </div>
                                <div class="comment-area-wrapper mt-5">
                                    <div class="comments-view-area">
                                        <h3 class="mb-5">3 Comments</h3>
                                        
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Blog Details Wrapper Area End -->
                        <!-- Blog Comments Area Start -->
                        <form action="#">
                            <div class="comment-box">
                                <h3>Leave A Comment</h3>
                                <div class="row">
                                    <div class="col-12 col-custom">
                                        <div class="input-item mt-4 mb-4">
                                            <textarea cols="30" rows="5" name="comment" class="border rounded-0 w-100 custom-textarea input-area" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-custom">
                                        <div class="input-item mb-4">
                                            <input class="border rounded-0 w-100 input-area name" type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-custom">
                                        <div class="input-item mb-4">
                                            <input class="border rounded-0 w-100 input-area email" type="text" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12 col-custom mt-40 mb-no-text">
                                        <button type="submit" class="btn obrien-button primary-btn rounded-0 mb-0 w-100">Post comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Blog Comments Area End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Main Area End Here -->