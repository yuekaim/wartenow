<script>

    import Link from '../../components/Link.svelte';
    import Image from '../../components/Image.svelte';

    export let post;

</script>

<Link to={post.path}>
    <article style="background-color:{post.color};">

        {#if post.date}
            <p class="date">{post.date}</p>
        {/if}

        {#if post.image}
            <figure>
                <Image image={post.image} />
            </figure>
        {/if}

        <h3>{post.title}</h3>

        {#if post.subtitle}
            <h4>{post.subtitle}</h4>
        {/if}

    </article>
</Link>

<style lang="scss">

    article {
        background-color: #eee;
        padding: 0.5em;
        @include rounded;
    }

    .date, figure, h3 {
        margin-bottom: 0.5em;
    }

    h3 {
        @include text-medium;
    }

    figure {
        @include rounded;
        overflow: hidden;
    }

</style>
