<script>

    export let attributes;

</script>

{#if attributes.length > 0}
    <section>
        <h4>Impressum</h4>
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
    h4 {
        margin-bottom: 0.5em;
    }
    dl {
        + dl {
            margin-top: 0.5em;
        }
        dd {
            margin-left: 3em;
        }
    }

</style>
