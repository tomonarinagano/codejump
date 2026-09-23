<?php get_header(); ?>

<main class="container">
  <h1><?php echo esc_html('お知らせ一覧'); ?></h1>

  <?php if (have_posts()) : ?>
    <ul class="news-list">
      <?php while (have_posts()) : the_post(); ?>
        <li>
          <span class="news-date"><?php echo esc_html(get_the_date('Y.m.d')); ?></span>
          <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
        </li>
      <?php endwhile; ?>
    </ul>
    <?php the_posts_pagination(); ?>
  <?php else : ?>
    <p><?php echo esc_html('お知らせはありません。'); ?></p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>