<?php
/* Template Name: Nonexistent */
get_header(); ?>
<main class="page nonexistent-page">
    <div class="nonexistent-page__container">
        <div class="nonexistent-content">
            <div class="nonexistent-content__title">
                <?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'notfound_title')); ?>
            </div>
            <div class="nonexistent-content__subtitle">
                <?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'notfound_subtitle')); ?>
            </div>
            <div class="nonexistent-content__text">
                <?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'notfound_text')); ?>
            </div>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-blue">
                <?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'notfound_button_text')); ?>
            </a>
        </div>
    </div>
</main>
<?php get_footer(); ?>