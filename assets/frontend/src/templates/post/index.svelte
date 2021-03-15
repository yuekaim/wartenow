<script>

    import Load from '../Load.svelte';
    export let path;

</script>

<Load path="posts/{path}" let:prop={page}>

    <h1>{page.title}</h1>

</Load>

<style lang="scss">

    h1 {
        font-size: 2rem;
    }

</style>
