<?php
/* Template Name: Página de Eventos */
get_header();
?>

<main class="eventos-lista">
    <h1><?php the_title(); ?></h1>

    <div class="conteudo-elementor">
        <?php the_content(); ?>
    </div>

    <?php
    $args = array(
        'post_type'      => 'evento', // o slug do seu CPT
        'posts_per_page' => -1        // mostra todos os eventos
    );

    $eventos = new WP_Query($args);

    if ($eventos->have_posts()) :
        echo '<ul>';
        while ($eventos->have_posts()) : $eventos->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <?php if (has_post_thumbnail()) : ?>
                        <div><?php the_post_thumbnail('medium'); ?></div>
                    <?php endif; ?>
                    <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                </a>
            </li>
        <?php endwhile;
        echo '</ul>';
    else :
        echo '<p>Nenhum evento encontrado.</p>';
    endif;

    wp_reset_postdata();
    ?>
</main>

<?php get_footer(); ?>
