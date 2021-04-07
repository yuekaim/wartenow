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
        @media (min-width: 600px){
            display: grid;
            flex-wrap: wrap;
            grid-template-columns: repeat( auto-fit, minmax(250px, 1fr) );
            gap: 0 1rem;
        }
        padding: 1rem;
    }
    li {
        margin-bottom: 1rem;
    }

</style>
