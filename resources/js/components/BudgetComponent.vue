<template>
    <div class="container">
			Budget: <span class="font-bold">{{budget_month}} {{budget_year}}</span>	
			<a href="" class="px-4 py-2 rounded bg-blue-800 text-blue-100">Previous</a>
			<a href="" class="px-4 py-2 rounded bg-blue-800 text-blue-100">Next</a>
    </div>
</template>

<script>
    export default {
		props : ['budget_month', 'budget_year'] 
	}
</script>
