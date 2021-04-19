<script>

	import { load } from "../utilities/load.js";

    export let path;
    let data;
    let show, wait = false;

    function triggerFetch(){
        show = false;
        wait = true;
        setTimeout(() => {
            data = load( path, (d) => {
                show = true;
            });
        }, 320);
        setTimeout(() => {
            wait = false;
        }, 640);
    }
    $: loading = triggerFetch( path );

</script>

{#if show && !wait}
    <div>
        {#await data}
            <p>Loading...</p>
        {:then page}

            <slot prop={page.data} />

        {:catch error}
            <p class="error">Error</p>
        {/await}
    </div>
{/if}

<style lang="scss">

    p {
        margin: size(1);
        opacity: 0.5;
    }

</style>
