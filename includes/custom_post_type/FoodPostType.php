<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 25.02.2017
 * Time: 23:22
 */

namespace includes\custom_post_type;


class FoodPostType
{
    public function __construct()
    {

        add_action( 'init', array( &$this, 'registerFoodPostType') );

        add_action( 'init', array( &$this, 'createFoodTaxonomies') );

        add_filter('post_updated_messages',  array( &$this, 'foodUpdatedMessages'));

        add_action( 'contextual_help', array( &$this, 'addHelpText' ), 10, 3 );

        add_action('add_meta_boxes', array( &$this, 'priceExtraFields' ), 1);

        add_action('save_post', array( &$this, 'priceExtraFieldsUpdate' ), 0);

    }

    public function registerFoodPostType(){
        register_post_type('food', array(
            'labels'             => array(
                'name'               => 'Еда',
                'singular_name'      => 'Блюдо',
                'add_new'            => 'Добавить ещё еды',
                'add_new_item'       => 'Добавить новое блюдо',
                'edit_item'          => 'Редактировать',
                'new_item'           => 'Новое блюдо',
                'view_item'          => 'Посмотреть книгу',
                'search_items'       => 'Найти книгу',
                'not_found'          =>  'Книг не найдено',
                'not_found_in_trash' => 'В корзине книг не найдено',
                'parent_item_colon'  => '',
                'menu_name'          => 'Еда'

            ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title','editor','author','thumbnail','excerpt','comments'),
            'taxonomies'          => array( 'kitchen', 'writer' ),
        ) );


    }


    public function foodUpdatedMessages(){
        global $post;

        $messages['food'] = array(
            0 => '',
            1 => sprintf( 'Food обновлено. <a href="%s">Посмотреть запись food</a>', esc_url( get_permalink($post->ID) ) ),
            2 => 'Произвольное поле обновлено.',
            3 => 'Произвольное поле удалено.',
            4 => 'Запись Food обновлена.',
            5 => isset($_GET['revision']) ? sprintf( 'Запись Food восстановлена из ревизии %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6 => sprintf( 'Запись Food опубликована. <a href="%s">Перейти к записи food</a>', esc_url( get_permalink($post->ID) ) ),
            7 => 'Запись Food сохранена.',
            8 => sprintf( 'Запись Food сохранена. <a target="_blank" href="%s">Предпросмотр записи food</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
            9 => sprintf( 'Запись Food запланирована на: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр записи food</a>',

                date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post->ID) ) ),
            10 => sprintf( 'Черновик записи Food обновлен. <a target="_blank" href="%s">Предпросмотр записи food</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
        );

        return $messages;
    }


    public function addHelpText($contextual_help, $screen_id, $screen ){
//$contextual_help .= print_r($screen); // используйте чтобы помочь определить параметр $screen->id
        if('food' == $screen->id ) {
            $contextual_help = '
		<p>Напоминалка при редактировании записи food:</p>
		<ul>
			<li>Указать кухню, например Азия-Тайская.</li>
			<li>Указать тип блюда, напрмиер "Первое"</li>
		</ul>
		<p>Если нужно запланировать публикацию на будущее:</p>
		<ul>
			<li>В блоке с кнопкой "опубликовать" нажмите редактировать дату.</li>
			<li>Измените дату на нужную, будущую и подтвердите изменения кнопкой ниже "ОК".</li>
		</ul>
		<p><strong>За дополнительной информацией обращайтесь:</strong></p>
		<p><a href="/" target="_blank">Блог о WordPress</a></p>
		<p><a href="http://wordpress.org/support/" target="_blank">Форум поддержки</a></p>
		';
        }
        elseif( 'edit-food' == $screen->id ) {
            $contextual_help = '<p>Это раздел помощи показанный для типа записи Food и т.д. и т.п.</p>';
        }

        return $contextual_help;
    }


    public function createFoodTaxonomies(){
        $labels = array(
            'name' => _x( 'Kitchen', 'taxonomy general name' ),
            'singular_name' => _x( 'Kitchen', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Genres' ),
            'all_items' => __( 'All Genres' ),
            'parent_item' => __( 'Parent Kitchen' ),
            'parent_item_colon' => __( 'Parent Kitchen:' ),
            'edit_item' => __( 'Edit Kitchen' ),
            'update_item' => __( 'Update Kitchen' ),
            'add_new_item' => __( 'Add New Kitchen' ),
            'new_item_name' => __( 'New Kitchen Name' ),
            'menu_name' => __( 'Kitchen' ),
        );

        register_taxonomy('kitchen', array('food'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'kitchen' ),
        ));

        $labels = array(
            'name' => _x( 'Food type', 'taxonomy general name' ),
            'singular_name' => _x( 'Food type', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Food type' ),
            'popular_items' => __( 'Popular Food types' ),
            'all_items' => __( 'Food types' ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Food type' ),
            'update_item' => __( 'Update Food type' ),
            'add_new_item' => __( 'Add New Food types' ),
            'new_item_name' => __( 'New Food types' ),
            'separate_items_with_commas' => __( 'Separate food types with commas' ),
            'add_or_remove_items' => __( 'Add or remove Food types' ),
            'choose_from_most_used' => __( 'Choose from the most used Food types' ),
            'menu_name' => __( 'Food types' ),
        );

        register_taxonomy('writer', 'food',array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'writer' ),
        ));

    }

    public function priceExtraFields(){
        add_meta_box(
            'price_extra_fields', // id атрибут HTML тега, контейнера блока.
            'Стоимость', // Заголовок/название блока. Виден пользователям.
            array( &$this, 'renderPriceExtraFields' ),  //Функция, которая выводит на экран HTML содержание блока
            'food', // Название экрана для которого добавляется блок.
            'normal', // Место где должен показываться блок
            'high' // Приоритет блока для показа выше или ниже остальных блоков:
        );
    }
    // Заполним этот блок полями html формы.
    // Делается это через, указанную в add_meta_box() функцию renderPriceExtraFields(). Именно она отвечает за содержание мета блока:
    //Функция, которая выводит на экран HTML содержание блока
    public function renderPriceExtraFields($post){
        ?>
        <p>
            <label>
                <input type="number" name="price_extra[price]" value="<?php echo get_post_meta($post->ID, 'price', 1); ?>" />
                Стоимость
            </label>
        </p>
        <?php
    }

    /*
     * Сохраняем данные
     * На этом этапе, мы уже создали блок произвольных полей, теперь нужно обработать данные полей при сохранении поста.
     *  Обработать, значит записать их в в базу данных или удалить от туда. Для этого используем хук save_post, который
     * срабатывает в момент сохранения поста. В этот момент мы получим данные из массива price_extra[] и обработаем них:
     */
    public function priceExtraFieldsUpdate($post_id ){
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false;
        if( !isset($_POST['price_extra']) ) return false;

        $priceExtra = array_map('trim', $_POST['price_extra']); // чистим все данные от пробелов по краям
        foreach( $priceExtra as $key=>$value ){
            if( empty($value) ){
                delete_post_meta($post_id, $key);
                continue;
            }

            update_post_meta($post_id, $key, $value); 
        }
        return $post_id;
    }
}