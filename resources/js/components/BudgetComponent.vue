<template>
    <div class="container">
			<div v-if="!budget_first">
					Budget: <span class="font-bold">{{getMonthName(budget_month)}} {{budget_year}}</span>	
<!--					<a href="" class="px-4 py-2 rounded bg-blue-800 text-blue-100">Previous</a>
					<a href="" class="px-4 py-2 rounded bg-blue-800 text-blue-100">Next</a>
-->			</div>
			<div class="mt-8">
				<a href="" @click="" class="px-4 py-2 rounded bg-blue-800 text-blue-100">Show All Budgets</a>
				<a href="" @click="startNextMonth" class="px-4 py-2 rounded bg-blue-800 text-blue-100">Start {{getNextMonthName(budget_month)}}</a>
				
			</div>
    </div>
</template>

<script>
    export default {
		data(){
			return {
				months : ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],	
			}	
		},
		props : ['budget_month', 'budget_year', 'budget_first', 'budget_next_month'],
		methods: {
			getMonthName(month) {
				return this.months[month-1];
			},	
			getNextMonthName(month) {
				return this.months[month];
			},
			getNextMonthNumber(month) {
				return month+1;
			},
			startNextMonth(e) {
					e.preventDefault();
					axios.post('/api/budget', {month: this.getNextMonthNumber(this.budget_month), year: this.calculateYear(this.budget_year)} ).then(res=>{
						console.log(res.data);	
					})	
			},
			calculateYear(year) {
				if(this.budget_month === 12){
					return this.budget_year + 1;
				}
				else {
					return this.budget_year;
				}
			
			}
		}
	}
</script>
