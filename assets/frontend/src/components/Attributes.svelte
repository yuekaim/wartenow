<script>

    export let attributes;

</script>

{#if attributes.length > 0}
    <section>
        {#each attributes as attr}
            <dl>
                <dt>{attr.title}</dt>
                <dd>{attr.value}</dd>
            </dl>
        {/each}
    </section>
{/if}

<style lang="scss">

    dd {
        margin-left: 1em;
    }

</style>
