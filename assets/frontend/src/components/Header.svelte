<script>

    import Link from "./Link.svelte";

    export let categories = ["UPCOMING","RECENTLY"];
    export let pages = [];

</script>

<header>

    <h1 class="logo">
        <Link to="/"><img src="assets/icons/logo.svg"></Link>
    </h1>

    <nav class="categories">
        <div><Link to="/">All</Link></div>
        {#each categories as category}
            <div><Link to={category}>{category}</Link></div>
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
        display: flex;
        top: 0.5rem;
        left: 0.5rem;
        :global( a ){
            /* padding: 0.5rem; */

            /* margin: 0.5rem; */
        }
    }

    .categories{
      display: flex;
      position: absolute;
      margin-left: 200px;
      height: 70px;

      align-items: center;

        div{
          text-align: center;
          background-color: white;
          border-radius: 10px;
          height: 1.5em;

          padding-left: 1rem;
          padding-right: 1rem;
          margin-right: 0.5rem;
          padding-top: 0.25em;
          padding-bottom: 0.25em;
          vertical-align: middle;
        }
        div:hover{
          background-color: $yellow;
          box-shadow: inset 0 0 10px 5px $white;
        }

    }

</style>
