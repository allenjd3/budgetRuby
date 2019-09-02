<template>
    <div class="container">
			<div v-if="!budget_first">
					Budget: <span class="font-bold">{{budget_month}} {{budget_year}}</span>	
<!--					<a href="" class="px-4 py-2 rounded bg-blue-800 text-blue-100">Previous</a>
					<a href="" class="px-4 py-2 rounded bg-blue-800 text-blue-100">Next</a>
-->			</div>
			<div class="mt-8">
				<a href="" @click="" class="px-4 py-2 rounded bg-blue-800 text-blue-100">Create New Budget</a>
			</div>
    </div>
</template>

<script>
    export default {
		props : ['budget_month', 'budget_year', 'budget_first'] 
	}
</script>
