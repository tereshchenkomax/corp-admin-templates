<a href="admin.php?page=corp_admin_control_sub_menu&action=add_data">
    <?php _e('Add', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN ); ?>
</a>

<table  border="1" >
    <thead id="guest-book-head">
    <tr>
        <td>
            <?php _e('Name', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Messsage', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Date', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Actions', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN ); ?>
        </td>
    </tr>
    </thead>
    <tbody>
    <?php if(count($data) > 0 && $data !== false){  ?>
        <?php foreach($data as $value): ?>
            <tr class="row table_box">

                <td>
                    <?php echo $value['user_name']; ?>
                </td>
                <td>
                    <?php echo $value['message']; ?>
                </td>
                <td>
                    <?php echo date('d-m-Y H:i', $value['date_add']); ?>
                </td>

                <td>
                    <a href="admin.php?page=corp_admin_control_sub_menu&action=edit_data&id=<?php echo $value['id'];?>">
                        <?php _e('Edit', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN ); ?>
                    </a>
                    <a href="admin.php?page=corp_admin_control_sub_menu&action=delete_data&id=<?php echo $value['id'];?>">
                        <?php _e('Delete', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN ); ?>
                    </a>
                </td>

            </tr>
        <?php endforeach ?>
    <?php }else{ ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <?php } ?>
    </tbody>
</table>