<script>

	import { navigate } from "svelte-navigator";
	import Attributes from '../print/Attributes.svelte';
	import Footnotes from '../print/Footnotes.svelte';
	import Persons from '../../components/Persons.svelte';
	import Tags from '../../components/Tags.svelte';
	import Image from '../../components/Image.svelte';
	import Links from '../../components/Links.svelte';
	import { onMount } from 'svelte';
	// import { Previewer } from 'pagedjs';

	// let paged, flow;
	//
	// function startPaged(){
	// 	paged = new Previewer();
	// 	flow = paged.preview(DOMContent, ["/assets/css/print.css"], document.body).then((flow) => {
	// 		console.log("Rendered", flow.total, "pages.");
	// 	})
	// }

	let outerHeight, footnotesHeight, authorsHeight;
	let count;
	let pageNum = [];
	// let pageNumContainer;

	function countPages(){
		count = 1;
		count += Math.ceil(outerHeight / 1123);
		console.log(count);
		count += Math.ceil(footnotesHeight / 1123);
		console.log(footnotesHeight);
		console.log(count);
		count += Math.ceil(authorsHeight / 1123);
		console.log(count);
		console.log(authorsHeight);
	}

	function addPageNumber(){
		for (var i = 1; i <= count; i++){
			pageNum = [...pageNum, i];
			// const pageNumSpan = document.createElement('span');
			// pageNumSpan.textContent = 'Page ', i, ' of ', count;
			// pageNumContainer.appendChild(pageNumSpan);
		}
	}

	export let page;

	function isChrome(){
		return navigator.userAgent.indexOf("Chrome") > -1;
	}

	function handlePrint(){
		window.print();
	}

	function afterPrint(){
		navigate(window.location.pathname.replace('/print',''), { replace: true });
	}

	onMount(() => {
		// startPaged();
		countPages();
		addPageNumber();
		if( isChrome() ){
			// window.print();
		} else {
			alert('Please print with Chrome browser');
			afterPrint();
		}
	})

</script>

<svelte:window on:afterprint={afterPrint}/>
<!-- <div bind:this={pageNumContainer}/> -->

<div class="pageNumContainer">
	{#each pageNum as page}
		<div class="pageNum">{page}</div>
	{/each}
</div>



<!-- <div style="height: 1123px; width: 10px; background-color: red;"></div> -->

<table>

	<thead>
		<tr>
			<td>
				<!--place holder for the fixed-position header-->
				<div class="page-header-space"></div>
			</td>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>
				<article>
					<header>
						<div class="cover_info">

							{#if page.authors}
								<p class="authors">{page.authors.map(author => author.name).join(', ')}</p>
							{/if}

							<h1 class="title">{@html page.title}</h1>

							{#if page.subtitle}
								<h2 class="subtitle">{page.subtitle}</h2>
							{/if}
						</div>

						{#if page.image}
							<figure class="titleImg">
									<Image image={page.image} />
							</figure>
						{/if}

						{#if page.abstract}
							<div class="abstract" style="border: 1px solid {page.color};">
								<h3>ABSTRACT</h3>
								<p>{@html page.abstract}</p>
							</div>
						{/if}

						<div class="bg-circle" style="background-color:{page.color};"></div>
					</header>

					<main>
						<div class="text" bind:offsetHeight={outerHeight}>
							{@html page.content}
						</div>
					</main>

					<div id="aftertext" bind:offsetHeight={footnotesHeight}>
					{#if page.footnotes}
						<Footnotes text={page.footnotes} />
					{/if}

					<footer>
						<Attributes attributes={page.attributes} />
						<Links links={page.links} />
						<Tags tags={page.keywords} />
					</footer>
					</div>

					{#if page.authors}
						<div class="author_info" bind:offsetHeight={authorsHeight}>
							{#each page.authors as author}
								<h3>{author.name}</h3><br/>
								{@html author.text}<br/>
							{/each}
						</div>
					{/if}

				</article>
			</td>
		</tr>
	</tbody>

	<tfoot>
		<tr>
			<td>
				<!--place holder for the fixed-position footer-->
				<div class="page-footer-space"></div>
			</td>
		</tr>
	</tfoot>

</table>


<!-- header and footer -->

<div class="page-header print-only">
			{#if page.authors}{page.authors.map(author => author.name).join(', ')}{/if}
	<br>
{#if page.title}<h3>{page.title}</h3>{/if}
{#if page.subtitle}{page.subtitle}{/if}</div>

<div class="page-footer print-only">
	{#if page.issue}
		<p class="issue">{page.issue}</p>
	{/if}
</div>

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

	.text, .footnotes, .colophon, .author_info{
	  width: 555.797px;
	}

	.text{
	  position: relative;
	  page-break-before: always;
	  // page-break-inside: auto;
	  // width: 70%;
	  width: 147mm;
	  font-size: 12pt;
	  margin: 0;
	  padding: 0;
	  background-color: #ffffffff;
	  // height: 10cm;
	  // float: none !important;

	  // box-decoration-break: clone;
	  // border: 1px solid black;
	  // padding-top: 5cm;
	  // padding-bottom: 5cm;

	  // height: auto;
	  overflow: visible!important;
	  // page-break-inside: auto !important;
		  iframe{
		    display: none;
		    width: 0 !important;
		    height: 0 !important;
		    overflow: hidden !important;
		    line-height: 0pt !important;
		    white-space: nowrap;
		  }
		  figure{
		    transform: translateX(200px);
		    // display: inline;
		    // width: 100%;

		    figcaption{
		      text-align: right;
		      font-size: 10pt;
		      @include regular;
		    }
		  }
		  h1, h2, h3, h4, h5, h6
		      { page-break-after:avoid; page-break-inside:avoid }
		  figure { page-break-inside:avoid; page-break-after:avoid; }
		}


</style>
