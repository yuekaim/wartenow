<script>

    import Load from '../Load.svelte';
    import Debug from '../../components/Debug.svelte';

</script>

<Load path="info" let:prop={page}>

    <h1>{page.title}</h1>
    <Debug data={page} />

</Load>

<style lang="scss">

    h1 {
        font-size: 2rem;
    }

</style>
