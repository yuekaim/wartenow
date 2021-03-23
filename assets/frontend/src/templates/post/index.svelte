<script>

    import Load from '../Load.svelte';
    import Downloads from './Downloads.svelte';
    import Attributes from './Attributes.svelte';
    import Footnotes from './Footnotes.svelte';
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

            <h1 class="title">{page.title}</h1>

            {#if page.subtitle}
                <h2 class="subtitle">{page.subtitle}</h2>
            {/if}

            {#if page.image}
                <figure class="titleImg">
                    <Image image={page.image} />
                </figure>
            {/if}

            {#if page.abstract}
                <p class="abstract">{@html page.abstract}</p>
            {/if}

            <p class="page-header">author<br>
            <u>{page.title}</u> {page.subtitle}</p>

            <div class="bg-circle"></div>
        </header>

        <main class="text">
            {@html page.content}
        </main>

        {#if page.footnotes}
            <Footnotes text={page.footnotes} />
        {/if}

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

    footer {
        :global( section ){
            margin-bottom: 2rem;
        }
    }

</style>
