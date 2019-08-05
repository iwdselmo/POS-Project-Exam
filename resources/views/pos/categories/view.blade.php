@include('pos.layout.header')

    <div class="content">
        <div class="main">
            <div class="heading">
                Product Categories
            </div>
            <div class="content">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="row">
                    <ul>
                        @if($categories)
                            @foreach($categories as $categorie)
                                <li>{{$coupon->categorie}}</li>
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