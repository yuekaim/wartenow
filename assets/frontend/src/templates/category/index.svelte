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
        margin: 1rem;
    }

</style>
