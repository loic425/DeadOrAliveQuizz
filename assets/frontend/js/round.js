import $ from 'jquery';

$(document).ready(function () {
    const $button = $('#app_round_button');
    const $select = $('#app_round_theme');

   $('#themes a').click(function (event) {
       event.preventDefault();
       const themeId = $(this).data('id');

       $select.val(themeId);
       $button.click();
    });
});
