<script>

    import Link from '../../components/Link.svelte';

    export let all;
    export let filter;

    function filterPosts(){
        if( !filter ){
            return all;
        }
        return all.filter( post => post.categories.includes( filter ) );
    }
    $: posts = filterPosts( filter );

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

    h2 {
        background-color: yellow;
    }

</style>
