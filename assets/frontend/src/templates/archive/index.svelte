<script>

    import Link from '../../components/Link.svelte';
    export let posts;
    export let filter;

</script>

<h2>Filter: {filter}</h2>

<ul>
    {#each posts as post}
        <li>
            <Link to={post.path}>{post.title}</Link>
        </li>
    {/each}
</ul>

<style lang="scss">

    pre {
        background-color: #eee;
        padding: 0.5rem;
        margin: 0.5rem;
    }

</style>
