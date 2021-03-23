<script>

    import Post from './Post.svelte';

    export let posts;

</script>

<ul>
    {#each posts as post}
        <li class="slide-up">
            <Post {post} />
        </li>
    {/each}
</ul>

<style lang="scss">

    ul {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        padding: 1rem;
        gap: 1rem;
    }
    li {

    }

</style>
