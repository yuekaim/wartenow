<script>

    import {Link} from "svelte-navigator";

    export let categories = [];
    export let pages = [];
    console.log( categories, pages );

</script>

<header>

    <div class="placeholder"></div>

    <nav class="categories">
        <Link class="button" to="/">All</Link>
        {#each categories as category}
            <Link class="button" to={category.path}>{category.title}</Link>
        {/each}
    </nav>

    <nav class="pages">
        {#each pages as page}
            <Link class="button" to={page.path}>{page.title}</Link>
        {/each}
        <Link to="/impressum" class="button">Impressum</Link>
    </nav>

</header>

<style lang="scss">

    header {
        position: sticky;
        display: flex;
        pointer-events: none;
        top: 0;
        justify-content: space-between;
        padding: 1rem;
        align-items: flex-start;
        z-index: 100;
    }

    .categories{
      display: flex;
      flex-wrap: wrap;
    }

    .placeholder{
      width: 10vw;
    }

    :global( a ){
        pointer-events: all;
    }

</style>
