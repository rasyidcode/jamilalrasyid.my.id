<section>
    <?php $session = \Config\Services::session(); ?>
    <?php if (isset($session->success)): ?>
        <div class="alert alert-success text-center alert-dismissable show mb-0" role="alert">
            <?= $session->success ?>
            <button type="button" class="close" data-dismiss="alert" area-label="Close">
                <span area-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">This is CI4 Blog</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
</section>

<section id="blog-posts">
    <div class="container">
        <?php if($posts): ?>
            <?php foreach($posts as $postItem): ?>
                <h3><a href="/post/<?=$postItem['slug']?>"><?=$postItem['title']?></a></h3>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No posts have been found</p>
        <?php endif; ?>
    </div>
</section>