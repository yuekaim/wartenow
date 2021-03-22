<script>

    import Posts from './Posts.svelte';

    export let all;
    export let filter;
    export let posts;

    // function filterPosts(){
    //     if( !filter ){
    //         return all;
    //     }
    //     return all.filter( post => post.categories.includes( filter ) );
    // }
    // $: posts = filterPosts( filter );

</script>

<Posts {posts} />

<style lang="scss">
</style>
