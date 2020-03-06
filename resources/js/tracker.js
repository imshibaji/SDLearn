window.Vue = require('vue');

Vue.component('todo-item', {
    template: '<li>This is a todo</li>'
});

const app = new Vue({
    el: '#app'
});

$('#app').on('click', function(){
    console.log('clicked');
});