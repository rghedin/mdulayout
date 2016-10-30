<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<article class="promocao__archive hentry">

			<header class="entry-header">
				<h1 class="entry-title">Promoções, descontos e cupons</h1>
			</header>
			<div class="entry-content">
				<p>Nesta página o <strong>Manual do Usuário</strong> faz uma curadoria manual das melhores promoções do varejo brasileiro. Antes de comprar, dê uma olhada aqui.</p>
				<div class="promocao__top">
					<a href="http://www.manualdousuario.net/contato/" class="promocao__top__link">
						Sugira uma promoção ou informe erros
					</a>
					<div class="promocao__top__search">
						<?php get_search_form(); ?>
					</div>
				</div>
				<div class="promocao__highlight">
					<div class="promocao__passarinho">
						<img width="64" height="52" src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter-128.png" alt=""> 
					</div>
					<a href="http://twitter.com/mdu_promocoes" class="promocao__highlight__link">
						Siga @mdu_promocoes no Twitter
					</a>
				</div>
			</div>
		</article>


		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'promocao' ); ?>
			<?php endwhile; ?>

			<?php the_posts_pagination( array('prev_text' => __( 'Previous page', 'twentyfifteen' ), 'next_text' => __( 'Next page', 'twentyfifteen' ), 'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>', ) ); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<article class="promocao__archive hentry">
			<div class="entry-content">
				<hr />
				<?php $tags = get_terms( 'tagpromocao' ); ?>
				<?php if ( $tags ) : ?>
					<div class="promocao__tag-navigation">
						<p style="margin-bottom: 0">Filtre as promoções por palavra-chave:</p>
						<p><?php foreach ( $tags as $tag ) : ?>
							<a href="<?php echo get_term_link( $tag ) ?>"> <?php echo ( $tag === end($tags) ) ? $tag->name . '</a>.' : $tag->name . '</a>, '; ?>
						<?php endforeach; ?></p>
					</div>
				<?php endif; ?>
				<hr />
				<p>Comprando pelos links desta página o preço não muda e o <strong>Manual do Usuário</strong> ganha uma pequena comissão sobre a venda de cada produto para continuar funcionando. Não nos responsabilizamos por diferenças nos preços expostos aqui e os praticados pelas lojas, nem por eventuais problemas na relação de consumo com elas. Para mais informações, leia a <a href="http://www.manualdousuario.net/sobre">política de privacidade</a>.
				</div>
			</article>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

	<?php get_footer(); ?>
