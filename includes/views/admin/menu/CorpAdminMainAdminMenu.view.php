<?php
_e("Corp Admin Templates", CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN);
echo '<div class="cat-main-menu">';
    echo '<br /><h1 class="cat-main-menu-title">' . get_admin_page_title() . '</h1>';
    echo '<h3>'. _x("This my first plugin",'admin menu page', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN). ' '
        . _x("Check it on",'admin menu page', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN). ' '
        .'<a href="https://github.com/tereshchenkomax/corp-admin-templates" target="_blank">Github</a>.
    </h3>';
?>
<form action="options.php" method="POST">
    <?php
    settings_fields( 'CorpAdminSettings' );
    do_settings_sections( 'corp-admin-templates' );
    submit_button();
    ?>
</form>