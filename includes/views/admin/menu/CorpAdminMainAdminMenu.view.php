<form action="options.php" method="POST">
    <?php
    settings_fields( 'CorpAdminSettings' );     // скрытые защитные поля
    do_settings_sections( 'corp-admin-templates' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
    submit_button();
    ?>
</form>