<div id="colNav" class="colNav">


<section class="ccc_brand ccc_topBlock"  aria-label="Welcome to Colonial children Reconnected">
  <a href="/"  aria-label="Go to the homepage"><img src="<?php bloginfo('template_url'); ?>/images/logo_colonial_children_connected.png" alt=""></a>
</section>

<nav class="ccc_navigation hideOnSmall" id="pageContentList">
  <?php

    $cleanMenu = wp_nav_menu( array(
      //'theme_location' => 'top-menu',
      'echo' => false,
      'depth'=> 2,
    ) );
    echo strip_tags($cleanMenu, "<a>");
    //echo $cleanMenu;

  ?>
</nav>

</nav>

<section class="ccc_project hideOnSmall"  aria-label="Partner">Part of the COAC project</section>

</div>
