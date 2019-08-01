import $ from 'jquery';

$(document).ready(function () {
    const $form = $('#app_round');
    const $select = $('#app_round_theme');

   $('#themes a').click(function (event) {
       event.preventDefault();
       const themeId = $(this).data('id');

       $select.val(themeId);
       $form.trigger('submit');
    });
});
