<template>
	<div>
		<table class="w-full">
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">Food</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in foodItems" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{Number(item.budget) | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">$0.00</td>
			</tr>
			<tr class="flex justify-between">
				<th class="flex-grow text-left py-4">Transportation</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in transportationItems" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{item.planned | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">{{item.received | monies}}</td>
			</tr>
		</table>
	</div>
</template>

<script>
    export default {
		props: ['foodItems', 'transportationItems'],
		methods: {
			receivedColor(item) {
					if(item.received > item.planned) {
						return "text-red-600";
					}
					else {
						return "text-green-600";
					}
			}
		}
    }
</script>
