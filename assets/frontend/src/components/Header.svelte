<script>

    import Link from "./Link.svelte";

    export let categories = [];
    export let pages = [];

</script>

<header>

    <h1 class="logo">
        <Link to="/">HFBK Art Education</Link>
    </h1>

    <nav class="categories">
        <Link to="/">All</Link>
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

    header {
        display: flex;
        background-color: red;
        :global( a ){
            padding: 0.5rem;
            background-color: grey;
            margin: 0.5rem;
        }
    }

</style>
