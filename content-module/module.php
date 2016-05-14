<?php 
// check if the flexible content field has rows of data
if( have_rows('content_module') ):

     // loop through the rows of data
    while ( have_rows('content_module') ) : the_row(); ?>
        <!-- START MODULE -->
        
        <!--  TEXT MODUL -->
        <?php if( get_row_layout() == 'text' ): ?>
            <section class="module-text <?php the_sub_field('stil'); ?>">
                <div class="container">
                    <div class="row">
                        <?php if(get_sub_field('text_spalten') == '1' ): ?>
                            <div class="col-sm-10 col-sm-offset-1">
                                <?php the_sub_field('text_inhalt'); ?>
                            </div>
                            <?php if(get_sub_field('link')) { ?>
                                <div class="col-sm-10 col-sm-offset-1">
                                    <a class="btn" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_beschriftung'); ?></a>
                                </div>
                            <?php } ?>
                        <?php else: ?>
                            <div class="col-sm-5 col-sm-offset-1">
                                <?php the_sub_field('text_inhalt_links'); ?>
                            </div>
                            <div class="col-sm-5">
                                <?php the_sub_field('text_inhalt_rechts'); ?>
                            </div>
                            <?php if(get_sub_field('link')) { ?>
                                <div class="col-sm-10 col-sm-offset-1 center">
                                    <a class="btn" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_beschriftung'); ?></a>
                                </div>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        
        <!--  TEXT-BILD MODUL -->
        <?php elseif( get_row_layout() == 'textbild' ): ?>
            <section class="module-text-img <?php the_sub_field('stil'); ?>">
                <div class="container">
                        <?php $image = get_sub_field('textbild_bild');
                            // vars
	                       $url = $image['url'];
	                       $alt = $image['alt'];
	                       $size = 'imagenow';
	                       $thumb = $image['sizes'][ $size ];
                        ?>
                        
                        <!-- BILD LINKS -->
                        <?php if(get_sub_field('textbild_bildposition') == 'Links' ): ?>
                        <div class="row img-left">
                            <div class="col-sm-10 col-sm-offset-1 col-md-5">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </div>
                            <div class="col-sm-10 col-sm-offset-1 col-md-5 col-md-offset-0 content">
                                <?php the_sub_field('texttbild_inhalt'); ?>
                                <?php if(get_sub_field('link')) { ?>
                                    <a class="btn btn-md" href="<?php the_sub_field('link'); ?>"><?php  the_sub_field('link_beschriftung'); ?></a>
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                        <!-- END BILD LINKS -->
                        
                         <!-- BILD RECHTS -->
                        <?php if(get_sub_field('textbild_bildposition') == 'Rechts' ): ?>
                        <div class="row img-right">
                            <div class="col-sm-10 col-sm-offset-1 col-md-5 content">
                                <?php the_sub_field('texttbild_inhalt'); ?>
                                <?php if(get_sub_field('link')) { ?>
                                    <a class="btn btn-md" href="<?php the_sub_field('link'); ?>"><?php  the_sub_field('link_beschriftung'); ?></a>
                                <?php } ?>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1 col-md-5 col-md-offset-0">
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                            </div>
                        <?php endif; ?>
                        <!-- END BILD RECHTS -->
                        
                        <!-- LINK -->
                        <?php if(get_sub_field('link')) { ?>
                            <div class="btn-sm col-sm-10 col-sm-offset-1">
                                <a class="btn" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_beschriftung'); ?></a>
                            </div>
                        <?php } ?>
                        <!-- END LINK -->
                    </div>
                </div>
            </section>

        <!-- TEXT-AUFZAEHLUNG MODUL -->
        <?php elseif( get_row_layout() == 'textaufzahlung' ): ?>
            <section class="module-text-list <?php the_sub_field('stil'); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
        	               <?php the_sub_field('textaufzahlung_inhalt'); ?>
                        </div>
                        <div class="col-sm-10 col-sm-offset-1">
                            <!-- REPEAT AUFZÄHLUNGEN -->
                            <?php if( have_rows('textaufzahlung_aufzahlung') ): ?>
			                     <ul>
			                         <?php while ( have_rows('textaufzahlung_aufzahlung') ) : the_row(); ?>
                                        <li><?php the_sub_field('item'); ?></li>
                                     <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <?php if(get_sub_field('link')) { ?>
                            <div class="col-sm-10 col-sm-offset-1">
                                <a class="btn" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_beschriftung'); ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

        <!-- ZITAT VERKNÜPFUNGS MODUL -->
        <?php elseif( get_row_layout() == 'zitat' ): ?>
            <section class="module-citation image-full">
                <?php $post_object = get_sub_field('zitat_auswahl');
                    if( $post_object ): 
                        // override $post
                        $post = $post_object;
                        setup_postdata( $post ); 
	               ?>
                <div class="container">
                   <div class="row">
                       <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-1">                             

                             <!-- INHALT -->
                           <span class="title"><?php the_title(); ?></span>
                            <p><?php the_field('zitat'); ?></p>                       
                            <a class="btn" href="<?php the_field('link'); ?>"><?php the_field(  'linktext'); ?></a>

                       </div>
                    </div>
                </div>
                <?php $image = get_field('hintergrundbild');
                    // vars
                    $url = $image['url'];
                    $alt = $image['alt'];
                    $size = 'background';
                    $thumb = $image['sizes'][ $size ];
                ?>
                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </section>
        
        <!-- END MODULE
        <?php endif;

    endwhile;

else :

    // no layouts found

endif;

?> 