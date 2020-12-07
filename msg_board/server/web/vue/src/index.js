import Vue from 'vue';
window.URLSearchParams = require('url-search-params');

const app = new Vue({
    el: '#app',
    components: {
        'message-board': require('./components/MessageBoard.vue').default
    }
});
