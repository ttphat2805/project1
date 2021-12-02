<!-- Blog Main Area Start Here -->
<div class="blog-main-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-12 col-custom mt-no-text">
                <!-- Blog Wrapper Start -->
                <div class="row js_show_blog">
                    <!-- <?php foreach ($data['blog'] as $blog) :
                            ?>
                        <div class="col-lg-4 col-md-6 col-custom mb-4">
                            <div class="single-blog">
                                <div class="single-blog-thumb">
                                    <a href="<?= BASE_URL ?>/blogdetail/show/<?= $blog['slug'] ?>">
                                        <img src="<?= BASE_URL ?>/public/assets/images/blog/<?= $blog['image'] ?>" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="single-blog-content position-relative">
                                    <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                        <span>14</span>
                                        <span>01</span>
                                    </div>
                                    <div class="post-meta">
                                        <span class="author">Nguồn: G6'Food</span>
                                    </div>
                                    <h2 class="post-title">
                                        <a href="<?= BASE_URL ?>/blogdetail/show/<?= $blog['slug'] ?>"><?= $blog['title'] ?></a>
                                    </h2>
                                    <p class="desc-content"><?= $blog['description'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Main Area End Here -->

<script>
    function fetchblog() {
        let page = $('input[name="page"]:checked').val();
        $.ajax({
            url: "<?= BASE_URL ?>/blog/fetchblog",
            method: "POST",
            data: {
                'action': 'load_blog',
                'page': page,
            },
            success: function(data) {
                $(".js_show_blog").html(data);
            },
        });
    }
    fetchblog();

    $(document).on('click', '.pd_page', function() {
        fetchblog();
    })
</script>