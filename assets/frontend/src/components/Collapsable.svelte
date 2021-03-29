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
        <button class="button" style="--theme-color: {color}"
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
      margin-top: 5px;
      margin-bottom: 5px;
      position: relative;
      left: 8rem;
      right: 4rem;
      width: 60vw;
      /* border: 1px solid black; */
      /* border-bottom: 1px solid black; */
      /* border-radius: 10rem; */

      button{
        width: 100%;
        background-color: white;
        border-radius: 10px;
        text-align: left;
        /* padding-left: 4rem; */
        @include bold;
        /* border-top: 1px solid black;
        border-bottom: 1px solid black; */
      }
      button:hover{
        background-color: var(--theme-color);
      }
      .content{
        margin: 10px 4rem 10px 4rem;
      }
    }

</style>
