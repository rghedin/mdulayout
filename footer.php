<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	<div class="compre">
		<p>Compre pelos links abaixo. O valor não muda e você ajuda o site:</p>
		<a href="https://www.amazon.com.br//ref=as_li_ss_tl?ie=UTF8&linkCode=ll2&tag=manudousua-20&linkId=39089c290b633512dc478545e818dd5e" target="_blank">Amazon</a> &bull; <a href="http://www.americanas.com.br/?franq=AFL-03-37228&loja=02" target="_blank">Americanas</a> &bull; <a href="https://ad.zanox.com/ppc/?36601608C1370714384&ULP=[[https://www.cissamagazine.com.br/?utm_medium=afiliados&utm_source=zanox&utm_campaign=deeplink_generator&utm_term=zanox&channel=29646554]]" target="_blank">Cissa Magazine</a> &bull; <a href="https://ad.zanox.com/ppc/?40191652C86843001&ULP=[[http://www.pontofrio.com.br/?utm_source=zanox&utm_medium=deeplink&utm_campaign=deeplink]]" target="_blank">Ponto Frio</a> &bull; <a href="https://ad.zanox.com/ppc/?40349327C16971995&ULP=[[http://www.ricardoeletro.com.br/?utm_source=zanox&utm_medium=deeplink_RE&utm_campaign=userid&prc=8803&utm_content=DeeplinkGenerator]]">Ricardo Eletro</a> &bull; <a href="https://ad.zanox.com/ppc/?40266771C43506995&ULP=[[http://www.saraiva.com.br/?PAC_ID=125109&utm_source=zanox&utm_medium=afiliados&utm_campaign=deeplink]]" target="_blank">Saraiva</a> &bull; <a href="http://www.shoptime.com.br/?franq=AFL-03-37228&loja=01" target="_blank">Shoptime</a> &bull; <a href="http://www.submarino.com.br/?franq=AFL-03-37228&loja=03" target="_blank">Submarino</a> &bull; <a href="https://ad.zanox.com/ppc/?40255055C93242807&ULP=[[https://www.walmart.com.br/?utm_source=zanox&utm_medium=afiliados&utm_campaign=custom_deeplink]]" target="_blank">Walmart</a>
	</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				/**
				 * Fires before the Twenty Fifteen footer text for footer customization.
				 *
				 * @since Twenty Fifteen 1.0
				 */
				do_action( 'twentyfifteen_credits' );
			?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyfifteen' ) ); ?>">WordPress</a>. <a href="http://creativecommons.org/licenses/by-nc/4.0/" target="_blank">CC BY-NC 4.0</a>. Desde 2013.
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

<!-- Begin comScore Tag -->
<script>
	var _comscore = _comscore || [];
	_comscore.push({ c1: "2", c2: "21011156" });
	(function() {
		var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
		s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
		el.parentNode.insertBefore(s, el);
	})();
</script>
<noscript>
	<img src="http://b.scorecardresearch.com/p?c1=2&c2=21011156&cv=2.0&cj=1" />
</noscript>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39399309-1', 'auto');
  ga('send', 'pageview');
</script>

</body>
</html>
