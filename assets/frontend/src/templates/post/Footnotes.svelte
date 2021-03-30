<script>

    export let text;

</script>
<aside class="footnotes">
    
    <div class="mono">{@html text}</div>
</aside>

<style lang="scss">

    aside {
        :global(p) {
            padding-left: 3.5em;
        }
        :global(p a:first-child) {
            min-width: 3em;
            margin-left: -3.5em;
            display: inline-block;
        }
    }

</style>
