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

    function handlePrint(){
        window.print();
    }

</script>

<Load path="{path}" let:prop={page}>
  <table>

    <thead>
      <tr>
        <td>
          <!--place holder for the fixed-position header-->
          <div class="page-header-space"></div>
        </td>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          <article>

              <header>

            {#if page.authors}
                <p class="authors">{page.authors.map(author => author.name).join(', ')}</p>
            {/if}

            {#if page.issue}
                <p class="issue">{page.issue}</p>
            {/if}

            <h1 class="title">{page.title}</h1>

                  {#each page.authors as author}
                    <h3>{author.name}</h3>
                  {/each}

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
                      <Collapsable title="Abstract">
                        <p>{@html page.abstract}</p>
                      </Collapsable>
                  {/if}

                  <p class="page-header">author<br>
                  <u>{page.title}</u> {page.subtitle}</p>

                  <!-- {#if page.abstract}
                      <div class="abstract">
                        <h3>Abstract</h3>
                        <p>{@html page.abstract}</p>
                      </div>
                  {/if} -->

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

            <Links links={page.links} />
            <Downloads downloads={page.downloads} />
            <Tags tags={page.keywords} />

            <button class="button" on:click={handlePrint}>Print</button>
        </footer>

                  <Links links={page.links} />
                  <Downloads downloads={page.downloads} />
                  <Tags tags={page.keywords} />
              </footer>

              <!-- <Debug data={page} /> -->

          </article>
        </td>
      </tr>
    </tbody>

    <tfoot>
      <tr>
        <td>
          <!--place holder for the fixed-position footer-->
          <div class="page-footer-space"></div>
        </td>
      </tr>
    </tfoot>

  </table>


    <!-- header and footer -->

    <div class="page-header print-only">
        {#each page.authors as author}
          {author.name}
        {/each}
      <br>
    <strong>{page.title}</strong> {page.subtitle}</div>

    <div class="page-footer print-only">
    I'm The Footer
    </div>


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
