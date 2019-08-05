@include('pos.layout.header')

    <div class="content">
        <div class="main">
            <div class="heading">
                Create Coupon Code
            </div>
            <div class="content">
                <form method="post" action="{{route('coupons.store')}}">
                    @csrf
                    <input type="text" name="name" placeholder="NAME">
                    <input type="text" name="code" placeholder="CODE">
                    <input type="number" name="percentage" placeholder="PERCENTAGE">
                    <input type="submit" name="Save">
                </form>
            </div>
        </div>
    </div>

@include('pos.layout.footer')