<script>

    export let text;

</script>
<aside class="footnotes mono">
    <ol>
        {#each text as item}
            {@html item}
        {/each}
    </ol>
</aside>

<style lang="scss">

    ol {
        list-style: none;
        counter-reset: my-awesome-counter;
        :global(li) {
            counter-increment: my-awesome-counter;
            display: flex;
        }
        :global(li:before) {
            display: block;
            width: 3em;
            content: counter(my-awesome-counter) ". ";
        }
        :global(.footnotereverse a) {
            display: inline-block;
            margin-left: 0.5em;
        }
    }

</style>
