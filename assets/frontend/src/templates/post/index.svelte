<script>

    import Load from '../Load.svelte';
    import Authors from './Authors.svelte';
    import Tags from '../../components/Tags.svelte';
    import Image from '../../components/Image.svelte';
    import Links from '../../components/Links.svelte';
    import Downloads from '../../components/Downloads.svelte';
    import Attributes from '../../components/Attributes.svelte';
    import Debug from '../../components/Debug.svelte';
    export let path;

</script>

<Load path="posts/{path}" let:prop={page}>

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

        </header>

        <main class="text">
            {@html page.content}
        </main>

        <footer>
            <Authors persons={page.authors} />
            <Links links={page.links} />
            <Downloads downloads={page.downloads} />
            <Attributes attributes={page.attributes} />
            <Tags tags={page.categories} />
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

</style>
