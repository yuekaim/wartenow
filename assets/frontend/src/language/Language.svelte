<script>

    import { currentLanguage } from './store.js';
    export let lang;

    $: currentLanguage.set( lang );

</script>
