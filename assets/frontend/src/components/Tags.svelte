<script>

    import {Link} from "svelte-navigator";
    export let tags;

</script>

<nav>
    {#each tags as tag}
        <Link to="/" class="button">{tag}</Link>
    {/each}
</nav>

<style lang="scss">

    ul {
        display: flex;
    }

</style>
