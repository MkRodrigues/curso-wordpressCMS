<?php
// Template Name: Portfólio
get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php include(TEMPLATEPATH . "/template/introducao.php"); ?>

		<section class="container animar-interno">
			<ul class="rslides">

				<?php if (have_rows('citacao_portfolio')) : while (have_rows('citacao_portfolio')) : the_row(); ?>
						<li>
							<blockquote class="quote_clientes">
								<?php the_sub_field('citacao'); ?>
								<cite><?php the_sub_field('autor_citacao'); ?></cite>
							</blockquote>
						</li>
				<?php endwhile;
				endif; ?>

			</ul>
		</section>

		<section class="portfolio">
			<div class="container">
				<?php include(TEMPLATEPATH . "/template/clientes-portfolio.php"); ?>
			</div>
		</section>

<?php endwhile;
endif; ?>
<?php get_footer(); ?>