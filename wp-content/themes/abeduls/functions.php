<?php


function website_assets()
{
    wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/layout/css/swiper-bundle.min.css');
    wp_enqueue_style('intlTelInput', get_template_directory_uri() . '/layout/css/intlTelInput.css');
    wp_enqueue_style('maincss', get_template_directory_uri() . '/layout/css/style.css');

    wp_enqueue_script('forms-validator', get_template_directory_uri() . '/layout/js/forms-validator.js', array(), null, true);
    wp_enqueue_script('popup', get_template_directory_uri() . '/layout/js/popup.js', array(), null, true);
    wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/layout/js/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('fslightbox', get_template_directory_uri() . '/layout/js/fslightbox.js', array(), null, true);
    wp_enqueue_script('intlTelInput', get_template_directory_uri() . '/layout/js/intlTelInput.min.js', array(), null, true);
    wp_enqueue_script('xlsx', get_template_directory_uri() . '/layout/js/xlsx.min.js', array(), null, true);
    wp_enqueue_script('app', get_template_directory_uri() . '/layout/js/app.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'website_assets');

show_admin_bar(false);


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
});

add_action('carbon_fields_register_fields', function () {
    // Общие настройки формы с мультиязычными подсказками
    Container::make('post_meta', 'Общие настройки форм / Forms Settings / 常规表格设置')
        ->where('post_type', '=', 'forms')
        ->add_fields([
            Field::make('complex', 'form_emails', 'Почты получателей / Email Recipients / 电子邮件收件人')
                ->add_fields([
                    Field::make('text', 'email', 'Email')
                        ->set_attribute('placeholder', 'example@domain.com')
                        ->set_help_text('
                        Добавьте адреса электронной почты, на которые будут отправляться заявки. <br>
                        Add email addresses where form submissions will be sent. <br>
                        添加将接收表单提交的电子邮件地址')
                ])
                ->set_help_text('
                        Вы можете добавить несколько email-адресов. <br>
                        You can add multiple email addresses <br>
                        您可以添加多个电子邮件地址'),
            // Новое поле для текста политики конфиденциальности
            Field::make('rich_text', 'popup_privacy_policy_text', 'Текст политики конфиденциальности / Privacy Policy Text / 隐私政策文本')
                ->set_help_text('
                Укажите текст политики конфиденциальности, который будет отображаться в попапе. <br>
                Specify the privacy policy text to be displayed in the popup. <br>
                指定将在弹出窗口中显示的隐私政策文本。'),
            // Новое поле для текста пользовательское соглашение
            Field::make('rich_text', 'popup_user_agreement_text', 'Текст пользовательского соглашения / User agreement Text / 隐私政策文本')
                ->set_help_text('
                Укажите текст пользовательского соглашения, который будет отображаться в попапе. <br>
                Specify the user agreement text to be displayed in the popup. <br>
                指定将在弹出窗口中显示的隐私政策文本。'),
        ]);

    // Настройки формы "Заказать звонок" / "Request a Call" / "请求通话"
    Container::make('post_meta', 'Заказать звонок / Request a Call / 请求通话')
        ->where('post_type', '=', 'forms')
        ->add_fields([
            Field::make('text', 'request_a_call_form_popup_title', 'Заголовок формы / Form Title / 表单标题')
                ->set_attribute('placeholder', 'Заказать звонок / Request a Call / 请求通话')
                ->set_help_text('
                    Укажите заголовок формы, который будет отображаться в попапе. <br>
                    Specify the form title to be displayed in the popup. <br>
                    指定将在弹出窗口中显示的表单标题.'),

            Field::make(
                'text',
                'request_a_call_form_name_title',
                'Заголовок имени / Name title / 姓名占位符'
            )
                ->set_attribute('placeholder', 'Ваше имя / Your Name / 您的姓名')
                ->set_help_text('
                    Заголовок для поля "Ваше имя". <br>
                    Title for the "Your Name" field. <br>
                    "您的姓名"字段的占位符.'),

            Field::make(
                'text',
                'request_a_call_form_phone_title',
                'Заголовок телефона / Phone Title / 电话占位符'
            )
                ->set_help_text('
                    Заголовок для поля "Телефон". <br>
                    Title for the "Phone" field. <br>
                    "电话"字段的占位符.'),

            Field::make('text', 'request_a_call_form_checkbox_label', 'Метка чекбокса / Checkbox Label / 复选框标签')
                ->set_attribute('placeholder', 'Я даю согласие на обработку персональных данных')
                ->set_help_text('
                    Текст для чекбокса согласия, например "Я даю согласие на обработку персональных данных". <br>
                    Text for the consent checkbox, e.g. “I consent to the processing of personal data”. <br>
                    同意复选框的文本，例如 “我同意处理个人数据”。.'),

            Field::make(
                'text',
                'request_a_call_form_button_text',
                'Текст кнопки / Button Text / 按钮文本'
            )
                ->set_attribute('placeholder', 'Заказать / Order / 订购')
                ->set_help_text('
                    Текст кнопки отправки формы. <br>
                    Text for the form submit button. <br>
                    表单提交按钮的文本.'),
        ]);

    // Настройки формы "Заявка на товар"
    Container::make('post_meta', 'Заявка на товар / Product Request Form / 商品请求表单')
        ->where('post_type', '=', 'forms')
        ->add_fields([
            Field::make('text', 'product_request_form_title', 'Заголовок формы / Form Title / 表单标题')
                ->set_attribute('placeholder', 'Оформить заявку / Submit an Application / 提交申请')
                ->set_help_text('
                Укажите заголовок формы, который будет отображаться в попапе. <br>
                Specify the form title to be displayed in the popup. <br>
                指定将在弹出窗口中显示的表单标题.'),

            Field::make(
                'text',
                'product_request_form_name_title',
                'Заголовок имени / Name Title / 姓名占位符'
            )
                ->set_attribute('placeholder', 'Ваше имя / Your Name / 您的姓名')
                ->set_help_text('
                Заголовок для поля "Ваше имя". <br>
                Title for the "Your Name" field. <br>
                "您的姓名"字段的占位符.'),

            Field::make(
                'text',
                'product_request_form_phone_title',
                'Заголовок телефона / Phone Title / 电话占位符'
            )
                ->set_attribute('placeholder', 'Ваш телефон / Your Phone / 您的电话')
                ->set_help_text('
                Заголовок для поля "Телефон". <br>
                Title for the "Phone" field. <br>
                "电话"字段的占位符.'),

            Field::make('text', 'product_request_form_checkbox_label', 'Метка чекбокса / Checkbox Label / 复选框标签')
                ->set_attribute('placeholder', 'Я даю согласие на обработку персональных данных')
                ->set_help_text('
                Текст для чекбокса согласия, например "Я даю согласие на обработку персональных данных". <br>
                Text for the consent checkbox, e.g. “I consent to the processing of personal data”. <br>
                同意复选框的文本，例如 “我同意处理个人数据”。.'),

            Field::make(
                'text',
                'product_request_form_button_text',
                'Текст кнопки / Button Text / 按钮文本'
            )
                ->set_attribute('placeholder', 'Заказать / Order / 订购')
                ->set_help_text('
                Текст кнопки отправки формы. <br>
                Text for the form submit button. <br>
                表单提交按钮的文本.'),
        ]);
    // Настройки формы "Резюме"
    Container::make('post_meta', 'Отправить резюме / Submit Resume / 提交简历')
        ->where('post_type', '=', 'forms')
        ->add_fields([
            Field::make('text', 'career_form_title', 'Заголовок формы / Form Title / 表单标题')
                ->set_attribute('placeholder', 'Отправить резюме / Submit Resume / 提交简历')
                ->set_help_text('
                Укажите заголовок формы, который будет отображаться в попапе. <br>
                Specify the form title to be displayed in the popup. <br>
                指定将在弹出窗口中显示的表单标题.'),

            Field::make('text', 'career_form_name_title', 'Заголовок имени / Name Title / 姓名占位符')
                ->set_attribute('placeholder', 'Ваше имя / Your Name / 您的姓名')
                ->set_help_text('
                Заголовок для поля "Ваше имя". <br>
                Title for the "Your Name" field. <br>
                "您的姓名"字段的占位符.'),

            Field::make('text', 'career_form_phone_title', 'Заголовок телефона / Phone Title / 电话占位符')
                ->set_attribute('placeholder', 'Ваш телефон / Your Phone / 您的电话')
                ->set_help_text('
                Заголовок для поля "Телефон". <br>
                Title for the "Phone" field. <br>
                "电话"字段的占位符.'),

            Field::make('text', 'career_form_position_title', 'Заголовок желаемой должности / Position Title / 职位标题')
                ->set_attribute('placeholder', 'Желаемая должность / Desired Position / 希望职位')
                ->set_help_text('
                Заголовок для поля "Желаемая должность". <br>
                Title for the "Desired Position" field. <br>
                "希望职位"字段的标题.'),

            Field::make('text', 'career_form_email_title', 'Заголовок email / Email Title / 邮箱标题')
                ->set_attribute('placeholder', 'Email / Email / 邮箱')
                ->set_help_text('
                Заголовок для поля "Email". <br>
                Title for the "Email" field. <br>
                "邮箱"字段的标题.'),

            Field::make('text', 'career_form_file_title', 'Заголовок для загрузки файла / File Title / 文件标题')
                ->set_attribute('placeholder', 'Резюме / Resume / 简历')
                ->set_help_text('
                Заголовок для поля загрузки файла. <br>
                Title for the file upload field. <br>
                文件上传字段的标题.'),

            Field::make('text', 'career_form_cover_letter_title', 'Заголовок для сопроводительного письма / Cover Letter Title / 求职信标题')
                ->set_attribute('placeholder', 'Сопроводительное письмо / Cover Letter / 求职信')
                ->set_help_text('
                Заголовок для поля "Сопроводительное письмо". <br>
                Title for the "Cover Letter" field. <br>
                "求职信"字段的标题.'),

            Field::make('text', 'career_form_checkbox_label', 'Метка чекбокса / Checkbox Label / 复选框标签')
                ->set_attribute('placeholder', 'Я даю согласие на обработку персональных данных')
                ->set_help_text('
                Текст для чекбокса согласия. <br>
                Text for the consent checkbox. <br>
                同意复选框的文本.'),

            Field::make('text', 'career_form_button_text', 'Текст кнопки / Button Text / 按钮文本')
                ->set_attribute('placeholder', 'Отправить / Submit / 提交')
                ->set_help_text('
                Текст кнопки отправки формы. <br>
                Text for the form submit button. <br>
                表单提交按钮的文本.'),
        ]);
    // данные для Попапа подтверждения
    Container::make('post_meta', 'Попап подтверждения / Confirmation Popup / 确认弹窗')
        ->where('post_type', '=', 'forms')
        ->add_fields([
            Field::make('text', 'confirm_popup_title', 'Заголовок попапа / Popup Title / 弹窗标题')
                ->set_attribute('placeholder', 'Спасибо за заявку')
                ->set_help_text('
                Укажите заголовок, который будет отображаться в подтверждающем попапе. <br>
                Specify the title to be displayed in the confirmation popup. <br>
                指定将在确认弹窗中显示的标题.'),

            Field::make('text', 'confirm_popup_subtitle', 'Подзаголовок попапа / Popup Subtitle / 弹窗副标题')
                ->set_attribute('placeholder', 'Мы свяжемся с Вами в ближайшее время')
                ->set_help_text('
                Укажите текст подзаголовка для подтверждающего попапа. <br>
                Specify the subtitle text for the confirmation popup. <br>
                指定确认弹窗的副标题文本.'),

            Field::make('text', 'confirm_popup_button_text', 'Текст кнопки / Button Text / 按钮文本')
                ->set_attribute('placeholder', 'ОК')
                ->set_help_text('
                Укажите текст кнопки в попапе подтверждения. <br>
                Specify the button text in the confirmation popup. <br>
                指定确认弹窗中的按钮文本.'),
        ]);
    // данные для Главной формы консультации
    Container::make('post_meta', 'Главная форма / Main Form / 主表单')
        ->where(
            'post_type',
            '=',
            'forms'
        )
        ->add_fields([
            Field::make('text', 'main_form_title', 'Заголовок формы / Form Title / 表单标题')
                ->set_attribute('placeholder', 'Не нашли, что искали?')
                ->set_help_text('
                Укажите заголовок формы, который будет отображаться на главной странице. <br>
                Specify the form title to be displayed on the main page. <br>
                指定将在主页上显示的表单标题.'),

            Field::make('textarea', 'main_form_subtitle', 'Подзаголовок формы / Form Subtitle / 表单副标题')
                ->set_attribute('placeholder', 'Предложим варианты, подходящие под различные бюджеты...')
                ->set_help_text('
                Укажите подзаголовок формы, например "Предложим варианты, подходящие под различные бюджеты..". <br>
                Specify a subheading for the form, such as “Offer options to fit a variety of budgets...” <br>
                为表格指定一个小标题，例如 "提供适合各种预算的选项......”'),

            Field::make('text', 'main_form_form_name_title', 'Заголовок имени / Name Title / 姓名占位符')
                ->set_attribute('placeholder', 'Ваше имя / Your Name / 您的姓名')
                ->set_help_text('
                Заголовок для поля "Ваше имя". <br>
                Title for the "Your Name" field. <br>
                "您的姓名"字段的占位符.'),

            Field::make('text', 'main_form_form_phone_title', 'Заголовок телефона / Phone Title / 电话占位符')
                ->set_attribute('placeholder', 'Ваш телефон / Your Phone / 您的电话')
                ->set_help_text('
                Заголовок для поля "Телефон". <br>
                Title for the "Phone" field. <br>
                "电话"字段的占位符.'),

            Field::make('text', 'main_form_button_text', 'Текст кнопки / Button Text / 按钮文本')
                ->set_attribute('placeholder', 'Получить консультацию')
                ->set_help_text('
                Укажите текст кнопки для формы, например "Получить консультацию". <br>
                Specify the button text for the form, e.g. “Get a consultation” <br>
                指定表单的按钮文本，如 “获取咨询”。'),

            Field::make('text', 'main_form_sending_title', 'Заголовок подтверждения / Confirmation Title / 确认标题')
                ->set_attribute('placeholder', 'Спасибо за обращение!')
                ->set_help_text('
                Укажите заголовок окна подтверждения отправки формы, например "Спасибо за обращение!". <br>
                Specify a title for the form submission confirmation window, e.g. “Thank you for applying!”. <br>
                指定表格提交确认窗口的标题，例如 "感谢您的申请！”'),

            Field::make('textarea', 'main_form_sending_subtitle', 'Подзаголовок подтверждения / Confirmation Subtitle / 确认副标题')
                ->set_attribute('placeholder', 'Мы свяжемся с Вами в ближайшее время')
                ->set_help_text('
                Укажите подзаголовок окна подтверждения отправки формы, например "Мы свяжемся с Вами в ближайшее время". <br>
                Specify a subheading for the form submission confirmation window, e.g. “We will contact you shortly”. <br>
                为表格提交确认窗口指定一个副标题，例如 “我们将尽快与您联系”。'),
        ]);

    // данные для Формы помощника
    Container::make('post_meta', 'Форма помощника / Helper Form / 帮助表单')
        ->where('post_type', '=', 'forms')
        ->add_fields([
            Field::make('text', 'helper_form_title', 'Заголовок формы / Form Title / 表单标题')
                ->set_attribute('placeholder', 'Поможем подобрать')
                ->set_help_text('
                Укажите заголовок формы, например "Поможем подобрать". <br>
                Specify the form title, e.g. “We will help you choose”. <br>
                指定表单标题，例如 “我们将帮助您选择”。'),

            Field::make('textarea', 'helper_form_subtitle', 'Подзаголовок формы / Form Subtitle / 表单副标题')
                ->set_attribute('placeholder', 'Предложим варианты, подходящие под различные бюджеты...')
                ->set_help_text('
                Укажите подзаголовок формы, например "Предложим варианты, подходящие под различные бюджеты...". <br>
                Specify the form subtitle, e.g. “We will offer options suitable for different budgets…”. <br>
                指定表单副标题，例如 “我们将提供适合不同预算的选项……”。'),

            Field::make('text', 'helper_form_form_name_title', 'Заголовок имени / Name Title / 姓名占位符')
                ->set_attribute('placeholder', 'Ваше имя / Your Name / 您的姓名')
                ->set_help_text('
                Заголовок для поля "Ваше имя". <br>
                Title for the "Your Name" field. <br>
                "您的姓名"字段的占位符.'),

            Field::make('text', 'helper_form_form_phone_title', 'Заголовок телефона / Phone Title / 电话占位符')
                ->set_attribute('placeholder', 'Ваш телефон / Your Phone / 您的电话')
                ->set_help_text('
                Заголовок для поля "Телефон". <br>
                Title for the "Phone" field. <br>
                "电话"字段的占位符.'),

            Field::make('text', 'helper_form_button_text', 'Текст кнопки / Button Text / 按钮文本')
                ->set_attribute('placeholder', 'Получить консультацию')
                ->set_help_text('
                Укажите текст кнопки, например "Получить консультацию". <br>
                Specify the button text, e.g. “Get a consultation”. <br>
                指定按钮文本，例如 “获取咨询”。'),

            Field::make('text', 'helper_form_sending_title', 'Заголовок подтверждения / Confirmation Title / 确认标题')
                ->set_attribute('placeholder', 'Спасибо за обращение!')
                ->set_help_text('
                Укажите заголовок окна подтверждения отправки формы, например "Спасибо за обращение!". <br>
                Specify a title for the form submission confirmation window, e.g. “Thank you for applying!”. <br>
                指定表格提交确认窗口的标题，例如 "感谢您的申请！”'),

            Field::make('textarea', 'helper_form_sending_subtitle', 'Подзаголовок подтверждения / Confirmation Subtitle / 确认副标题')
                ->set_attribute('placeholder', 'Мы свяжемся с Вами в ближайшее время')
                ->set_help_text('
                Укажите подзаголовок окна подтверждения отправки формы, например "Мы свяжемся с Вами в ближайшее время". <br>
                Specify a subheading for the form submission confirmation window, e.g. “We will contact you shortly”. <br>
                为表格提交确认窗口指定一个副标题，例如 “我们将尽快与您联系”。'),
        ]);
    // Настройки формы "Индивидуальный заказ"
    Container::make('post_meta', 'Индивидуальный заказ / Custom Order Request / 定制订单')
        ->where('post_type', '=', 'forms')
        ->add_fields([
            Field::make('text', 'custom_order_request_form_popup_title', 'Заголовок формы / Form Title / 表单标题')
                ->set_attribute('placeholder', 'Связаться с нами / Contact Us / 联系我们')
                ->set_help_text('
                    Укажите заголовок формы, который будет отображаться в попапе. <br>
                    Specify the form title to be displayed in the popup. <br>
                    指定将在弹出窗口中显示的表单标题.'),

            Field::make('text', 'custom_order_request_form_subtitle_line_1', 'Первая строка подзаголовка / Subtitle Line 1 / 副标题第一行')
                ->set_attribute('placeholder', 'Готовы сделать заказ или хотите узнать больше? / Ready to order or want to know more? / 准备下单或想了解更多？')
                ->set_help_text('
                    Первая строка подзаголовка формы, которая будет отображаться в блоке с текстом. <br>
                    First line of the subtitle to be displayed in the block. <br>
                    表单标题的第一行。'),

            Field::make('text', 'custom_order_request_form_subtitle_line_2', 'Вторая строка подзаголовка / Subtitle Line 2 / 副标题第二行')
                ->set_attribute('placeholder', 'Отправьте заявку на обратный звонок! / Send a callback request! / 发送回电请求！')
                ->set_help_text('
                    Вторая строка подзаголовка, которая будет отображаться в блоке. <br>
                    Second line of the subtitle to be displayed in the block. <br>
                    显示在块中的副标题第二行。'),

            Field::make('text', 'custom_order_request_form_name_title', 'Заголовок имени / Name title / 姓名占位符')
                ->set_attribute('placeholder', 'Ваше имя / Your Name / 您的姓名')
                ->set_help_text('
                    Заголовок для поля "Ваше имя". <br>
                    Title for the "Your Name" field. <br>
                    "您的姓名"字段的占位符.'),

            Field::make('text', 'custom_order_request_form_phone_title', 'Заголовок телефона / Phone Title / 电话占位符')
                ->set_attribute('placeholder', 'Телефон / Phone / 电话')
                ->set_help_text('
                    Заголовок для поля "Телефон". <br>
                    Title for the "Phone" field. <br>
                    "电话"字段的占位符.'),

            Field::make('text', 'custom_order_request_form_button_text', 'Текст кнопки / Button Text / 按钮文本')
                ->set_attribute('placeholder', 'Отправить заявку / Submit Request / 提交申请')
                ->set_help_text('
                    Текст кнопки отправки формы. <br>
                    Text for the form submit button. <br>
                    表单提交按钮的文本.'),

            Field::make('text', 'custom_order_request_form_sending_title', 'Заголовок благодарности / Thank You Title / 感谢标题')
                ->set_attribute('placeholder', 'Спасибо за обращение! / Thank you for contacting us! / 感谢您的联系!')
                ->set_help_text('
                    Заголовок, который будет отображаться после отправки формы. <br>
                    Title to be displayed after form submission. <br>
                    表单提交后显示的标题.'),

            Field::make('text', 'custom_order_request_form_sending_subtitle', 'Подзаголовок благодарности / Thank You Subtitle / 感谢副标题')
                ->set_attribute('placeholder', 'Мы свяжемся с Вами в ближайшее время / We will contact you shortly / 我们将尽快与您联系')
                ->set_help_text('
                    Подзаголовок, который будет отображаться после отправки формы. <br>
                    Subtitle to be displayed after form submission. <br>
                    表单提交后显示的副标题.'),
        ]);
    // данные для категорий и подкатегорий
    Container::make('post_meta', 'Настройки категории')
        ->where('post_type', '=', 'category_group') // Применяем только к "Категории"
        ->add_fields([
            Field::make('image', 'category_icon', 'Иконка категории')
                ->set_help_text('Загрузите иконку для отображения'),

            Field::make('text', 'category_slug', 'Slug категории')
                ->set_attribute('readonly', 'readonly')
                ->set_help_text('Slug формируется автоматически на основе названия категории, но вы можете его изменить при необходимости.'),

            Field::make('complex', 'subcategories', 'Подкатегории')
                ->add_fields([
                    Field::make('text', 'subcategory_title', 'Название подкатегории'),
                    Field::make('image', 'subcategory_icon', 'Иконка подкатегории'),
                    Field::make('text', 'subcategory_slug', 'Slug подкатегории')
                        ->set_help_text('Slug формируется автоматически на основе названия категории, но вы можете его изменить при необходимости.'),
                    Field::make('text', 'subcategory_extra', 'Дополнительное поле')
                        ->set_help_text('Это поле можно оставить пустым'),
                ])
                ->set_layout('tabbed-horizontal')
                ->set_help_text('Добавьте список подкатегорий и их атрибутов.'),
        ]);
    // данные для страницы Главная
    Container::make('post_meta', 'Настройки главной страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'index.php') // Только для страницы с шаблоном Главная
        ->add_fields([
            Field::make('complex', 'main_slider', 'Слайдер')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make(
                        'image',
                        'slide_image',
                        'Изображение слайда'
                    )
                        ->set_help_text('Загрузите изображение для слайда'),
                    Field::make('textarea', 'slide_title', 'Заголовок слайда')
                        ->set_rows(2)
                        ->set_help_text('Введите заголовок для слайда'),
                    Field::make('textarea', 'slide_subtitle', 'Подзаголовок слайда')
                        ->set_rows(3)
                        ->set_help_text('Введите подзаголовок для слайда'),
                    Field::make('text', 'slide_button_text', 'Текст кнопки')
                        ->set_default_value('Подробнее')
                        ->set_help_text('Введите текст кнопки'),
                    Field::make('text', 'slide_button_link', 'Ссылка кнопки')
                        ->set_help_text('Укажите URL-адрес, на который будет вести кнопка'),
                ]),
            Field::make('complex', 'main_page_info_items', 'Информационные элементы')
                ->set_layout('tabbed-horizontal') // Удобный интерфейс
                ->add_fields([
                    Field::make('image', 'info_icon', 'Иконка')
                        ->set_help_text('Загрузите иконку для элемента'),
                    Field::make('text', 'info_text', 'Текст элемента')
                        ->set_help_text('Введите текст для информационного элемента'),
                ]),
            Field::make('text', 'popular_products_title', 'Заголовок блока "Популярные товары"'),
            Field::make('text', 'we_are_trusted_title', 'Заголовок блока "Нам доверяют"'),
            Field::make('text', 'all_projects_link_text', 'Текст ссылки (все проекты)'),
            Field::make('text', 'all_projects_link', 'Ссылка (все проекты)'),
            Field::make('text', 'products_empty_text', 'Текст-подсказка если товары отсутсвуют')
                ->set_help_text('Текст-подсказка если товары отсутсвуют, например "Товары отсутсвуют"'),
            Field::make('text', 'projects_empty_text', 'Текст-подсказка если проекты не найдены')
                ->set_help_text('Текст-подсказка если проекты отсутсвуют, например "Проекты отсутсвуют"'),
        ]);

    // данные для страницы Услуги
    Container::make('post_meta', 'Настройки страницы')
        ->where('post_type', '=', 'page') // Применяем только к страницам
        ->where('post_template', '=', 'page-services.php')
        ->add_fields([
            Field::make('text', 'services_page_title', 'Заголовок страницы'),
            Field::make('text', 'breadcrumbs_main', 'Текст ссылки на главную')
                ->set_help_text(
                    'Текст ссылки на главную, например: "Главная" <br>
                    Home link text, e.g.: “Home”. <br>
                    主页链接文本，例如 “主页"。'
                ),
            Field::make(
                'complex',
                'service_items',
                'Список услуг'
            )
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'title', 'Заголовок'),
                    Field::make('image', 'icon', 'Иконка'),
                    Field::make('textarea', 'description', 'Описание'),
                    Field::make(
                        'text',
                        'subtitle',
                        'Дополнительный текст'
                    ),
                    Field::make('media_gallery', 'gallery', 'Галерея изображений')->set_type(['image']),
                ]),
            Field::make('text', 'service_questions_title', 'Заголовок блока "Часто задаваемые вопросы"'),
            Field::make('complex', 'service_questions', 'Часто задаваемые вопросы')
                ->set_layout('tabbed-horizontal') // Удобный вертикальный интерфейс
                ->add_fields([
                    Field::make(
                        'text',
                        'question',
                        'Вопрос'
                    ),
                    Field::make('textarea', 'answer', 'Ответ'),
                ]),
        ]);


    // данные для страницы Карьера
    Container::make('post_meta', 'Карьера - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-career.php') // Указываем шаблон
        ->add_fields([
            Field::make('text', 'career_page_title', 'Заголовок страницы'),
            Field::make('text', 'breadcrumbs_main', 'Текст ссылки на главную')
                ->set_help_text(
                    'Текст ссылки на главную, например: "Главная" <br>
                    Home link text, e.g.: “Home”. <br>
                    主页链接文本，例如 “主页"。'
                ),
            // Поле для подзаголовка
            Field::make('text', 'career_subtitle', 'Подзаголовок'),

            // Поле для текста кнопки
            Field::make('text', 'career_button_text', 'Текст кнопки "Отправить резюме"'),

            // Поле для списка вакансий
            Field::make('complex', 'career_items', 'Список вакансий')
                ->set_layout('tabbed-horizontal') // Удобный интерфейс
                ->add_fields([
                    Field::make('text', 'title', 'Заголовок вакансии'),
                    Field::make('text', 'subtitle', 'Подзаголовок'),
                    Field::make('text', 'salary', 'Зарплата'),
                    Field::make('textarea', 'description', 'Описание'),

                    // Поля для подзаголовков списков
                    Field::make('text', 'offers_title', 'Заголовок секции "Что мы предлагаем"')
                        ->set_default_value('Что мы предлагаем:'),
                    Field::make('text', 'responsibilities_title', 'Заголовок секции "Обязанности"')
                        ->set_default_value('Обязанности:'),
                    Field::make('text', 'requirements_title', 'Заголовок секции "Требования"')
                        ->set_default_value('Требования:'),

                    Field::make('complex', 'offers', 'Что мы предлагаем')
                        ->add_fields([
                            Field::make('text', 'offer', 'Предложение'),
                        ]),
                    Field::make('complex', 'responsibilities', 'Обязанности')
                        ->add_fields([
                            Field::make('text', 'responsibility', 'Обязанность'),
                        ]),
                    Field::make('complex', 'requirements', 'Требования')
                        ->add_fields([
                            Field::make('text', 'requirement', 'Требование'),
                        ]),
                ]),
        ]);
    // данные для Настройки проекта
    Container::make('post_meta', 'Настройки проекта')
        ->where('post_type', '=', 'projects')
        ->add_fields([
            Field::make('text', 'project_slug', 'Slug проекта')
                ->set_help_text('Введите уникальный slug для проекта (например, "burger-king").'),
            Field::make('text', 'project_subtitle', 'Второй заголовок'),

            Field::make('image', 'project_main_image', 'Главное фото')
                ->set_help_text('Добавьте главное фото проекта'),

            Field::make('complex', 'project_gallery', 'Галерея проекта')
                ->add_fields([
                    Field::make('image', 'gallery_image', 'Фото')
                        ->set_help_text('Добавьте изображение'),
                    Field::make('text', 'gallery_title', 'Заголовок фото'),
                    Field::make('select', 'gallery_link', 'Ссылка на товар')
                        ->add_options(function () {
                            // Получаем текущий язык проекта
                            $current_language = function_exists('pll_current_language') ? pll_current_language() : 'en';

                            // Получаем товары текущего языка
                            $args = [
                                'post_type'      => 'product',
                                'posts_per_page' => -1,
                                'lang'           => $current_language, // Указываем язык, если используется Polylang
                            ];
                            $products = get_posts($args);

                            // Формируем массив для селекта
                            $options = [];
                            foreach ($products as $product) {
                                $options[get_permalink($product->ID)] = $product->post_title;
                            }

                            return $options;
                        })
                        ->set_help_text('Выберите товар для ссылки'),
                ])
                ->set_layout('tabbed-horizontal'),

            Field::make('rich_text', 'project_text_block', 'Текстовый блок'),

            Field::make('text', 'products_title', 'Заголовок блока продуктов')
                ->set_help_text('Например: "В проекте использовали"'),
            Field::make('text', 'project_see_more_btn', 'Текст ссылки смотреть всю подборку')
                ->set_help_text('Например: "Смотреть всю подборку"'),
            Field::make('association', 'project_related_products', 'Товары которые использовались в этом проекте')
                ->set_types([
                    [
                        'type'      => 'post',
                        'post_type' => 'product', // Укажите тип записи для товаров
                    ]
                ])
                ->set_help_text('Выберите товары которые использовались в этом проекте'),

            Field::make('text', 'breadcrumbs_main', 'Текст ссылки на главную')
                ->set_help_text(
                    'Текст ссылки на главную, например: "Главная" <br>
                    Home link text, e.g.: “Home”. <br>
                    主页链接文本，例如 “主页"。'
                ),
            Field::make('text', 'breadcrumbs_all_projects', 'Текст ссылки на все проекты')
                ->set_help_text(
                    'Текст ссылки на все проекты, например: "Все проекты" <br>
                    The text of the link to all projects, e.g: “All projects”. <br>
                    所有项目链接的文本，例如 所有项目。'
                ),
            Field::make('text', 'breadcrumbs_all_projects_link', 'Ссылки на все проекты')
                ->set_help_text(
                    'Текст ссылки на все проекты, например: "проекты" <br>
                    The text of the link to all projects, e.g: “projects”.. <br>
                    将文本链接到所有项目，如 “项目"。'
                ),
        ]);
    // данные для страницы Все проекты
    Container::make('post_meta', 'Все проекты - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-projects.php') // Указываем шаблон
        ->add_fields([
            Field::make('text', 'all_projects_title', 'Заголовок страницы')
                ->set_help_text('Заголовок для страницы со списком всех проектов'),
            Field::make('text', 'breadcrumbs_main', 'Текст ссылки на главную')
                ->set_help_text(
                    'Текст ссылки на главную, например: "Главная" <br>
                    Home link text, e.g.: “Home”. <br>
                    主页链接文本，例如 “主页"。'
                ),
            Field::make('text', 'empty_projects', 'Текст-подсказка если проекты не найдены')
                ->set_help_text(
                    'Текст-подсказка если проекты не найдены, например: "Проекты не найдены" <br>
                    Tooltip text if no projects found, e.g.: “No projects found”. <br>
                    未找到项目时的工具提示文本，例如 “未找到项目”'
                ),
            Field::make('text', 'project_link', 'Ссылка на первый слаг проекта')
                ->set_help_text(
                    'Текст ссылки на первый слаг проекта, например: "проект" <br>
                    The text of the link to the first slog of the project, e.g.: “project”. <br>
                    指向项目第一个任务的链接文本，例如 项目'
                ),
        ]);
    // данные для страницы Каталог
    Container::make('post_meta', 'Каталог - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-catalog.php') // Указываем шаблон
        ->add_fields([
            Field::make('text', 'catalog_page_title', 'Заголовок страницы')
                ->set_help_text('Заголовок для страницы Каталог'),
            Field::make('text', 'main_breadcrumb', 'Первая часть хлебных крошек')
                ->set_help_text('Текст для первой части хлебных крошек, например "Главная"'),
            Field::make('text', 'second_breadcrumb', 'Вторая часть хлебных крошек')
                ->set_help_text('Текст для второй части хлебных крошек, например "Каталог"'),
            Field::make('text', 'filter_block_title', 'Текст "Фильтр по параметрам"')
                ->set_help_text('Заголовок блока с фильтром, например "Фильтр по параметрам"'),
            Field::make('text', 'search_placeholder', 'Текст-подсказка к поиску')
                ->set_help_text('Текст-подсказка к поиску, например "Поиск"'),
            Field::make('text', 'products_empty_text', 'Текст-подсказка если товары отсутсвуют')
                ->set_help_text('Текст-подсказка если товары отсутсвуют, например "Товары отсутсвуют"'),
            // заголовки фильтров
            Field::make('text', 'catalog_resolution_title', 'Заголововк фильтра разрешение')
                ->set_help_text('Заголововк фильтра Разрешение, например "Разрешение"'),
            Field::make('text', 'catalog_os_title', 'Заголововк фильтра Операционная система')
                ->set_help_text('Заголововк фильтра Операционная система, например "Операционная система"'),
            Field::make('text', 'catalog_screen_diagonal_title', 'Заголововк фильтра Диагональ')
                ->set_help_text('Заголововк фильтра Диагональ, например "Диагональ"'),
            Field::make('text', 'catalog_brightness_level_title', 'Заголововк фильтра Яркость')
                ->set_help_text('Заголововк фильтра Яркость, например "Яркость"'),
            Field::make('text', 'catalog_display_technology_title', 'Заголововк фильтра Технология дисплея')
                ->set_help_text('Заголововк фильтра Технология дисплея, например "Технология дисплея"'),
            // кнопки фильтров
            Field::make('text', 'filter_save_filter', 'Текст кнопки "Применить фильтры"')
                ->set_help_text('Введите текст кнопки "Применить фильтры"'),
            Field::make('text', 'filter_remove_filter', 'Текст кнопки "Сбросить" (фильтры)')
                ->set_help_text('Введите текст кнопки "Сбросить" (фильтры)'),
        ]);

    // Индивидуальный заказ - настройки страницы
    Container::make('post_meta', 'Индивидуальный заказ - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-individual.php')
        ->add_fields([
            // Заголовок перед общей галереей
            Field::make('text', 'individual_title', 'Главный заголовок перед галереей')
                ->set_help_text('Введите заголовок, который будет отображаться перед общей галереей'),

            Field::make('text', 'breadcrumbs_main', 'Текст ссылки на главную')
                ->set_help_text(
                    'Текст ссылки на главную, например: "Главная" <br>
                    Home link text, e.g.: “Home”. <br>
                    主页链接文本，例如 “主页"。'
                ),
            // Группа фотографий для общего раздела
            Field::make('media_gallery', 'general_gallery', 'Общая галерея')
                ->set_type(['image'])
                ->set_help_text('Загрузите фотографии для общей галереи'),

            // Комплексное поле для шагов
            Field::make('complex', 'steps', 'Шаги индивидуального заказа')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'step_title', 'Заголовок шага')
                        ->set_help_text('Введите заголовок шага, например "Шаг 1"'),

                    Field::make('textarea', 'step_description', 'Описание шага')
                        ->set_help_text('Введите описание шага'),

                    Field::make(
                        'media_gallery',
                        'step_gallery',
                        'Галерея для шага'
                    )
                        ->set_type(['image'])
                        ->set_help_text('Загрузите фотографии для данного шага'),
                ])
                ->set_help_text('Добавьте шаги индивидуального заказа'),
        ]);

    // Фабрика
    Container::make('post_meta', 'Фабрика - содержимое страницы')
        ->where('post_type', '=', 'page') // Применяем только к страницам
        ->where('post_template', '=', 'page-fabric.php') // Применяем только к шаблону "page-factory.php"
        ->add_fields([
            // Главный заголовок
            Field::make('text', 'factory_main_title', 'Главный заголовок')
                ->set_help_text('Введите главный заголовок для страницы фабрики'),
            Field::make('text', 'breadcrumbs_main', 'Текст ссылки на главную')
                ->set_help_text(
                    'Текст ссылки на главную, например: "Главная" <br>
                    Home link text, e.g.: “Home”. <br>
                    主页链接文本，例如 “主页"。'
                ),
            // Описание под заголовком
            Field::make('textarea', 'factory_subtitle', 'Под заголовок')
                ->set_help_text('Введите описание под заголовком'),
            // описание над видео 
            Field::make('textarea', 'video_section_description', 'Общее описание для всех блоков видео')
                ->set_help_text('Введите общее описание, которое будет отображаться перед всеми блоками с видео'),
            // видео с тайтелом
            Field::make(
                'complex',
                'video_blocks',
                'Блок с видео'
            )
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'video_block_title', 'Заголовок видео')
                        ->set_help_text('Введите заголовок блока с видео'),
                    Field::make('file', 'video_file', 'Видео')
                        ->set_type('video') // Ограничиваем загрузку только видеофайлом
                        ->set_help_text('Загрузите видео для этого блока'),
                    Field::make('image', 'video_cover_url', 'Обложка видео')
                        ->set_help_text('Загрузите обложку для видео'),
                ]),
            // Блок с изображениями и текстом
            Field::make('complex', 'image_text_blocks', 'Блоки с заголовком, изображением, блоками иконок')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    // заголовок 
                    Field::make('text', 'image_text_block_title', 'Заголовок блока с изображениями и текстом')
                        ->set_help_text('Введите заголовок для блока'),
                    // изображение блока 
                    Field::make('image', 'image_text_block_image', 'Изображение блока')
                        ->set_help_text('Загрузите изображение для этого блока'),
                    // блок с иконками 
                    Field::make('complex', 'icon_image_block', 'Иконки и изображения с описанием')
                        ->add_fields([
                            Field::make('image', 'icon', 'Иконка')
                                ->set_help_text('Загрузите иконку для этого элемента'),
                            Field::make(
                                'textarea',
                                'icon_image_description',
                                'Описание'
                            )
                                ->set_help_text('Введите описание для этого элемента'),
                        ])
                        ->set_layout('tabbed-horizontal'),
                ]),
            // Дополнительные блоки с изображениями и текстом (фотки с описанием)
            Field::make('complex', 'image_description_blocks', 'Блоки с изображениями и описанием')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('image', 'image', 'Изображение')
                        ->set_help_text('Загрузите изображение для блока'),
                    Field::make('textarea', 'image_description', 'Описание изображения')
                        ->set_help_text('Введите описание для изображения'),
                ]),
        ]);
    // Контакты
    Container::make('post_meta', 'Контакты - содержимое страницы')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'page-contacts.php')
        ->add_fields([
            // Главный заголовок
            Field::make('text', 'contacts_main_title', 'Главный заголовок')
                ->set_help_text('Введите главный заголовок для страницы контактов'),
            Field::make('text', 'breadcrumbs_main', 'Текст ссылки на главную')
                ->set_help_text(
                    'Текст ссылки на главную, например: "Главная" <br>
                    Home link text, e.g.: “Home”. <br>
                    主页链接文本，例如 “主页"。'
                ),
            // Блок с контактами
            Field::make('complex', 'contacts', 'Контакты')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    // поаторитель для каждого контакта
                    Field::make('complex', 'contact_items', 'Элементы контакта')
                        ->set_layout('tabbed-horizontal')
                        ->add_fields([
                            // Адрес
                            Field::make('text', 'contact_title', 'Заголовок')
                                ->set_help_text('Введите заголовок'),

                            Field::make('text', 'contact_address', 'Контакт')
                                ->set_help_text('Введите адрес'),

                            Field::make('text', 'contact_url', 'Ссылка')
                                ->set_help_text('Введите ссылку'),
                        ]),
                ]),

            // Изображение логотипа на карте
            Field::make('image', 'logo_map', 'Логотип на карте')
                ->set_help_text('Загрузите логотип, который отобразится на карте'),

            // Поля для координат (x, y)
            Field::make('text', 'coordinate_x', 'Координата X')
                ->set_help_text('Введите координаты X для отображения на карте'),
            Field::make('text', 'coordinate_y', 'Координата Y')
                ->set_help_text('Введите координаты Y для отображения на карте')

        ]);
    // данные для товара
    Container::make('post_meta', 'Характеристики товара')
        ->where('post_type', '=', 'product') // Применяется только к записям типа "Товар"
        ->add_fields([
            Field::make(
                'text',
                'product_name',
                'Название'
            )
                ->set_help_text(
                    'Введите название товара, например, "Киоск типа INGSCREEN K". <br>
                    Enter the product name, e.g. “INGSCREEN K type kiosk”. <br>
                    輸入產品名稱，例如「INGSCREEN K type kiosk」。'
                ),
            Field::make('text', 'breadcrumbs_main', 'Текст ссылки на главную')
                ->set_help_text(
                    'Текст ссылки на главную, например: "Главная" <br>
                    Home link text, e.g.: “Home”. <br>
                    主页链接文本，例如 “主页"。'
                ),
            Field::make('text', 'breadcrumbs_catalog', 'Вторая часть хлебных крошек')
                ->set_help_text('Текст для второй части хлебных крошек, например "Каталог"'),

            Field::make(
                'text',
                'product_screen_resolution',
                'Разрешение экрана'
            )
                ->set_help_text('Введите разрешение экрана, например "1280x720" или "1920x1080"'),

            Field::make(
                'text',
                'product_operation_system',
                'Операционная система'
            )
                ->set_default_value('без операционной системы')
                ->set_help_text('Введите операционную систему, например "Аndroid" или "без операционной системы"'),

            Field::make(
                'text',
                'product_screen_diagonal',
                'Диагональ'
            )
                ->set_help_text('Введите диагональ экрана, например "19 дюймов" или "30 дюймов"'),

            Field::make(
                'text',
                'product_screen_brightness',
                'Яркость'
            )
                ->set_help_text('Введите яркость экрана, например "200 нит" или "250 нит"'),

            Field::make(
                'text',
                'product_display_technology',
                'Технология дисплея'
            )
                ->set_help_text('Введите технологию дисплея, например "Amoled" или "OLED"'),

            Field::make('association', 'product_category', 'Категория')
                ->set_types([
                    [
                        'type'      => 'post',
                        'post_type' => 'category_group', // Укажите тип записи для категорий
                    ],
                ])
                ->set_help_text('Выберите основную категорию для этого товара.'),

            Field::make('select', 'product_subcategory', 'Подкатегория')
                ->set_options(function () {
                    // Получаем все категории и их подкатегории
                    $categories = get_posts([
                        'post_type'      => 'category_group',
                        'posts_per_page' => -1,
                    ]);

                    $options = [];
                    $added_slugs = []; // Для проверки уникальности подкатегорий

                    if ($categories) {
                        foreach ($categories as $category) {
                            $subcategories = carbon_get_post_meta($category->ID, 'subcategories');
                            if ($subcategories) {
                                foreach ($subcategories as $subcategory) {
                                    $slug = $subcategory['subcategory_slug'];
                                    // Проверяем уникальность подкатегории по slug
                                    if (!in_array($slug, $added_slugs, true)) {
                                        $options[$subcategory['subcategory_slug']] = $slug;
                                        $added_slugs[] = $slug;
                                    }
                                }
                            }
                        }
                    }

                    return $options;
                })
                ->set_help_text('Выберите подкатегорию для этого товара.'),


            Field::make(
                'text',
                'product_sku',
                'Артикул (SKU)'
            )
                ->set_help_text('Введите уникальный артикул товара. Если не указан, будет сгенерирован автоматически.'),

            Field::make(
                'text',
                'product_artikul_name',
                'Название "Артикул"'
            )
                ->set_help_text('Название "Артикул", которое будет отображаться перед самим значением артикула'),

            Field::make(
                'text',
                'product_download_attributes_btn',
                'Текст кнопки для скачивания характеристик товара'
            )
                ->set_help_text('Введите текст ссылки на скачивание характеристик, например "Скачать характеристики товара"'),

            Field::make(
                'text',
                'product_shot_description',
                'Короткое описание товара'
            )
                ->set_help_text('Введите короткое описание товара, например "Сенсорный стол"'),

            Field::make('rich_text', 'product_main_description', 'Главное описание')
                ->set_help_text('Введите главное описание товара (будет отображаться справа от фото)')
                ->set_rows(5),

            Field::make(
                'text',
                'product_description_title',
                'Заголовок блока Описание'
            )
                ->set_help_text('Введите заголовок блока "Описание"'),


            Field::make('rich_text', 'product_description', 'Описание')
                ->set_help_text('Введите описание товара')
                ->set_rows(5),

            Field::make(
                'text',
                'product_attributes_title',
                'Заголовок блока Характеристики'
            )
                ->set_help_text('Введите заголовок блока "Характеристики"'),

            Field::make(
                'text',
                'product_attributes_subtitle',
                'Подзаголовок блока Общие параметры'
            )
                ->set_help_text('Введите подзаголовка блока "Общие параметры"'),


            Field::make('complex', 'product_attributes', 'Характеристики')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('text', 'attribute_name', 'Название атрибута'),
                    Field::make('text', 'attribute_value', 'Значение атрибута'),
                    Field::make('checkbox', 'attribute_for_description', 'Выводить этот атрибут ещё и после главного описания'),
                ])
                ->set_help_text('Добавьте характеристики товара, такие как "Цвет", "Размер" и т.д.'),

            Field::make(
                'text',
                'product_payment_description_title',
                'Заголовок блока Оплата'
            )
                ->set_help_text('Введите заголовок блока "Оплата"'),

            Field::make('rich_text', 'product_payment_description', 'Оплата')
                ->set_help_text('Текст блока "оплата"')
                ->set_rows(5),

            Field::make(
                'text',
                'product_certificate_title',
                'Заголовок блока Сертификаты'
            )
                ->set_help_text('Введите заголовок блока "Сертификаты"'),

            Field::make('media_gallery', 'product_certificates', 'Галерея сертификатов')
                ->set_type(['image'])
                ->set_help_text('Загрузите сертификат'),

            Field::make('complex', 'product_gallery', 'Галерея изображений / видео')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('select', 'type', 'Тип элемента')
                        ->set_options([
                            'image' => 'Изображение',
                            'video' => 'Видео',
                        ])
                        ->set_help_text('Выберите тип элемента: изображение или видео'),

                    Field::make('image', 'image', 'Изображение')
                        ->set_help_text('Загрузите изображение')
                        ->set_conditional_logic([
                            [
                                'field' => 'type',
                                'value' => 'image',
                                'compare' => '=',
                            ],
                        ]),

                    Field::make('file', 'video', 'Видео (mp4)')
                        ->set_type(['video'])
                        ->set_help_text('Загрузите видео в формате mp4')
                        ->set_conditional_logic([
                            [
                                'field' => 'type',
                                'value' => 'video',
                                'compare' => '=',
                            ],
                        ]),

                    Field::make('image', 'video_preview', 'Превью для видео')
                        ->set_help_text('Загрузите изображение-превью для видео')
                        ->set_conditional_logic([
                            [
                                'field' => 'type',
                                'value' => 'video',
                                'compare' => '=',
                            ],
                        ]),

                    Field::make('text', 'alt_text', 'Альтернативный текст')
                        ->set_help_text('Введите альтернативный текст для изображения или видео'),
                ])
                ->set_help_text('Добавьте изображения или видео с возможностью указания превью и упорядочивания элементов'),

            Field::make('checkbox', 'product_featured', 'Популярные товары')
                ->set_option_value('yes')
                ->set_help_text('Отметьте, если товар должен отображаться на главной странице в блоке "Популярные товары".'),

            Field::make('checkbox', 'product_in_main_slider', 'Выводить рядом с главным слайдером')
                ->set_option_value('yes')
                ->set_help_text(
                    'Отметьте, если товар должен отображаться на главной странице рядос с главным слайдером
                    (не рекомендуется выводить больше двух)'
                ),

            Field::make(
                'text',
                'product_opportunities_title',
                'Заголовок блока Возможности'
            )
                ->set_help_text('Введите заголовок блока "Возможности"'),

            Field::make('media_gallery', 'product_opportunities_gallery', 'Галерея изображений для блока "Возможности"')
                ->set_type(['image'])
                ->set_help_text('Загрузите изображения для блока "Возможности"'),

            Field::make('complex', 'product_additional_blocks', 'Дополнительные блоки')
                ->set_layout('tabbed-horizontal')
                ->add_fields([
                    Field::make('rich_text', 'product_additional_block_text', 'Текстовое описание доп. блока'),
                    Field::make('image', 'product_additional_block_text_image', 'Добавьте фото')
                        ->set_help_text('Добавьте фото блока'),
                ])
                ->set_help_text('Если нужно добавьте дополнительные блоки товара с описанием и фото'),
            Field::make(
                'text',
                'product_related_products_title',
                'Заголовок блока "Сопутствующие товары"'
            )
                ->set_help_text('Введите заголовок блока "Сопутствующие товары"'),

            Field::make('association', 'product_related_products', 'Сопутствующие товары')
                ->set_types([
                    [
                        'type'      => 'post',
                        'post_type' => 'product', // Укажите тип записи для товаров
                    ],
                ])
                ->set_help_text('Выберите сопутствующие товары для отображения на странице этого товара'),

            Field::make(
                'text',
                'product_read_more_btn',
                'Текст кнопки "Подробнее"'
            )
                ->set_default_value('Подробнее')
                ->set_help_text('Введите текст кнопки "Подробнее"'),

            Field::make(
                'text',
                'product_order_btn',
                'Текст кнопки "Заказать"'
            )
                ->set_default_value('Заказать')
                ->set_help_text('Введите текст кнопки "Заказать"'),

        ]);
    // настройки хедера
    Container::make('post_meta', 'Header')
        ->where('post_type', '=', 'header')
        ->add_fields([
            Field::make('text', 'header_location', 'Адрес')
                ->set_default_value('г. Москва ул.Дубнинская д. 83, 8-й этаж №819-820-821'),
            Field::make('text', 'header_location_link', 'Ссылка на адрес')
                ->set_help_text('Ссылка на адрес).'),
            Field::make('text', 'header_email', 'Email')
                ->set_default_value('info_abedul@mail.ru'),
            Field::make('text', 'header_phone', 'Телефон')
                ->set_default_value('+7 999-957-45-89'),
            Field::make('text', 'header_project_button_text', 'Текст кнопки "Обсудить проект"')
                ->set_default_value('Обсудить проект'),
            Field::make('text', 'header_near_logo_text', 'Текст рядом с logo')
                ->set_help_text(
                    'Текст рядом с logo, например "Производитель интерактивного обрудования"". <br>
                    Text next to the logo, e.g. “Manufacturer of interactive equipment”. <br>
                    徽标旁的文字，如 “互动设备制造商”。'
                ),
            Field::make('text', 'header_search_text', 'Текст-подсказка для поиска')
                ->set_help_text(
                    'Текст-подсказка для поиска, например "Искать продукцию". <br>
                    Search hint text, e.g. “Search for products”. <br>
                    搜索提示文本，如 "搜索产品”'
                ),
            Field::make('image', 'header_logo', 'Логотип')
                ->set_value_type('url'),
            Field::make('text', 'header_catalog_text', 'Текст для пункта меню "Каталог"')
                ->set_help_text(
                    'Текст для пункта меню "Каталог". <br>
                    Text for the menu item “Catalog". <br>
                    目录 "菜单项的文本'
                ),
            Field::make('complex', 'header_menu_items', 'Пункты меню')
                ->add_fields([
                    Field::make('text', 'menu_item_label', 'Название')
                        ->set_required(true),
                    Field::make('text', 'menu_item_link', 'Ссылка')
                        ->set_required(true),
                ])
                ->set_default_value([
                    ['menu_item_label' => 'Индивидуальный заказ', 'menu_item_link' => '/individual'],
                    ['menu_item_label' => 'Услуги', 'menu_item_link' => '/services'],
                    ['menu_item_label' => 'Карьера', 'menu_item_link' => '/career'],
                    ['menu_item_label' => 'Контакты', 'menu_item_link' => '/contacts'],
                    ['menu_item_label' => 'Наша фабрика', 'menu_item_link' => '/fabric'],
                ]),

            // Заголовок блока с контактами для footer
            Field::make('text', 'footer_contacts_title', 'Заголовок блока с контактами для footer')
                ->set_help_text(
                    'Заголовок блока с контактами для footer, например "Контакты". <br>
                    Header of a block with contacts for the footer, for example "Contacts". <br>
                    帶有頁腳聯絡人的區塊的頁眉，例如“聯絡人”'
                ),
            // Заголовок блока с контактами для footer
            Field::make('text', 'footer_catalog_title', 'Заголовок блока с контактами для footer')
                ->set_help_text(
                    'Заголовок блока с каталогом для footer, например "Каталог". <br>
                    Title of the block with catalog for footer, e.g. “Catalog”. <br>
                    页脚目录块的页眉，例如 "目录'
                ),
            // Заголовок блока с контактами для footer
            Field::make('text', 'footer_pages_title', 'Заголовок блока со страницами для footer')
                ->set_help_text(
                    'Заголовок блока со страницами для footer, например "Информация". <br>
                    Block header with pages for footer, e.g. “Information”. <br>
                    块的页眉和页脚，如 “信息”。'
                ),
            // Блок с контактами
            Field::make('complex', 'footer_contacts', 'Контакты для футера')
                ->add_fields([
                    Field::make('text', 'contact_title', 'Заголовок')
                        ->set_help_text('Например, адрес, телефон или email.'),
                    Field::make('text', 'contact_subtitle', 'Подзаголовок')
                        ->set_help_text('Например, часы работы или описание.'),
                    Field::make('text', 'contact_link', 'Ссылка')
                        ->set_help_text('Если контакт является кликабельным (например, email или телефон).'),
                ])
                ->set_default_value([
                    [
                        'contact_title' => 'г. Москва ул.Дубнинская д. 83, 8-й этаж №819-820-821',
                        'contact_subtitle' => 'Пн-Пт: 09:30 - 18:30',
                        'contact_link' => '',
                    ],
                    [
                        'contact_title' => '+7 999-579-91-89',
                        'contact_subtitle' => 'Консультация',
                        'contact_link' => 'tel:+79995799189',
                    ],
                    [
                        'contact_title' => 'info_abedul@mail.ru',
                        'contact_subtitle' => 'Консультация',
                        'contact_link' => 'mailto:info_abedul@mail.ru',
                    ],
                    [
                        'contact_title' => 'г. Шэньчжэнь Районы Гуанмин',
                        'contact_subtitle' => 'Адрес фабрики в Китае',
                        'contact_link' => '',
                    ],
                    [
                        'contact_title' => '+86-18645050994',
                        'contact_subtitle' => 'Менеджер Ван (WeChat)',
                        'contact_link' => 'tel:+8618645050994',
                    ],
                    [
                        'contact_title' => 'whz_0309@163.com',
                        'contact_subtitle' => 'Консультация',
                        'contact_link' => 'mailto:whz_0309@163.com',
                    ],
                ]),
            // текст Пользовательское соглашение для footer
            Field::make('text', 'footer_user_agreement', 'Текст "Пользовательское соглашение"')
                ->set_help_text(
                    'Текст ссылки пользовательское соглашения, например "Пользовательское соглашение". <br>
                    User Agreement link text, e.g. “User Agreement”.. <br>
                    用户协议链接的文本，如 “User Agreement（用户协议）”。'
                ),
            // текст Политика конфиденциальности для footer
            Field::make('text', 'footer_privacy_policy', 'Текст "Политика конфиденциальности"')
                ->set_help_text(
                    'Текст ссылки политики конфиденциальности, например "Политика конфиденциальности". <br>
                    The text of the privacy policy link, e.g., “Privacy Policy”. <br>
                    隐私政策链接的文本，如 "隐私政策'
                ),
            // текст юридического названия компании
            Field::make('text', 'footer_legal_entity', 'Название юридического лица')
                ->set_help_text(
                    'Текст Название юридического лица, например "OOO «ЧЖУН МИ ПО ИНТЕЛЛЕКТУАЛЬНОМУ ОСНАЩЕНИЮ". <br>
                    Text Name of the legal entity, e.g. “OOO ‘ZHUN MI INTELLECTUAL ENVIRONMENT’.. <br>
                    文本 法律实体名称，如 “ZHUN MI INTELLIGENCE OOO”。'
                ),

        ]);
    // страница 404
    Container::make('post_meta', 'Настройки страницы 404')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', '404.php')
        ->add_fields([
            Field::make('text', 'notfound_title', 'Заголовок 404')
                ->set_default_value('404'),
            Field::make('text', 'notfound_subtitle', 'Подзаголовок')
                ->set_default_value('Страница не найдена'),
            Field::make('textarea', 'notfound_text', 'Описание')
                ->set_default_value('Неправильно набран адрес или такой страницы не существует'),
            Field::make('text', 'notfound_button_text', 'Текст кнопки')
                ->set_default_value('На главную'),
        ]);
});

// Регистрация кастомного типа записей "Формы"
function register_forms_post_type()
{
    register_post_type('forms', [
        'labels' => [
            'name' => 'Forms',
            'singular_name' => 'Form',
            'add_new' => 'Add New Form',
            'add_new_item' => 'Add New Form',
            'edit_item' => 'Edit Form',
            'new_item' => 'New Form',
            'view_item' => 'View Form',
            'all_items' => 'All Forms',
            'search_items' => 'Search Forms',
            'not_found' => 'No forms found',
            'not_found_in_trash' => 'No forms found in trash'
        ],
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => ['title'],
        'menu_position' => 25,
        'menu_icon' => 'dashicons-feedback',
    ]);
}
add_action('init', 'register_forms_post_type');

add_action('init', function () {
    add_rewrite_rule(
        '^projects/([^/]+)/?$',
        'index.php?post_type=projects&name=$matches[1]',
        'top'
    );
    register_post_type('projects', [
        'labels' => [
            'name' => 'Проекты',
            'singular_name' => 'Проект',
            'add_new' => 'Добавить новый проект',
            'add_new_item' => 'Добавить новый проект',
            'edit_item' => 'Редактировать проект',
            'new_item' => 'Новый проект',
            'view_item' => 'Просмотреть проект',
            'search_items' => 'Найти проект',
            'not_found' => 'Проекты не найдены',
            'not_found_in_trash' => 'Проекты в корзине не найдены',
        ],
        'public' => true,
        'rewrite' => [
            'slug' => 'all-projects', // Здесь задаём slug
            'with_front' => false,   // Убираем префикс /blog, если есть
        ],
        'supports' => ['title'],
        'has_archive' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
    ]);
});

// Регистрация кастомного типа записи "header & footer"
add_action('init', function () {
    register_post_type('header', [
        'labels' => [
            'name' => 'Header & Footer',
            'singular_name' => 'Header',
            'add_new' => 'Add New Header',
            'add_new_item' => 'Add New Header',
            'edit_item' => 'Edit Header',
            'new_item' => 'New Header',
            'view_item' => 'View Header',
            'search_items' => 'Search Headers',
            'not_found' => 'No headers found',
            'not_found_in_trash' => 'No headers found in trash',
            'all_items' => 'All Headers',
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'headers'], // ЧПУ для хедеров
        'supports' => ['title'], // Включаем стандартные поля
        'menu_icon' => 'dashicons-menu', // Иконка в админке
    ]);
});

// Регистрация кастомного типа записи "Товар"
add_action('init', function () {
    add_rewrite_rule(
        '^products/([^/]+)/?$',
        'index.php?post_type=product&name=$matches[1]',
        'top'
    );
    register_post_type('product', [
        'labels' => [
            'name' => 'Товары',
            'singular_name' => 'Товар',
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый товар',
            'edit_item' => 'Редактировать товар',
            'new_item' => 'Новый товар',
            'view_item' => 'Просмотреть товар',
            'search_items' => 'Поиск товаров',
            'not_found' => 'Товары не найдены',
            'not_found_in_trash' => 'Товары не найдены в корзине',
            'all_items' => 'Все товары',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'products'], // ЧПУ
        'supports' => ['title'], // Включаем стандартные поля
        'menu_icon' => 'dashicons-cart', // Иконка в админке
    ]);
});

add_action('carbon_fields_post_meta_container_saved', function ($post_id) {
    if (get_post_type($post_id) !== 'product') {
        return;
    }

    // Получаем выбранные категории
    $selected_categories = carbon_get_post_meta($post_id, 'product_category');
    $categories_data = [];

    if ($selected_categories) {
        foreach ($selected_categories as $category) {
            $categories_data[] = [
                'title' => get_the_title($category['id']),
                'slug'  => get_post_field('post_name', $category['id']),
            ];
        }
    }

    // Сохраняем массив объектов категорий
    update_post_meta($post_id, '_product_categories', $categories_data);

    // Получаем slug выбранной подкатегории
    $subcategory_slug = carbon_get_post_meta($post_id, 'product_subcategory');
    update_post_meta($post_id, '_product_subcategory_slug', $subcategory_slug);
});

add_action('save_post', 'update_product_slug', 10, 1);

function update_product_slug($post_id)
{
    if (get_post_type($post_id) !== 'product') {
        return;
    }

    // Получаем текущее название и slug
    $post_title = get_the_title($post_id);
    $post_slug = get_post_field('post_name', $post_id);

    // Проверяем, нужно ли обновлять slug
    if (!empty($post_slug) && strpos($post_slug, '%') === false) {
        return;
    }

    // Генерируем slug
    $new_slug = generate_slug_from_title($post_title);
    $unique_slug = wp_unique_post_slug($new_slug, $post_id, 'publish', 'product', null);

    // Удаляем хук, чтобы избежать бесконечного цикла
    remove_action('save_post', 'update_product_slug');

    // Обновляем slug
    wp_update_post([
        'ID'        => $post_id,
        'post_name' => $unique_slug,
    ]);

    // Восстанавливаем хук
    add_action('save_post', 'update_product_slug');
}

// Функция для генерации slug из названия
function generate_slug_from_title($title)
{
    // Удаляем спецсимволы и оставляем буквы (кириллица, латиница), цифры и дефисы
    $slug = preg_replace('/[^а-яА-ЯёЁa-zA-Z0-9\-]/u', '-', $title);

    // Убираем множественные дефисы
    $slug = preg_replace('/-+/', '-', $slug);

    // Удаляем дефисы в начале и конце строки
    $slug = trim($slug, '-');

    // Приводим к нижнему регистру
    $slug = mb_strtolower($slug, 'UTF-8');

    return $slug ?: 'product'; // Если slug пустой, возвращаем значение по умолчанию
}

function abedul_register_category_post_type()
{
    $labels = array(
        'name'               => 'Категории',
        'singular_name'      => 'Категория',
        'menu_name'          => 'Категории',
        'name_admin_bar'     => 'Категория',
        'add_new'            => 'Добавить новую',
        'add_new_item'       => 'Добавить новую категорию',
        'new_item'           => 'Новая категория',
        'edit_item'          => 'Редактировать категорию',
        'view_item'          => 'Просмотр категории',
        'all_items'          => 'Все категории',
        'search_items'       => 'Искать категории',
        'not_found'          => 'Категории не найдены.',
        'not_found_in_trash' => 'В корзине категорий не найдено.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'menu_icon'          => 'dashicons-category',
        'supports'           => array('title', 'editor', 'thumbnail'), // Поля "Название", "Описание" и "Миниатюра"
        'hierarchical'       => true, // Для возможности вложенности (родитель/потомок)
        'show_in_rest'       => true, // Для редактора Гутенберг
    );

    register_post_type('category_group', $args);
}
add_action('init', 'abedul_register_category_post_type');

function abedul_register_query_vars($vars)
{
    $vars[] = 'category_group';
    $vars[] = 'subcategory_slug';
    return $vars;
}
add_filter('query_vars', 'abedul_register_query_vars');

function abedul_register_rewrite_rules()
{
    $languages = ['ru', 'en', 'zh']; // Список языков
    foreach ($languages as $lang) {
        if ($lang === 'ru') {
            $prefix = 'каталог';
        } elseif ($lang === 'zh') {
            $prefix = 'catalog-zh'; // Китайский префикс для "каталог"
        } else {
            $prefix = 'catalog'; // Английский по умолчанию
        }

        add_rewrite_rule(
            "^$prefix/([^/]+)/?$",
            "index.php?pagename=page-catalog&category_group=\$matches[1]",
            'top'
        );

        add_rewrite_rule(
            "^$prefix/([^/]+)/([^/]+)/?$",
            "index.php?pagename=page-catalog&category_group=\$matches[1]&subcategory_slug=\$matches[2]",
            'top'
        );
    }
}
add_action('init', 'abedul_register_rewrite_rules');

function abedul_template_redirect()
{
    $category_slug = get_query_var('category_group');
    $subcategory_slug = get_query_var('subcategory_slug');

    if ($category_slug || $subcategory_slug) {
        set_query_var('category_slug', $category_slug);
        set_query_var('subcategory_slug', $subcategory_slug);

        include(get_template_directory() . '/page-catalog.php');
        exit;
    }
}
add_action('template_redirect', 'abedul_template_redirect');

add_action(
    'carbon_fields_post_meta_container_saved',
    function ($post_id, $container) {
        // Убедимся, что это сохраняется для нужного типа записи
        if (get_post_type($post_id) !== 'category_group') {
            return;
        }

        // Получение текущего языка записи
        if (function_exists('pll_get_post_language')) {
            $language = pll_get_post_language($post_id); // Получаем язык записи
        } else {
            $language = 'en'; // Если полилинг не используется, по умолчанию английский
        }

        // Получение текущих данных
        $category_title = get_the_title($post_id); // Название категории
        $category_slug = carbon_get_post_meta($post_id, 'category_slug');
        $subcategories = carbon_get_post_meta($post_id, 'subcategories');

        // Генерация slug для категории
        if (empty($category_slug)) {
            $generated_slug = ($language === 'ru')
                ? mb_strtolower(str_replace(' ', '-', $category_title)) // Простой slug для кириллицы
                : sanitize_title($category_title); // Латиница
            carbon_set_post_meta($post_id, 'category_slug', $generated_slug); // Сохранение slug
        }

        // Генерация slug для подкатегорий
        if (!empty($subcategories)) {
            foreach ($subcategories as $index => $subcategory) {
                if (empty($subcategory['subcategory_slug'])) {
                    $subcategory_title = $subcategory['subcategory_title'];
                    if (!empty($subcategory_title)) {
                        $generated_slug = ($language === 'ru')
                            ? mb_strtolower(str_replace(' ', '-', $subcategory_title)) // Простой slug для кириллицы
                            : sanitize_title($subcategory_title); // Латиница
                        $subcategories[$index]['subcategory_slug'] = $generated_slug;
                    }
                }
            }
            carbon_set_post_meta($post_id, 'subcategories', $subcategories); // Сохранение обновленных подкатегорий
        }
    },
    10,
    2
);

function abedul_get_category_url_for_language()
{
    // Получаем текущий URL страницы
    $current_url = $_SERVER['REQUEST_URI']; // Получаем текущий URL страницы

    // Декодируем URL, чтобы проверка на /каталог или /catalog сработала
    $current_url = urldecode($current_url);

    echo 'Текущий URL: ' . $current_url . '<br>';

    // Проверяем, является ли текущий URL страницей каталога
    if (strpos($current_url, '/каталог') !== false) {
        echo "Это страница каталога!<br>";

        // Извлекаем категорию и подкатегорию из URL
        $category_slug = get_query_var('category_group', ''); // Получаем слаг категории
        $subcategory_slug = get_query_var('subcategory_slug', ''); // Получаем слаг подкатегории

        // Выводим результаты для отладки
        if (!empty($category_slug)) {
            echo "Категория: $category_slug<br>";
        } else {
            echo "Категория не найдена!<br>";
        }

        if (!empty($subcategory_slug)) {
            echo "Подкатегория: $subcategory_slug<br>";
        } else {
            echo "Подкатегория не найдена!<br>";
        }

        // Теперь формируем тестовую строку для английской версии
        // Находим английский слаг для категории
        $category = get_term_by('slug', $category_slug, 'category_group'); // Получаем категорию
        $subcategory = get_term_by('slug', $subcategory_slug, 'category_group'); // Подкатегория

        // Проверяем, что категория и подкатегория найдены
        if ($category && $subcategory) {
            // Получаем слаг категории и подкатегории на английском языке
            $category_slug_en = pll_get_term($category->term_id, 'en'); // Получаем слаг категории на английском
            $subcategory_slug_en = pll_get_term($subcategory->term_id, 'en'); // Получаем слаг подкатегории на английском

            // Проверим, что слаги были найдены
            if ($category_slug_en && $subcategory_slug_en) {
                // Формируем URL для английской версии
                $test_url = home_url("/catalog/{$category_slug_en}/{$subcategory_slug_en}");

                echo "Тестовая строка для английской версии: " . esc_url($test_url) . "<br>";
            } else {
                echo "Не удалось найти английский слаг для категории или подкатегории.<br>";
            }
        } else {
            echo "Не удалось найти категорию или подкатегорию.<br>";
        }
    } else {
        echo "Это не страница каталога.<br>";
    }
}
// add_action('wp', 'abedul_get_category_url_for_language');

// Хук для генерации уникального SKU
add_action('carbon_fields_post_meta_container_saved', function ($post_id) {
    $post_type = get_post_type($post_id);

    // Проверяем, что это запись типа product
    if ($post_type !== 'product') {
        return;
    }

    // Получаем текущее значение SKU
    $sku = carbon_get_post_meta($post_id, 'product_sku');

    // Если SKU пустой или не уникален, генерируем новый
    if (empty($sku) || !is_unique_sku($sku, $post_id)) {
        $new_sku = generate_unique_sku($post_id);
        carbon_set_post_meta($post_id, 'product_sku', $new_sku);
    }
});

// Функция проверки уникальности SKU
function is_unique_sku($sku, $current_post_id = null)
{
    $args = [
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'meta_query'     => [
            [
                'key'   => 'product_sku',
                'value' => $sku,
            ]
        ]
    ];

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
            // Если найден SKU, но это не текущий пост, значит, он не уникален
            if ($post->ID !== $current_post_id) {
                return false;
            }
        }
    }

    return true;
}

// Функция генерации уникального SKU
function generate_unique_sku($post_id)
{
    $prefix = 'SKU'; // Префикс для SKU, можно поменять на другой
    $unique_id = strtoupper(uniqid($prefix));

    // Проверяем уникальность сгенерированного SKU
    while (!is_unique_sku($unique_id, $post_id)) {
        $unique_id = strtoupper(uniqid($prefix));
    }

    return $unique_id;
}

function my_filter_products()
{
    // Убедитесь, что это запрос от WordPress
    if (!defined('ABSPATH')) {
        exit;
    }

    // Получаем текущую страницу из запроса
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

    // Получаем данные из запроса
    $filters = $_POST;

    // Базовые параметры WP_Query
    $args = [
        'post_type'      => 'product',
        'posts_per_page' => 6, // Количество товаров на странице
        'paged'          => $paged,
    ];

    // Применяем фильтры
    $meta_query = [
        'relation' => 'AND',
    ];

    // Фильтр по названию товара (поиск)
    if (!empty($filters['product_name'])) {
        $args['s'] = sanitize_text_field($filters['product_name']);
    }

    // Фильтр по категории
    if (!empty($filters['category_slug'])) {
        $category_id = null;
        $categories = get_posts([
            'post_type'      => 'category_group',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'meta_query'     => [
                [
                    'key'     => 'category_slug',
                    'value'   => sanitize_text_field($filters['category_slug']),
                    'compare' => '=',
                ],
            ],
        ]);

        if (! empty($categories)) {
            $category_id = $categories[0];
        }

        if ($category_id) {
            $meta_query[] = [
                'key'     => 'product_category',
                'value'   => 'post:category_group:' . $category_id,
                'compare' => 'LIKE',
            ];
        }
    }

    // Фильтр по подкатегории
    if (!empty($filters['subcategory_slug'])) {
        $meta_query[] = [
            'key'     => 'product_subcategory',
            'value'   => sanitize_text_field($filters['subcategory_slug']),
            'compare' => '=',
        ];
    }

    // Фильтр по разрешению экрана
    if (!empty($filters['resolution'])) {
        $meta_query[] = [
            'key'     => 'product_screen_resolution',
            'value'   => $filters['resolution'],
            'compare' => 'IN',
        ];
    }

    // Добавляем фильтр по операционной системе
    if (!empty($filters['os'])) {
        $meta_query[] = [
            'key'     => 'product_operation_system',
            'value'   => $filters['os'],
            'compare' => 'IN',
        ];
    }

    // Добавляем фильтр по диагонали экрана
    if (!empty($filters['screen_diagonal'])) {
        $meta_query[] = [
            'key'     => 'product_screen_diagonal',
            'value'   => $filters['screen_diagonal'],
            'compare' => 'IN',
        ];
    }

    // Добавляем фильтр по уровню яркости
    if (!empty($filters['brightness_level'])) {
        $meta_query[] = [
            'key'     => 'product_screen_brightness',
            'value'   => $filters['brightness_level'],
            'compare' => 'IN',
        ];
    }

    // Добавляем фильтр по технологии дисплея
    if (!empty($filters['display_technology'])) {
        $meta_query[] = [
            'key'     => 'product_display_technology',
            'value'   => $filters['display_technology'],
            'compare' => 'IN',
        ];
    }

    // Добавляем meta_query в $args, если оно не пустое
    if (count($meta_query) > 1) {
        $args['meta_query'] = $meta_query;
    }

    // Создаем WP_Query
    $query = new WP_Query($args);

    // Получаем общее количество страниц
    $total_pages = $query->max_num_pages;

    // Генерируем HTML для ответа
    $html = '';
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Получение данных о товаре
            $product_name = carbon_get_the_post_meta('product_name');
            $product_shot_description = carbon_get_the_post_meta('product_shot_description');
            $product_main_description = carbon_get_the_post_meta('product_main_description');
            $product_sku = carbon_get_the_post_meta('product_sku');
            $product_artikul_name = carbon_get_the_post_meta('product_artikul_name');
            $product_gallery = carbon_get_the_post_meta('product_gallery');
            $product_read_more_btn = carbon_get_the_post_meta('product_read_more_btn') ?: 'Подробнее';
            $product_order_btn = carbon_get_the_post_meta('product_order_btn') ?: 'Заказать';

            // Генерация карточки товара
            $html .= '<div class="product-item">';
            $html .= '<div class="product-slider swiper">';
            $html .= '<div class="swiper-wrapper">';

            if (!empty($product_gallery)) {
                foreach ($product_gallery as $gallery_item) {
                    if ($gallery_item['type'] === 'image') {
                        $html .= '<a data-fslightbox="' . esc_html($product_name) . '" href="' . wp_get_attachment_image_url($gallery_item['image'], 'full') . '" class="swiper-slide">';
                        $html .= '<img src="' . wp_get_attachment_image_url($gallery_item['image'], 'full') . '" alt="' . esc_attr($gallery_item['alt_text']) . '">';
                        $html .= '</a>';
                    } elseif ($gallery_item['type'] === 'video') {
                        $html .= '<a data-fslightbox="' . esc_html($product_name) . '" href="' . wp_get_attachment_url($gallery_item['video']) . '" class="swiper-slide">';
                        $html .= '<img src="' . wp_get_attachment_image_url($gallery_item['video_preview'], 'full') . '" alt="' . esc_attr($gallery_item['alt_text']) . '">';
                        $html .= '<img loading="lazy" class="play" src="' . get_template_directory_uri() . '/layout/img/icons/play.svg" alt="play">';
                        $html .= '</a>';
                    }
                }
            }

            $html .= '</div>';
            $html .= '<div class="swiper-pagination"></div>';
            $html .= '</div>';
            $html .= '<div class="product-info">';
            $html .= '<h3 class="product-title">' . esc_html($product_name) . '</h3>';
            $html .= '<p class="product-description">' . esc_html($product_shot_description) . '</p>';

            if (!empty($product_sku)) {
                $html .= '<p class="product-article">' . esc_html($product_artikul_name) . ' ' . esc_html($product_sku) . '</p>';
            }

            if (!empty($product_main_description)) {
                $html .= '<div class="product-description product-description-text">' . wp_kses_post(nl2br(($product_main_description))) . '</div>';
            }

            $html .= '<div class="product-buttons">';
            $html .= '<a href="' . get_the_permalink() . '" class="btn btn-blue">' . esc_html($product_read_more_btn) . '</a>';
            $html .= '<a href="#order-send-popup" class="btn btn-white order-product-btn popup-link" ' .
                'data-product-name="' . esc_attr($product_name) . '">' .
                esc_html($product_order_btn) . '</a>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
    } else {
        $html = '<p>' . $filters['products_empty_text'] . '</p>';
    }

    wp_reset_postdata();

    // Отправляем ответ
    wp_send_json(['html' => $html, 'total_pages' => $total_pages]);
    wp_die();
}
add_action('wp_ajax_my_filter_products', 'my_filter_products');
add_action('wp_ajax_nopriv_my_filter_products', 'my_filter_products');


function register_theme_menus()
{
    register_nav_menus(array(
        'main-menu' => __('Main Menu')
    ));
    // меню для английского языка
    register_nav_menus(array(
        'header-menu-en' => __('Header Menu for EN')
    ));
    // меню для китайского языка
    register_nav_menus(array(
        'header-menu-en' => __('Header Menu for ZH')
    ));
}
add_action('init', 'register_theme_menus');

function abedul_ajax_search()
{
    // Проверка безопасности
    check_ajax_referer('search_nonce', 'nonce');

    // Получение текущего языка
    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'en';

    // Получение поискового запроса
    $query = sanitize_text_field($_POST['query']);

    // Поиск товаров
    $args = [
        'post_type' => 'product',
        'posts_per_page' => 10,
        's' => $query,
        'lang' => $current_language, // Фильтрация по текущему языку Polylang
    ];
    $products = new WP_Query($args);

    $results = [];
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            $results[] = [
                'title' => get_the_title(),
                'url' => get_permalink(),
            ];
        }
    }
    wp_reset_postdata();

    // Возвращаем JSON-ответ
    wp_send_json_success($results);
}
add_action('wp_ajax_abedul_search', 'abedul_ajax_search');
add_action('wp_ajax_nopriv_abedul_search', 'abedul_ajax_search');

function abedul_localize_search_script()
{
    wp_localize_script('app', 'abedulSearch', [
        'ajaxurl' => admin_url('admin-ajax.php'), // URL для AJAX-запросов
        'nonce' => wp_create_nonce('search_nonce'), // Безопасность
    ]);
}
add_action('wp_enqueue_scripts', 'abedul_localize_search_script');

// Регистрируем маршрут для отправки формы через REST API
add_action('rest_api_init', function () {
    register_rest_route('send-form', '/send', [
        'methods' => 'POST',
        'callback' => 'send_form_email',
    ]);
});

function send_form_email(WP_REST_Request $request)
{
    $form_data = $request->get_params();
    $uploaded_files = $request->get_file_params(); // Получаем файлы из запроса

    $form_id = get_posts([
        'post_type' => 'forms',
        'numberposts' => 1,
        'fields' => 'ids',
    ]);

    if (!empty($form_id)) {
        $form_id = $form_id[0];
        $form_emails = carbon_get_post_meta($form_id, 'form_emails');
    }

    // Формируем тело письма
    $message = "Заявка с формы: " . $form_data['form-type'] . "\n";

    if (isset($form_data['name'])) {
        $message .= "Имя: " . $form_data['name'] . "\n";
    }

    if (isset($form_data['phone'])) {
        $message .= "Телефон: " . $form_data['phone'] . "\n";
    }

    if (isset($form_data['product-name'])) {
        $message .= "Название товара: " . $form_data['product-name'] . "\n";
    }

    if (isset($form_data['email'])) {
        $message .= "Email: " . $form_data['email'] . "\n";
    }

    if (isset($form_data['position'])) {
        $message .= "Должность: " . $form_data['position'] . "\n";
    }

    if (isset($form_data['coverLetter'])) {
        $message .= "Сопроводительное письмо: " . $form_data['coverLetter'] . "\n";
    }

    // Обработка файла
    $attachments = [];
    if (isset($uploaded_files['file']) && $uploaded_files['file']['error'] === UPLOAD_ERR_OK) {
        // Подключаем файл с функцией wp_handle_upload
        if (!function_exists('wp_handle_upload')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }

        $file = $uploaded_files['file'];

        $file_info = pathinfo($file['name']);
        $file_extension = strtolower($file_info['extension']);

        if ($file_extension !== 'pdf') {
            return new WP_REST_Response([
                'success' => false,
                'error' => 'Только PDF файлы разрешены.'
            ], 400);
        }

        // Сохраняем файл во временную директорию WordPress
        $uploaded_file = wp_handle_upload($file, ['test_form' => false]);

        if (isset($uploaded_file['file'])) {
            $attachments[] = $uploaded_file['file'];
        } else {
            return new WP_REST_Response([
                'success' => false,
                'error' => 'Ошибка загрузки файла.'
            ], 400);
        }
    }

    // Настройки для отправки почты
    $subject = "Заявка с сайта abedul.com";
    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    // Отправляем email на все указанные адреса
    foreach ($form_emails as $email) {
        wp_mail($email['email'], $subject, $message, $headers, $attachments);
    }

    return new WP_REST_Response([
        'success' => true,
        'emails' => $form_emails
    ], 200);
}
