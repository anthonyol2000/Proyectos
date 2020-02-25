<?php get_header('front'); ?>

<?php the_content(); ?>

<section class="testimoniales">
    <h2 class="text-center texto-blanco">TESTIMONIALES</h2>

    <div class="contenedor-testimoniales">
        <ul class="listado-testimoniales">
            <?php 
                        $args = array(
                            'post_type' => 'testimoniales',
                            'posts_per_page' => 10
                        );
                        $testimoniales = new WP_Query($args);
                        while($testimoniales->have_posts()): $testimoniales->the_post();
                    ?>
            <li class="testimonial text-center">
                <blockquote>
                    <?php the_content(); ?>
                </blockquote>
                <footer class="testimonial-footer">
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <p><?php the_title(); ?></p>
                </footer>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
</section>

<section class="clases">
    <div class="contenedor seccion">
        <h2 class="text-center texto-primario">NUESTROS PROYECTOS
</h2>
<br>
        <?php gymfitness_lista_clases(4); ?>

        <div class="contenedor-boton">
            <a href="<?php echo esc_url( get_permalink( get_page_by_title('NUESTROS PROYECTOS') ) ); ?>"
                class="boton boton-primario">
                Ver todos los casos de éxito
            </a>
        </div>
    </div>
</section>

<!-- <section class="bienvenida text-center seccion">
    <h2 class="texto-primario"><?php the_field('encabezado_bienvenida'); ?></h2>
    <p><?php the_field('texto_bienvenida'); ?></p>
</section> -->

<!-- <section class="bienvenida text-center seccion">
    <h2 class="texto-primario"><?php the_field('encabezado_brindamos') ?></h2>
    <p><?php the_field('texto_brindamos') ?></p>
</section> -->

<!-- <section class="blog contenedor seccion">
    <h2 class="text-center texto-primario">Nuestro Blog</h2>
    <p class="text-center">Aprende tips de nuestros instructores expertos</p>
    <ul class="listado-blog">
        <?php
            // $args = array(
            //     'post_type' => 'post',
            //     'posts_per_page' => 4
            // );
            // $blog = new WP_Query($args);
            // while($blog->have_posts()): $blog->the_post(); 
            //     get_template_part('template-parts/loop', 'blog'); 
            // endwhile; wp_reset_postdata(); 
        ?>
    </ul>
</section> -->


<?php get_footer(); ?>