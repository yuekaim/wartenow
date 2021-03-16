<script>

    import Link from "./Link.svelte";

    export let categories = ["UPCOMING","RECENTLY"];
    export let pages = [];

</script>

<header>

    <h1 class="logo">
        <Link to="/"><img height="100%;" width="auto" src="/assets/icons/logo.svg"></Link>
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
        position: sticky;
        display: flex;
        top: 0;
        width: 100%;
        justify-content: space-between;
        padding: 1rem;
        align-items: flex-start;
    }

    img {
        height: 4rem;
        width: auto;
    }

    nav {
        :global( a ){
            background-color: #eee;
            padding: 0.3em 0.6em;
            margin: 0.3em;
        }
        :global( a:hover ),
        :global( a[aria-current=page] ){
            background-color: $yellow;
            box-shadow: inset 0 0 10px 5px $white;
        }
    }

</style>
