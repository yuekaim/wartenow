<script>

    export let attributes;

</script>

{#if attributes.length > 0}
    <section>
        <h3>Colophon</h3>
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
        display: flex;
        dt {
            flex: 1 1 25%;
        }
        dd {
            flex: 1 1 75%;
        }
    }

</style>
