<script>

		import { navigate } from "svelte-navigator";
		import Downloads from './Downloads.svelte';
		import Attributes from './Attributes.svelte';
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

	<!-- <header> -->
	<div class="print-button">
		<Link to="print" class="button" id="print">Print</Link>
	</div>

	{#if page.issue}
		<p class="issue">{page.issue}</p>
	{/if}

	{#if page.authors}
		<p class="authors">{page.authors.map(author => author.name).join(', ')}</p>
	{/if}

	<h1 class="title">{page.title}</h1>

	<!-- {#each page.authors as author}
		<h3>{author.name}</h3>
	{/each}

	<h1 class="title">{page.title}</h1> -->

	{#if page.subtitle}
		<h2 class="subtitle">{page.subtitle}</h2><br/>
	{/if}
	<div class="bg-circle" style="background-color: {page.color};"></div>

	<!-- </header> -->

	{#if page.image}
		<figure class="titleImg">
			<Image image={page.image} />
		</figure>
	{/if}

	<!-- collapsable sections -->
	{#if page.abstract}
		<Collapsable title="Abstract" color={page.color}>
			<div class="abstract">
				<p>{@html page.abstract}</p>
			</div>
		</Collapsable>
	{/if}

	{#if page.authors}
		{#each page.authors as author}
			<Collapsable title={author.name} color={page.color}>
				<div class="author_info">
					<p>{@html author.text}</p>
				</div>
			</Collapsable>
		{/each}
	{/if}

	<main class="page">

		<div class="text">
			{@html page.content}
		</div>

		{#if page.footnotes}
			<Footnotes text={page.footnotes} />
		{/if}

		<Attributes attributes={page.attributes} />

	</main>

	<footer>
		<!-- <Links links={page.links} /> -->
		<!-- <Downloads downloads={page.downloads} /> -->
		<!-- <Tags tags={page.keywords} /> -->
	</footer>

</article>

<style lang="scss">

	article {
		margin: 4rem;
		header, main, footer {
			margin-bottom: 4rem;
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

	.print-button {
		position: fixed;
		bottom: 0;
		right: 0;
		padding: 1rem;
	}

</style>
