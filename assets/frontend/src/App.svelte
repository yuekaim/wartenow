<script>

	import { Router, Link, Route } from "svelte-routing";

	import Header from './components/Header.svelte';

	import Archive from './templates/archive/index.svelte';
	import Post from './templates/post/index.svelte';
	import Info from './templates/info/index.svelte';
	import Debug from './templates/debug/index.svelte';

	export let data;
	export let url = "";

</script>

<Router url="{url}">

	<Header pages={data.pages} categories={data.categories} />

	<Route path="info" component={Info} />

	<Route path="posts/:path" let:params>
		<Post path="{params.path}" />
	</Route>

	<Route path="/*filter" let:params>
		<Archive filter="{params.filter}" all={data.posts} />
	</Route>

	<!-- <Route path="*" component={Debug} page={data} /> -->

</Router>

<style lang="scss">

</style>
