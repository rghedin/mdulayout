<?php
/**
 * The default template for displaying promoção content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('promocao') ); ?>>

    <div class="entry-content">

        <h1 class="promocao__title">
            <?php the_title(); ?>
        </h1>
        <div class="entry-header-meta" style="margin: 2.4em 0 0; padding-bottom: 2.4em; line-height: 1.2em; /*border-bottom: 1px solid #EBEBEB;*/">
            Atualizado em<br /><?php the_modified_time('j/n/Y\, \à\s G:i') ?>
            <div class="mdu-share">
                <div class="mdu-share__item">
                    <a class="mdu-share__link mdu-share__link--fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;display=popup&amp;ref=plugin" target="_blank">
                        <svg class="icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="156.5 249.1 295.7 296.3" enable-background="new 156.5 249.1 295.7 296.3" xml:space="preserve"><path id="White_2_" fill="#FFFFFF" d="M429.7,249.1H179.4c-9,0-22.9,13.9-22.9,22.9v250.3c0,9,13.9,22.9,22.9,22.9h135.3V430.5H276   V386h38.7v-32.9c0-38.3,23.5-59.3,57.7-59.3c16.4,0,30.3,1.3,34.5,1.6v39.9H383c-18.7,0-22.2,8.7-22.2,21.9V386h44.1l-5.8,44.8  h-38.7v114.7h68.9c9,0,22.9-13.9,22.9-22.9V272C452.9,263,438.7,249.1,429.7,249.1z"></path></svg>
                    </a>
                </div>
                <div class="mdu-share__item">
                    <a class="mdu-share__link mdu-share__link--tw" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;tw_p=tweetbutton&amp;url=<?php the_permalink(); ?>&amp;via=mdu_promocoes" target="_blank">
                        <svg class="icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="153 274.6 305.4 248.7" enable-background="new 153 274.6 305.4 248.7" xml:space="preserve"><g>   <path fill="#FFFFFF" d="M458.4,304.2c-11.3,4.8-23.2,8.4-36.1,10c12.9-7.7,22.9-20,27.7-34.8c-12.2,7.1-25.4,12.6-39.9,15.1        c-11.6-12.2-27.7-20-45.7-20c-34.8,0-62.8,28-62.8,62.8c0,4.8,0.6,9.7,1.6,14.2c-52.2-2.6-98.2-27.4-129.2-65.4     c-5.5,9.3-8.4,20-8.4,31.6c0,21.9,11,40.9,28,52.2c-10.3-0.3-20-3.2-28.3-7.7c0,0.3,0,0.6,0,0.6c0,30.3,21.6,55.7,50.2,61.5     c-5.2,1.3-11,2.3-16.4,2.3c-4.2,0-8.1-0.3-11.9-1c8.1,24.8,31.2,43.2,58.6,43.5c-21.6,16.7-48.6,26.7-77.9,26.7     c-5.2,0-10-0.3-14.8-1c27.7,17.7,60.9,28.3,96.3,28.3c115.3,0,178.4-95.7,178.4-178.4c0-2.6,0-5.5-0.3-8.1 C439.4,327.7,450,316.8,458.4,304.2L458.4,304.2z"></path></g></svg>
                    </a>
                </div>
                <div class="mdu-share__item">
                    <a class="mdu-share__link mdu-share__link--em" href="mailto:?subject=Leia isto: <?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" target="_blank">
                        <svg class="icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="156.2 305.2 297.9 193.6" enable-background="new 156.2 305.2 297.9 193.6" xml:space="preserve"><g>   <polygon fill="#FFFFFF" points="305,438.8 453.8,305.2 156.2,305.2   "></polygon>    <polygon fill="#FFFFFF" points="454.2,334.8 454.2,468.8 379.4,401.8     "></polygon>    <polygon fill="#FFFFFF" points="156.2,334.8 156.2,468.8 230.9,401.8     "></polygon>    <polygon fill="#FFFFFF" points="305,465.9 247.4,416.6 156.2,498.8 453.8,498.8 363,416.6     "></polygon></g></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="promocao__wrapper">
            <div class="promocao__thumb">
                <div class="promocao__thumb__discount">
                    <?php mdu_the_desconto( mdu_get_meta( 'mdu_preco_original' ), mdu_get_meta( 'mdu_preco_promocao' ) ); ?>
                </div>
                <a href="<?php echo mdu_get_meta( 'mdu_link' ) ?>">
                    <?php the_post_thumbnail('promocao-thumb'); ?>
                </a>
            </div>
            <div class="promocao__details">
                <div class="promocao__details__content">
                    <div class="promocao__price">
                        De R$ <?php echo mdu_get_meta( 'mdu_preco_original' ) ?>
                    </div>
                    <div class="promocao__price--sale">
                        Por <strong>R$ <?php echo mdu_get_meta( 'mdu_preco_promocao' ) ?></strong>
                    </div>
                </div>
                <div class="promocao__details__footer">
                    <a class="promocao__cta mdu-button" href="<?php echo mdu_get_meta( 'mdu_link' ) ?>" target="_blank">
                        Comprar
                    </a>
                    <?php if ( !is_singular ( 'promocao' ) ) : ?>
                        <a class="promocao__read-more" href="<?php the_permalink(); ?>">
                            Mais detalhes &raquo;
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ( is_singular ( 'promocao' ) ) : ?>
            <div class="promocao__intro">
                <h2>Observações</h2>
                <?php the_content(); ?>
            </div>
        <?php endif; ?>

        <?php if ( is_singular ( 'promocao' ) ) : ?>

            <footer class="promocao__footer">
                <div class="promocao__thanks">
                    <?php echo mdu_get_meta( 'mdu_agradecimento' ) ?>
                </div>
                <h3> Histórico de preços </h3>
                <div class="promocao__chart">
                    <canvas id="canvas" height="200" width="600"></canvas>
                </div>
                <hr>
                <?php $tags = wp_get_post_terms( get_the_ID(), 'tagpromocao' ); ?>
                <?php if ( $tags ) : ?>
                    <div class="promocao__tag-navigation">
                        <p>
                            Veja mais promoções de
                            <?php foreach ( $tags as $tag ) : ?>
                                <a href="<?php echo get_term_link( $tag ) ?>"> <?php echo ( $tag === end($tags) ) ? $tag->name . '</a>.' : $tag->name . '</a>, '; ?>
                            <?php endforeach; ?>
                        </p>
                    </div>
                <?php endif; ?>
                <a href="<?php echo get_post_type_archive_link( 'promocao' ); ?>" class="promocao__index">&laquo; Voltar ao índice de promoções</a>
            </footer>
            <hr />
                <p>Comprando pelos links desta página o preço não muda e o <strong>Manual do Usuário</strong> ganha uma pequena comissão sobre a venda de cada produto para continuar funcionando. Não nos responsabilizamos por diferenças nos preços expostos aqui e os praticados pelas lojas, nem por eventuais problemas na relação de consumo com elas. Para mais informações, leia a <a href="http://www.manualdousuario.net/sobre">política de privacidade</a>.

        <?php endif; ?>

    </div>
</article>
