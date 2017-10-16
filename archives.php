<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php
				the_archive_title( '<h1 class="entry-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<div class="entry-content">

			<p>O <strong>Manual do Usuário</strong> já publicou <em><?php echo wp_count_posts()->publish; ?></em> posts desde 15 de outubro de 2013.</p>

			<p>This is an example page. It’s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>

			<?php get_search_form(); ?>

			<h2>Archives by Month:</h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>

			<h2>Archives by Subject:</h2>
			<ul>
				 <?php wp_list_categories(); ?>
			</ul>

		</div>
	</article>

	</main><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
