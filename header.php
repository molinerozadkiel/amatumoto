<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <?php wp_head(); ?>
  <!-- TODO: rever que hace falta de aca -->
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Ropa+Sans|Signika&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>

  <header class="header loading" id="header">
    <a href="<?php echo site_url('');  ?>" class="logo">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" class="logoImg">
    </a>
    <nav class="upperNav">
      <div class="socialMedia">
        <a href="https://www.instagram.com/gpmotorbikes/?hl=es" target="_blank" class="socialMediaLink socialMediaInst">
          <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
          </svg>
        </a>
        <a href="https://es-la.facebook.com/gpmotorbikes/" target="_blank" class="socialMediaLink socialMediaFace">
          <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
            <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
          </svg>
        </a>
        <a href="https://www.youtube.com/" target="_blank" class="socialMediaLink socialMediaYouT">
          <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
          </svg>
        </a>
        <a href="<?php echo get_permalink( get_page_by_path( 'test' ) ); ?>" target="_blank" class="socialMediaLink socialMediaSrch">
          <svg fill="currentColor"aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path>
          </svg>
        </a>
      </div>

      <a href="mailto:elcorreoquequieres@correo.com" target="_blank" class="mail upperNavInfo">
        <!-- <svg fill="currentColor"class="upperNavIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg> -->
        <svg class="upperNavIcon socialMediaLink" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path>
        </svg>
        <p class="upperNavIconTxt">info@gpmotorbikes.com</p>
      </a>
      <a href="" class="langButton upperNavInfo">
        <svg fill="currentColor"class="upperNavIcon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
        <circle style="fill:#0052B4;" cx="256" cy="256" r="256"/>
        <g>
        	<polygon style="fill:#FFDA44;" points="256.001,100.174 264.29,125.683 291.11,125.683 269.411,141.448 277.7,166.957
        		256.001,151.191 234.301,166.957 242.59,141.448 220.891,125.683 247.712,125.683 	"/>
        	<polygon style="fill:#FFDA44;" points="145.814,145.814 169.714,157.99 188.679,139.026 184.482,165.516 208.381,177.693
        		181.89,181.889 177.694,208.381 165.517,184.482 139.027,188.679 157.992,169.714 	"/>
        	<polygon style="fill:#FFDA44;" points="100.175,256 125.684,247.711 125.684,220.89 141.448,242.59 166.958,234.301 151.191,256
        		166.958,277.699 141.448,269.411 125.684,291.11 125.684,264.289 	"/>
        	<polygon style="fill:#FFDA44;" points="145.814,366.186 157.991,342.286 139.027,323.321 165.518,327.519 177.693,303.62
        		181.89,330.111 208.38,334.307 184.484,346.484 188.679,372.974 169.714,354.009 	"/>
        	<polygon style="fill:#FFDA44;" points="256.001,411.826 247.711,386.317 220.891,386.317 242.591,370.552 234.301,345.045
        		256.001,360.809 277.7,345.045 269.411,370.552 291.11,386.317 264.289,386.317 	"/>
        	<polygon style="fill:#FFDA44;" points="366.187,366.186 342.288,354.01 323.322,372.975 327.519,346.483 303.622,334.307
        		330.112,330.111 334.308,303.62 346.484,327.519 372.974,323.321 354.009,342.288 	"/>
        	<polygon style="fill:#FFDA44;" points="411.826,256 386.317,264.289 386.317,291.11 370.552,269.41 345.045,277.699 360.81,256
        		345.045,234.301 370.553,242.59 386.317,220.89 386.317,247.712 	"/>
        	<polygon style="fill:#FFDA44;" points="366.187,145.814 354.01,169.714 372.975,188.679 346.483,184.481 334.308,208.38
        		330.112,181.889 303.622,177.692 327.519,165.516 323.322,139.027 342.289,157.991 	"/>
        </g>
        </svg>
        <p class="upperNavIconTxt">Europe | Spain</p>
      </a>
      <a href="" class="langButton upperNavInfo">
        <svg class="upperNavIcon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
        <circle style="fill:#F0F0F0;" cx="256" cy="256" r="256"/>
        <g>
        	<path style="fill:#D80027;" d="M244.87,256H512c0-23.106-3.08-45.49-8.819-66.783H244.87V256z"/>
        	<path style="fill:#D80027;" d="M244.87,122.435h229.556c-15.671-25.572-35.708-48.175-59.07-66.783H244.87V122.435z"/>
        	<path style="fill:#D80027;" d="M256,512c60.249,0,115.626-20.824,159.356-55.652H96.644C140.374,491.176,195.751,512,256,512z"/>
        	<path style="fill:#D80027;" d="M37.574,389.565h436.852c12.581-20.529,22.338-42.969,28.755-66.783H8.819
        		C15.236,346.596,24.993,369.036,37.574,389.565z"/>
        </g>
        <path style="fill:#0052B4;" d="M118.584,39.978h23.329l-21.7,15.765l8.289,25.509l-21.699-15.765L85.104,81.252l7.16-22.037
        	C73.158,75.13,56.412,93.776,42.612,114.552h7.475l-13.813,10.035c-2.152,3.59-4.216,7.237-6.194,10.938l6.596,20.301l-12.306-8.941
        	c-3.059,6.481-5.857,13.108-8.372,19.873l7.267,22.368h26.822l-21.7,15.765l8.289,25.509l-21.699-15.765l-12.998,9.444
        	C0.678,234.537,0,245.189,0,256h256c0-141.384,0-158.052,0-256C205.428,0,158.285,14.67,118.584,39.978z M128.502,230.4
        	l-21.699-15.765L85.104,230.4l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822l-21.7,15.765L128.502,230.4z
        	 M120.213,130.317l8.289,25.509l-21.699-15.765l-21.699,15.765l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822
        	L120.213,130.317z M220.328,230.4l-21.699-15.765L176.93,230.4l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822
        	l-21.7,15.765L220.328,230.4z M212.039,130.317l8.289,25.509l-21.699-15.765l-21.699,15.765l8.289-25.509l-21.7-15.765h26.822
        	l8.288-25.509l8.288,25.509h26.822L212.039,130.317z M212.039,55.743l8.289,25.509l-21.699-15.765L176.93,81.252l8.289-25.509
        	l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822L212.039,55.743z"/>
        </svg>
        <p class="upperNavIconTxt">USA</p>
      </a>
    </nav>
    <nav class="navBar">
      <?php wp_nav_menu( array( 'theme_location' => 'navBar', 'navBar' => 'new_menu_class' ) ); ?>

      <a class="navBarLink" href="<?php echo get_permalink( get_page_by_path( 'test' ) ); ?>">INVENTORY</a>
      <a class="navBarLink" href="">PARTS & RACING PRODUCTS</a>
      <a class="navBarLink" href="<?php echo get_permalink( get_page_by_path( 'the-garage' ) ); ?>">THE GARAGE</a>
      <a class="navBarLink" href="<?php echo get_permalink( get_page_by_path( 'services' ) ); ?>">SERVICES</a>
      <a class="navBarLink" href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>">CONTACT</a>
    </nav>

    <nav class="mobileNav" id="mobileNav">
      <div class="navBarMobile">
        <?php wp_nav_menu( array( 'theme_location' => 'navBarMobile', 'navBarMobile' => 'new_menu_class' ) ); ?>
      </div>
      <div class="upperNavMobile">



        <a href="" class="mailMobile upperNavInfoMobile">
          <svg class="upperNavIconMobile" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
          <p class="upperNavIconTxtMobile">Write Us</p>
        </a>
        <a href="" class="langButtonMobile upperNavInfoMobile">
          <svg class="upperNavIconMobile" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
          <circle style="fill:#0052B4;" cx="256" cy="256" r="256"/>
          <g>
            <polygon style="fill:#FFDA44;" points="256.001,100.174 264.29,125.683 291.11,125.683 269.411,141.448 277.7,166.957
              256.001,151.191 234.301,166.957 242.59,141.448 220.891,125.683 247.712,125.683 	"/>
            <polygon style="fill:#FFDA44;" points="145.814,145.814 169.714,157.99 188.679,139.026 184.482,165.516 208.381,177.693
              181.89,181.889 177.694,208.381 165.517,184.482 139.027,188.679 157.992,169.714 	"/>
            <polygon style="fill:#FFDA44;" points="100.175,256 125.684,247.711 125.684,220.89 141.448,242.59 166.958,234.301 151.191,256
              166.958,277.699 141.448,269.411 125.684,291.11 125.684,264.289 	"/>
            <polygon style="fill:#FFDA44;" points="145.814,366.186 157.991,342.286 139.027,323.321 165.518,327.519 177.693,303.62
              181.89,330.111 208.38,334.307 184.484,346.484 188.679,372.974 169.714,354.009 	"/>
            <polygon style="fill:#FFDA44;" points="256.001,411.826 247.711,386.317 220.891,386.317 242.591,370.552 234.301,345.045
              256.001,360.809 277.7,345.045 269.411,370.552 291.11,386.317 264.289,386.317 	"/>
            <polygon style="fill:#FFDA44;" points="366.187,366.186 342.288,354.01 323.322,372.975 327.519,346.483 303.622,334.307
              330.112,330.111 334.308,303.62 346.484,327.519 372.974,323.321 354.009,342.288 	"/>
            <polygon style="fill:#FFDA44;" points="411.826,256 386.317,264.289 386.317,291.11 370.552,269.41 345.045,277.699 360.81,256
              345.045,234.301 370.553,242.59 386.317,220.89 386.317,247.712 	"/>
            <polygon style="fill:#FFDA44;" points="366.187,145.814 354.01,169.714 372.975,188.679 346.483,184.481 334.308,208.38
              330.112,181.889 303.622,177.692 327.519,165.516 323.322,139.027 342.289,157.991 	"/>
          </g>
          </svg>
          <p class="upperNavIconTxtMobile">Europe | Spain</p>
        </a>
        <a href="" class="langButtonMobile upperNavInfoMobile">
          <svg class="upperNavIconMobile" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
          <circle style="fill:#F0F0F0;" cx="256" cy="256" r="256"/>
          <g>
            <path style="fill:#D80027;" d="M244.87,256H512c0-23.106-3.08-45.49-8.819-66.783H244.87V256z"/>
            <path style="fill:#D80027;" d="M244.87,122.435h229.556c-15.671-25.572-35.708-48.175-59.07-66.783H244.87V122.435z"/>
            <path style="fill:#D80027;" d="M256,512c60.249,0,115.626-20.824,159.356-55.652H96.644C140.374,491.176,195.751,512,256,512z"/>
            <path style="fill:#D80027;" d="M37.574,389.565h436.852c12.581-20.529,22.338-42.969,28.755-66.783H8.819
              C15.236,346.596,24.993,369.036,37.574,389.565z"/>
          </g>
          <path style="fill:#0052B4;" d="M118.584,39.978h23.329l-21.7,15.765l8.289,25.509l-21.699-15.765L85.104,81.252l7.16-22.037
            C73.158,75.13,56.412,93.776,42.612,114.552h7.475l-13.813,10.035c-2.152,3.59-4.216,7.237-6.194,10.938l6.596,20.301l-12.306-8.941
            c-3.059,6.481-5.857,13.108-8.372,19.873l7.267,22.368h26.822l-21.7,15.765l8.289,25.509l-21.699-15.765l-12.998,9.444
            C0.678,234.537,0,245.189,0,256h256c0-141.384,0-158.052,0-256C205.428,0,158.285,14.67,118.584,39.978z M128.502,230.4
            l-21.699-15.765L85.104,230.4l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822l-21.7,15.765L128.502,230.4z
             M120.213,130.317l8.289,25.509l-21.699-15.765l-21.699,15.765l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822
            L120.213,130.317z M220.328,230.4l-21.699-15.765L176.93,230.4l8.289-25.509l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822
            l-21.7,15.765L220.328,230.4z M212.039,130.317l8.289,25.509l-21.699-15.765l-21.699,15.765l8.289-25.509l-21.7-15.765h26.822
            l8.288-25.509l8.288,25.509h26.822L212.039,130.317z M212.039,55.743l8.289,25.509l-21.699-15.765L176.93,81.252l8.289-25.509
            l-21.7-15.765h26.822l8.288-25.509l8.288,25.509h26.822L212.039,55.743z"/>
          </svg>
          <p class="upperNavIconTxtMobile">USA</p>
        </a>
        <div class="socialMediaMobile">
          <a href="" class="socialMediaLinkMobile socialMediaInstMobile">
            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" class=""></path>
            </svg>
          </a>
          <a href="" class="socialMediaLinkMobile socialMediaFaceMobile">
            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" class=""></path>
            </svg>
          </a>
          <a href="" class="socialMediaLinkMobile socialMediaYouTMobile">
            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
              <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" class=""></path>
            </svg>
          </a>
          <a href="" class="socialMediaLinkMobile socialMediaSrchMobile">
            <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path>
            </svg>
          </a>
        </div>
      </div>
    </nav>

    <div class="mobileNavButton" onclick="alternateMobileMenu()">
      <div class="navStripe"></div>
      <div class="navStripe"></div>
      <div class="navStripe"></div>
    </div>
  </header>
