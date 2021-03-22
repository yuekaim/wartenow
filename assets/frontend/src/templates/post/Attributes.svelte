<script>

    export let attributes;

</script>

{#if attributes.length > 0}
    <section>
        <h3>Colophon</h3>
        {#each attributes as attr}
            <dl>
                <dt>{attr.title}</dt>
                <dd>{@html attr.value}</dd>
            </dl>
        {/each}
    </section>
{/if}

<style lang="scss">

    section {
        margin-top: 2rem;
    }
    dd {
        margin-left: 1em;
    }

</style>
