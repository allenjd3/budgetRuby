<template>
    <div class="w-2/3 mx-auto">
		<h3 class="text-xl text-center">Transaction Creation</h3>
		<form class="w-full flex flex-col">
			<div class="my-4 flex items-center">
				<label for="name" class="text-gray-800 font-bold w-1/4 inline-block text-right pr-2">Name:</label>
				<input id="name" type="text" class="border p-2 w-3/4 border-gray-400"/>	
			</div>		
			<div class="my-4 flex items-center">
				<label for="amount" class="text-gray-800 font-bold w-1/4 inline-block text-right pr-2">Amount:</label>
				<input id="amount" type="text" class="border p-2 w-3/4 border-gray-400"/>	
			</div>	
			<div class="my-4 flex items-center">
				<label for="added-at" class="text-gray-800 font-bold w-1/4 inline-block text-right pr-2">Added At:</label>
				<input id="added-at" type="date" class="border border-gray-400 p-2 w-3/4 text-gray-700"/>	
			</div>
			<div class="my-4 flex items-center">
				<div class="text-right font-bold w-1/4 pr-2"></div>
				<div class="w-3/4">
					<input type="submit" class="rounded py-2 px-4 bg-blue-800 text-gray-100 font-bold" value="Add Transaction"/>	
				</div>
			</div>
		</form>
    </div>
</template>

<script>
    export default {
    }
</script>
