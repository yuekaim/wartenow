<script>

    import Link from "./Link.svelte";

    export let categories = [];
    export let pages = [];

</script>

<header>

    <Link to="/">
        <h1 class="logo">HFBK Art Education</h1>
    </Link>

    <nav class="categories">
        {#each categories as category}
            <Link to={category}>{category}</Link>
        {/each}
    </nav>

    <nav class="pages">
        {#each pages as page}
            <Link to={page.path}>{page.title}</Link>
        {/each}
    </nav>

</header>

<style lang="scss">

</style>
