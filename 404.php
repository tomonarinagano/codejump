<?php get_header(); ?>
  <main class="container">
    <section class="error-404">
      <h1 class="page-title">404 NOT FOUND</h1>
      <p class="error-text">
        お探しのページは見つかりませんでした。<br />
        URLが間違っているか、ページが削除された可能性があります。
      </p>
      <div class="back-btn">
        <a href="<?php echo home_url('/'); ?>" class="btn">トップに戻る</a>
      </div>
    </section>
  </main>>
<?php get_footer(); ?>