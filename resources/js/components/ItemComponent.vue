<template>
	<div>
		<table class="w-full">
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">Food</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in allItems.food" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{Number(item.budget) | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">$0.00</td>
			</tr>
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">Transportation</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in allItems.transportation" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{Number(item.budget) | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">$0.00</td>
			</tr>
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">Giving</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in allItems.giving" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{Number(item.budget) | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">$0.00</td>
			</tr>
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">Savings</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in allItems.savings" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{Number(item.budget) | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">$0.00</td>
			</tr>
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">Housing</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in allItems.housing" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{Number(item.budget) | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">$0.00</td>
			</tr>
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">LifeStyle</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in allItems.lifestyle" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{Number(item.budget) | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">$0.00</td>
			</tr>
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">Health</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in allItems.health" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{Number(item.budget) | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">$0.00</td>
			</tr>
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">Insurance</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in allItems.insurance" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{Number(item.budget) | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">$0.00</td>
			</tr>
		</table>
	</div>
</template>

<script>
    export default {
		props: ['allItems'],

		methods: {
			receivedColor(item) {
					if(item.received > item.planned) {
						return "text-red-600";
					}
					else {
						return "text-green-600";
					}
			}
		},
    }
</script>
