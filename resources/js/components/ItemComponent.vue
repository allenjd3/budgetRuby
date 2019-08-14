<template>
	<div>
    	<div class="" v-for="item in bitems" v-bind:key="item.id">
				<p>{{item.name}}	{{item.budgeted | monies}}</p>
    	</div>
	</div>
</template>

<script>
    export default {
		props: ['bitems'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
