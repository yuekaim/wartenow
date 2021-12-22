<script>

    import { translations } from '../../language/store.js';
    import Posts from '../category/Posts.svelte';

    export let posts;

    translations.set({
        de: '/de',
        en: '/en'
    });

</script>

<Posts {posts} />

<style lang="scss">
</style>
