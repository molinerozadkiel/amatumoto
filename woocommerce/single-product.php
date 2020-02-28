<?php get_header(); ?>
<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php while(have_posts()){the_post(); ?>
  <?php global $woocommerce, $product, $post; ?>
  <?php $categories = get_the_terms( get_the_ID(), 'product_cat' ); ?>
  <?php function selection($v){return $v->slug;}$cates=array_map('selection',$categories); ?>

  <!-- <h1>single-product.php</h1> -->

  <article class="singlePage">

    <div class="singleSide singleSide1">
      <?php
      // $newness_days = 1;
      $created = strtotime( $product->get_date_created() );
      if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
        <span class="newArrival"><i>New arrival</i></span>
      <?php } ?>
      <?php
      // get all the categories on the product
      // $categories = get_the_terms( get_the_ID(), 'product_cat' );
      // if it finds sometthing
      if ($categories) {
        // for each category
        foreach ($categories as $cat) {
          // get the slug of parent cattegory
          $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A')['slug'];
          if ($parent=="year-bikes") {$yearBike = $cat->name;}
          if ($parent=="brand") {$brand = $cat->name;}
        }
      }
      ?>


      <!-- OLD TITLE -->
      <!-- <?php if($brand){ ?><span class="singleSideAnoMarca"><?php echo $brand; ?></span><?php } ?>
      <h1 class="singleSideTitle"><?php the_title(); ?></h1>
      <?php if($yearBike){ ?><span class="singleSideAnoMarca"><?php echo $yearBike; ?></span><?php } ?> -->


      <!-- NEW TITLE -->
      <h1 class="singleSideTitle">
        <?php if($brand){ ?><span class="singleSideAnoMarca"><?php echo $brand; ?></span><?php } ?>
        <?php the_title(); ?>
        <?php if($yearBike){ ?><span class="singleSideAnoMarca"><?php echo $yearBike; ?></span><?php } ?>
      </h1>



      <p class="singleSidePrice"><?php echo $product->get_price_html(); ?></p>
      <?php $stockNumber = get_post_meta( $product->id, 'stockNumber' )[0]; ?>
      <?php if($stockNumber){ ?>
        <p class="singleSideStock">
          Stock # <?php echo $stockNumber; ?>
          <?php if (method_exists($product,'get_condition')) { ?>
            <br>Condition: <?php echo esc_html( $product->get_condition() ); ?>
          <?php } ?>
        </p>
      <?php } ?>


      <p class="singleSideData onlyDesktopG"><?php echo excerpt(140); ?></p>

      <?php $video = get_post_meta( $product->id, 'video' )[0]; ?>
      <?php if($video){ ?>
          <!-- <video class="singleSideVideo" controls src="<?php echo $video; ?>"></video> -->
          <iframe class="singleSideVideo onlyDesktopG" src="https://www.youtube.com/embed/<?php echo $video; ?>"></iframe>
      <?php } ?>





      <div class="singleSideSocialCont socialMedia onlyDesktopF">

        <a href="https://es-la.facebook.com/gpmotorbikes/" target="_blank" class="socialMediaLink socialMediaFace">
          <svg width="auto" height="25" viewBox="0 0 313 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M272.598 281.25L286.484 190.762H199.658V132.041C199.658 107.285 211.787 83.1543 250.674 83.1543H290.146V6.11328C290.146 6.11328 254.326 0 220.078 0C148.574 0 101.836 43.3398 101.836 121.797V190.762H22.3535V281.25H101.836V500H199.658V281.25H272.598Z" fill="currentColor"/>
          </svg>
        </a>

        <a href="tel:+34 938 364 911" target="_blank" class="socialMediaLink socialMediaFono">
          <svg width="auto" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.04444 17.3111C11.2444 23.6 16.4 28.7333 22.6889 31.9556L27.5778 27.0667C28.1778 26.4667 29.0667 26.2667 29.8444 26.5333C32.3333 27.3556 35.0222 27.8 37.7778 27.8C39 27.8 40 28.8 40 30.0222V37.7778C40 39 39 40 37.7778 40C16.9111 40 0 23.0889 0 2.22222C0 1 1 0 2.22222 0H10C11.2222 0 12.2222 1 12.2222 2.22222C12.2222 5 12.6667 7.66667 13.4889 10.1556C13.7333 10.9333 13.5556 11.8 12.9333 12.4222L8.04444 17.3111Z" fill="currentColor"/>
          </svg>
        </a>

        <a href="https://wa.me/15551234567" target="_blank" class="socialMediaLink socialMediaWhatsapp">
          <svg viewBox="0 0 500 500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M425.112 72.6563C378.348 25.7812 316.071 0 249.888 0C113.281 0 2.12054 111.161 2.12054 247.768C2.12054 291.406 13.5045 334.04 35.1563 371.652L0 500L131.362 465.513C167.522 485.268 208.259 495.647 249.777 495.647H249.888C386.384 495.647 500 384.487 500 247.879C500 181.696 471.875 119.531 425.112 72.6563V72.6563ZM249.888 453.906C212.835 453.906 176.562 443.973 144.978 425.223L137.5 420.759L59.5982 441.183L80.3571 365.179L75.4464 357.366C54.7991 324.554 43.9732 286.719 43.9732 247.768C43.9732 134.263 136.384 41.8527 250 41.8527C305.022 41.8527 356.696 63.2812 395.536 102.232C434.375 141.183 458.259 192.857 458.147 247.879C458.147 361.496 363.393 453.906 249.888 453.906V453.906ZM362.835 299.665C356.696 296.54 326.228 281.585 320.536 279.576C314.844 277.455 310.714 276.451 306.585 282.701C302.455 288.951 290.625 302.79 286.942 307.031C283.371 311.161 279.688 311.719 273.549 308.594C237.165 290.402 213.281 276.116 189.286 234.933C182.924 223.996 195.647 224.777 207.478 201.116C209.487 196.987 208.482 193.415 206.92 190.29C205.357 187.165 192.969 156.696 187.835 144.308C182.813 132.254 177.679 133.929 173.884 133.705C170.313 133.482 166.183 133.482 162.054 133.482C157.924 133.482 151.228 135.045 145.536 141.183C139.844 147.433 123.884 162.388 123.884 192.857C123.884 223.326 146.094 252.79 149.107 256.92C152.232 261.049 192.746 323.549 254.911 350.446C294.196 367.411 309.598 368.862 329.241 365.96C341.183 364.174 365.848 351.004 370.982 336.496C376.116 321.987 376.116 309.598 374.554 307.031C373.103 304.241 368.973 302.679 362.835 299.665Z" fill="currentColor"/>
          </svg>
        </a>



        <a class="socialMediaLink socialMediaMail" href="" target="_blank">
          <svg width="auto" height="40" viewBox="0 0 55 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path d="M49.6053 0H5.13158C2.29745 0 0 2.23854 0 5V35C0 37.7615 2.29745 40 5.13158 40H49.6053C52.4394 40 54.7368 37.7615 54.7368 35V5C54.7368 2.23854 52.4394 0 49.6053 0ZM49.6053 5V9.25052C47.2082 11.1525 43.3866 14.11 35.2169 20.3432C33.4164 21.7231 29.85 25.0382 27.3684 24.9996C24.8873 25.0386 21.3197 21.7226 19.52 20.3432C11.3515 14.1109 7.52899 11.1528 5.13158 9.25052V5H49.6053ZM5.13158 35V15.6665C7.58127 17.5676 11.0552 20.2354 16.3503 24.2754C18.687 26.0676 22.7791 30.024 27.3684 29.9999C31.9352 30.024 35.9755 26.125 38.3856 24.2762C43.6805 20.2364 47.1555 17.5678 49.6053 15.6666V35H5.13158Z" fill="currentColor"/>
          </svg>
        </a>


      </div>





      <div class="singleSideContactContainer onlyDesktopG">
        <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleRequestInfo')">REQUEST MORE INFO</button>
        <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleMakeOffer')">MAKE OFFER</button>
        <?php if($product->is_type( 'auction' )){ ?>
          <a class="singleSideContact" href="<?php echo site_url('auctions-information');  ?>">AUCTION INFO</a>
        <?php } else if(!in_array('parts-racing-products', $cates)) { ?>
          <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleTrade')">TRADE</button>
        <?php } ?>
        <!-- <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleFinance')">FINANCE</button> -->
      </div>


      <?php function testimonial( $clase ){ ?>

            <div class="testimonialsContainer <?php echo $clase; ?>">
              <?php
              $args = array(
                'post_type'=>'testimonials',
                'orderby'=>'rand',
                'posts_per_page'=>'1'
              );
              $testimonials=new WP_Query($args);
              while($testimonials->have_posts()){$testimonials->the_post();?>
                <quote class="testimonial">
                  <svg class="testiQuote testiQuote1" width="576" height="448" viewBox="0 0 576 448" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M504 192H448V184C448 161.9 465.9 144 488 144H496C522.5 144 544 122.5 544 96V48C544 21.5 522.5 0 496 0H488C386.5 0 304 82.5 304 184V376C304 415.7 336.3 448 376 448H504C543.7 448 576 415.7 576 376V264C576 224.3 543.7 192 504 192ZM528 376C528 389.2 517.2 400 504 400H376C362.8 400 352 389.2 352 376V184C352 109 413 48 488 48H496V96H488C439.5 96 400 135.5 400 184V240H504C517.2 240 528 250.8 528 264V376ZM200 192H144V184C144 161.9 161.9 144 184 144H192C218.5 144 240 122.5 240 96V48C240 21.5 218.5 0 192 0H184C82.5 0 0 82.5 0 184V376C0 415.7 32.3 448 72 448H200C239.7 448 272 415.7 272 376V264C272 224.3 239.7 192 200 192ZM224 376C224 389.2 213.2 400 200 400H72C58.8 400 48 389.2 48 376V184C48 109 109 48 184 48H192V96H184C135.5 96 96 135.5 96 184V240H200C213.2 240 224 250.8 224 264V376Z" fill="black"/>
                  </svg>
                  <div class="testimonialTxt mainTxtType1">
                    <h4 class="testimonialAuthor"><?php the_title(); ?></h4>
                    <div class="testimonialQuote"><?php the_content(); ?></div>
                  </div>
                  <svg class="testiQuote testiQuote2" width="576" height="448" viewBox="0 0 576 448" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M72 256H128V264C128 286.1 110.1 304 88 304H80C53.5 304 32 325.5 32 352V400C32 426.5 53.5 448 80 448H88C189.5 448 272 365.5 272 264V72C272 32.3 239.7 0 200 0H72C32.3 0 0 32.3 0 72V184C0 223.7 32.3 256 72 256ZM48 72C48 58.8 58.8 48 72 48H200C213.2 48 224 58.8 224 72V264C224 339 163 400 88 400H80V352H88C136.5 352 176 312.5 176 264V208H72C58.8 208 48 197.2 48 184V72ZM376 256H432V264C432 286.1 414.1 304 392 304H384C357.5 304 336 325.5 336 352V400C336 426.5 357.5 448 384 448H392C493.5 448 576 365.5 576 264V72C576 32.3 543.7 0 504 0H376C336.3 0 304 32.3 304 72V184C304 223.7 336.3 256 376 256ZM352 72C352 58.8 362.8 48 376 48H504C517.2 48 528 58.8 528 72V264C528 339 467 400 392 400H384V352H392C440.5 352 480 312.5 480 264V208H376C362.8 208 352 197.2 352 184V72Z" fill="black"/>
                  </svg>
                </quote>
              <?php } wp_reset_postdata(); ?>
            </div>

    <?php } ?>
    <?php if( $product->is_type( 'auction' ) ){ ?>
    <?php testimonial( 'onlyDesktopG' ); ?>
    <?php } ?>

    </div>


    <div class="singleMain">








      <div class="gallery" id="gallery">
        <?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>

        <div class="galleryMainCarousel">
          <img class="galleryMain galleryCarousel" onclick="altClassFromSelector('alt','#gallery')" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          <?php $count=0; foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="galleryMain galleryCarousel" onclick="altClassFromSelector('alt','#gallery')" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="">
          <?php $count++; } ?>
        </div>
        <button class="slideButton rowcol1 slideLeft" onclick="plusImgs(-1)">&#10094;</button>
        <button class="slideButton rowcol1 slideRight" onclick="plusImgs(+1)">&#10095;</button>


        <div class="galleryStock" id="galleryStock">
          <img class="galleryImgs" onclick="selectImgs(0)" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          <?php $count=1; foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="galleryImgs" onclick="selectImgs(<?php echo $count; ?>)" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="">
            <!-- <img class="galleryImgs" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="" onclick="gallerySingle('<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>')"> -->
          <?php $count++; } ?>
          <div class="galleryFade"></div>
        </div>
        <button class="galleryMore" onclick="altClassFromSelector('alt', '#galleryStock')">More photos</button>
      </div>





      <div class="singleSideMobileSchema onlyMobileG">



                  <p class="singleSideData onlyMobileG"><?php echo excerpt(140); ?></p>

                  <?php $video = get_post_meta( $product->id, 'video' )[0]; ?>
                  <?php if($video){ ?>
                      <!-- <video class="singleSideVideo" controls src="<?php echo $video; ?>"></video> -->
                      <iframe class="singleSideVideo onlyMobileG" src="https://www.youtube.com/embed/<?php echo $video; ?>"></iframe>
                  <?php } ?>





                  <div class="singleSideSocialCont socialMedia onlyMobileF">

                    <a href="https://es-la.facebook.com/gpmotorbikes/" target="_blank" class="socialMediaLink socialMediaFace">
                      <svg width="auto" height="25" viewBox="0 0 313 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M272.598 281.25L286.484 190.762H199.658V132.041C199.658 107.285 211.787 83.1543 250.674 83.1543H290.146V6.11328C290.146 6.11328 254.326 0 220.078 0C148.574 0 101.836 43.3398 101.836 121.797V190.762H22.3535V281.25H101.836V500H199.658V281.25H272.598Z" fill="currentColor"/>
                      </svg>
                    </a>

                    <a href="tel:+34 938 364 911" target="_blank" class="socialMediaLink socialMediaFono">
                      <svg width="auto" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.04444 17.3111C11.2444 23.6 16.4 28.7333 22.6889 31.9556L27.5778 27.0667C28.1778 26.4667 29.0667 26.2667 29.8444 26.5333C32.3333 27.3556 35.0222 27.8 37.7778 27.8C39 27.8 40 28.8 40 30.0222V37.7778C40 39 39 40 37.7778 40C16.9111 40 0 23.0889 0 2.22222C0 1 1 0 2.22222 0H10C11.2222 0 12.2222 1 12.2222 2.22222C12.2222 5 12.6667 7.66667 13.4889 10.1556C13.7333 10.9333 13.5556 11.8 12.9333 12.4222L8.04444 17.3111Z" fill="currentColor"/>
                      </svg>
                    </a>

                    <a href="https://wa.me/15551234567" target="_blank" class="socialMediaLink socialMediaWhatsapp">
                      <svg viewBox="0 0 500 500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M425.112 72.6563C378.348 25.7812 316.071 0 249.888 0C113.281 0 2.12054 111.161 2.12054 247.768C2.12054 291.406 13.5045 334.04 35.1563 371.652L0 500L131.362 465.513C167.522 485.268 208.259 495.647 249.777 495.647H249.888C386.384 495.647 500 384.487 500 247.879C500 181.696 471.875 119.531 425.112 72.6563V72.6563ZM249.888 453.906C212.835 453.906 176.562 443.973 144.978 425.223L137.5 420.759L59.5982 441.183L80.3571 365.179L75.4464 357.366C54.7991 324.554 43.9732 286.719 43.9732 247.768C43.9732 134.263 136.384 41.8527 250 41.8527C305.022 41.8527 356.696 63.2812 395.536 102.232C434.375 141.183 458.259 192.857 458.147 247.879C458.147 361.496 363.393 453.906 249.888 453.906V453.906ZM362.835 299.665C356.696 296.54 326.228 281.585 320.536 279.576C314.844 277.455 310.714 276.451 306.585 282.701C302.455 288.951 290.625 302.79 286.942 307.031C283.371 311.161 279.688 311.719 273.549 308.594C237.165 290.402 213.281 276.116 189.286 234.933C182.924 223.996 195.647 224.777 207.478 201.116C209.487 196.987 208.482 193.415 206.92 190.29C205.357 187.165 192.969 156.696 187.835 144.308C182.813 132.254 177.679 133.929 173.884 133.705C170.313 133.482 166.183 133.482 162.054 133.482C157.924 133.482 151.228 135.045 145.536 141.183C139.844 147.433 123.884 162.388 123.884 192.857C123.884 223.326 146.094 252.79 149.107 256.92C152.232 261.049 192.746 323.549 254.911 350.446C294.196 367.411 309.598 368.862 329.241 365.96C341.183 364.174 365.848 351.004 370.982 336.496C376.116 321.987 376.116 309.598 374.554 307.031C373.103 304.241 368.973 302.679 362.835 299.665Z" fill="currentColor"/>
                      </svg>
                    </a>



                    <a class="socialMediaLink socialMediaMail" href="" target="_blank">
                      <svg width="auto" height="40" viewBox="0 0 55 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M49.6053 0H5.13158C2.29745 0 0 2.23854 0 5V35C0 37.7615 2.29745 40 5.13158 40H49.6053C52.4394 40 54.7368 37.7615 54.7368 35V5C54.7368 2.23854 52.4394 0 49.6053 0ZM49.6053 5V9.25052C47.2082 11.1525 43.3866 14.11 35.2169 20.3432C33.4164 21.7231 29.85 25.0382 27.3684 24.9996C24.8873 25.0386 21.3197 21.7226 19.52 20.3432C11.3515 14.1109 7.52899 11.1528 5.13158 9.25052V5H49.6053ZM5.13158 35V15.6665C7.58127 17.5676 11.0552 20.2354 16.3503 24.2754C18.687 26.0676 22.7791 30.024 27.3684 29.9999C31.9352 30.024 35.9755 26.125 38.3856 24.2762C43.6805 20.2364 47.1555 17.5678 49.6053 15.6666V35H5.13158Z" fill="currentColor"/>
                      </svg>
                    </a>


                  </div>





                  <div class="singleSideContactContainer onlyMobileG">
                    <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleRequestInfo')">REQUEST MORE INFO</button>
                    <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleMakeOffer')">MAKE OFFER</button>
                    <?php if($product->is_type( 'auction' )){ ?>
                      <a class="singleSideContact" href="<?php echo site_url('auctions-information');  ?>">AUCTION INFO</a>
                    <?php } else if(!in_array('parts-racing-products', $cates)) { ?>
                      <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleTrade')">TRADE</button>
                    <?php } ?>
                    <!-- <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleFinance')">FINANCE</button> -->
                  </div>







                </div>




















                            <?php
                            // AUCTION INFORRMATION HERE
                            // var_dump(get_post_meta( $product->id));
                            // var_dump($product->auction_bid_count);
                            // echo $product->auction_bid_count;
                            /**
                             * Auction bid
                             *
                             */

                            if ( ( $product && $product->is_type( 'auction' ) ) ) {
                            	// return;
                            $product_id       = $product->get_id();
                            $user_max_bid     = $product->get_user_max_bid( $product_id, get_current_user_id() );
                            $max_min_bid_text = $product->get_auction_type() === 'reverse' ? esc_html__( 'Your min bid is', 'auctions-for-woocommerce' ) : esc_html__( 'Your max bid is', 'auctions-for-woocommerce' );
                            $gmt_offset       = get_option( 'gmt_offset' ) > 0 ? '+' . get_option( 'gmt_offset' ) : get_option( 'gmt_offset' );
                            ?>

                            <!-- <p class="auction-condition"><?php echo wp_kses_post( apply_filters( 'conditiond_text', esc_html__( 'Item condition:', 'auctions-for-woocommerce' ), $product ) ); ?><span class="curent-bid"> <?php echo esc_html( $product->get_condition() ); ?></span></p> -->

                            <?php if ( ( false === $product->is_closed ) && ( true === $product->is_started ) ) : ?>


                            	<div class='auction-ajax-change auctionData' >

                            		<?php if ( 'yes' !== $product->get_auction_sealed() ) { ?>
                                <div class="auctionTitle">
                                  <h2>Auction info:</h2>
                                  <?php do_action( 'woocommerce_after_bid_form' ); ?>
                                </div>

                                  <p class="auctionDetails">
                                    <span class="auctionDetailsTitle">
                                      <?php echo wp_kses_post( apply_filters( 'time_left_text', esc_html__( 'Auction ends:', 'auctions-for-woocommerce' ), $product ) ); ?>
                                    </span>
                                    <span class="auctionDetailsValue">
                                      <?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $product->get_auction_end_time() ) ) ); ?>
                                    </span>
                                  </p>

                                	<p class="auctionDetails" id="countdown">
                                    <span class="auctionDetailsTitle">
                                      <?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Time left:', 'auctions-for-woocommerce' ), $product_id ) ); ?>
                                    </span>
                                		<span class="auctionDetailsValue main-auction auction-time-countdown notMet" data-time="<?php echo esc_attr( $product->get_seconds_remaining() ); ?>" data-auctionid="<?php echo intval( $product_id ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
                                	</p>

                            			<p class="auctionDetails">
                                    <?php if ($product->auction_current_bid){ ?>
                                      <span class="auctionDetailsTitle">Current bid:</span>
                                      <?php // echo wp_kses_post( $product->get_price_html() ); ?>
                                      <span class="auctionDetailsValue bluTxt">€ <?php echo number_format($product->auction_current_bid,0,",","."); ?></span>
                                      <!-- <span class="auctionDetailsValue">€ <?php echo $product->auction_current_bid; ?></span> -->
                                    <?php } else { ?>
                                      <span class="auctionDetailsTitle">Starting bid:</span>
                                      <span class="auctionDetailsValue bluTxt">€ <?php echo number_format($product->auction_start_price,0,",","."); ?></span>
                                    <?php } ?>



                                  </p>

                                  <p class="auctionDetails">
                                    <span class="auctionDetailsTitle">Reserve price:</span>
                                    <?php if ( ( $product->is_reserved() === true ) && ( $product->is_reserve_met() === false ) ) : ?>
                                      <span class="auctionDetailsValue reserve notMet"  data-auction-id="<?php echo intval( $product_id ); ?>" >has not been met</span>
                                    <?php endif; ?>
                                    <?php if ( ( $product->is_reserved() === true ) && ( $product->is_reserve_met() === true ) ) : ?>
                                      <span class="auctionDetailsValue reserve yesMet"  data-auction-id="<?php echo intval( $product_id ); ?>" >has been met</span>
                                    <?php endif; ?>
                                  </p>




                            		<?php } elseif ( 'yes' === $product->get_auction_sealed() ) { ?>
                            				<p class="sealed-text"><?php echo wp_kses_post( apply_filters( 'sealed_bid_text', __( "This auction is <a href='#'>sealed</a>.", 'auctions-for-woocommerce' ) ) ); ?>
                            					<span class='sealed-bid-desc' style="display:grid;"><?php esc_html_e( 'In this type of auction all bidders simultaneously submit sealed bids so that no bidder knows the bid of any other participant. The highest bidder pays the price they submitted. If two bids with same value are placed for auction the one which was placed first wins the auction.', 'auctions-for-woocommerce' ); ?></span>
                            				</p>
                            				<?php
                            				if ( ! empty( $product->get_auction_start_price() ) ) {
                            					?>
                            					<?php if ( 'reverse' === $product->get_auction_type() ) : ?>
                            							<p class="sealed-min-text">
                            								<?php
                            									echo wp_kses_post(
                            										apply_filters(
                            											'sealed_min_text',
                            											sprintf(
                            												// translators: 1) bid value
                            												esc_html__( 'Maximum bid for this auction is %s.', 'auctions-for-woocommerce' ),
                            												wc_price( $product->get_auction_start_price() )
                            											)
                            										)
                            									);
                            								?>
                        									</p>
                            					<?php else : ?>
                            							<p class="sealed-min-text">
                            								<?php
                            								echo wp_kses_post(
                            									apply_filters(
                            										'sealed_min_text',
                            										sprintf(
                            											// translators: 1) bid value
                            											esc_html__( 'Minimum bid for this auction is %s.', 'auctions-for-woocommerce' ),
                            											wc_price( $product->get_auction_start_price() )
                            										)
                            									)
                            								);
                            								?>
                          								</p>
                            					<?php endif; ?>
                            				<?php } ?>
                            		<?php } ?>

                            		<?php if ( 'reverse' === $product->get_auction_type() ) : ?>
                            			<p class="reverse"><?php echo wp_kses_post( apply_filters( 'reverse_auction_text', esc_html__( 'This is reverse auction.', 'auctions-for-woocommerce' ) ) ); ?></p>
                            		<?php endif; ?>
                            		<?php if ( 'yes' !== $product->get_auction_sealed() ) { ?>
                            			<?php if ( $product->get_auction_proxy() && $product->get_auction_max_current_bider() && get_current_user_id() === $product->get_auction_max_current_bider() ) { ?>
                            				<p class="max-bid"><?php echo esc_html( $max_min_bid_text ); ?> <?php echo wp_kses_post( wc_price( $product->get_auction_max_bid() ) ); ?>
                            			<?php } ?>
                            		<?php } elseif ( $user_max_bid > 0 ) { ?>
                            			<p class="max-bid"><?php echo esc_html( $max_min_bid_text ); ?> <?php echo wp_kses_post( wc_price( $user_max_bid ) ); ?>
                            		<?php } ?>

                            		<?php do_action( 'woocommerce_before_bid_form' ); ?>


                                <?php if (is_user_logged_in()) { ?>

                            		<form class="auction_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo intval( $product_id ); ?>">

                            			<?php do_action( 'woocommerce_before_bid_button' ); ?>

                            			<input type="hidden" name="bid" value="<?php echo esc_attr( $product_id ); ?>" />
                            				<div class="quantity buttons_added">
                            					<input type="button" value="-" class="minus" />
                            					<input type="text" name="bid_value" data-auction-id="<?php echo intval( $product_id ); ?>"
                            							<?php
                            							if ( 'yes' !== $product->get_auction_sealed() ) {
                            								?>
                            								value="<?php echo esc_attr( $product->bid_value() ); ?>"
                            								<?php if ( 'reverse' === $product->get_auction_type() ) : ?>
                            									max="<?php echo esc_attr( $product->bid_value() ); ?>"
                            								<?php else : ?>
                            									min="<?php echo esc_attr( $product->bid_value() ); ?>"
                            								<?php endif; ?>
                            							<?php } ?>
                            							step="100" size="<?php echo intval( strlen( $product->get_curent_bid() ) ) + 6; ?>" title="bid"  class="input-text qty  bid text left">
                                      <input type="button" value="+" class="plus" />
                            				</div>
                            			<button type="submit" class="bid_button button alt"><?php echo wp_kses_post( apply_filters( 'bid_text', esc_html__( 'Bid', 'auctions-for-woocommerce' ), $product ) ); ?></button>
                            			<input type="hidden" name="place-bid" value="<?php echo intval( $product_id ); ?>" />
                            			<input type="hidden" name="product_id" value="<?php echo intval( $product_id ); ?>" />
                            			<?php if ( is_user_logged_in() ) { ?>
                            				<input type="hidden" name="user_id" value="<?php echo intval( get_current_user_id() ); ?>" />
                            			<?php } ?>

                            			<?php // do_action( 'woocommerce_after_bid_button' ); ?>
                            		</form>

                              <?php } else { ?>
                                <p class="mustLogin">you must <span class="mustLoginButton" onclick="altClassFromSelector('alt','#logForm')">login</span> to place a bid</p>
                              <?php } ?>



                            	</div>

                            <?php elseif ( ( false === $product->is_closed ) && ( false === $product->is_started ) ) : ?>
                              <div class='auctionData' >

                                <div class="auctionTitle">
                                  <h2>Auction info:</h2>
                                  <?php do_action( 'woocommerce_after_bid_form' ); ?>
                                </div>

                          			<p class="auctionDetails">
                                  <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'auction_starts_text', esc_html__( 'Auction starts in:', 'auctions-for-woocommerce' ), $product ) ); ?></span>
                                  <span class="auctionDetailsValue auction-time-countdown future notMet" data-time="<?php echo esc_attr( $product->get_seconds_to_auction() ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
                                </p>
                                <p class="auctionDetails">
                                  <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Auction starts:', 'auctions-for-woocommerce' ), $product_id ) ); ?></span>
                                  <span class="auctionDetailsValue"><?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $product->get_auction_start_time() ) ) ); ?></span>
                                  <?php // echo esc_html( date_i18n( get_option( 'time_format' ), strtotime( $product->get_auction_start_time() ) ) ); ?>
                                </p>
                              	<p class="auctionDetails">
                                  <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Auction ends:', 'auctions-for-woocommerce' ), $product_id ) ); ?></span>
                                  <span class="auctionDetailsValue"><?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $product->get_auction_end_time() ) ) ); ?></span>
                                  <?php // echo esc_html( date_i18n( get_option( 'time_format' ), strtotime( $product->get_auction_end_time() ) ) ); ?>
                                </p>
                                <p class="auctionDetails">
                                  <span class="auctionDetailsTitle">Starting bid:</span>
                                  <span class="auctionDetailsValue">€ <?php echo number_format($product->auction_start_price,0,",","."); ?></span>
                                </p>

                              </div>

                            <?php endif; } ?>
























      <?php if (!in_array('parts-racing-products', $cates)) { ?>
      <div class="singleFeatures">


        <figure class="singleFeature">
          <svg class="singleFeatureIcon" viewBox="0 0 218 150" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M88.6562 92.097L99.6815 95.0537L100.333 92.6079L89.315 89.6606L88.6562 92.097Z" fill="#2E353A"/>
            <path d="M97.9874 107.897H86.5781V110.429H97.9874V107.897Z" fill="#2E353A"/>
            <path d="M128.702 57.224L122.994 47.3445L120.805 48.6069L126.513 58.4929L128.702 57.224Z" fill="#2E353A"/>
            <path d="M106.556 78.4444L96.6772 72.7405L95.4123 74.9313L105.292 80.6352L106.556 78.4444Z" fill="#2E353A"/>
            <path d="M143.116 51.6049L140.166 40.5906L137.724 41.2457L140.674 52.2637L143.116 51.6049Z" fill="#2E353A"/>
            <path d="M116.235 66.3796L108.168 58.3118L106.385 60.0988L114.445 68.163L116.235 66.3796Z" fill="#2E353A"/>
            <path d="M158.498 38.5115H155.966V49.9171H158.498V38.5115Z" fill="#2E353A"/>
            <path d="M171.341 51.6049L173.783 52.2637L176.74 41.2457L174.297 40.5906L171.341 51.6049Z" fill="#2E353A"/>
            <path d="M127.494 84.948C132.105 81.4391 137.435 79.268 142.718 78.2831C155.76 75.8577 165.172 77.323 171.842 78.5745V55.6327C167.183 54.3667 162.292 53.6775 157.229 53.6775C139.261 53.6775 123.296 62.2294 113.149 75.4772L113.376 75.6388L127.494 84.948Z" fill="#2E353A"/>
            <path d="M110.913 73.8164L109.794 75.3158L112.044 76.9825C112.408 76.4752 112.771 75.9672 113.148 75.4766L110.913 73.8164Z" fill="#2E353A"/>
            <path d="M112.044 76.9824C105.567 86.0583 101.739 97.1596 101.739 109.162H114.424C115.501 99.564 119.377 92.426 124.606 87.3931L112.264 77.1433L112.044 76.9824Z" fill="#2E353A"/>
            <path d="M169.674 109.162C169.674 102.292 164.102 96.7211 157.228 96.7211C154.292 96.7211 151.596 97.74 149.476 99.4444L127.495 84.948C126.493 85.7024 125.519 86.5046 124.607 87.3938L145.586 104.817C145.079 106.167 144.784 107.63 144.784 109.162C144.784 116.034 150.355 121.605 157.229 121.605C160.481 121.605 163.424 120.352 165.64 118.311L171.602 121.338L172.72 119.835L168.219 114.987C169.145 113.248 169.674 111.268 169.674 109.162ZM157.228 115.419C153.826 115.419 151.053 112.689 150.985 109.299L155.835 113.323L159.245 115.059C158.607 115.272 157.935 115.419 157.228 115.419ZM163.423 109.803L160.66 106.815L155.253 103.255C155.877 103.043 156.536 102.906 157.229 102.906C160.686 102.906 163.487 105.704 163.487 109.162C163.486 109.378 163.444 109.591 163.423 109.803Z" fill="#2E353A"/>
            <path d="M201.513 13.9645C201.513 13.9645 197.067 13.0521 192.539 12.3833C192.594 11.9202 192.683 11.4636 192.683 10.9875C192.683 4.92272 187.757 0 181.7 0H97.3074C91.2426 0 86.3235 4.92272 86.3235 10.9875C86.3235 12.1434 86.5503 13.234 86.8793 14.2805C82.9074 15.0283 79.2094 15.882 75.9578 16.8741C64.9528 20.2279 56.4321 24.0563 45.0025 34.2721C28.7908 48.7649 21.1346 60.3387 10.8094 78.8244C-8.38004 113.171 -3.14571 147.805 35.6034 149.19C73.2475 150.535 155.369 149.767 193.055 149.904C206.104 149.949 214.336 143.884 217.404 130.947C217.404 129.552 217.404 47.9866 217.404 47.9866C217.403 25.5999 212.243 16.8668 201.513 13.9645ZM176.623 6.47933C178.695 6.47933 180.369 8.15333 180.369 10.2223C180.369 12.2876 178.695 13.9645 176.623 13.9645C174.558 13.9645 172.885 12.2876 172.885 10.2223C172.884 8.15333 174.558 6.47933 176.623 6.47933ZM162.36 6.47933C164.431 6.47933 166.106 8.15333 166.106 10.2223C166.106 12.2876 164.431 13.9645 162.36 13.9645C160.288 13.9645 158.614 12.2876 158.614 10.2223C158.614 8.15333 160.288 6.47933 162.36 6.47933ZM148.302 6.47933C150.367 6.47933 152.041 8.15333 152.041 10.2223C152.041 12.2876 150.367 13.9645 148.302 13.9645C146.23 13.9645 144.556 12.2876 144.556 10.2223C144.557 8.15333 146.23 6.47933 148.302 6.47933ZM134.033 6.47933C136.104 6.47933 137.778 8.15333 137.778 10.2223C137.778 12.2876 136.104 13.9645 134.033 13.9645C131.967 13.9645 130.286 12.2876 130.286 10.2223C130.286 8.15333 131.967 6.47933 134.033 6.47933ZM119.769 6.47933C121.834 6.47933 123.515 8.15333 123.515 10.2223C123.515 12.2876 121.834 13.9645 119.769 13.9645C117.703 13.9645 116.03 12.2876 116.03 10.2223C116.03 8.15333 117.704 6.47933 119.769 6.47933ZM105.506 6.47933C107.571 6.47933 109.252 8.15333 109.252 10.2223C109.252 12.2876 107.571 13.9645 105.506 13.9645C103.44 13.9645 101.761 12.2876 101.761 10.2223C101.761 8.15333 103.44 6.47933 105.506 6.47933ZM58.6481 129.525C56.5698 129.47 50.4564 129.415 48.6592 129.35C20.5244 128.344 20.8737 106.013 34.8077 81.0753C42.0871 68.05 47.5823 59.7314 58.6481 49.6468V129.525ZM187.58 116.106C186.235 123.919 179.375 129.902 169.9 129.868C149.112 129.792 108.113 130.095 77.6252 129.82V46.9097C77.6252 46.9097 77.3158 36.7766 92.9855 33.7337C93.6928 33.6235 94.3783 33.5105 95.1059 33.4076C95.5175 33.346 95.9081 33.2735 96.3407 33.222C119.186 30.1791 152.234 30.9784 169.399 32.8141C172.734 33.2974 176.04 33.9764 176.04 33.9764C183.826 36.0794 187.58 42.4291 187.58 58.6814C187.58 58.6821 187.627 112.188 187.58 116.106ZM207.53 108.383C205.465 108.383 203.791 106.709 203.791 104.641C203.791 102.572 205.465 100.899 207.53 100.899C209.602 100.899 211.276 102.572 211.276 104.641C211.276 106.709 209.602 108.383 207.53 108.383ZM207.53 94.1209C205.465 94.1209 203.791 92.444 203.791 90.3743C203.791 88.309 205.465 86.6365 207.53 86.6365C209.602 86.6365 211.276 88.3097 211.276 90.3743C211.276 92.4433 209.602 94.1209 207.53 94.1209ZM207.53 80.0564C205.465 80.0564 203.791 78.3817 203.791 76.3142C203.791 74.2459 205.465 72.5712 207.53 72.5712C209.602 72.5712 211.276 74.2452 211.276 76.3142C211.276 78.3817 209.602 80.0564 207.53 80.0564ZM207.53 65.7897C205.465 65.7897 203.791 64.1157 203.791 62.0511C203.791 59.9829 205.465 58.3082 207.53 58.3082C209.602 58.3082 211.276 59.9821 211.276 62.0511C211.276 64.1157 209.602 65.7897 207.53 65.7897Z" fill="#2E353A"/>
            <path d="M50.7997 107.217H36.2961C34.8416 107.217 33.6611 108.398 33.6611 109.851V111.005C33.6611 112.463 34.8416 113.642 36.2961 113.642H50.7997C52.2541 113.642 53.4339 112.463 53.4339 111.005V109.851C53.4332 108.398 52.2534 107.217 50.7997 107.217Z" fill="#2E353A"/>
          </svg>
          <?php $dashboard = get_post_meta( $product->id, 'dashboard' )[0]; ?>
          <?php if($dashboard){ ?>
            <p class="singleFeatureDesc"><?php echo $dashboard; ?></p>
          <?php } ?>
        </figure>


        <figure class="singleFeature">
          <svg class="singleFeatureIcon" viewBox="0 0 151 150" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M57.5658 6.26414e-05C61.3173 -0.0169395 64.1732 3.42999 63.0815 6.80391C60.9988 13.2087 58.748 19.566 56.3212 25.8473C55.8691 27.0224 54.4229 28.1501 53.1808 28.6306C47.6436 30.7554 42.7815 33.8103 38.6325 38.0528C35.3156 41.4467 32.6362 45.3102 30.874 49.6627C29.0693 54.1138 26.1009 56.7566 21.5044 58.0918C16.3932 59.578 11.4146 61.5177 6.38498 63.2854C4.60525 63.917 3.15507 63.2429 1.88792 62.1368C0.341725 60.7921 -0.286353 59.0614 0.121198 56.9921C1.29334 51.0184 2.44449 45.0427 3.59063 39.0674C3.69664 38.5323 3.70114 37.9838 3.74715 37.4412C3.96618 35.0464 5.11232 33.2832 6.88304 31.593C11.4016 27.2805 17.3913 25.2297 21.7094 20.7126C26.512 15.6955 28.5487 9.9828 32.5912 5.65877C34.3129 3.81704 36.4872 3.86454 38.532 3.44749C44.3392 2.25884 50.1804 1.27772 56.0106 0.22359C56.5997 0.113577 57.1963 0.0520691 57.5658 6.26414e-05ZM58.2154 7.27197C59.6106 7.24996 60.7442 6.06382 60.6932 4.67414C60.6462 3.28547 59.4001 2.18783 57.9099 2.22384C56.6907 2.25784 55.6381 3.5085 55.6551 4.90217C55.6741 6.20083 56.8482 7.28897 58.2154 7.27197ZM5.57788 55.1589C4.10469 55.1674 3.06406 56.1725 3.08757 57.5612C3.11107 58.8609 4.27871 59.989 5.55887 59.951C6.83303 59.914 7.86916 58.8354 7.86916 57.5422C7.87316 56.251 6.81153 55.1544 5.57788 55.1589Z" fill="#2E353A"/>
            <path d="M95.4953 121.524C94.3467 121.524 93.4146 122.458 93.4146 123.608C93.4146 124.758 94.3467 125.689 95.4953 125.689C96.6459 125.689 97.5736 124.758 97.5736 123.608C97.5736 122.458 96.6459 121.524 95.4953 121.524Z" fill="#2E353A"/>
            <path d="M49.6696 46.4154C50.8182 46.4154 51.7483 45.4833 51.7483 44.3317C51.7483 43.182 50.8182 42.2529 49.6696 42.2529C48.5184 42.2529 47.5908 43.1815 47.5908 44.3317C47.5908 45.4833 48.5184 46.4154 49.6696 46.4154Z" fill="#2E353A"/>
            <path d="M37.1362 103.153C37.1362 104.301 38.0743 105.236 39.2235 105.236C40.3676 105.236 41.3037 104.301 41.3037 103.153C41.3037 102.003 40.3676 101.071 39.2235 101.071C38.0743 101.071 37.1362 102.003 37.1362 103.153Z" fill="#2E353A"/>
            <path d="M79.7916 9.84884C74.2074 9.84484 68.7632 10.5254 63.5406 11.7766C61.7784 17.0412 59.9246 22.2759 57.9264 27.4525C57.4718 28.6267 56.0281 29.7543 54.786 30.2359C49.2508 32.3591 44.3847 35.4135 40.2382 39.656C36.9193 43.051 34.2419 46.9134 32.4797 51.267C31.072 54.7394 28.9403 57.1007 25.8974 58.6079C26.1394 58.9489 26.314 59.3445 26.314 59.7925C26.314 60.9447 25.3818 61.8763 24.2332 61.8763C23.1501 61.8763 22.2925 61.0387 22.1904 59.9826C18.6825 61.0407 15.2326 62.2819 11.7801 63.5325C10.328 69.5803 9.64638 75.9331 9.87191 82.4934C11.1541 119.239 41.5163 150.232 80.4527 149.999C119.18 149.764 150.231 118.132 150.019 79.0564C149.814 40.9682 118.038 9.65031 79.7916 9.84884ZM14.9185 93.3417C13.7694 93.3417 12.8353 92.4091 12.8353 91.2625C12.8353 90.1108 13.7694 89.1812 14.9185 89.1812C16.0647 89.1812 16.9988 90.1108 16.9988 91.2625C16.9988 92.4091 16.0647 93.3417 14.9185 93.3417ZM14.9185 70.5969C13.7694 70.5969 12.8353 69.6673 12.8353 68.5151C12.8353 67.3645 13.7694 66.4364 14.9185 66.4364C16.0647 66.4364 16.9988 67.364 16.9988 68.5151C16.9988 69.6668 16.0647 70.5969 14.9185 70.5969ZM18.547 79.922C18.547 78.7754 19.4811 77.8418 20.6322 77.8418C21.7784 77.8418 22.7105 78.7754 22.7105 79.922C22.7105 81.0707 21.7784 82.0053 20.6322 82.0053C19.4811 82.0053 18.547 81.0707 18.547 79.922ZM22.7105 115.007C21.5619 115.007 20.6322 114.078 20.6322 112.929C20.6322 111.78 21.5619 110.846 22.7105 110.846C23.8616 110.846 24.7913 111.78 24.7913 112.929C24.7913 114.078 23.8616 115.007 22.7105 115.007ZM24.2332 102.421C23.0821 102.421 22.1544 101.488 22.1544 100.341C22.1544 99.1889 23.0821 98.2593 24.2332 98.2593C25.3818 98.2593 26.314 99.1889 26.314 100.341C26.314 101.488 25.3818 102.421 24.2332 102.421ZM137.007 44.8877C138.157 44.8877 139.089 45.8188 139.089 46.9674C139.089 48.1161 138.157 49.0482 137.007 49.0482C135.86 49.0482 134.926 48.1161 134.926 46.9674C134.926 45.8183 135.861 44.8877 137.007 44.8877ZM135.58 57.4287C136.725 57.4287 137.661 58.3629 137.661 59.5105C137.661 60.6591 136.725 61.5913 135.58 61.5913C134.429 61.5913 133.493 60.6591 133.493 59.5105C133.493 58.3629 134.429 57.4287 135.58 57.4287ZM129.172 71.915C129.172 74.0628 127.548 75.7085 125.427 75.7085C123.289 75.7085 121.688 74.0883 121.69 71.917C121.69 69.7428 123.297 68.1151 125.418 68.1366C127.559 68.1581 129.174 69.7848 129.172 71.915ZM84.1886 111.596C86.1104 111.578 87.395 112.43 88.0511 114.226C88.5292 115.533 89.0212 116.84 89.4783 118.156C90.1979 120.227 89.2488 122.156 87.1065 122.525C84.5842 122.963 82.0404 123.396 79.5461 123.396C77.0533 123.392 74.6795 122.974 72.3417 122.558C70.0614 122.152 69.0658 120.27 69.7878 118.127C70.2319 116.808 70.7175 115.498 71.225 114.202C71.9321 112.402 73.1853 111.595 75.128 111.601C78.1444 111.61 81.1678 111.623 84.1886 111.596ZM77.5093 106.957C77.5798 105.76 78.2419 105.023 79.4606 104.921C80.7347 104.813 81.7428 105.743 81.7448 107.001C81.7448 108.344 80.9362 108.96 79.9616 109.138C78.4604 109.172 77.4413 108.195 77.5093 106.957ZM78.4714 102.649C65.3283 101.93 56.2667 90.6869 56.9838 78.8054C57.5253 65.7723 69.0528 56.4856 80.9342 57.3102C93.8968 58.2148 103.186 69.0307 102.281 81.4962C101.29 95.0744 89.8924 103.274 78.4714 102.649ZM38.898 94.3378L36.4327 81.3667C36.4307 77.5167 37.6859 76.4561 41.4458 77.1277C41.6729 77.1687 41.9129 77.1552 42.1424 77.2057C45.7644 77.9478 47.5481 77.4947 47.9916 83.1694C48.1662 85.3512 48.7367 87.513 49.2233 89.6603C49.6734 91.634 49.1953 93.0902 47.4841 94.1568C46.2994 94.8964 45.0828 95.5865 43.8511 96.2491C41.6029 97.4587 39.5756 96.8186 38.898 94.3378ZM43.113 103.105C43.13 105.385 41.5588 107.02 39.3591 107.01C37.2888 106.997 35.5666 105.288 35.5691 103.253C35.5736 101.224 37.2908 99.4735 39.3311 99.416C41.4118 99.3555 43.098 101.003 43.113 103.105ZM54.0434 66.4449C54.1684 65.1857 54.948 64.3416 56.2112 64.3331C57.4783 64.3226 58.2324 65.1092 58.3259 66.4259C58.3324 67.772 57.5698 68.4771 56.3192 68.6341C55.247 68.7732 53.9394 67.5235 54.0434 66.4449ZM58.3219 93.2082C58.3089 94.7749 57.3578 95.768 56.1392 95.655C54.878 95.535 54.1644 94.7204 54.0439 93.5052C53.9399 92.4506 55.256 91.1729 56.2967 91.3205C57.4848 91.49 58.3149 92.1386 58.3219 93.2082ZM54.5085 60.3361C53.0308 62.8404 51.5441 65.3427 50.1324 67.8865C49.2913 69.4047 48.1767 70.3244 46.3549 70.2633C44.6392 69.9628 42.894 69.7613 41.2058 69.3397C39.3166 68.8652 38.393 66.9584 39.085 65.0357C40.7472 60.3731 43.2316 56.1626 46.3634 52.3441C47.6866 50.7359 49.8394 50.6689 51.2766 52.1816C52.4022 53.3632 53.4828 54.5999 54.4534 55.9121C55.4961 57.3212 55.3916 58.8349 54.5085 60.3361ZM46.4039 103.971C48.4977 102.649 50.612 101.286 52.8943 100.378C53.6563 100.071 55.094 100.847 55.9496 101.492C58.2259 103.201 60.3257 105.156 62.5615 106.929C64.0716 108.132 64.7102 109.524 64.1582 111.367C63.7061 112.871 63.156 114.352 62.5465 115.798C61.7439 117.69 59.8731 118.419 58.0789 117.432C53.5883 114.947 49.7344 111.651 46.482 107.685C46.0679 107.182 45.7004 106.486 45.6899 105.77C45.6824 105.053 45.9834 104.237 46.4039 103.971ZM77.4583 52.9402C77.5498 51.68 78.3184 50.9274 79.5711 50.7999C80.6602 50.6874 81.7513 51.712 81.7813 52.7737C81.7408 54.1303 81.0702 54.9809 79.7111 55.1135C78.5819 55.2265 77.3753 54.0633 77.4583 52.9402ZM103.039 91.3445C104.271 91.327 105.082 92.1901 105.224 93.4442C105.349 94.5334 104.103 95.764 102.99 95.6525C101.725 95.5255 100.959 94.8309 100.973 93.2487C100.965 92.0846 101.837 91.361 103.039 91.3445ZM103.101 68.6466C101.946 68.7562 100.836 67.618 100.914 66.4409C100.997 65.1777 101.734 64.4566 103.084 64.2951C104.112 64.2806 105.332 65.4332 105.224 66.5184C105.099 67.755 104.335 68.5296 103.101 68.6466ZM104.967 60.6026C103.908 58.9314 103.774 57.3357 104.974 55.7635C105.886 54.5544 106.857 53.3847 107.9 52.2806C109.426 50.6564 111.477 50.6754 112.912 52.3876C116.08 56.1746 118.564 60.3796 120.193 65.0552C120.936 67.188 119.752 69.0502 117.529 69.4597C116.212 69.7048 114.892 69.9353 113.571 70.1563C113.378 70.1883 113.176 70.1688 113.259 70.1628C110.974 70.2698 109.894 69.3062 109.061 67.702C107.8 65.2812 106.413 62.9179 104.967 60.6026ZM110.059 89.6043C110.653 86.8264 111.148 84.0186 111.539 81.2047C111.787 79.4475 112.583 78.2328 114.292 77.8048C115.924 77.4012 117.59 77.0742 119.259 76.8742C121.247 76.6366 122.758 78.0518 122.822 80.0316C122.841 80.5581 122.873 81.0852 122.824 81.6078C122.512 84.8532 120.359 94.4073 120.359 94.4073C119.711 96.7736 117.662 97.4497 115.516 96.3071C114.229 95.6275 112.967 94.8919 111.747 94.1078C110.024 93.0107 109.632 91.606 110.059 89.6043ZM127.4 41.9063C127.4 43.055 126.467 43.9871 125.317 43.9871C124.168 43.9871 123.233 43.055 123.233 41.9063C123.233 40.7557 124.168 39.8236 125.317 39.8236C126.467 39.8236 127.4 40.7557 127.4 41.9063ZM122.21 27.461C123.361 27.461 124.293 28.3921 124.293 29.5418C124.293 30.6914 123.361 31.6235 122.21 31.6235C121.064 31.6235 120.132 30.6914 120.132 29.5418C120.132 28.3921 121.064 27.461 122.21 27.461ZM114.984 47.616C118.244 46.1298 120.921 46.6244 122.938 49.5958C124.756 52.2741 126.373 55.1185 127.811 58.0188C129.195 60.8152 128.261 63.573 125.787 65.3947C125.254 65.7853 124.316 66.3394 124.316 66.3394C122.845 63.2185 121.484 60.1641 119.575 56.9102C117.658 53.6353 116.059 51.348 113.915 48.3346C113.915 48.3346 114.532 47.8221 114.984 47.616ZM109.487 26.5139C110.638 26.5139 111.575 27.445 111.575 28.5947C111.575 29.7433 110.638 30.6774 109.487 30.6774C108.343 30.6774 107.407 29.7433 107.407 28.5947C107.407 27.445 108.343 26.5139 109.487 26.5139ZM109.607 40.6467C111.794 40.6922 113.342 42.2909 113.293 44.4526C113.246 46.6244 111.656 48.1376 109.441 48.1161C107.401 48.0951 105.73 46.4619 105.698 44.4676C105.661 42.2869 107.392 40.5987 109.607 40.6467ZM102.442 15.9316C103.589 15.9316 104.525 16.8637 104.525 18.0149C104.525 19.166 103.589 20.0986 102.442 20.0986C101.289 20.0986 100.357 19.1655 100.357 18.0149C100.357 16.8642 101.29 15.9316 102.442 15.9316ZM90.1344 19.4C91.287 19.4 92.2211 20.3276 92.2211 21.4788C92.2211 22.6284 91.287 23.5595 90.1344 23.5595C88.9852 23.5595 88.0556 22.6284 88.0556 21.4788C88.0556 20.3281 88.9852 19.4 90.1344 19.4ZM85.9559 32.3901C87.5166 29.1662 89.8988 27.8391 93.3423 28.8442C96.4487 29.7498 99.5105 30.908 102.47 32.2266C105.319 33.4943 106.358 36.2151 105.617 39.196C105.456 39.8361 105.082 40.8607 105.082 40.8607C101.959 39.3975 98.967 37.9103 95.419 36.6207C91.8566 35.3235 89.1663 34.5824 85.5888 33.6293C85.5883 33.6293 85.7388 32.8372 85.9559 32.3901ZM89.7773 37.9723C93.3548 39.1275 96.8837 40.4956 100.307 42.0573C103.297 43.4225 103.613 45.5863 101.498 48.0616C97.6778 52.5376 97.5998 53.4253 91.8221 50.5469C90.4374 49.8578 88.8837 49.4908 87.372 49.0817C84.1976 48.2186 83.4735 47.331 83.4735 44.0771C83.4735 43.6695 83.4735 43.262 83.4735 42.8529C83.0065 36.9882 85.9004 36.7217 89.7773 37.9723ZM79.9236 11.7706C81.0723 11.7706 82.0084 12.7017 82.0084 13.8543C82.0084 15.002 81.0723 15.9316 79.9236 15.9316C78.777 15.9316 77.8403 15.002 77.8403 13.8543C77.8403 12.7012 78.777 11.7706 79.9236 11.7706ZM79.7476 29.7498C81.8814 29.8038 83.5096 31.513 83.423 33.6098C83.34 35.7956 81.7438 37.2652 79.5271 37.1992C77.3568 37.1347 75.7666 35.487 75.8346 33.3743C75.9021 31.2735 77.6088 29.6948 79.7476 29.7498ZM75.7831 41.1042C75.7876 41.7453 75.7831 42.3854 75.7831 43.028C75.7831 43.733 75.7956 44.4346 75.7791 45.1312C75.7321 46.9805 74.7765 48.1641 73.0718 48.7587C70.2819 49.7268 67.5026 50.7269 64.7487 51.7905C62.8995 52.5061 61.5063 52.3126 60.1577 50.8414C59.1345 49.7268 58.1409 48.5717 57.2318 47.357C55.8726 45.5578 56.2407 43.6095 58.2019 42.4569C62.3484 40.0151 66.816 38.3694 71.5466 37.5258C74.3754 37.0212 75.7686 38.2874 75.7831 41.1042ZM69.4858 19.4C70.6345 19.4 71.5731 20.3276 71.5731 21.4788C71.5731 22.6284 70.6345 23.5595 69.4858 23.5595C68.3347 23.5595 67.4051 22.6284 67.4051 21.4788C67.4051 20.3281 68.3347 19.4 69.4858 19.4ZM56.9523 32.4006C59.9121 31.082 62.9695 29.9248 66.0779 29.0202C69.5283 28.0151 71.9041 29.3433 73.4643 32.5672C73.6813 33.0152 73.8339 33.8043 73.8339 33.8043C70.2584 34.7574 67.5616 35.4985 64.0011 36.7967C60.4597 38.0878 57.4618 39.572 54.3384 41.0367C54.3384 41.0367 53.9649 40.0101 53.8059 39.373C53.0623 36.3936 54.1009 33.6708 56.9523 32.4006ZM49.7164 40.6442C51.8461 40.6112 53.5208 42.2204 53.5678 44.3436C53.6058 46.4149 51.9176 48.0891 49.7799 48.1091C47.5971 48.1261 45.9899 46.5669 45.9834 44.4106C45.9769 42.2549 47.5376 40.6762 49.7164 40.6442ZM31.5331 58.0188C32.9723 55.1185 34.59 52.2746 36.4037 49.5958C38.4225 46.6244 41.0983 46.1293 44.3592 47.616C44.8132 47.8221 45.4318 48.3351 45.4318 48.3351C43.2851 51.349 41.6844 53.6358 39.7671 56.9107C37.8604 60.1646 36.5017 63.219 35.0295 66.3399C35.0295 66.3399 34.0889 65.7858 33.5563 65.3952C31.0825 63.573 30.1524 60.8152 31.5331 58.0188ZM33.8109 68.1226C35.9021 68.0866 37.5884 69.7393 37.6284 71.868C37.6669 73.9753 36.0342 75.659 33.9044 75.713C31.8236 75.76 30.1399 74.1038 30.1019 71.9711C30.0634 69.8643 31.7046 68.1581 33.8109 68.1226ZM28.6682 94.1318C27.8851 90.9849 27.2801 87.7735 26.94 84.5526C26.558 80.9827 28.2822 78.8759 31.7256 77.9053C32.2077 77.7688 33.0103 77.7598 33.0103 77.7598C33.3198 81.4467 33.5794 84.2286 34.2329 87.965C34.876 91.6805 35.8081 94.8899 36.7042 98.2213C36.7042 98.2213 35.6281 98.4108 34.976 98.4508C31.9086 98.6609 29.4133 97.1617 28.6682 94.1318ZM32.4542 117.9C32.4542 116.75 33.3858 115.817 34.537 115.817C35.6876 115.817 36.6177 116.75 36.6177 117.9C36.6177 119.049 35.6876 119.98 34.537 119.98C33.3863 119.98 32.4542 119.049 32.4542 117.9ZM37.6374 132.456C36.4882 132.456 35.5586 131.522 35.5586 130.373C35.5586 129.225 36.4882 128.292 37.6374 128.292C38.788 128.292 39.7181 129.225 39.7181 130.373C39.7181 131.522 38.7875 132.456 37.6374 132.456ZM50.2254 133.215C49.0748 133.215 48.1472 132.284 48.1472 131.137C48.1472 129.984 49.0748 129.054 50.2254 129.054C51.3766 129.054 52.3062 129.984 52.3062 131.137C52.3067 132.284 51.3766 133.215 50.2254 133.215ZM49.7164 123.457C47.0855 121.567 44.5437 119.512 42.1959 117.284C39.5881 114.81 39.5356 112.09 41.5268 109.114C41.8029 108.702 42.4125 108.172 42.4125 108.172C45.0413 110.779 47.039 112.729 49.9584 115.15C52.8612 117.561 55.6556 119.397 58.4899 121.354C58.4899 121.354 57.7934 122.195 57.3243 122.656C55.126 124.799 52.2557 125.276 49.7164 123.457ZM57.3933 143.835C56.2427 143.835 55.3106 142.901 55.3106 141.751C55.3106 140.603 56.2427 139.67 57.3933 139.67C58.54 139.67 59.4721 140.603 59.4721 141.751C59.4726 142.901 58.54 143.835 57.3933 143.835ZM63.7021 127.429C61.5978 127.409 59.8801 125.697 59.9311 123.675C59.9841 121.522 61.7829 119.76 63.8631 119.818C65.8164 119.872 67.5961 121.767 67.5581 123.753C67.5191 125.833 65.8254 127.445 63.7021 127.429ZM69.5368 140.339C68.3817 140.339 67.4496 139.406 67.4496 138.26C67.4496 137.109 68.3817 136.178 69.5368 136.178C70.681 136.178 71.6131 137.109 71.6131 138.26C71.6131 139.406 70.681 140.339 69.5368 140.339ZM79.6581 147.995C78.5074 147.995 77.5773 147.063 77.5773 145.914C77.5773 144.763 78.5074 143.835 79.6581 143.835C80.8067 143.835 81.7368 144.763 81.7368 145.914C81.7368 147.063 80.8067 147.995 79.6581 147.995ZM74.7875 132.576C71.6726 132.38 69.7533 130.192 69.4138 127.141C69.3373 126.485 69.3288 125.393 69.3288 125.393C72.7707 125.678 76.0911 126.027 79.8641 126.001C83.6541 125.972 86.4379 125.733 90.1214 125.378C90.1214 125.378 90.2574 126.172 90.2109 126.668C89.8668 130.233 88.1001 132.305 84.5227 132.566C81.2948 132.803 78.0254 132.78 74.7875 132.576ZM90.3319 140.339C89.1833 140.339 88.2491 139.406 88.2491 138.26C88.2491 137.109 89.1833 136.178 90.3319 136.178C91.4825 136.178 92.4147 137.109 92.4147 138.26C92.4147 139.406 91.482 140.339 90.3319 140.339ZM95.6421 127.439C93.4358 127.48 91.6946 125.784 91.7161 123.618C91.7351 121.654 93.4143 119.978 95.4295 119.901C97.5313 119.823 99.26 121.471 99.283 123.568C99.309 125.76 97.7588 127.401 95.6421 127.439ZM96.8412 115.859C96.0596 114.527 95.6036 112.984 95.13 111.488C94.5249 109.558 95.13 108.211 96.7652 106.909C98.9945 105.132 101.177 103.282 103.318 101.399C104.774 100.124 106.241 99.836 107.961 100.751C109.195 101.407 110.424 102.087 111.609 102.827C113.772 104.175 114.068 106.191 112.439 108.144C109.488 111.676 105.954 114.533 102.082 116.971C101.36 117.424 100.581 118.39 99.2965 118.17C98.2149 117.988 97.3978 116.806 96.8412 115.859ZM102.34 143.835C101.19 143.835 100.256 142.901 100.256 141.751C100.256 140.603 101.19 139.67 102.34 139.67C103.485 139.67 104.419 140.603 104.419 141.751C104.42 142.901 103.485 143.835 102.34 143.835ZM109.549 133.215C108.4 133.215 107.471 132.284 107.471 131.137C107.471 129.984 108.4 129.054 109.549 129.054C110.7 129.054 111.63 129.984 111.63 131.137C111.63 132.284 110.7 133.215 109.549 133.215ZM117.293 117.284C114.944 119.512 112.397 121.567 109.766 123.457C107.235 125.276 104.36 124.799 102.162 122.656C101.689 122.195 100.992 121.354 100.992 121.354C103.836 119.397 106.625 117.561 109.532 115.15C112.447 112.729 114.445 110.779 117.069 108.172C117.069 108.172 117.677 108.702 117.955 109.114C119.953 112.09 119.898 114.81 117.293 117.284ZM116.161 103.201C116.163 101.121 117.883 99.3915 119.938 99.408C121.934 99.4285 123.714 101.247 123.716 103.274C123.72 105.317 121.962 107.018 119.875 107C117.734 106.982 116.159 105.376 116.161 103.201ZM122.227 132.456C121.081 132.456 120.144 131.522 120.144 130.373C120.144 129.225 121.081 128.292 122.227 128.292C123.376 128.292 124.31 129.225 124.31 130.373C124.31 131.522 123.376 132.456 122.227 132.456ZM125.272 120.252C124.121 120.252 123.191 119.319 123.191 118.17C123.191 117.021 124.121 116.089 125.272 116.089C126.42 116.089 127.351 117.021 127.351 118.17C127.351 119.318 126.42 120.252 125.272 120.252ZM132.225 84.4586C131.928 87.6815 131.372 90.9059 130.643 94.0603C129.939 97.1017 127.467 98.6419 124.402 98.4798C123.744 98.4468 122.662 98.2768 122.662 98.2768C123.507 94.9324 124.393 91.7075 124.981 87.9805C125.574 84.2371 125.79 81.4502 126.043 77.7598C126.043 77.7598 126.851 77.7578 127.327 77.8838C130.792 78.8029 132.546 80.8842 132.225 84.4586ZM133.493 100.262C133.493 99.1099 134.429 98.1793 135.58 98.1793C136.725 98.1793 137.661 99.1099 137.661 100.262C137.661 101.41 136.725 102.341 135.58 102.341C134.429 102.341 133.493 101.41 133.493 100.262ZM136.922 115.007C135.774 115.007 134.839 114.078 134.839 112.929C134.839 111.78 135.774 110.846 136.922 110.846C138.071 110.846 139.001 111.78 139.001 112.929C139.001 114.078 138.07 115.007 136.922 115.007ZM139.298 82.0053C138.149 82.0053 137.215 81.0707 137.215 79.922C137.215 78.7754 138.149 77.8418 139.298 77.8418C140.447 77.8418 141.379 78.7754 141.379 79.922C141.379 81.0707 140.446 82.0053 139.298 82.0053ZM144.763 70.5069C143.614 70.5069 142.682 69.5748 142.682 68.4231C142.682 67.2755 143.614 66.3444 144.763 66.3444C145.912 66.3444 146.844 67.2755 146.844 68.4231C146.844 69.5743 145.912 70.5069 144.763 70.5069Z" fill="#2E353A"/>
            <path d="M79.6047 35.528C80.7538 35.528 81.6879 34.5939 81.6879 33.4453C81.6879 32.2976 80.7538 31.3635 79.6047 31.3635C78.4585 31.3635 77.5244 32.2976 77.5244 33.4453C77.5244 34.5939 78.4585 35.528 79.6047 35.528Z" fill="#2E353A"/>
            <path d="M125.346 69.7283C124.195 69.7283 123.261 70.6604 123.261 71.808C123.261 72.9592 124.195 73.8933 125.346 73.8933C126.492 73.8933 127.426 72.9592 127.426 71.808C127.426 70.6604 126.492 69.7283 125.346 69.7283Z" fill="#2E353A"/>
            <path d="M63.7125 121.44C62.5658 121.44 61.6362 122.37 61.6362 123.519C61.6362 124.671 62.5658 125.601 63.7125 125.601C64.8631 125.601 65.7932 124.671 65.7932 123.519C65.7932 122.37 64.8631 121.44 63.7125 121.44Z" fill="#2E353A"/>
            <path d="M33.8664 73.9794C35.015 73.9794 35.9447 73.0473 35.9447 71.8987C35.9447 70.749 35.015 69.8169 33.8664 69.8169C32.7153 69.8169 31.7856 70.749 31.7856 71.8987C31.7856 73.0473 32.7153 73.9794 33.8664 73.9794Z" fill="#2E353A"/>
            <path d="M119.9 100.985C118.754 100.985 117.817 101.917 117.817 103.064C117.817 104.215 118.754 105.147 119.9 105.147C121.049 105.147 121.985 104.215 121.985 103.064C121.985 101.917 121.048 100.985 119.9 100.985Z" fill="#2E353A"/>
            <path d="M109.545 46.3698C110.691 46.3698 111.623 45.4377 111.623 44.289C111.623 43.1394 110.691 42.2073 109.545 42.2073C108.39 42.2073 107.462 43.1394 107.462 44.289C107.461 45.4372 108.39 46.3698 109.545 46.3698Z" fill="#2E353A"/>
          </svg>
          <?php $brake = get_post_meta( $product->id, 'brake' )[0]; ?>
          <?php if($brake){ ?>
            <p class="singleFeatureDesc"><?php echo $brake; ?></p>
          <?php } ?>
        </figure>

        <figure class="singleFeature">
          <svg class="singleFeatureIcon" viewBox="0 0 153 150" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M49.9978 102.273C52.0745 104.355 53.6615 106.755 54.7785 109.313L76.1263 87.1335L97.4762 109.313C98.5912 106.755 100.178 104.355 102.255 102.273C104.337 100.192 106.734 98.6072 109.3 97.4902L86.7038 76.1378L107.027 55.0244C105.731 53.5237 104.261 51.9322 102.537 50.2107C100.818 48.4893 99.2261 47.0185 97.7269 45.7178L76.1263 66.1363L54.5253 45.7183C53.0225 47.019 51.4356 48.4898 49.7121 50.2112C47.9921 51.9327 46.5224 53.5243 45.2206 55.025L65.5489 76.1383L42.9541 97.4907C45.518 98.6077 47.916 100.192 49.9978 102.273Z" fill="#2E353A"/>
            <path d="M61.4323 118.399L59.8799 119.949L56.609 116.678C56.9698 121.403 55.8777 126.245 53.2361 130.485C53.8654 132.526 53.3482 134.794 51.7699 136.367C50.1997 137.937 47.9347 138.465 45.8879 137.833C41.6502 140.475 36.8091 141.569 32.0791 141.204L35.352 144.477L33.8026 146.03L37.7723 150L39.3217 148.45L40.4093 149.533L64.9382 125.005L63.8547 123.924L65.4051 122.375L61.4323 118.399Z" fill="#2E353A"/>
            <path d="M14.4361 106.383C13.8068 104.337 14.327 102.072 15.8972 100.496C17.475 98.9236 19.74 98.4008 21.7822 99.0352C26.0296 96.3911 30.8656 95.2994 35.589 95.6623L32.3181 92.3914L33.8706 90.839L29.8978 86.8667L28.3453 88.4141L27.2649 87.3361L2.737 111.859L3.82256 112.94L2.26807 114.494L6.24287 118.467L7.79229 116.915L11.0652 120.19C10.7074 115.463 11.7945 110.623 14.4361 106.383Z" fill="#2E353A"/>
            <path d="M45.6716 135.344C47.0997 136.22 48.9841 136.053 50.2184 134.817C51.4582 133.581 51.6257 131.692 50.7477 130.268C56.4029 122.206 55.6472 111.022 48.4451 103.825C41.2441 96.6234 30.0581 95.8682 22.003 101.52C20.5738 100.644 18.6874 100.812 17.4542 102.05C16.2133 103.284 16.0459 105.172 16.9309 106.594C11.2768 114.658 12.0315 125.84 19.2264 133.039C26.429 140.239 37.6099 140.994 45.6716 135.344ZM23.7595 128.51C18.1946 122.943 18.1946 113.92 23.7595 108.353C29.3233 102.792 38.3483 102.792 43.9172 108.353C49.4769 113.92 49.4769 122.943 43.9172 128.51C38.3488 134.073 29.3233 134.073 23.7595 128.51Z" fill="#2E353A"/>
            <path d="M152.252 36.7598L115.493 0L112.528 2.96537L149.291 39.7267L152.252 36.7598Z" fill="#2E353A"/>
            <path d="M104.499 47.7509C113.679 56.9342 116.377 63.309 116.303 69.1565L118.081 70.9363L142.906 46.1106L106.142 9.35181L81.3184 34.174L83.0936 35.9503C88.9386 35.8772 95.32 38.5721 104.499 47.7509ZM106.988 36.9014C109.3 34.5912 113.047 34.5912 115.356 36.9014C117.665 39.207 117.665 42.9559 115.356 45.2625C113.046 47.5768 109.299 47.5768 106.988 45.2625C104.68 42.9559 104.68 39.2075 106.988 36.9014Z" fill="#2E353A"/>
            <path d="M147.088 41.9241L110.326 5.16333L108.344 7.15428L145.099 43.9131L147.088 41.9241Z" fill="#2E353A"/>
            <path d="M106.364 137.832C104.319 138.464 102.053 137.937 100.477 136.366C98.9004 134.793 98.3868 132.526 99.0161 130.484C96.3705 126.245 95.2834 121.402 95.6382 116.677L92.3673 119.948L90.8179 118.398L86.8481 122.374L88.3976 123.923L87.3151 125.004L111.843 149.532L112.925 148.449L114.475 149.999L118.451 146.029L116.896 144.476L120.169 141.203C115.444 141.568 110.602 140.474 106.364 137.832Z" fill="#2E353A"/>
            <path d="M149.515 111.859L124.982 87.3361L123.902 88.4141L122.354 86.8667L118.378 90.839L119.93 92.3914L116.659 95.6623C121.382 95.2994 126.226 96.3916 130.463 99.0352C132.508 98.4008 134.777 98.9236 136.35 100.496C137.921 102.072 138.445 104.337 137.811 106.383C140.458 110.623 141.545 115.463 141.185 120.19L144.46 116.915L146.009 118.467L149.985 114.494L148.426 112.94L149.515 111.859Z" fill="#2E353A"/>
            <path d="M134.803 102.051C133.565 100.813 131.679 100.645 130.249 101.521C122.19 95.8687 111.009 96.6238 103.807 103.825C96.6093 111.023 95.8521 122.207 101.504 130.269C100.626 131.693 100.794 133.581 102.029 134.817C103.265 136.054 105.152 136.221 106.58 135.345C114.637 140.995 125.819 140.24 133.021 133.04C140.222 125.84 140.976 114.659 135.321 106.595C136.201 105.173 136.034 103.284 134.803 102.051ZM128.489 128.51C122.925 134.074 113.899 134.074 108.34 128.51C102.771 122.943 102.771 113.92 108.34 108.353C113.899 102.792 122.925 102.792 128.489 108.353C134.057 113.92 134.057 122.943 128.489 128.51Z" fill="#2E353A"/>
            <path d="M39.7196 2.96537L36.7598 0L0 36.7598L2.96181 39.7267L39.7196 2.96537Z" fill="#2E353A"/>
            <path d="M34.1712 70.9363L35.9485 69.1565C35.8744 63.309 38.5673 56.9342 47.7481 47.7509C56.932 38.5721 63.3134 35.8772 69.1548 35.9503L70.929 34.174L46.1109 9.35181L9.35107 46.1106L34.1712 70.9363ZM36.8971 36.9014C39.2108 34.5912 42.9537 34.5912 45.2603 36.9014C47.5669 39.207 47.5669 42.9559 45.2603 45.2625C42.9537 47.5768 39.2108 47.5768 36.8971 45.2625C34.5874 42.9559 34.5874 39.2075 36.8971 36.9014Z" fill="#2E353A"/>
            <path d="M7.14842 43.9131L43.9128 7.15428L41.9264 5.16333L5.16406 41.9241L7.14842 43.9131Z" fill="#2E353A"/>
          </svg>
          <?php $engine = get_post_meta( $product->id, 'engine' )[0]; ?>
          <?php if($engine){ ?>
            <p class="singleFeatureDesc"><?php echo $engine; ?></p>
          <?php } ?>
        </figure>

        <figure class="singleFeature">
          <svg class="singleFeatureIcon" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M26.5762 104.135L23.2397 107.552L54.6452 115.53L58.0617 112.132L26.5762 104.135Z" fill="#2E353A"/>
            <path d="M63.6519 66.0977L92.2098 73.3542L74.0973 55.3748L63.6519 66.0977Z" fill="#2E353A"/>
            <path d="M40.0426 90.323L36.8066 93.6365L68.5591 101.7L71.8751 98.407L40.0426 90.323Z" fill="#2E353A"/>
            <path d="M10.0893 121.052L14.6698 126.105C8.32835 124.714 1.98436 128.59 0.374358 134.93C-1.26764 141.399 2.64485 147.981 9.11484 149.625C15.5918 151.269 22.1733 147.356 23.8173 140.886C24.1883 139.409 24.2658 137.927 24.0958 136.5L28.5773 141.441L44.1463 125.962L13.0103 118.055L10.0893 121.052ZM17.7808 139.349C16.9853 142.49 13.7898 144.39 10.6458 143.59C7.51185 142.797 5.61135 139.601 6.40785 136.462C7.20435 133.322 10.4013 131.421 13.5373 132.216C16.6773 133.016 18.5763 136.214 17.7808 139.349Z" fill="#2E353A"/>
            <path d="M53.4159 76.5967L50.2744 79.8217L82.3689 87.9757L85.5919 84.7727L53.4159 76.5967Z" fill="#2E353A"/>
            <path d="M95.4928 75.9818L53.6864 65.3603C51.2134 64.7318 48.7114 66.2258 48.0839 68.6938C47.4564 71.1658 48.9459 73.6743 51.4149 74.3008L93.2213 84.9223C95.6903 85.5463 98.1993 84.0543 98.8268 81.5843C99.4548 79.1148 97.9618 76.6058 95.4928 75.9818Z" fill="#2E353A"/>
            <path d="M83.6748 90.0956L41.8703 79.4797C39.3983 78.8487 36.8843 80.3402 36.2613 82.8097C35.6338 85.2802 37.1278 87.7901 39.5953 88.4221L81.4028 99.0316C83.8742 99.6606 86.3823 98.1666 87.0122 95.6986C87.6367 93.2266 86.1437 90.7181 83.6748 90.0956Z" fill="#2E353A"/>
            <path d="M69.8966 103.827L28.0862 93.2081C25.6197 92.5841 23.1112 94.0761 22.4827 96.546C21.8562 99.0175 23.3492 101.527 25.8177 102.151L67.6256 112.77C70.0956 113.397 72.6071 111.906 73.2346 109.437C73.8606 106.964 72.3641 104.456 69.8966 103.827Z" fill="#2E353A"/>
            <path d="M55.0001 117.407L13.1922 106.791C10.7222 106.169 8.21368 107.66 7.58618 110.131C6.95968 112.601 8.45268 115.112 10.9217 115.734L52.7341 126.353C55.1996 126.984 57.7081 125.491 58.3331 123.019C58.9606 120.547 57.4686 118.038 55.0001 117.407Z" fill="#2E353A"/>
            <path d="M136.258 0.549802C126.779 -1.85919 117.148 3.8728 114.739 13.3493C114.339 14.9328 114.184 16.5148 114.217 18.0683L113.716 17.5568C110.579 14.4668 105.528 14.5063 102.437 17.6468L72.9883 47.4037L102.26 77.0637L131.71 47.3112C134.806 44.1697 134.761 39.1192 131.62 36.0252L130.996 35.3917C139.256 35.8132 146.944 30.3843 149.054 22.0638C151.465 12.5863 145.734 2.9533 136.258 0.549802ZM142.169 20.3163C140.728 25.9853 134.964 29.4173 129.294 27.9753C123.62 26.5353 120.187 20.7693 121.624 15.0968C123.066 9.42429 128.841 5.99329 134.509 7.43579C140.178 8.87579 143.609 14.6428 142.169 20.3163Z" fill="#2E353A"/>
          </svg>
          <?php $suspension = get_post_meta( $product->id, 'suspension' )[0]; ?>
          <?php if($suspension){ ?>
            <p class="singleFeatureDesc"><?php echo $suspension; ?></p>
          <?php } ?>
        </figure>




      </div>
      <?php } ?>

    </div>









    <div class="singleSide singleSide2">


      <?php if(!$product->is_type( 'auction' )){ ?>
      <?php testimonial( 'none' ); ?>
      <?php } ?>

      <div class="superFicha">
        <div>
          <p class="singleSideStock2">STOCK #</p>


          <?php if($stockNumber){ ?>
            <p class="singleStock2ID"><?php echo $stockNumber; ?></p>
          <?php } ?>
        </div>
        <figure class="singleSideSintBox">
          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          <figcaption class="singleSideSintBoxCaption">
            <h4 class="singleSideAnoMarca">
              <?php
              // get all the categories on the product
              // $categories = get_the_terms( get_the_ID(), 'product_cat' );
              // for each category
              if($categories){ ?>
                <h4 class="singleSideAnoMarca">
                  <?php foreach ($categories as $cat) {
                    // get the parent category
                    $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A')['slug'];
                    // check if parent is either year or brand
                    if ($parent=="year-bikes" OR $parent=="brand") { ?>
                      <span><?php echo $cat->name; ?></span>
                    <?php }
                  } ?>
                </h4>
              <?php }
              ?>
            </h4>
            <h4 class="singleSideTitle"><?php the_title(); ?></h4>
            <p class="singleSidePrice"><?php echo $product->get_price_html(); ?></p>
            <!-- <p class="singleSideData"><?php echo excerpt(140); ?></p> -->

            <a class="singleSideContact" href="tel:+34-938-364-911">Call: (704) 445-9105</a>

            <!-- <div class="singleSideSocialCont">
            <a class="singleSocialLink" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/GPMotorbikes/producto/motomel-eameo-recatate-gp-1100cc/" target="_blank">
            <svg class="singleSocialSvg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
          </a>
          <a class="singleSocialLink" href="https://twitter.com/home?status=http://localhost/GPMotorbikes/producto/motomel-eameo-recatate-gp-1100cc/" target="_blank">
          <svg class="singleSocialSvg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
        </a>
        <a class="singleSocialLink" href="mailto:Info@gpmotorbikes.com">
        <svg class="singleSocialSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path>
      </svg>
    </a>
  </div> -->


  <div class="singleSideSocialCont socialMedia">

    <a href="https://www.instagram.com/gpmotorbikes/?hl=es" target="_blank" class="socialMediaLink socialMediaInst">
      <svg viewBox="0 0 501 500" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M250.112 121.806C179.153 121.806 121.918 179.042 121.918 250C121.918 320.958 179.153 378.194 250.112 378.194C321.07 378.194 378.305 320.958 378.305 250C378.305 179.042 321.07 121.806 250.112 121.806ZM250.112 333.343C204.256 333.343 166.769 295.967 166.769 250C166.769 204.033 204.145 166.657 250.112 166.657C296.078 166.657 333.454 204.033 333.454 250C333.454 295.967 295.967 333.343 250.112 333.343V333.343ZM413.45 116.563C413.45 133.186 400.061 146.463 383.549 146.463C366.925 146.463 353.648 133.075 353.648 116.563C353.648 100.05 367.037 86.6618 383.549 86.6618C400.061 86.6618 413.45 100.05 413.45 116.563ZM498.354 146.91C496.458 106.856 487.309 71.3768 457.966 42.1455C428.735 12.9142 393.256 3.76548 353.202 1.75722C311.921 -0.585741 188.19 -0.585741 146.91 1.75722C106.968 3.65391 71.4883 12.8026 42.1455 42.0339C12.8026 71.2652 3.76548 106.744 1.75722 146.798C-0.585741 188.079 -0.585741 311.81 1.75722 353.09C3.65391 393.144 12.8026 428.623 42.1455 457.855C71.4883 487.086 106.856 496.234 146.91 498.243C188.19 500.586 311.921 500.586 353.202 498.243C393.256 496.346 428.735 487.197 457.966 457.855C487.197 428.623 496.346 393.144 498.354 353.09C500.697 311.81 500.697 188.19 498.354 146.91V146.91ZM445.024 397.384C436.322 419.251 419.475 436.098 397.495 444.912C364.582 457.966 286.483 454.954 250.112 454.954C213.74 454.954 135.529 457.855 102.728 444.912C80.8602 436.21 64.0132 419.363 55.1992 397.384C42.1455 364.471 45.1579 286.372 45.1579 250C45.1579 213.628 42.2571 135.418 55.1992 102.616C63.9016 80.7486 80.7486 63.9016 102.728 55.0876C135.641 42.0339 213.74 45.0463 250.112 45.0463C286.483 45.0463 364.694 42.1455 397.495 55.0876C419.363 63.79 436.21 80.6371 445.024 102.616C458.078 135.529 455.065 213.628 455.065 250C455.065 286.372 458.078 364.582 445.024 397.384Z" fill="currentColor"/>
      </svg>
    </a>

    <a href="https://es-la.facebook.com/gpmotorbikes/" target="_blank" class="socialMediaLink socialMediaFace">
      <svg width="auto" height="25" viewBox="0 0 313 500" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M272.598 281.25L286.484 190.762H199.658V132.041C199.658 107.285 211.787 83.1543 250.674 83.1543H290.146V6.11328C290.146 6.11328 254.326 0 220.078 0C148.574 0 101.836 43.3398 101.836 121.797V190.762H22.3535V281.25H101.836V500H199.658V281.25H272.598Z" fill="currentColor"/>
      </svg>
    </a>

    <a href="https://www.youtube.com/" target="_blank" class="socialMediaLink socialMediaYouT">
      <svg viewBox="0 0 547 384" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M534.722 60.083C528.441 36.433 509.935 17.807 486.438 11.486C443.848 0 273.067 0 273.067 0C273.067 0 102.287 0 59.696 11.486C36.199 17.808 17.693 36.433 11.412 60.083C0 102.95 0 192.388 0 192.388C0 192.388 0 281.826 11.412 324.693C17.693 348.343 36.199 366.193 59.696 372.514C102.287 384 273.067 384 273.067 384C273.067 384 443.847 384 486.438 372.514C509.935 366.193 528.441 348.343 534.722 324.693C546.134 281.826 546.134 192.388 546.134 192.388C546.134 192.388 546.134 102.95 534.722 60.083ZM217.212 273.591V111.185L359.951 192.39L217.212 273.591Z" fill="currentColor"/>
      </svg>
    </a>

    <a href="https://wa.me/15551234567" target="_blank" class="socialMediaLink socialMediaWhatsapp">
      <svg viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M425.112 72.6563C378.348 25.7812 316.071 0 249.888 0C113.281 0 2.12054 111.161 2.12054 247.768C2.12054 291.406 13.5045 334.04 35.1563 371.652L0 500L131.362 465.513C167.522 485.268 208.259 495.647 249.777 495.647H249.888C386.384 495.647 500 384.487 500 247.879C500 181.696 471.875 119.531 425.112 72.6563V72.6563ZM249.888 453.906C212.835 453.906 176.562 443.973 144.978 425.223L137.5 420.759L59.5982 441.183L80.3571 365.179L75.4464 357.366C54.7991 324.554 43.9732 286.719 43.9732 247.768C43.9732 134.263 136.384 41.8527 250 41.8527C305.022 41.8527 356.696 63.2812 395.536 102.232C434.375 141.183 458.259 192.857 458.147 247.879C458.147 361.496 363.393 453.906 249.888 453.906V453.906ZM362.835 299.665C356.696 296.54 326.228 281.585 320.536 279.576C314.844 277.455 310.714 276.451 306.585 282.701C302.455 288.951 290.625 302.79 286.942 307.031C283.371 311.161 279.688 311.719 273.549 308.594C237.165 290.402 213.281 276.116 189.286 234.933C182.924 223.996 195.647 224.777 207.478 201.116C209.487 196.987 208.482 193.415 206.92 190.29C205.357 187.165 192.969 156.696 187.835 144.308C182.813 132.254 177.679 133.929 173.884 133.705C170.313 133.482 166.183 133.482 162.054 133.482C157.924 133.482 151.228 135.045 145.536 141.183C139.844 147.433 123.884 162.388 123.884 192.857C123.884 223.326 146.094 252.79 149.107 256.92C152.232 261.049 192.746 323.549 254.911 350.446C294.196 367.411 309.598 368.862 329.241 365.96C341.183 364.174 365.848 351.004 370.982 336.496C376.116 321.987 376.116 309.598 374.554 307.031C373.103 304.241 368.973 302.679 362.835 299.665Z" fill="currentColor"/>
      </svg>
    </a>

  </div>



  </figcaption>
</figure>

      </div>
    </div>



    <div class="singleDescription"><?php echo the_content(); ?></div>


                    <?php if($product->is_type( 'auction' )){ ?>
                    <?php testimonial('onlyMobileG'); ?>
                    <?php } ?>




  </article>




  <div class="singleFormContainer" id="singleRequestInfo" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
    <form action="index.php" class="singleContact ">
      <input type="hidden" name="action" value="lt_form_handler">
      <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleRequestInfo')">+</p>
      <label  class="formLabel">CONTACT DETAILS</label>
      <input type="text"   placeholder="Name*"   class="formInput100 formInput" name="a01" required>
      <input type="email"  placeholder="Email*"        class="formInput100 formInput" name="a03" required>
      <input type="number" placeholder="Phone"        class="formInput100 formInput" name="a04">
      <input type="text"   placeholder="Country*"      class="formInput100 formInput" name="a05" required>

      <label  class="formLabel">SUBJECT</label>
      <textarea class="singleFormTxtArea" value="SUBJECT" placeholder="" name="a08"></textarea>
      <div class="formTermsAndConditions">
         <input type="checkbox" required>
         <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank" class="linkTermAndConditionsForm">I accept terms and conditions</a>
      </div>
      <button class="singleContactButton contactButton" type="submit">SEND</button>
    </form>
  </div>

  <div class="singleFormContainer" id="singleMakeOffer">
    <form class="singleContact" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
      <input type="hidden" name="action" value="lt_form_handler">
      <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleMakeOffer')">+</p>
      <label  class="formLabelBig">Make An Offer</label>
      <label  class="formLabel"><?php the_title(); ?></label>
      <label  class="formLabel">OFFER AMOUNT</label>
      <div class="offerAmmountIcon">
        <input class="offerAmmountIconInput euro" type="radio" id="euro" name="a10" value="euro">
        <label class="offerAmmountIconLabel" for="euro">€</label>
        <input class="offerAmmountIconInput dollar" type="radio" id="dollar" name="a10" value="dollar">
        <div class="offerAmmountIconSignal"></div>
        <label class="offerAmmountIconLabel" for="dollar">$</label><br>
      </div>
      <input type="number" placeholder="Offer"        name="a01" class="formInput100 formInput offerAmmount">
      <input type="text"   placeholder="Name"         name="a02" class="formInput100 formInput" required>
      <input type="email"  placeholder="Email"        name="a04" class="formInput100 formInput" required>
      <input type="number" placeholder="Phone"        name="a03" class="formInput100 formInput">
      <input type="text"   placeholder="Country"      name="a05" class="formInput100 formInput" required>

      <label  class="formLabel">SUBJECT</label>
      <textarea class="singleFormTxtArea" value="" placeholder="SUBJECT" name="a08"></textarea>
      <div class="formTermsAndConditions">
         <input type="checkbox">
         <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank" class="linkTermAndConditionsForm">I accept terms and conditions</a>
      </div>
      <button class="singleRequestInfoButton contactButton" type="submit">SUBMIT OFFER</button>
    </form>
  </div>

  <div class="singleFormContainer" id="singleTrade">
    <form class="singleContact" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
      <input type="hidden" name="action" value="lt_form_handler">
      <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleTrade')">+</p>
      <label  class="formLabelBig">Trade this <?php the_title(); ?></label>
      <p class="singleFormTxt mainTxtType1">We are always looking for new inventory. If you are interested in trading your high quality bike for one of ours, simply fill out this form.<br>A member of our sales department will be in touch within 24 hours. No one makes the trade-in process easier than <a href="amatumoto.com" target="_blank">amatumoto.com</a>. (Amatumoto Grand Prix Motorbikes)</p>
      <input type="text"   placeholder="Name"       class="formInput50 formInput" name="a01" required>
      <input type="email"  placeholder="Email"      class="formInput50 formInput" name="a05" required>
      <input type="number" placeholder="Phone"      class="formInput50 formInput" name="a07">
      <input type="number" placeholder="Year"       class="formInput50 formInput" name="a02" required>
      <input type="text"   placeholder="Make"       class="formInput50 formInput" name="a04">
      <input type="text"   placeholder="Model"      class="formInput50 formInput" name="a06" required>
      <input type="text"   placeholder="VIN"        class="formInput50 formInput" name="a08">
      <label  class="formLabel">Upload photos here</label>
      <input type="file" placeholder="upload files" class="formInput50 formInput" name="a09">
      <textarea class="singleFormTxtArea formInput50" value="comments" placeholder="your comments" name="a10"></textarea>
      <div class="formTermsAndConditions">
         <input type="checkbox">
         <a href="<?php echo site_url('privacy-policy'); ?>" class="linkTermAndConditionsForm">I accept terms and conditions</a>
      </div>
      <button class="singleRequestInfoButton contactButton" type="submit">REQUEST TRADE IN</button>
    </form>
  </div>

  <!-- <div class="singleFormContainer" id="singleFinance">
    <form class="singleContact" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
      <input type="hidden" name="action" value="lt_form_handler">
      <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleFinance')">+</p>
      <label  class="formLabelBig">finance this <?php the_title(); ?></label>
      <p class="singleFormTxt mainTxtType1">Please enter the information below to begin the financing process.</p>
      <input type="number" placeholder="INTEREST RATE"  class="formInput50 formInput" name="a01">
      <input type="text" placeholder="NAME"  class="formInput50 formInput" name="a02">
      <select class="formInput50 formInput" id="rkm-vdp-loan-term" class="form-control" name="a03">
        <option value="36">3 Years (36 Months)</option>
        <option value="48">4 Years (48 Months)</option>
        <option value="60">5 Years (60 Months)</option>
        <option value="72">6 Years (72 Months)</option>
        <option value="84">7 Years (84 Months)</option>
        <option value="96">8 Years (96 Months)</option>
        <option value="108">9 Years (108 Months)</option>
        <option selected="selected" value="120">10 Years (120 Months)</option>
        <option value="132">11 Years (132 Months)</option>
        <option value="144">12 Years (144 Months)</option>
      </select>
      <input name="a04" type="text"   placeholder="LAST NAME"      class="formInput50 formInput">
      <input name="a05" type="text"   placeholder="PURCHASE PRICE" class="formInput50 formInput">
      <input name="a06" type="number" placeholder="PHONE"          class="formInput50 formInput">
      <input name="a07" type="number" placeholder="DOWN PAYMENT"   class="formInput50 formInput">
      <input name="a08" type="email"  placeholder="EMAIL"          class="formInput50 formInput">
      <button class="singleRequestInfoButton contactButton formInput50" type="">CALCULATE RATE</button>
      <input name="a09" type="text"   placeholder="COUNTRY"        class="formInput50 formInput lastCountryInput">
      <input name="a10" type="number" placeholder="0.00"           class="formInput50 formInput colorfulInput">
      <select name="a11" value="time-preference"   class="formInput50 formInput" id="bestTimeToCall">
        <option value="any_time" class="form">Any Time</option>
        <option value="from-9-to-13">9:00 a.m. - 1:00 p.m.</option>
        <option value="from-13-to-17">1:00 p.m. - 5:00 p.m.</option>
        <option value="from-17-to-20">5:00 p.m. - 8:00 p.m.</option></select>
      </select>
      <textarea class="singleFormTxtArea" value="comments" placeholder="your comments" name="a12"></textarea>
        <div class="formTermsAndConditions">
           <input type="checkbox">
           <a href="#" class="linkTermAndConditionsForm">I accept terms and conditions</a>
        </div>
        <button class="singleRequestInfoButton contactButton" type="submit">SEND</button>
      </form>
    </div> -->















<!-- <form class="" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
  <input type="hidden" name="action" value="lt_new_user">
  <input type="hidden" name="url" value="<?php echo home_url( $wp->request ); ?>">
  <input type="email" name="mail" value="" placeholder="user@example.com">
  <input type="text" name="pass" value="" placeholder="password">
  <button type="submit" name="button">Crear</button>
</form> -->












































<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
