<script>

    import { slide } from 'svelte/transition';

    export let title;

    let open = false;
    function toggle(){
        open = !open;
    }

</script>

<div class="collapsable">

    <div class="title">
        <button class="button" on:click={toggle}>{title}</button>
    </div>

    {#if open}
        <div class="content" transition:slide="{{duration: 300}}">
            <slot />
        </div>
    {/if}

</div>

<style lang="scss">

    .content {
        overflow: hidden;
    }

</style>
