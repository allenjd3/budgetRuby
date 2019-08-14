<template>
	<div class="mt-4">
		<h3 class="text-2xl">Transactions</h3>
    	<div class="" v-for="t in transactions" v-bind:key="t.id">
				<p>{{t.name}}	{{t.amount | monies}}</p>
    	</div>
	</div>
</template>

<script>
    export default {
		props: ['transactions'],
    }
</script>
