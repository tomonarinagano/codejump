<?php get_header(); ?>

<main class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="news-detail">
      <h1><?php echo esc_html(get_the_title()); ?></h1>
      <p class="news-date"><?php echo esc_html(get_the_date('Y.m.d')); ?></p>
      <div class="news-content">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>