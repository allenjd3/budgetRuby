<template>
	<div>
		<table class="w-full">
			<tr class="flex justify-between">
				<th class="flex-grow">Food</th>
				<th class="w-32 text-center">Planned</th>
				<th class="w-32 text-center">Received</th>
			</tr>
			<tr class="flex justify-between" v-for="item in bitems" v-bind:key="item.id">
				<td v-show="item.category=='food'" class="flex-grow">{{item.name}}</td>
				<td v-show="item.category=='food'" class="w-32 text-center">$200.00</td>
				<td v-show="item.category=='food'" class="w-32 text-center">{{item.planned | monies}}</td>
			</tr>
			<tr class="flex justify-between">
				<th class="flex-grow">Transportation</th>
				<th class="w-32 text-center">Planned</th>
				<th class="w-32 text-center">Received</th>
			</tr>
			<tr class="flex justify-between" v-for="item in bitems" v-bind:key="item.id">
				<td v-show="item.category=='transportation'" class="flex-grow">{{item.name}}</td>
				<td v-show="item.category=='transportation'" class="w-32 text-center">$200.00</td>
				<td v-show="item.category=='transportation'" class="w-32 text-center">{{item.planned | monies}}</td>
			</tr>
		</table>
	</div>
</template>

<script>
    export default {
		props: ['bitems'],
		data() {
			return {
				categoryItems : []
			}
		},
		methods: {
			selectFood(items) {
				this.categoryItems = [];
				items.forEach(item => {
				 	if(item.category == 'food'){
						this.categoryItems.push(item);
					}		
					return this.categoryItems;
				});
			}
		}
    }
</script>
