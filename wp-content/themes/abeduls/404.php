<?php get_header(); ?>
<main class="page nonexistent-page">
    <div class="nonexistent-page__container">
        <div class="nonexistent-content">
            <div class="nonexistent-content__title">404</div>
            <div class="nonexistent-content__subtitle">Страница не найдена</div>
            <div class="nonexistent-content__text">
                Неправильно набран адрес или такой страницы не существует
            </div>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-blue">На главную</a>
        </div>
    </div>
</main>
<?php get_footer(); ?>