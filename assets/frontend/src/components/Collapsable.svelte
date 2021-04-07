<script>

    import { slide } from 'svelte/transition';

    export let title;
    export let color;

    let open = false;
    function toggle(){
        open = !open;
    }

</script>

<div class="collapsable">

    <div class="title">
        <button class="button" style="--theme-color: {color};"
        on:click={toggle}>{title}</button>
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
    .collapsable{
      margin-bottom: 1rem;
      position: relative;
      background-color: white;
      @include rounded;
      button{
        display: block;
        padding: 0.5em;
        width: 100%;
        background-color: inherit;
        text-align: left;
        @include bold;
      }
      button:hover{
        background-color: var(--theme-color);
      }
      .content{
        padding: 1rem 2rem;
      }
    }

</style>
