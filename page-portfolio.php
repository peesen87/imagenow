<?php 
/* 
Template Name: Portfoliotemplate
*/
?>

<?php get_header(); ?>
        <main>
            <!-- START INCLUDE FLEXIBLE CONTENT MODULE -->
            <?php include 'content-module/module.php'; ?>
            <!-- END INCLUDE FLEXIBLE CONTENT MODULE -->
            
            <section id="portfolio-overview">
                
                <div class="intro">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h2><?php the_field('titel'); ?></h2>
                                <?php the_field('intro'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="overview">
                    <div class="wrapper">
                    <div class="container">
                        <div class="row ">
                            <div class="col-sm-12">
                                <h2><?php the_field('portfolio_titel'); ?></h2>
                                <?php the_field('portfolio_text'); ?>
                            </div>
                        </div>
                        <div class="row row-eq-height">
                            <?php $args = array('post_type' => 'portfolio', 'posts_per_page' => '100'); ?>
                            <?php $loop = new WP_Query($args); ?>
                            <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <div class="col-sm-6 col-md-4 item">
                                <a href="<?php the_permalink(); ?>">
                                    <div>
                                        <div class="image image-full">
                                            <?php $image = get_field('overview_bild');
                                                // vars
                                                $url = $image['url'];
                                                $alt = $image['alt'];
                                                $size = 'imagenow';
                                                $thumb = $image['sizes'][ $size ];
                                            ?>
                                            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                                        </div>
                                        <div class="content">
                                            <h3 class="title"><?php the_title(); ?></h3>
                                            <p class="description"><?php the_field('overview_beschrieb'); ?></p>
                                        </div>
                                        <div class="overlay">
                                            <span>Zum Kurs</span>
                                        </div>
                                    </div>
                                </a>
                            </div>  

                            <?php endwhile; ?>

                            <?php else: ?>
                                <h1>No posts here!</h1>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
                </div>
                
            </section>
                

        </main>
<?php get_footer(); ?>