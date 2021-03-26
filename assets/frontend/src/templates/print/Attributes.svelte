<script>

    export let attributes;

</script>

{#if attributes.length > 0}
    <section class="colophon">
        <h3>Colophon</h3>
        {#each attributes as attr}
            <dl class="mono">
                <dt>{attr.title}</dt>
                <dd>{@html attr.value}</dd>
            </dl>
            <br/>
        {/each}
    </section>
{/if}

<style lang="scss">

  section {
      margin-top: 2rem;
  }
  dl {
      display: flex;
      width: 80%;
      dt {
          flex: 1 1 32%;
      }
      dd {
          flex: 1 1 68%;
      }
  }

</style>
