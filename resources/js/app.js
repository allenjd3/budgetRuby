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
Vue.component('item-creation-component', require('./components/ItemCreationComponent.vue').default);
Vue.component('transaction-creation-component', require('./components/TransactionCreationComponent.vue').default);
Vue.component('budget-creation-component', require('./components/BudgetCreationComponent.vue').default);
Vue.component('budget-component', require('./components/BudgetComponent.vue').default);

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
		allItems: [],
		transactions : [
			{id : 1, name:'Kroger', amount:12334, added_at:'2019/10/31', bitem_id: 1 },
			{id : 2, name:'Walmart', amount:1234, added_at:'2019/10/31', bitem_id: 1 },
			{id : 3, name:'Sam\'s club', amount:5732, added_at:'2019/10/31', bitem_id:2 }		
		],
		budget_month : 'October',
		budget_year : 2019
	},
	methods: {
		getAllItems() {
			axios.get('api/bitem/allcategories').then((res)=>{
				this.allItems = res.data;
			});
		},
			
	},	
	mounted() {
		this.getAllItems();
	}
});
