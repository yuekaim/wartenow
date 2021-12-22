<script>

	export let page;

</script>

<div>

	{@html page.text}

</div>

{#if page.logos}
	<div class="logos">
		{#each page.logos as logo}
			<figure>
				<figcaption>{logo.caption}</figcaption>
				<img src="{logo.url}" alt="{logo.caption}" />
			</figure>
		{/each}
	</div>
{/if}

<style lang="scss">

	div {
		margin: 2rem;
		color: #999;
		:global( p ){
			margin: 0.5em 0;
		}
	}

	.logos {
		figure {
			width: 200px;
		}
		figcaption {
			margin-bottom: 0.5em;
		}
		img {
			height: auto;
			margin-right: 2rem;
		}
	}

</style>
