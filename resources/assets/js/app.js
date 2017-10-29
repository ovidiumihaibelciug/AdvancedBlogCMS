require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy'

Vue.component(Buefy.Checkbox.name, Buefy.Checkbox)

var app = new Vue({
  el: '#app',
  data: {}
});


Vue.use(Buefy);