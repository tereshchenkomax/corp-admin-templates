/**
 * Created by jesus on 25.02.2017.
 */
jQuery(function($) {
    $(document).ready(function(){
    });

    $(document).find('.corp-admin-btn-add').click(function (e) {
        var userName, userMessage, data;
        // Получаем данные формы
        userName = $(this).parent().find('.corp-user-name').val();
        userMessage = $(this).parent().find('.corp-message').val();
        // Формируем обьект данных который получит AJAX  обработчик
        data = {
            action: 'guest_book',
            user_name: userName,
            message: userMessage
        }
        // Вывод данных в консоль браузера
        console.log(data);
        console.log(ajaxurl+ '?action=guest_book');


        $.post( ajaxurl, data, function(response) {
            //alert('Получено с сервера: ' + response.data.message);
            console.log(response);
        });


        return false;
    });
});
