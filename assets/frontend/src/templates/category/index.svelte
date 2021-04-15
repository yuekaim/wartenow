<script>

    import Load from '../Load.svelte';
    import Posts from './Posts.svelte';

    export let category;

</script>

<Load path="{category}" let:prop={page}>

    {#if page.text}
        <div class="about">
            {@html page.text}
        </div>
    {/if}

    <Posts posts={page.posts} />

</Load>

<style lang="scss">

    .about {
        display: flex;
        font-family: 'Favorit', sans-serif;
        margin-left: auto;
        margin-right: auto;
        padding: 1rem;
        letter-spacing: 0.01em;
        max-width: 900px;
        line-height: 1.1em;
        font-size: 1.1em;
        background-color: #eee;
        border-radius: 0.5em;
        border-width: 15px;
        justify-content: center;
        box-shadow: 0px 0px 9px 9px #eee;
        z-index: -2;




    }

</style>
