@include('pos.layout.header')

    <div class="content">
        <div class="main">
            <div class="heading">
                Products
            </div>
            <div class="content">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="row">
                    <ul>
                        @if($products)
                            @foreach($products as $product)
                                <li>{{$product->name}} | {{$product->category}} | PRICE: ₱{{$product->price}} | VAT: ₱{{$product->vat}}</li>
                            @endforeach
                        @else
                            <h3>NO COUPONS TO DISPLAY</h3>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

@include('pos.layout.footer')