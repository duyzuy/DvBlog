require('./bootstrap');


window.Vue = require('vue');


import Buefy from 'buefy';
import slug from 'slug';


window.Slug = require('slug');
Slug.defaults.mode = "rfc3986"

Vue.use(Buefy)

require('./manage');


Vue.config.productionTip = false;
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('tags-widget', require('./components/TagsWidgetComponent.vue').default);
Vue.component('slug-widget', require('./components/SlugWidgetComponent.vue').default);


// const app = new Vue({
//     el: '#app',
//     data:{}
// });
