<script>

    import Load from '../Load.svelte';
    import Downloads from './Downloads.svelte';
    import Attributes from './Attributes.svelte';
    import Persons from '../../components/Persons.svelte';
    import Tags from '../../components/Tags.svelte';
    import Image from '../../components/Image.svelte';
    import Links from '../../components/Links.svelte';
    import Debug from '../../components/Debug.svelte';
    export let path;

</script>

<Load path="{path}" let:prop={page}>

    <article>

        <header>

            {#if page.date}
                <h3 class="date">{page.date}</h3>
            {/if}

            <h1>{page.title}</h1>

            {#if page.subtitle}
                <h2>{page.subtitle}</h2>
            {/if}

            {#if page.image}
                <figure>
                    <Image image={page.image} />
                </figure>
            {/if}

            {#if page.abstract}
                <p>{page.abstract}</p>
            {/if}

        </header>

        <main class="text">
            {@html page.content}
        </main>

        <aside class="footnotes">
            {#if page.footnotes}
                {@html page.footnotes}
            {/if}
        </aside>

        <footer>
            <Attributes attributes={page.attributes} />

            <Persons persons={page.authors}>
                <h2>Autor*innen</h2>
            </Persons>

            <Links links={page.links} />
            <Downloads downloads={page.downloads} />
            <Tags tags={page.keywords} />
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
    .date {
        margin-bottom: 0.5em;
    }
    .footnotes {
        border-top: 1px solid #000;
        padding-top: 0.5em;
    }

    footer {
        :global( section ){
            margin-bottom: 2rem;
        }
    }

</style>
