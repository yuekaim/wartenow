<script>

    import Post from './Post.svelte';

    export let posts;
</script>

<ul>
    {#each posts as post}
    <!-- <div class="post-wrapper"> -->
        <li class="slide-up">
            <Post {post} />
        </li>
    <!-- </div> -->
    {/each}
</ul>

<style lang="scss">

    ul {
        padding-top: 8rem;
        padding: 3rem;
        @media (min-width: 600px){
            padding-top: 6rem;
            padding: 8vw;
            display: grid;
            flex-wrap: wrap;
            grid-template-columns: repeat( auto-fit, minmax(300px, 1fr) );
            gap: 0 8vw;
        }
    }

    li{
        margin-bottom: 4rem;
        padding-right: 2rem;
        @media (min-width: 800px){
            margin: 2rem;
        }
    }

</style>
