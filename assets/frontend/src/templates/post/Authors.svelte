<script>

    import Image from '../../components/Image.svelte';
    export let persons;

</script>

<section>
    <h3>Autor*innen</h3>
    <ul>
        {#each persons as person}
            <li>

                {#if person.image}
                    <figure>
                        <Image image={person.image} />
                    </figure>
                {/if}

                <h3>{person.name}</h3>

                {@html person.text}

                {#if person.link}
                    <a href="{person.link}" rel="noopener noreferrer external" target="_blank">Website</a>
                {/if}

            </li>
        {/each}
    </ul>
</section>

<style lang="scss">

    li {
        margin-bottom: 2rem;
    }

    figure {
        width: 50%;
    }

</style>
