
<?php get_header(); ?>





<div id="main">

  <div>




        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <?php the_content(); ?>

                <?php
            endwhile;
        else :
        ?>
            <h2>No Posts Found</h2>
            <p>Sorry, there are no posts yet.</p>
        <?php
        endif;
        ?>


    </main>




</div>


<?php get_footer(); ?>
