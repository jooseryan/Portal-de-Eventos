<?php get_header(); ?>

<main class="evento-detalhe container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1><?php the_title(); ?></h1>

    <?php if (get_field('imagem_principal')) : ?>
      <img src="<?php echo esc_url(get_field('imagem_principal')['url']); ?>" alt="<?php echo esc_attr(get_field('imagem_principal')['alt']); ?>">
    <?php endif; ?>

    <p><strong>Tipo:</strong> <?php echo esc_html(get_field('tipo_de_evento')); ?></p>
    <p><strong>Descrição:</strong> <?php the_field('descricao'); ?></p>
    <p><strong>Data de início:</strong> <?php the_field('data_de_inicio'); ?></p>
    <p><strong>Data de término:</strong> <?php the_field('data_de_termino'); ?></p>
    <p><strong>Horário:</strong> <?php the_field('horario'); ?></p>
    <p><strong>Local:</strong> <?php the_field('local'); ?></p>
    <p><strong>Valor:</strong> R$ <?php the_field('valor'); ?></p>

    <?php 
      $tipo = get_field('tipo_de_evento');

      // Se for CURSO
      if ($tipo == 'Curso') : ?>
        <h2>Informações do Curso</h2>
        <p><strong>Carga horária:</strong> <?php the_field('carga_horaria'); ?> horas</p>
        <p><strong>Número de vagas:</strong> <?php the_field('numero_de_vagas'); ?></p>
        <p><strong>Público-alvo:</strong> <?php the_field('publico_alvo'); ?></p>
        <p><strong>Certificado:</strong> <?php echo get_field('certificado') ? 'Sim' : 'Não'; ?></p>
        <p><strong>Pré-requisitos:</strong> <?php the_field('pre_requisitos'); ?></p>
        <p><strong>Materiais fornecidos:</strong> <?php the_field('materiais_fornecidos'); ?></p>

      <?php elseif ($tipo == 'Oficina') : ?>
        <h2>Informações da Oficina</h2>
        <p><strong>Duração:</strong> <?php the_field('duracao'); ?></p>
        <p><strong>Número de vagas:</strong> <?php the_field('numero_de_vagas'); ?></p>
        <p><strong>Materiais necessários:</strong> <?php the_field('materiais_necessarios'); ?></p>
        <p><strong>Instrutor:</strong> <?php the_field('instrutor'); ?></p>
        <p><strong>Formato:</strong> <?php the_field('formato'); ?></p>

      <?php elseif ($tipo == 'Palestra') : ?>
        <h2>Informações da Palestra</h2>
        <p><strong>Palestrante:</strong> <?php the_field('palestrante'); ?></p>
        <p><strong>Duração:</strong> <?php the_field('duracao'); ?></p>
        <p><strong>Local/Link:</strong> <?php the_field('locallink'); ?></p>
        <p><strong>Público-alvo:</strong> <?php the_field('publico_alvo'); ?></p>
        <p><strong>Inscrição necessária:</strong> <?php echo get_field('inscricao_necessaria') ? 'Sim' : 'Não'; ?></p>
        <p><strong>Tema:</strong> <?php the_field('tema'); ?></p>
      <?php endif; 
    ?>

    <p><a href="<?php echo get_post_type_archive_link('eventos'); ?>">← Voltar para todos os eventos</a></p>

  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
