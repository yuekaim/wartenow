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

        <div class="credits">
            <dt>Graphic Design & Website:</dt>
            <dd>Kimberly Duck, Moritz Ebeling, Cleo Miao</dd>
        </div>

    </article>

</Load>

<style lang="scss">

    article {
        margin: 1rem;
		@media (min-width: 680px ){
			margin: 2rem;
		}
		@media (min-width: 920px ){
			margin: 4rem;
		}
        header, main, footer {
            margin-bottom: 2rem;
        }
    }
    h2 {
        margin-bottom: 1rem;
    }

    .credits {
        color: #bbb;
        margin-top: 4rem;
    }

</style>
