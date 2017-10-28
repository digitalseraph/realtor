require('./bootstrap');

window.Vue = require('vue');

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


/**
 * Bootstrap modifications
 */
$(function() {
    // Nested dropdown menus
    $('.dropdown-submenu a.dropdown-submenu-toggle').on("click", function(e){
        $('.dropdown-submenu a.dropdown-submenu-toggle').next('ul').hide();
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
});
