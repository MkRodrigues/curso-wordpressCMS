<?php
// Template Name: Home
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        // Precisamos pegar uma imagem grande quando o site estiver em tamanho total e uma imagem pequena para sites mobile, ambas proporcionais. Para podermos pegar as imagens cadastradas no arquivo function.php função my_custom_sizes() precisamos usar a função wp_get_attachment_image_src() que pega o caminho da imagem, passando como parâmetro um id da imagem, que estamos pegando com uma propriedade do Advanced Custom Fields (get_field), que ao invés de printar esse valor na tela como na propriedade the_field(), guardará o valor em si para uso posterior. 
        // O segundo parâmetro da função é o tamanho cadastrado na functions.php também na função criada my_custom_sizes(). Por fim, para acessarmos o retorno dessa função devemos passar o valor 0 em chaves [] = [0], este é o índice que retorna o valor da URL da imagem, que será passada no atributo url() do Css abaixo.

        $imagem_id = get_field('background_home');
        $background_large = wp_get_attachment_image_src($imagem_id, 'large');
        $background_medium = wp_get_attachment_image_src($imagem_id, 'medium');
        ?>

        <style type="text/css">
            .introducao {
                background: url("<?php echo $background_large[0] ?>") no-repeat center;
                background-size: cover;
            }

            @media only screen and(max-width:767px) {
                .introducao {
                    background: url("<?php echo $background_medium[0] ?>") no-repeat center;

                }
            }
        </style>

        <section class="introducao">
            <div class="container">
                <h1><?php the_field('titulo_introducao'); ?></h1>
                <blockquote class="quote-externo">
                    <p><?php the_field('citacao_introducao'); ?></p>
                    <cite><?php the_field('autor_citacao_introducao'); ?></cite>
                </blockquote>
                <a href="/produtos/" class="btn">Orçamento</a>
            </div>
        </section>

        <section class="produtos container animar">
            <h2 class="subtitulo">Produtos</h2>
            <ul class="produtos_lista">

                <?php
                $args = array(
                    'post_type' => 'produtos'
                );
                $the_query = new WP_Query($args);
                ?>

                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <li class="grid-1-3">
                            <a href="<?php the_permalink(); ?>">
                                <div class="produtos_icone">
                                    <img src="<?php the_field('icone_produto'); ?>" alt="Bikcraft Passeio">
                                </div>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_field('resumo_produto'); ?></p>
                            </a>
                        </li>

                <?php endwhile;
                endif; ?>
                <!-- Reseta o loop para que as outras informações do site, também dispostas em loop, continuem aparecendo normalmente -->
                <?php wp_reset_query();
                wp_reset_postdata(); ?>

            </ul>

            <div class="call">
                <p><?php the_field('chamada_produtos'); ?></p>
                <a href="/produtos/" class="btn btn-preto">Produtos</a>
            </div>

        </section>
        <!-- Fecha Produtos -->

        <section class="portfolio">
            <div class="container">
                <h2 class="subtitulo">Portfólio</h2>
                <?php include(TEMPLATEPATH . "/template/clientes-portfolio.php"); ?>
            </div>
        </section>

        <?php include(TEMPLATEPATH . "/template/qualidade.php"); ?>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>