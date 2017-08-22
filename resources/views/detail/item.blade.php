<div>
    <h3>{{ $item->product->titulo }}</h3>
    <p>{{ $item->product->descripcion }}</p>
    <h1>{{ $item->product->price }}</h1>
    <form action="{{ route('detail.update',['id' => $item->product_id])}}" method="post">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <img src="" alt="image">
        <input type="hidden" name="product_id" value = "{{ $item->product_id }}">
        <label for="">Quantity</label>
        <input type="text" name="quantity" value="{{ $item->quantity }}">
        <button>Change</button>
    </form>
    <a href="#">Remove product</a>
</div>