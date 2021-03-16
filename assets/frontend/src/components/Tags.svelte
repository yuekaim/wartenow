<script>

    export let tags;

</script>

<ul>
    {#each tags as tag}
        <li>{tag}</li>
    {/each}
</ul>

<style lang="scss">

    ul {
        li {
            display: inline-block;
            padding: 0.3em 0.6em;
            margin: 0.3em;
            background-color: #eee;
        }
    }

</style>
