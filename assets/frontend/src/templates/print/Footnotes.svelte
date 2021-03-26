<script>

    export let text;

</script>

<aside class="footnotes mono">
    <h3>Fußnoten</h3><br/>
    {@html text}
</aside>

<style lang="scss">

    aside {
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
