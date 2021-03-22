<script>

    import Load from '../Load.svelte';
    import Persons from '../../components/Persons.svelte';
    import Debug from '../../components/Debug.svelte';

</script>

<Load path="info" let:prop={page}>

    <article>

        <header>
            <h1>Wartenau Art Education</h1>
        </header>

        <main class="text">
            {@html page.content}
        </main>

        <Persons persons={page.team}>
            <h2>Team</h2>
        </Persons>

    </article>

</Load>

<style lang="scss">

    article {
        margin: 4rem;
        header, main, footer {
            margin-bottom: 4rem;
        }
    }
    h2 {
        margin-bottom: 1rem;
    }

</style>
