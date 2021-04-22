<script>

    import Load from '../Load.svelte';
    import Persons from '../../components/Persons.svelte';
    import Debug from '../../components/Debug.svelte';

</script>

<Load path="info" let:prop={page}>

    <article>
        <div class="wrapper">

            <header>
                <h1>Wartenau Art Education</h1>
            </header>

            <main class="text">
                {@html page.content}
            </main>

            <Persons persons={page.team}>
                <h2>Team</h2>
            </Persons>

            <div class="credits">
                <dt>Graphic Design & Website:</dt>
                <dd>Kimberly Duck, Moritz Ebeling, Cleo Miao</dd>
                <p class="year">© {(new Date()).getFullYear()}, HFBK Hamburg</p>
            </div>

        </div>
    </article>

</Load>

<style lang="scss">

    article {
        position: absolute;

        z-index: 100;
        width: 100%;
        padding: 2rem;

        header, main, footer {
            margin-bottom: 2rem;
        }
        .wrapper {
            max-width: 900px;
            margin: 2rem auto;
            @media (min-width: 920px ){
                margin: 4rem auto;
            }
        }
    }
    h2 {
        margin-bottom: 1rem;
    }

    h1 {
        margin-bottom: 2rem;
        font-size: 4em;
        line-height: 1em;
    }

    .text {
      padding: 0.5em;
      background-color: #eee;
      border-radius: 0.5em;
      border-width: 15px;
      box-shadow: 0px 0px 0px 9px #eee;
      font-size: 1em;
    }

    .credits {
        color: #bbb;
        margin-top: 4rem;
      }
</style>
