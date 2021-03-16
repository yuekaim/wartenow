<script>

    export let downloads;

</script>

{#if downloads.length > 0}
    <section>
        <h3>Downloads</h3>
        <ul>
            {#each downloads as file}
                <li>
                    <a href="{file.url}" target="_blank" download>{file.alt}</a>
                </li>
            {/each}
        </ul>
    </section>
{/if}

<style lang="scss">

    ul {
        a {
            display: inline-block;
            padding: 0.3em 0.6em;
            margin: 0.3em;
            background-color: #eee;
        }
    }

</style>
