<template>
	<div>
		<table class="w-full">
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">Transactions</th>
				<th class="w-32 py-4">Amount</th>
			</tr>
			<tr class="flex justify-between" v-for="t in transactions" v-bind:key="t.id">
				<td class="flex-grow text-left">{{t.name}}</td>
				<td class="w-32 text-center">{{t.amount | monies}}</td>
			</tr>
		</table>
	</div>
</template>

<script>
    export default {
		props: ['transactions'],
    }
</script>
