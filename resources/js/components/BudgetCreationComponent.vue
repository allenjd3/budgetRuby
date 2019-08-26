<template>
    <div class="w-2/3 mx-auto">
		<h3 class="text-xl text-center">New Budget Month</h3>
		<form class="flex flex-col">
			<div class="my-4 flex items-center">
				<label for="budget" class="text-gray-800 font-bold w-1/4 inline-block text-right pr-2">Budget:</label>
				<input id="budget" type="date" class="border border-gray-400 p-2 w-3/4 text-gray-700"/>	
			</div>
			<div class="my-4 flex items-center h-8">
				<div class="w-1/4">
				</div>
				<div class="w-3/4">
					<input type="submit" class="rounded py-2 px-4 bg-blue-800 text-gray-100 font-bold" value="Add Budget"/>	
				</div>
			</div>
		</form>
    </div>
</template>

<script>
    export default {
    }
</script>
