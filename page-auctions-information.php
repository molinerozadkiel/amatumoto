<?php get_header(); ?>

<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <h2><?php the_title();?></h2>
  </figcaption>
</figure>

<?php while(have_posts()){the_post();?>


  <main class="auctionsInformationPage auctionFaq0" id="auctionsInformationPage"><?php the_content();?></main>

<?php } ?>

<?php get_footer(); ?>
