<script>

    import Load from '../Load.svelte';
    import Posts from './Posts.svelte';

    export let category;

</script>

<Load path="{category}" let:prop={page}>

    {#if page.text}
        <div class="about">
            <div class="wrapper">
                {@html page.text}
            </div>
        </div>
    {/if}

    <Posts posts={page.posts} />

</Load>

<style lang="scss">

    .about {
        margin-top: 2rem;
        position: relative;
        z-index: 0;
        padding: 2rem;
        .wrapper {
            margin-left: auto;
            margin-right: auto;
            line-height: 1.1em;
            letter-spacing: 0.01em;
            font-size: 1.1em;
            max-width: 900px;
            padding: 1rem;
            background-color: #eee;
            border-radius: 0.5em;
            border-width: 15px;
            box-shadow: 0px 0px 9px 9px #eee;
        }
    }

</style>
