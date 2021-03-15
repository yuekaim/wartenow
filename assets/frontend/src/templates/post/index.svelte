<script>

    import Load from '../Load.svelte';
    import Debug from '../../components/Debug.svelte';
    export let path;

</script>

<Load path="posts/{path}" let:prop={page}>

    <img alt="Insta" src="/assets/icons/instagram.svg" />

    <h1>{page.title}</h1>
    <h2>{page.subtitle}</h2>

    <h3>{page.info}</h3>

    <main>
        {@html page.content}
    </main>

    <Debug data={page} />

</Load>

<style lang="scss">

    h1 {
        font-size: 2rem;
        background-color: green;
    }
    h3 {
        padding: 1rem;
        margin: 1rem;
        background-color: aqua;
        border-radius: 2rem;
    }
    img {
        width: 2rem;
        height: auto;
    }

</style>
