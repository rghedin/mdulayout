<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_single() ) : ?>
		<?php // echo adinserter (1); ?>
	<?php endif; ?>

	<?php if ( ( is_sticky() && is_home() ) || is_singular() || in_category('Comercial') /*|| !has_post_format() */) { ?>
		<?php
			// Post thumbnail.
			twentyfifteen_post_thumbnail();
		?>
	<?php } ?>

	<?php if ( in_category('Comercial') ) : ?>
		<div class="post-patrocinado">Post patrocinado <a href="/sobre#anuncios" target="_blank" title="O que é isto?">(?)</a></div>
	<?php elseif ( is_home() && is_sticky() && ! has_post_thumbnail() ) : ?>
		<div class="destaque-home destaque-home-no-thumbnail">Destaque</div>
	<?php elseif ( is_sticky() && is_home() ) : ?>
		<div class="destaque-home">Destaque</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>

		<div class="entry-header-meta">
			Por <?php if ( function_exists( 'coauthors_posts_links' ) ) {
				    coauthors_posts_links();
				} else {
				    the_author_posts_link();
				} ?> <br />
			<?php echo get_the_date('j/n/y'); ?>, <?php the_time('G\hi'); ?> <span class="tempo-leitura"><?php echo reading_time(); ?></span> <?php if ( !has_post_format() ) : ?><span class="link-comentarios"><?php comments_popup_link('Comente', '1 comentário', '% comentários'); ?> </span><?php endif; ?>
		</div>

		<div class="mdu-share">
			<div class="mdu-share__item">
				<a class="mdu-share__link mdu-share__link--fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;display=popup&amp;ref=plugin" target="_blank">
					<svg width="17px" height="17px" class="icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="156.5 249.1 295.7 296.3" enable-background="new 156.5 249.1 295.7 296.3" xml:space="preserve"><path id="White_2_" fill="#FFFFFF" d="M429.7,249.1H179.4c-9,0-22.9,13.9-22.9,22.9v250.3c0,9,13.9,22.9,22.9,22.9h135.3V430.5H276	V386h38.7v-32.9c0-38.3,23.5-59.3,57.7-59.3c16.4,0,30.3,1.3,34.5,1.6v39.9H383c-18.7,0-22.2,8.7-22.2,21.9V386h44.1l-5.8,44.8	h-38.7v114.7h68.9c9,0,22.9-13.9,22.9-22.9V272C452.9,263,438.7,249.1,429.7,249.1z"></path></svg>
				</a>
			</div>
			<div class="mdu-share__item">
				<a class="mdu-share__link mdu-share__link--tw" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;tw_p=tweetbutton&amp;url=<?php the_permalink(); ?>&amp;via=manualusuariobr" target="_blank">
					<svg width="17px" height="17px" class="icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="153 274.6 305.4 248.7" enable-background="new 153 274.6 305.4 248.7" xml:space="preserve"><g>	<path fill="#FFFFFF" d="M458.4,304.2c-11.3,4.8-23.2,8.4-36.1,10c12.9-7.7,22.9-20,27.7-34.8c-12.2,7.1-25.4,12.6-39.9,15.1		c-11.6-12.2-27.7-20-45.7-20c-34.8,0-62.8,28-62.8,62.8c0,4.8,0.6,9.7,1.6,14.2c-52.2-2.6-98.2-27.4-129.2-65.4		c-5.5,9.3-8.4,20-8.4,31.6c0,21.9,11,40.9,28,52.2c-10.3-0.3-20-3.2-28.3-7.7c0,0.3,0,0.6,0,0.6c0,30.3,21.6,55.7,50.2,61.5		c-5.2,1.3-11,2.3-16.4,2.3c-4.2,0-8.1-0.3-11.9-1c8.1,24.8,31.2,43.2,58.6,43.5c-21.6,16.7-48.6,26.7-77.9,26.7		c-5.2,0-10-0.3-14.8-1c27.7,17.7,60.9,28.3,96.3,28.3c115.3,0,178.4-95.7,178.4-178.4c0-2.6,0-5.5-0.3-8.1 C439.4,327.7,450,316.8,458.4,304.2L458.4,304.2z"></path></g></svg>
				</a>
			</div>
			<div class="mdu-share__item">
				<a class="mdu-share__link mdu-share__link--em" href="mailto:?subject=Leia isto: <?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" target="_blank">
					<svg width="17px" height="17px" class="icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="156.2 305.2 297.9 193.6" enable-background="new 156.2 305.2 297.9 193.6" xml:space="preserve"><g>	<polygon fill="#FFFFFF" points="305,438.8 453.8,305.2 156.2,305.2 	"></polygon>	<polygon fill="#FFFFFF" points="454.2,334.8 454.2,468.8 379.4,401.8 	"></polygon>	<polygon fill="#FFFFFF" points="156.2,334.8 156.2,468.8 230.9,401.8 	"></polygon>	<polygon fill="#FFFFFF" points="305,465.9 247.4,416.6 156.2,498.8 453.8,498.8 363,416.6 	"></polygon></g></svg>
				</a>
			</div>
		</div>
	</header>
	<hr class="post-entry-header-meta" /><!-- .entry-header -->

	<?php if ( is_sticky() || is_singular() || has_post_format('aside') || is_category() ) { ?>
		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'twentyfifteen' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php } ?>

	<?php if ( has_post_format('aside') && is_singular() ) { ?>
		<?php // echo adinserter (7); ?>
	<?php } ?>

	<?php if ( is_singular() ) { ?>
		<?php zemanta_related_posts() ?>
	<?php } ?>
</article><!-- #post-## -->

<?php if ( is_singular() ) { ?>
	<div class="follow">
<!--			<div class="follow-social">Siga <span>Nas redes sociais e em apps de chat</span><br />
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
		</div> -->
		<div class="follow-newsletter">Receba por e-mail <span>Um resumo semanal</span><br />
			<form action="https://tinyletter.com/manualdousuario" method="post" target="popupwindow" onsubmit="window.open('https://tinyletter.com/manualdousuario', 'popupwindow', 'scrollbars=yes,width=800,height=600');return true">
				<input type="text" name="email" class="tlemail" /><input type="hidden" value="1" name="embed" />
				<input type="submit" class="tlsend" value="Enviar" />
			</form>
		</div>
	</div>
<?php } ?>
