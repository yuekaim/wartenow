<script>

    import Post from './Post.svelte';

    export let posts;

</script>

<ul>
    {#each posts as post}
        <li>
            <Post {post} />
        </li>
    {/each}
</ul>

<style lang="scss">

    ul {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        padding: 4rem;
        gap: 4rem;
    }
    li {
    }

</style>
