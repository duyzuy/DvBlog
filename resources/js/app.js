require('./bootstrap');

window.Vue = require('vue');


import Buefy from 'buefy';

Vue.use(Buefy)



$(document).ready(function(){

    $('button.dropdown').hover(function(){
        $(this).toggleClass('is-open');
    })
});

Vue.config.productionTip = false;
//  Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    data:{}
});

