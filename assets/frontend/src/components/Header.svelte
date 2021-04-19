<script>

    import {Link} from "svelte-navigator";

    export let categories = [];
    export let pages = [];
    console.log( categories, pages );

</script>

<header>
    <Link to="/"><img id="logo" alt="Logo" height="100%;" width="auto" src="/assets/icons/logo.svg"></Link>

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
    </nav>

</header>

<style lang="scss">

    header {
        position: sticky;
        display: flex;
        top: 0;
        top: 1rem;
        width: 100%;
        justify-content: space-between;
        padding: 1rem;
        align-items: flex-start;
    }

    img {
        height: 4rem;
        width: auto;
    }

    // .categories{
    //   :global(a){
    //     box-shadow: 0px 0px 2px 2px #eee;
    //   }
    // }

    #logo{
      z-index: -100;
    }

</style>
