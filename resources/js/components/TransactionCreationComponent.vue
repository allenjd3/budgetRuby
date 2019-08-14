<template>
    <div class="w-2/3 mx-auto relative">
		<h3 class="text-xl text-center">Transaction Creation</h3>
		<form class="w-full">
			<div class="my-4 flex items-center">
				<label for="name" class="w-24 inline-block text-right pr-2">Name:</label>
				<input id="name" type="text" class="border p-2 w-full"/>	
			</div>		
			<div class="my-4 flex items-center">
				<label for="amount" class="w-24 inline-block text-right pr-2">Amount:</label>
				<input id="amount" type="text" class="border p-2 w-full"/>	
			</div>	
			<div class="my-4 flex items-center">
				<label for="added-at" class="w-24 inline-block text-right pr-2">Added At:</label>
				<input id="added-at" type="date" class="border p-2 w-full"/>	
			</div>
			<div class="my-4 h-8">
				<input type="submit" class="rounded py-2 px-4 bg-blue-600 text-gray-100 font-bold absolute bottom-0 right-0" value="Add Transaction"/>	
			</div>
		</form>
    </div>
</template>

<script>
    export default {
    }
</script>
