<?php
function plugin_admin_menu()
{
    add_options_page('Total Old Revisions Cleaner', 'Total Old Revisions Cleaner', 8, basename(__FILE__), 'admin_form');
}
<?php
function admin_form()
{
    ?>
    <div class="wrap>;
 <h2>Total Old Revisions Cleaner</h2>
    <hr />
    <form method="post" onsubmit="if (!confirm('Вы уверены?')) {return false}" >
    <input type="checkbox" name="clean" /&amp;gt;
    <label>Удалить все старые редакции записей страниц</label>
    <input type="submit" name="ok" value="Ok" />
    </form>
    </div>
    <?php
}//Конец admin_form
function plugin_admin_menu()
{
    add_options_page('Total Old Revisions Cleaner', 'Total Old Revisions Cleaner', 8, basename(__FILE__), 'admin_form');
}

add_action('admin_menu', 'plugin_admin_menu');

?>
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 01.02.2017
 * Time: 22:03
 */