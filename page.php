<?php get_header(); ?>

<main>
  <div class="container">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article class="page-content">
          <h1 class="page-title"><?php the_title(); ?></h1>
          <?php if (has_post_thumbnail()) : ?>
            <div class="page-img">
              <?php the_post_thumbnail('full'); ?>
            </div>
          <?php endif; ?>
          <div class="page-body">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>