import 'semantic-ui-css/components/accordion';
import $ from 'jquery';

import 'sylius/ui/app';
import 'sylius/ui/sylius-auto-complete';

import './round';

$(document).ready(function () {
    $('.sylius-autocomplete').autoComplete();
});

window.$ = $;
window.jQuery = $;
