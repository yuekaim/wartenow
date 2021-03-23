<script>

    import { slide } from 'svelte/transition';
    import Image from './Image.svelte';
    export let person;

    let open = false;

    function toggle(){
        open = !open;
    }

</script>

{#if person.image}
    <figure>
        <Image image={person.image} />
    </figure>
{/if}

<h3>{person.name}</h3>

{#if open}
    <div class="info" transition:slide="{{duration: 300}}">

        {#if person.text}
            {@html person.text}
        {/if}

        {#if person.link}
            <a href="{person.link}" rel="noopener noreferrer external" target="_blank">Website</a>
        {/if}

    </div>
{/if}

<button on:click={toggle} class="button">
    {#if open}
        Show less
    {:else}
        Show more
    {/if}
</button>

<style lang="scss">

    figure {
        @include rounded;
        overflow: hidden;
    }

    h3 {
        margin: 0.5em 0;
    }

    ul {
        li {
            display: inline-block;
            padding: 0.3em 0.6em;
            margin: 0.3em;
            background-color: #eee;
        }
    }

    .info {
        overflow: hidden;
    }

</style>
