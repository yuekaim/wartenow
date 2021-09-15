<script>

		import { navigate, Link } from "svelte-navigator";
		import Imprint from './Imprint.svelte';
		import Footnotes from './Footnotes.svelte';
		import Image from '../../components/Image.svelte';
		import Collapsable from '../../components/Collapsable.svelte';

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
	<div class="wrapper">

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
			<div class="title-image">
				<figure class="title-img">
					<Image image={page.image} />
					{#if page.image.caption}
						<figcaption>{page.image.caption}</figcaption>
					{/if}
				</figure>
			</div>
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
			<Link to="print" class="button">Print</Link>
		</div>

		<div class="bg-circle" style="background-color: {page.color};"></div>

	</div>
</article>

<style lang="scss">

	article {
        position: absolute;

        z-index: 100;
        width: 100%;
        padding: 2rem;

        header, main, footer {
            margin-bottom: 2rem;
        }
        .wrapper {
            max-width: 900px;
            margin: 2rem auto;
            @media (min-width: 920px ){
                margin: 4rem auto;
            }
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
		font-size: 2rem;
	}

	.title-image {
		margin-bottom: 2rem;
		margin-top: 2rem;
		figure {
			width: 65%;
			margin-left: auto;
			margin-right: 10%;
		}
		:global(img) {
			height: auto;
			object-fit: cover;
			border-radius: 10px;
		}
		figcaption {
			margin-top: 0.5em;
			padding: 0.1em;
		}
	}

</style>
