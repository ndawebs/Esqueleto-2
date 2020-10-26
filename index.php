<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php PG_Helper::rememberShownPost(); ?>
        <div>
            <article>
                <?php if ( is_singular() ) : ?>
                    <h1><?php the_title(); ?></h1>
                <?php else : ?>
                    <h1><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h1>
                <?php endif; ?>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#"> </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#"></a>
                    </li>
                    <li class="breadcrumb-item active"></li>
                </ol>
                <p><?php the_content(); ?></p>
                <span><b><?php _e( 'Autor:', 'esqueleto2' ); ?></b><?php _e( 'Martin Oviedo', 'esqueleto2' ); ?></span>
            </article>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.', 'esqueleto2' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>