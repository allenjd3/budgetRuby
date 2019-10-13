<template>
    <div class="w-2/3 mx-auto">
		<h3 class="text-xl text-center">Item Creation</h3>
		<form class="flex flex-col" v-on:submit.prevent="submitItem">
			<div class="my-4 flex items-center">
				<label for="name" class="w-1/4 inline-block text-right pr-2 text-gray-800 font-bold">Name:</label>
				<input id="name" v-model="name" type="text" class="border border-gray-400 p-2 w-3/4"/>	
			</div>		
			<div class="my-4 flex items-center">
				<label for="budget" class="w-1/4 inline-block text-right pr-2 text-gray-800 font-bold">Planned:</label>
				<input id="budget"  v-model="budget" type="text" class="border border-gray-400 p-2 w-3/4"/>	
			</div>	
			<div class="my-4 flex items-center">
				<label for="category" class="w-1/4 inline-block text-right pr-2 text-gray-800 font-bold">Category:</label>
				<select id="category" v-model="category" class="border border-gray-400 bg-white p-2 w-3/4">
						<option value="Food">Food</option>
						<option value="Giving">Giving</option>
						<option value="Savings">Savings</option>
						<option value="Housing">Housing</option>
						<option value="Lifestyle">Lifestyle</option>
						<option value="Insurance">Insurance</option>
						<option value="Health">Health</option>
						<option value="Transportation">Transportation</option>
				</select>

			</div>	
			<div class="my-4 flex items-center h-8">
				<div class="w-1/4">
				</div>
				<div class="w-3/4">
					<input type="submit" class="rounded py-2 px-4 bg-blue-800 text-gray-100 font-bold" value="Add Item"/>	
				</div>
			</div>
		</form>
    </div>
</template>

<script>
    export default {
			data() {
				return {
					name : "",
					budget : "",
					category : ""
				}	
			},
			methods:{
				submitItem(){
						axios.post('/api/bitem', {name: this.name, budget: this.budget, category: this.category}).then(res=>{
							console.log(res.data);	
						});
				}
			}
    }
</script>
