<section>
    <div class="container">
        <article class="blog-post">
            <h1><?=$post['title']?></h1>
            <div class="details">
                Posted On: <?=date('M d Y', strtotime($post['created_at']))?> by <a href="https://rasyidcode.github.io">RasyidCode</a>
            </div>
            <p><?=$post['body']?></p>
        </article>
    </div>
</section>