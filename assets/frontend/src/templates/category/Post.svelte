<script>

    import Link from '../../components/Link.svelte';
    import Image from '../../components/Image.svelte';

    export let post;
    console.log( post.authors );

    let random1 = (Math.random() - 0.5) * 0.2;
    let random2 = (Math.random() - 0.5) * 0.2;
    let random3 = Math.ceil((Math.random() - 0.5) * 5);
    let random4 = (Math.random() - 0.5) * 8;

</script>

<Link to={post.path}>
    <article style="--theme-color:{post.color};
    transform:translate({random3}rem, {random4}rem) skew(0rad);">
<!-- skew({random1}rad, {random2}rad) -->
        <div class="taxonomy">
            <div>
                {#if post.authors}
                    <p class="authors"><span>{post.authors}</span></p>
                {/if}
                {#if post.issue}
                    <p class="issue"><span>{post.issue}</span></p>
                {/if}
            </div>

        </div>

        {#if post.image}
            <figure>
                <Image image={post.image} />
            </figure>
        {/if}

        <!-- <h3 style="position:absolute;">{@html post.title}</h3> -->
        <div>
            {#if post.new}
                <em style="background-color:{post.color};">New</em>
            {:else if post.soon}
                <em>Soon</em>
            {:else}

            {/if}
        </div>
        <h3><span>{@html post.title}</span></h3>

        {#if post.subtitle}
            <h4><span>{post.subtitle}</span></h4>
        {/if}
        <span class="dot" style="background-color:{post.color};"></span>

    </article>
</Link>

<style lang="scss">

    article {
        border: 1px solid #00000000;
        // background-color: #eee;
        padding: 0.5em;
        @include rounded;
        // border: 1px solid var(--theme-color);
        // margin: 50px;
        // border-radius: 1000px;
        // transform: skew(var(--randomN)+rad);
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
        // box-shadow: 0px 0px 50px var(--theme-color);
        // background-color: var(--theme-color);
        // transition: 0.3s;
    }

    .authors, figure, h3 {
        margin-bottom: 0.5em;
    }

    h3 {
        @include text-medium;
        padding: 10px;
        margin: 0px;
        position: relative;
        z-index: 100;
    }

    figure {
        @include rounded;
        position: relative;
        overflow: hidden;
        transform: translate(100px, 30px);
        width: 200px;
        // z-index: -10;
    }

    span{
      background-color: #eee;
      // padding: -10px;
      // color: #eee;
      box-shadow: 0px 8px 10px 10px #eee,
    }

    article:hover{
      // background-color: var(--theme-color);
      // padding: -10px;
      // color: #eee;
      // box-shadow: 0px 0px 10px var(--theme-color);
                  // inset 0px 0px 200px 50px var(--theme-color);
      // border-radius: 1000px;
      // border: 1px solid var(--theme-color);

      // transform: skew(0.5rad);



      .dot{
        opacity: 1;
        transition: 0.3s;
      }

    }

    .dot{
      // display: none;
      border-radius: 50%;
      height: 500px;
      width: 500px;
      display: block;
      opacity: 0;
      box-shadow: none;
      z-index: -200;
      position: absolute;
      top: 0px;
      filter: blur(100px);
      transition: 0.3s;
    }

</style>
