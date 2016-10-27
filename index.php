<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

				if ( $count == 0 ) : ?>
					<div class="follow">
						<div class="follow-social">Siga  <span>Nas redes sociais e em apps de chat</span><br />
							<ul>
								<li class="follow-social-first">
									<a class="follow-social-logo messenger" href="https://m.me/manualdousuario" target="_blank"><img src="/wp-content/themes/twentyfifteen/img/messenger.png" alt="Messenger" />&nbsp;Messenger</a>
								</li>
								<li>
									<a class="follow-social-logo telegram" href="https://telegram.me/manualdousuario" target="_blank"><img src="/wp-content/themes/twentyfifteen/img/telegram.png" alt="Telegram" />&nbsp;Telegram</a>
								</li>
								<li class="follow-social-last">
									<a class="follow-social-logo twitter" href="https://twitter.com/manualusuariobr" target="_blank"><img src="/wp-content/themes/twentyfifteen/img/twitter.png" alt="Twitter" />&nbsp;Twitter</a>
								</li>
							</ul>
						</div>
						<div class="follow-newsletter">Receba por e-mail <span>Um resumo semanal</span><br />
							<form action="https://tinyletter.com/manualdousuario" method="post" target="popupwindow" onsubmit="window.open('https://tinyletter.com/manualdousuario', 'popupwindow', 'scrollbars=yes,width=800,height=600');return true">
								<input type="text" name="email" class="tlemail" /><input type="hidden" value="1" name="embed" />
								<input type="submit" class="tlsend" value="Enviar" />
							</form>
						</div>
					</div>
				<?php endif; // ( $count == 2 )

				$count++;
			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
