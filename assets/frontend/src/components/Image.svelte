<script>

    export let image;

    function srcset( set ){
        let s = '';
        for (const size of set ) {
            s += `${size.url} ${size.width}w, `;
        }
        return s;
    }

</script>

<img alt={image.alt}
    src={image.url}
    class="lazyload"
    data-sizes="auto"
    data-src={image.url}
    data-srcset={srcset(image.srcset)} />
