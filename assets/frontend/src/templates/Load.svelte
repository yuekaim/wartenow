<script>

    import { currentLanguage } from '../language/store.js';
	import { load } from "../utilities/load.js";

    export let path;
    let page;
    let loading = true;

    async function triggerFetch( path ){
        path = $currentLanguage + '/' + path;
        loading = true;
        load( path, (d) => {
            page = d;
            console.log( page );
            loading = false;
        });
    }
    $: triggerFetch( path );

    function log(d){
        console.log(d);
    }

</script>

{#if loading}
    <p>Loading...</p>
{:else}
    <div>
        <slot prop={page} />
    </div>
{/if}

<style lang="scss">

    p {
        margin: size(1);
        opacity: 0.5;
    }

</style>
