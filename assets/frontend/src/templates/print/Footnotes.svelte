<script>

    export let text;

</script>

<aside class="footnotes mono">

    {@html text}
</aside>

<style lang="scss">

    aside {
      width: 555.797px;
        :global(p) {
            padding-left: 3.5em;
        }
        :global(p a) {
            min-width: 3em;
            margin-left: -3.5em;
            display: inline-block;
        }
    }

</style>
