<template>
	<div>
		<table class="w-full">
			<template v-for="i in allItems">
			<tr class="flex justify-between">
					<th class="flex-grow text-left py-4">{{i.title}}</th>
				<th class="w-32 py-4">Planned</th>
				<th class="w-32 py-4">Actual</th>
			</tr>
			<tr class="flex justify-between" v-for="item in i.category" v-bind:key="item.id">
				<td class="flex-grow text-left">{{item.name}}</td>
				<td class="w-32 text-center">{{Number(item.budget) | monies}}</td>
				<td class="w-32 text-center font-bold" :class="receivedColor(item)">$0.00</td>
			</tr>
			</template>
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
