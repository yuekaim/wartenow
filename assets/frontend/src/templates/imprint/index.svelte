<script>

	export let page;

</script>

<div>

	{@html page.text}

</div>

<style lang="scss">

	div {
		margin: 2rem;
		color: #999;
		:global( p ){
			margin: 0.5em 0;
		}
	}

</style>
