<script>

    import Person from './Person.svelte';
    export let persons;

</script>

<section>
    <slot></slot>
    <ul>
        {#each persons as person}
            <li>
                <Person {person} />
            </li>
        {/each}
    </ul>
</section>

<style lang="scss">

    ul {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
    }
    figure {
        width: 50%;
    }

</style>
