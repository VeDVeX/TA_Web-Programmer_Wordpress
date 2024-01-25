// Регистрируем меню
register_nav_menu('primary', esc_html__('Primary Menu', 'hello-elementor'));

// Вывод меню с помощью функции
function custom_primary_menu(){
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'menu_id' => 'primary-menu',
			'walker' => new Custom_Walker_Nav,
		));
}

// Создаем дочерний от Walker_Nav_Menu класс для форматирования разметки
class Custom_Walker_Nav extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = null) {
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
    }

    function start_el(&$output, $item, $depth = 0, $args = NULL, $id = 0) {
        // Форматирование начала разметки меню
        $output .= '<div class="custom-menu">'; 
        $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        // Форматирование конца разметки меню
        $output .= "</div>";
    }
}