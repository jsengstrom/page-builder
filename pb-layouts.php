<div class="page-builder">

  <?php if( have_rows('page_builder') ): while ( have_rows('page_builder') ) : the_row(); ?>


    <?php /* TITLE */ if( get_row_layout() == 'title_block' ): ?>

      <<?php the_sub_field('hierarchy') ?> class="title--block"><?php the_sub_field('title') ?></<?php the_sub_field('hierarchy') ?> >


    <?php /* TEXT */ elseif( get_row_layout() == 'text_block' ): ?>

      <section class="<?php the_sub_field('columns') ?>">

        <?php the_sub_field('content') ?>

      </section>


    <?php /* IMAGE */ elseif( get_row_layout() == 'image_block' ):

    $image = get_sub_field('image'); ?>

      <section class="image">

        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

      </section>


    <?php /* VIDEO */ elseif( get_row_layout() == 'video_block' ): ?>

      <section class="video">

        <div class="video-embed">

          <?php the_sub_field('video_link') ?>

        </div>

      </section>


    <?php /* TEXT & IMAGE */ elseif( get_row_layout() == 'text_image' ):

    $image = get_sub_field('image'); ?>

      <section class="<?php the_sub_field('alignment') ?>">

        <div class="img">

          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

        </div><!--

        --><div class="text">

          <?php the_sub_field('text') ?>

        </div>

      </section>


    <?php /* TEXT & VIDEO */ elseif( get_row_layout() == 'text_video' ): ?>

      <section class="<?php the_sub_field('alignment') ?>">

        <div class="video">

          <div class="video-embed">

            <?php the_sub_field('video') ?>

          </div>

        </div><!--

        --><div class="text">

          <?php the_sub_field('text') ?>

        </div>

      </section>


    <?php /* FEATURES */ elseif( get_row_layout() == 'feature_block' ): ?>

      <section class="feature-block"><!--

        <?php if( have_rows('feature') ): while ( have_rows('feature') ) : the_row(); ?>

          --><div class="feature-block__feat">

            <h4><?php the_sub_field(feature_title); ?></h4>

            <?php the_sub_field(feature_content); ?>

          </div><!--

        <?php endwhile; endif; ?>

      --></section>


    <?php /* TEXT & SIDEBAR */ elseif( get_row_layout() == 'text_sidebar' ):

    $sidebar = get_sub_field('sidebar_select'); ?>

      <section class="text-sidebar">

        <article>

          <?php the_sub_field('content') ?>

        </article><!--

        --><aside>

          <?php dynamic_sidebar( $sidebar ); ?>

        </aside>

      </section>


    <?php /* SLIDESHOW */ elseif( get_row_layout() == 'slideshow' ):

    $images = get_sub_field('gallery'); ?>

      <section class="cycle-slideshow"
      data-cycle-fx="fade"
      data-cycle-pause-on-hover="false"
      data-cycle-speed="300"
      data-cycle-auto-height="calc"
      data-cycle-center-horz=true
      >

        <div class="cycle-prev"></div>
        <div class="cycle-next"></div>
        <div class="cycle-pager"></div>

        <?php foreach( $images as $image ): ?>

          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

        <?php endforeach; ?>

      </section>


    <?php /* LIGHTBOX */ elseif( get_row_layout() == 'lightbox' ):

    $images = get_sub_field('gallery'); ?>

      <section class="lightbox">

        <?php foreach( $images as $image ): ?>

          <a href="<?php echo $image['url']; ?>">

            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />

          </a>

        <?php endforeach; ?>

      </section>


    <?php /* RELATED CONTENT */ elseif( get_row_layout() == 'related_content' ): ?>

      <section class="related-content"><!--

        <?php $posts = get_sub_field('content_choices'); if( $posts ): ?>

          <?php foreach( $posts as $post): setup_postdata($post); ?>

            --><div class="related-content__post">

              <span class="related-content__post__date"><?php the_date(); ?></span>

              <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

              <?php the_excerpt(); ?>

              <a href="<?php the_permalink(); ?>" class="button">Read More</a>

            </div><!--

          <?php endforeach; ?>

        <?php wp_reset_postdata(); endif; ?>

      --></section>


    <?php /* GOOGLE MAP */ elseif( get_row_layout() == 'google_map' ):

    $location = get_sub_field('map'); if( !empty($location) ): ?>

      <section class="google-map">

        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>

      </section>

    <?php endif; ?>


    <?php /* DIVIDER */ elseif( get_row_layout() == 'divider' ): ?>

      <div class="divider"></div>


    <?php endif; ?>

  <?php endwhile; else : ?>

    <!-- no layouts found -->

  <?php endif; ?>

</div>
