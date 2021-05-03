<script>

    export let attributes;

</script>

{#if attributes.length > 0}
    <section class="colophon">

        {#each attributes as attr}
            <dl class="mono">
                <dt>{attr.title}</dt>
                <dd>{@html attr.value}</dd>
            </dl>
            <br/>
        {/each}

        <dl class="mono">
            <dt>Graphic Design & Website</dt>
            <dd>Miao (Cleo Miao) Yuekai, Kimberly Duck, Moritz Ebeling</dd>
        </dl>

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
