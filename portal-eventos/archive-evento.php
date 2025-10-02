<?php get_header(); ?>

<main class="eventos-lista container">
  <h1>Todos os Eventos</h1>

  <?php if (have_posts()) : ?>
    <div class="grid-eventos">
      <?php while (have_posts()) : the_post(); ?>
        <article class="evento-item">
          <?php if (get_field('imagem_principal')) : ?>
            <img src="<?php echo esc_url(get_field('imagem_principal')['url']); ?>" alt="<?php echo esc_attr(get_field('imagem_principal')['alt']); ?>">
          <?php endif; ?>

          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

          <p><strong>Tipo:</strong> <?php echo esc_html(get_field('tipo_de_evento')); ?></p>
          <p><strong>Data:</strong> <?php echo esc_html(get_field('data_de_inicio')); ?></p>

          <a href="<?php the_permalink(); ?>" class="btn">Ver detalhes</a>
        </article>
      <?php endwhile; ?>
    </div>
  <?php else : ?>
    <p>Nenhum evento encontrado.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
