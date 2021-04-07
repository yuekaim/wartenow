<script>

		import { navigate } from "svelte-navigator";
		import Downloads from './Downloads.svelte';
		import Imprint from './Imprint.svelte';
		import Footnotes from './Footnotes.svelte';
		import Persons from '../../components/Persons.svelte';
		import Tags from '../../components/Tags.svelte';
		import Image from '../../components/Image.svelte';
		import Link from '../../components/Link.svelte';
		import Links from '../../components/Links.svelte';
		import Collapsable from '../../components/Collapsable.svelte'

		export let page;

		function handlePrint(){
			navigate(`${window.location.pathname}/print`, { replace: true });
		}

		function handleKeydown(event) {
			if(event.key === 'p' && (event.metaKey || event.ctrlKey)){
				event.preventDefault();
				handlePrint();
			}
		}

</script>

<svelte:window on:keydown={handleKeydown}/>

<article>

	<header>

		{#if page.issue}
			<p class="issue">{page.issue}</p>
		{/if}

		{#if page.authors}
			<p class="authors">{page.authors.map(author => author.name).join(', ')}</p>
		{/if}

		<h1 class="title">{@html page.title}</h1>

		{#if page.subtitle}
			<h2 class="subtitle">{page.subtitle}</h2><br/>
		{/if}

	</header>

	{#if page.image}
		<figure class="title-img">
			<Image image={page.image} />
		</figure>
	{/if}

	{#if page.abstract}
		<Collapsable title="Abstract" color={page.color}>
			<div class="abstract">
				{@html page.abstract}
			</div>
		</Collapsable>
	{/if}

	{#if page.authors}
		{#each page.authors as author}
			{#if author.name}
				<Collapsable title={author.name} color={page.color}>
					<div class="author_info">
						<p>{@html author.text}</p>
					</div>
				</Collapsable>
			{/if}
		{/each}
	{/if}

	<main class="page">

		<div class="text">
			{@html page.content}
		</div>

		{#if page.footnotes}
			<Footnotes text={page.footnotes} />
		{/if}

		<Imprint attributes={page.attributes} />

	</main>

	<!-- <footer>
		<Links links={page.links} />
		<Downloads downloads={page.downloads} />
		<Tags tags={page.keywords} />
	</footer> -->

	<div class="print-button">
		<Link to="print" class="button" id="print">Print</Link>
	</div>

	<div class="bg-circle" style="background-color: {page.color};"></div>

</article>

<style lang="scss">

	article {
		margin: 1rem;
		@media (min-width: 680px ){
			margin: 2rem;
		}
		@media (min-width: 920px ){
			margin: 4rem;
		}
		header, main, footer {
			margin-bottom: 4rem;
		}
	}
	@media (min-width: 920px ){
		header {
			padding-right: 50%;
		}
	}
	.date {
		margin-bottom: 0.5em;
	}

	footer {
		:global( section ){
			margin-bottom: 2rem;
		}
	}

	h1 {
		@include text-huge;
	}

	main.page {
		padding: 0.5rem;
		@media (min-width: 920px ){
			padding: 2rem;
		}
		border-radius: 10px;
		max-width: 1000px;
		width: auto;
		margin-left: auto;
		margin-right: auto;
	}

	.print-button {
		position: fixed;
		bottom: 0;
		right: 0;
		padding: 1rem;
	}

	.title-img {
		margin-bottom: 4rem;
		img {
			width: 100%;
			height: 100%;
			object-position: center;
			object-fit: cover;
		}
	}

</style>
