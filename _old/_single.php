<?php get_header(); ?>


  <div id="subNavigationDiv">
    <strong>Colonial <br>Children <br>Connected<br><br><br><br></strong>
    <nav>
              <?php

                $cleanMenu = wp_nav_menu( array(
                  //'theme_location' => 'top-menu',
                  'echo' => false,
                  'depth'=> 2,
                ) );
                //echo strip_tags($cleanMenu, "<a><ul><li>");
                echo $cleanMenu;

              ?>
            </nav>

    <em>Page content</em>
    <nav id="subNavigation"></nav>
  </div>

  <div class="temp2col">
    <div id="content">
      <a href="/">back</a>


      <?php


      $timeline = '<h2>Timeline</h2> <div class="timeline">';
      $pod1 = pods( 'vignette', get_the_id() );
      $related2 = $pod1->field( 'timeline_items' );
      //print_r($related2);
        foreach ( $related2 as $rel2 ) {
         $id2 = $rel2[ 'ID' ];
         $timeline = $timeline.'<div class="timelineItem">';
         $someField = get_post_meta( $id2, 'timeline_start_date', true );

         $timeline = $timeline.'<strong>'.date_format(date_create($someField),"Y").'</strong><br>';
         $timeline = $timeline.get_the_title( $id2 );
         $timeline = $timeline.'</div>';
       }
       $timeline = $timeline.'</div>';







      // page content
      if (have_posts()) :
          while (have_posts()) : the_post();
              ?>
              <h1 class="ojTopLIne"><?php the_title(); ?> <em><?php echo get_post_meta($post->ID, 'subtitle', true); ?></em></h1>
              <br><br><br>
              <?php
              // $theContent =  get_the_content();
              // $theContent = str_replace("****TIME***", $timeline, $theContent);
              // echo $theContent;

              the_content();
              echo $timeline;

              //[[timeline]]

              ?>

              <?php
          endwhile;
      else :
      ?>
          <h2>No Posts Found</h2>
          <p>Sorry, there are no posts yet.</p>
      <?php
      endif;
      ?>

    </div>


    <aside>
      <strong>Keywords</strong><br>
      <?php

        $allcats = wp_get_post_categories(get_the_ID());

        foreach ($allcats as  &$value) {
          //echo $value;
            echo get_the_category_by_ID(  $value ).'<br>';
        }

      ?><br><br>


      <strong>Related persons</strong><br>
      <?php

      $pod = pods( 'vignette', get_the_id() );
      $related = $pod->field( 'vignettes_linked' );
        foreach ( $related as $rel ) {
         $id = $rel[ 'ID' ];
         echo '<a href="'.esc_url( get_permalink( $id ) ).'">'.get_the_title( $id ).'</a><br>';
       }




      ?><br>

    </aside>

  </div>












<script src="<?php echo get_bloginfo( 'template_url' ); ?>/js/header-to-links.js" charset="utf-8"></script>


<?php get_footer(); ?>
