<script>

    import Post from './Post.svelte';

    export let posts;
</script>

<ul>
    {#each posts as post}
    <div class="post-wrapper">
        <li class="slide-up">
            <Post {post} />
        </li>
    </div>
    {/each}
</ul>

<style lang="scss">


    ul {
        @media (min-width: 600px){
            display: grid;
            flex-wrap: wrap;
            grid-template-columns: repeat( auto-fit, minmax(250px, 1fr) );
            gap: 0 10rem;
        }
        padding: 10rem;
    }


    li{
        width: 300px;
        margin: 2rem 5rem 5rem 0rem;
    }

</style>
