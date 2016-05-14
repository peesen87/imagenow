<?php get_header(); ?>
        <main>
            <!-- START INTRO -->
            <section class="container intro">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                         <h1><?php the_field('titel'); ?></h1>
                         <?php the_field('intro'); ?>
                       </div>
                </div>
            </section>
            <!-- END INTRO -->
                
            <!-- ZIELGRUPPE -->
            <section class="container-fluid <?php the_field('zielgruppe_stil'); ?>">
                <div class="row halfimage">
                    <div class="col-sm-6 image">
                        <div class="background" style="background-image: url('<?php the_field('zielgruppe_bild'); ?>    ');"></div>
                    </div>                        
                    <div class="col-sm-6 content">
                        <div class="content-wrapper">
                            <div class="content-inner right">
                                <h2>Zielgruppe</h2>
                                <?php the_field('zielgruppe'); ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END ZIELGRUPPE -->
            
            <!-- ZIELE -->
            <section class="container-fluid <?php the_field('ziele_stil'); ?>">
                <div class="row halfimage">
                    <div class="col-sm-6 content">
                        <div class="content-wrapper">
                            <div class="content-inner left">
                                <h2>Ziele</h2>
                                <?php the_field('ziele'); ?>    
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 image">
                        <div class="background" style="background-image: url('<?php the_field('ziele_bild'); ?>    ');"></div>
                    </div>                        
                </div>
            </section>
            <!-- END ZIELE -->
            
            <!-- CONTENT (NUTZEN, INHALT & OPTIONAL) -->
            <section class="container maincontent">
                <div class="row fulltext nutzen">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <h2><?php the_field('nutzen_titel'); ?></h2>
                        <?php the_field('nutzen'); ?> 
                    </div>
                </div>

                <div class="row inhalt">
                    <div class="col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-1">
                        <?php $image = get_field('inhalt_bild');
                            // vars
	                       $url = $image['url'];
	                       $alt = $image['alt'];
	                       $size = 'imagenow';
	                       $thumb = $image['sizes'][ $size ];
                        ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
                    <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
                        <h2>Inhalt</h2>
                         <?php the_field('inhalt'); ?> 
                    </div>
                </div>
                <div class="row optional">
                    <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-1">
                        <h3>Optional</h3>
                        <?php the_field('optional'); ?> 
                    </div>
                    <div class="col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0">
                        <?php $image = get_field('optional_bild');
                            // vars
	                       $url = $image['url'];
	                       $alt = $image['alt'];
	                       $size = 'imagenow';
	                       $thumb = $image['sizes'][ $size ];
                        ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
                </div>

            </section>           
            <!-- END CONTENT -->
            
            <!-- MEHR INFOS (DAUER & TEILNEHMERZAHL) -->
            <section class="container-fluid <?php the_field('dauer_teilnehmerzahl_stil'); ?>">
                <div class="row halfimage">
                    <div class="col-sm-6 image">
                        <div class="background" style="background-image: url('<?php the_field('dauer_teilnehmerzahl_bild'); ?>    ');"></div>
                    </div>                        
                    <div class="col-sm-6 content">
                        <div class="content-wrapper">
                            <div class="content-inner right">
                                <h2>Dauer</h2>
                                <?php the_field('dauer'); ?> 
                                <h2>Teilnehmerzahl</h2>
                                <?php the_field('teilnehmerzahl'); ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END MEHR INFOS -->
            
            <!-- BUDGETRAHMEN -->
            <section class="container-fluid <?php the_field('budgetrahmen_ziel'); ?>">
                <div class="row halfimage">
                    <div class="col-sm-6 content">
                        <div class="content-wrapper">
                            <div class="content-inner left">
                                <h2>Budgetrahmen</h2>
                                <?php the_field('budgetrahmen'); ?>    
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 image">
                        <div class="background" style="background-image: url('<?php the_field('budgetrahmen_bild'); ?>    ');"></div>
                    </div>                        
                </div>
            </section>
            <!-- END BUDGETRAHMEN -->

            <!-- STATEMENTS -->
            <section class="statements container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <h2>Kundenstatements</h2>
                    </div>
                </div>
            </section>
            <!-- END STATEMENTS -->
            
        </main>
<?php get_footer(); ?>