<template>
    <div class="w-2/3 mx-auto">
		<h3 class="text-xl text-center">Item Creation</h3>
		<form class="flex flex-col">
			<div class="my-4 flex items-center">
				<label for="name" class="w-1/4 inline-block text-right pr-2 text-gray-800 font-bold">Name:</label>
				<input id="name" type="text" class="border border-gray-400 p-2 w-3/4"/>	
			</div>		
			<div class="my-4 flex items-center">
				<label for="planned" class="w-1/4 inline-block text-right pr-2 text-gray-800 font-bold">Planned:</label>
				<input id="planned" type="text" class="border border-gray-400 p-2 w-3/4"/>	
			</div>	
			<div class="my-4 flex items-center">
				<label for="category" class="w-1/4 inline-block text-right pr-2 text-gray-800 font-bold">Category:</label>
				<input id="category" type="text" class="border border-gray-400 p-2 w-3/4"/>	
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
    }
</script>
