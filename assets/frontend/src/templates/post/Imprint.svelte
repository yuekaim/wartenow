<script>

    export let attributes;

</script>

{#if attributes.length > 0}
    <section>
        {#each attributes as attr}
            <dl class="mono">
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
    dl {
        + dl {
            margin-top: 0.5em;
        }
        dd {
            margin-left: 3.8em;
        }
    }

</style>
