<script>

    import Link from '../../components/Link.svelte';
    import Image from '../../components/Image.svelte';

    export let post;
    console.log( post.authors );

</script>

<Link to={post.path}>
    <article style="--theme-color:{post.color}">

        <div class="taxonomy">
            <div>
                {#if post.authors}
                    <p class="authors">{post.authors}</p>
                {/if}
                {#if post.issue}
                    <p class="issue">{post.issue}</p>
                {/if}
            </div>
            <div>
                {#if post.new}
                    <em style="background-color:{post.color};">New</em>
                {:else if post.soon}
                    <em>Soon</em>
                {:else}
                    <span class="dot" style="background-color:{post.color};"></span>
                {/if}
            </div>
        </div>

        {#if post.image}
            <figure>
                <Image image={post.image} />
            </figure>
        {/if}

        <h3>{@html post.title}</h3>

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

    .taxonomy {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        p {
            margin-bottom: 0;
        }
    }
    em {
        display: inline-block;
        padding: 0.1em 0.4em;
        background-color: #fff;
        font-size: 0.6em;
        border-radius: 0.5em;
    }

    article:hover{
        box-shadow: 0px 0px 50px var(--theme-color);
        background-color: var(--theme-color);
        transition: 0.3s;
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

    .dot{
      border-radius: 50%;
      height: 20px;
      width: 20px;
      display: inline-block;
    }

</style>
