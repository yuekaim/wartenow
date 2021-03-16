<script>

    export let links;

</script>

{#if links.length > 0}
    <ul role="navigation">
        {#each links as link}
            <li>
                <a href="{link.link}" target="_blank" rel="noopener noreferrer external">{link.link}</a>
            </li>
        {/each}
    </ul>
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
