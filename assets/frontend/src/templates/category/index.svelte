<script>

    import Load from '../Load.svelte';
    import Posts from './Posts.svelte';

    export let category;

</script>

<Load path="{category}" let:prop={page}>

    <Posts posts={page.posts} />

</Load>

<style lang="scss">
</style>
