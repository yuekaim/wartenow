<script>

    import Link from "./Link.svelte";

    export let categories = [];
    export let pages = [];

</script>

<header>

    <h1 class="logo">
        <Link to="/"><img src="assets/icons/logo.svg"></Link>
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
        position: fixed;
        top: 1rem;
        left: 0.5rem;
        display: flex;
        :global( a ){
            /* padding: 0.5rem; */

            /* margin: 0.5rem; */
        }
    }
    nav{
      position: absolute;
      margin-left: 200px;
      height: 70px;
    }
    .categories{
      position: absolute;
      background-color: white;
      border-radius: 10px;
      border: 1px solid black;
      height: 1.2em;
      top: 28px;
      padding-left: 0.5rem;
      padding-right: 0.5rem;

    }

</style>
