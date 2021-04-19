<script>

	import { Router, Link, Route } from "svelte-navigator";

	import Animation from './animation/SvgExample.svelte';
	import Header from './components/Header.svelte';
	import Footer from './components/Footer.svelte';

	import Start from './templates/start/index.svelte';
	import Category from './templates/category/index.svelte';
	import Post from './templates/post/index.svelte';
	import Info from './templates/info/index.svelte';
	import Print from './templates/print/index.svelte';
	import Load from './templates/Load.svelte';

	export let data;
	export let url = "";

</script>

<Router url="{url}">

	<Header pages={data.pages} categories={data.categories} />

	<Route path="info" component={Info} />

	<!-- <Route path="anim" component={Animation} /> -->
	<Animation />

	<Route path="/">
		<Start posts={data.posts}/>
	</Route>

	<Route path="*category" let:params>
		<Category category="{params.category}" />
	</Route>

	<Route path=":category/:slug" let:params>
		<Load path="{params.category}/{params.slug}" let:prop={page}>
			<Post {page} />
		</Load>
	</Route>
	<Route path=":category/:slug/print" let:params>
		<Load path="{params.category}/{params.slug}" let:prop={page}>
			<Print {page} />
		</Load>
	</Route>

	<Footer />

</Router>

<style lang="scss">

</style>
