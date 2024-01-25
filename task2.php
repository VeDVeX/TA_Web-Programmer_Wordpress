// Регистрация своего типа записи
function custom_post_type_registration() {
    $labels = array(
        'name'               => 'Кастомные Записи',
        'singular_name'      => 'кастомная Запись',
        'menu_name'          => 'Кастомные Записи',
        'add_new'            => 'Добавить новую',
        'add_new_item'       => 'Добавить новую запись',
        'edit_item'          => 'Редактировать запись',
        'new_item'           => 'Новая запись',
        'view_item'          => 'Посмотреть запись',
        'search_items'       => 'Искать записи',
        'not_found'          => 'Записей не найдено',
        'not_found_in_trash' => 'В корзине записей не найдено',
        'parent_item_colon'  => 'Родительская запись:',
        'all_items'          => 'Все записи',
        'archives'           => 'Архивы',
        'insert_into_item'   => 'Вставить в запись',
        'uploaded_to_this_item' => 'Загружено для этой записи',
        'featured_image'     => 'Изображение записи',
        'set_featured_image' => 'Установить изображение записи',
        'remove_featured_image' => 'Убрать изображение записи',
        'use_featured_image' => 'Использовать как изображение записи',
        'filter_items_list'  => 'Фильтровать список записей',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'posts'), // Переопределение URL в ЧПУ
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor'), // Вывод только полей заголовка и контента
        'taxonomies'         => array('category', 'post_tag'), // Таксономии
    );
    register_post_type('custom_post_type', $args);
}

add_action('init', 'custom_post_type_registration');

// Пример регистрации новой таксономии
function custom_taxonomy() {
    $labels = array(
        'name'                       => 'Кастомная таксономия',
		'singular_name'              => 'Кастомная таксономия',
		'menu_name'                  => 'Кастомная таксономия',
		'all_items'                  => 'Все элементы',
		'parent_item'                => 'Родительский элемент',
		'parent_item_colon'          => 'Родительский элемент:',
		'new_item_name'              => 'Новое название элемента',
		'add_new_item'               => 'Добавить новый элемент',
		'edit_item'                  => 'Редактировать элемент',
		'update_item'                => 'Обновить элемент',
		'view_item'                  => 'Просмотреть элемент',
		'separate_items_with_commas' => 'Отделить элементы с запятыми',
		'add_or_remove_items'        => 'Добавить или удалить элементы',
		'choose_from_most_used'      => 'Выбрать из наиболее часто используемых',
		'popular_items'              => 'Популярные элементы',
		'search_items'               => 'Поиск элементов',
		'not_found'                  => 'Не найдено',
		'no_terms'                   => 'Нет элементов',
		'items_list'                 => 'Список элементов',
		'items_list_navigation'      => 'Навигация по списку элементов',
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('custom_taxonomy', array('custom_post_type'), $args);
}

add_action('init', 'custom_taxonomy');
