<?php
/* Template Name: Все проекты */

get_header(); ?>

<main class="page projects-page">

    <div class="projects-page__container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs-list">
                <li class="breadcrumbs-item"><a href="/" class="breadcrumbs-link">Главная / </a></li>
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
                    $main_slug = carbon_get_post_meta(get_the_ID(), 'project_slug');
                    $main_image_url = $main_image ? wp_get_attachment_image_url($main_image, 'medium') : '';
            ?>
                    <a href="/all-projects/<?php echo esc_html($main_slug); ?>" class="project-item ibg">
                        <?php if ($main_image_url): ?>
                            <img loading="lazy" class="project-img" src="<?php echo esc_url($main_image_url); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="project-title">
                            <?php the_title(); ?>
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Проекты не найдены.</p>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>