
<!-- Template Name: Contenido Centrado (No Sidebars) -->

<?php get_header() ?>

<main class="contenedor pagina seccion no-sidebar">
    <div class="contenido-principal">
        <!-- Esta funcion es como un 'include' en wordpress -->
        <?php get_template_part('template-parts/paginas'); ?>
    </div>
</main>
<?php get_footer(); ?>

