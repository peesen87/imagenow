<?php get_header('frontpage'); ?>  
        <main>
            <!-- START INCLUDE FLEXIBLE CONTENT MODULE -->
            <?php include 'content-module/module.php'; ?>
            <!-- END INCLUDE FLEXIBLE CONTENT MODULE -->

            <section id="portfolio">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h2><?php the_field('portfolio_titel'); ?></h2>
                            <?php the_field('portfolio_text'); ?>
                        </div>

                        <?php $args = array('post_type' => 'portfolio', 'posts_per_page' => '10'); ?>
                        <?php $loop = new WP_Query($args); ?>
                        <?php $counter = 1; ?>
                        <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="col-sm-6 col-md-6 item">
                            <?php $image = get_field('overview_bild');
                                // vars
                                $url = $image['url'];
                                $alt = $image['alt'];
                                $size = 'imagenow';
                                $thumb = $image['sizes'][ $size ];
                            ?>
                             <?php if($counter%4 == 3 || $counter%4 == 0) : ?>
                                <div class="col-sm-6 content">
                                    <a href="<?php the_permalink(); ?>">
                                        <div>
                                            <div>
                                                <span class="title"><?php the_title(); ?></span>
                                                <hr class="small">
                                                <p class="description"><?php the_field('overview_beschrieb'); ?>    </p>
                                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                            </div>
                                            <div class="overlay">
                                                <span>Zum Kurs</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 image image-full">
                                    <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-6 image image-full">
                                    <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                                </div>   
                                <div class="col-sm-6 content">
                                    <a href="<?php the_permalink(); ?>">
                                        <div>
                                            <div>
                                                <span class="title"><?php the_title(); ?></span>
                                                <hr class="small">
                                                <p class="description"><?php the_field('overview_beschrieb'); ?>    </p>
                                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                            </div>
                                            <div class="overlay">
                                                <span>Zum Kurs</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php $counter++; ?>
                        </div> 
        

                        <?php endwhile; ?>
                        <?php else: ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>

                    </div>
                </div>
            </section>

            <section id="news-center" class="style-two">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-5 col-md-offset-1 whyus">
                            <h2><?php the_field('wiesouns_titel'); ?></h2>
                            <?php if( !empty($image) ): ?>
                                <?php $image = get_field('wiesouns_bild');
                                // vars
                                $url = $image['url'];
                                $alt = $image['alt'];
                                $size = 'imagenow';
                                $thumb = $image['sizes'][ $size ]; ?>
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                            <?php endif; ?>
                            <p><?php the_field('wiesouns_text'); ?></p>
                            <ul>
                            <?php while ( have_rows('wiesouns_punkte') ) : the_row(); ?>
                                <li><?php the_sub_field('punkt'); ?></li>
                            <?php endwhile; ?>
                            </ul>
                        
                        </div>
                        <div class="col-sm-6 col-md-5 seminare">
                            <h2>Nächste Seminare</h2>
                            <div>
                            <?php $today = current_time('mysql'); ?>
                            <?php $args = array(
                                'post_type' => 'seminare', 
                                'posts_per_page' => '2',
	                            'meta_query' => array(
		                          array(
                                    'key' => 'start_datum',
                                    'compare' => '>=',
                                    'value' => $today,
                                    'type' => 'DATE',
		                          ),
	                           ),
	                           'meta_key' => 'start_datum',
	                           'orderby' => 'start_datum',
                                'order' => 'ASC'
                            ); ?>
                            <?php $loop = new WP_Query($args); ?>
                            <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <div class="seminar group">
          
                                    <div class="information">                                    
                                         <span class="title"><?php the_title(); ?></span> 
                                        <span class="date"><?php the_field('start_datum'); ?> <?php the_field('start_zeit'); ?> - 
                                        <?php the_field('end_datum'); ?> <?php the_field('end_zeit'); ?></span>
                                        <?php the_field('intro'); ?>

                                        <a class="btn negative" href="<?php the_permalink(); ?>">Zur Veranstaltung</a>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                            <?php else: ?>
                                <p>Aktuell sind keine Seminare geplant.</p>
                            <?php endif; ?>
                                
                            <?php wp_reset_postdata(); ?>      
    
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </main>
<?php get_footer(); ?>