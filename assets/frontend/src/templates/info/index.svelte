<script>

    import Load from '../Load.svelte';
    import Team from './Team.svelte';
    import Debug from '../../components/Debug.svelte';

</script>

<Load path="info" let:prop={page}>

    <article>

        <header>
            <h1>{page.title}</h1>
        </header>

        <main class="text">
            {@html page.content}
        </main>

        <Team persons={page.team} />

        <footer>

        </footer>

        <!-- <Debug data={page} /> -->

    </article>

</Load>

<style lang="scss">

    article {
        margin: 4rem;
        header, main, footer {
            margin-bottom: 4rem;
        }
    }

</style>
