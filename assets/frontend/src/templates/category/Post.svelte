<script>

    import Link from '../../components/Link.svelte';
    import Image from '../../components/Image.svelte';

    export let post;
    console.log( post.authors );

</script>

<Link to={post.path}>
    <article style="background-color:{post.color};">

        {#if post.new}
            <em>New</em>
        {/if}
        {#if post.soon}
            <em>Soon</em>
        {/if}

        {#if post.authors}
            <p class="authors">{post.authors}</p>
        {/if}

        {#if post.issue}
            <p class="issue">{post.issue}</p>
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

    em {
        display: inline-block;
        padding: 0.1em 0.4em;
        background-color: #fff;
        font-size: 0.6em;
        border-radius: 0.5em;
    }

    article {
        background-color: #eee;
        padding: 0.5em;
        @include rounded;
    }

    .authors, figure, h3 {
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
