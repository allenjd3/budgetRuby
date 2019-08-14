/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('item-component', require('./components/ItemComponent.vue').default);
Vue.component('transaction-component', require('./components/TransactionComponent.vue').default);


Vue.filter('monies', function(value) {
	let money = (value/100).toFixed(2);
	return `$${money}`;

});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
	data: {
		foodItems: [
			{id : 1, name: 'restaurants', category: 'food', planned:12500, received: 12423},
			{id : 3, name: 'grocery', category: 'food', planned: 13000, received: 13143}
		],
		transportationItems: [
			{id : 2, name: 'gas', category: 'transportation', planned: 15000, received: 20000},
		],
		transactions : [
			{id : 1, name:'Kroger', amount:5732, added_at:'2019/10/31', bitem_id: 1 },
			{id : 2, name:'Walmart', amount:5732, added_at:'2019/10/31', bitem_id: 1 },
			{id : 3, name:'Sam\'s club', amount:5732, added_at:'2019/10/31', bitem_id:2 }		
		]
	},
	
});
