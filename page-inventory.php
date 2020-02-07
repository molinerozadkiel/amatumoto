<?php get_header(); ?>

<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <p>CURRENT</p>
    <h2><?php the_title();?></h2>
  </figcaption>
</figure>


<?php include 'filterBar.php'; ?>


<div class="shopArchive shopInventory">

  <?php

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
      'post_type'=>'product',
      'posts_per_page'=>9,
      'paged' => $paged,
    );
    if (isset($_GET['filter_year']) AND $_GET['filter_year']!=0) {
      $args['tax_query'] = array(
          array(
              'taxonomy' => 'product_cat',
              'field'    => 'slug',
              'terms'    => $_GET['filter_year'],
          ),
      );
    }
    // chequea si hay una busqueda de texto solicitada por el usuario, de haberla la pasa al query
    if (isset($_GET['filter_search']) AND $_GET['filter_search']!=''){$args['s']=$_GET['filter_search'];}

  $blogPosts=new WP_Query($args);
  while($blogPosts->have_posts()){$blogPosts->the_post();$product_id = get_the_ID(); ?>



  <figure class="productCard">
    <?php
    global $product;
    $newness_days = 1;
    $created = strtotime( $product->get_date_created() );
    if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
      <span class="newArrival"><i>New arrival</i></span>
    <?php } ?>
    <!-- <span class="newArrival"><i>New arrival</i></span> -->
    <a class="productCardImg" href="<?php echo get_permalink(); ?>"><img class="productCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></a>
    <figcaption class="productCardCaption">
      <h5 class="productCardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
      <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p>
      <p class="productCardPrice"><?php echo $product->get_price_html(); ?></p>
    </figcaption>
  </figure>
  <?php

} ?>
</div>

<?php if (function_exists("pagination")) {
    pagination($custom_query->max_num_pages);
} ?>


<?php get_footer(); ?>
