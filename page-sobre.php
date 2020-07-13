<?php
// Template Name: Sobre
get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php include(TEMPLATEPATH . "/template/introducao.php"); ?>

		<section class="missao_sobre container animar-interno">
			<div class="grid-10">
				<h2 class="subtitulo-interno">História, Missão e Visão</h2>
				<?php the_field('historia_missao_e_visao'); ?>
			</div>

			<div class="grid-6">
				<h2 class="subtitulo-interno">Valores</h2>
				<?php the_field('valores'); ?>
			</div>

			<div class="grid-16 foto-equipe">
				<img src="<?php the_field('imagem_equipe'); ?>" alt="">
				<!-- <img src="img/equipe-bikcraft.jpg" alt="Equipe Bikcraft"> -->
			</div>
		</section>

		<?php include(TEMPLATEPATH . "/template/qualidade.php"); ?>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>