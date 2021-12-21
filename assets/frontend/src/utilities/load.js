export async function load( path, callback = false ){

    const url = `/${path}.json`;
    console.log( url );

    const res = await fetch( url );
    const data = await res.json();

    if (res.ok) {
        if( callback !== false ){
            callback( data );
        }
        return data;
    } else {
        throw new Error(data);
    }
}
