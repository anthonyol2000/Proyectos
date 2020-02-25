<?php

function gymfitness_lista_clases($cantidad = -1) { ?>
    <ul class="lista-clases">
        <?php
            $args = array(
                'post_type' =>  'gymfitness_clases',
                'posts_per_page' => $cantidad
            );
            $clases = new WP_Query($args);
            while( $clases->have_posts() ): $clases->the_post(); ?>

            <li class="clase card gradient">
                <?php the_post_thumbnail('mediano'); ?>
                <div class="contenido">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <?php
                        $fecha= get_field('fecha');
                    ?>
                    <p><?php echo $fecha; ?></p>
                </div>
            </li>

            <?php endwhile; wp_reset_postdata(); ?>
    </ul>

<?php
}