<?php
/* Template Name: Projects */
$breadcrumbs_main = carbon_get_post_meta(get_the_ID(), 'breadcrumbs_main');
$project_link = carbon_get_post_meta(get_the_ID(), 'project_link');
$empty_projects = carbon_get_post_meta(get_the_ID(), 'empty_projects');
get_header(); ?>

<main class="page projects-page">

    <div class="projects-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs-link"><?php echo esc_html($breadcrumbs_main); ?> / </a></li>
                <li class="breadcrumbs-item breadcrumbs-current"><?php echo esc_html(carbon_get_the_post_meta('all_projects_title')); ?></li>
            </ul>
        </nav>

        <div class="block-title">
            <?php echo esc_html(carbon_get_the_post_meta('all_projects_title')); ?>
        </div>

        <div class="project-items">
            <?php
            // Получаем проекты
            $projects = new WP_Query([
                'post_type' => 'projects',
                'posts_per_page' => -1, // Все проекты
            ]);

            if ($projects->have_posts()) :
                while ($projects->have_posts()) : $projects->the_post();
                    $main_image = carbon_get_post_meta(get_the_ID(), 'project_main_image');
                    $main_image_url = $main_image ? wp_get_attachment_image_url($main_image, 'medium') : '';
            ?>
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="project-item ibg">
                        <?php if ($main_image_url): ?>
                            <img loading="lazy" class="project-img" src="<?php echo esc_url($main_image_url); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="project-title">
                            <?php the_title(); ?>
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php else: ?>
                <p><?php echo esc_html($empty_projects); ?></p>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>