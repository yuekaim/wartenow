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

    .footnotes {
        margin-top: 2rem;
    }
    ol {
        list-style: none;
        counter-reset: my-awesome-counter;
        :global(li) {
            counter-increment: my-awesome-counter;
            padding-left: 3em;
        }
        :global(li:before) {
            display: inline-block;
            width: 2.4em;
            margin-left: -3em;
            content: counter(my-awesome-counter) ". ";
        }
        :global(.footnotereverse a) {
            display: inline-block;
            margin-left: 0.5em;
        }
        :global( li a ),
        :global( li span ) {
            display: inline;
        }
    }

</style>
