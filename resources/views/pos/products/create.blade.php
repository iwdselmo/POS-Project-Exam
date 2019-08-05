@include('pos.layout.header')

    <div class="content">
        <div class="main">
            <div class="heading">
                Create Product
            </div>
            <div class="content">
                <form method="post" action="{{route('products.store')}}">
                    @csrf
                    <select name="category">
                        <option>Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="name" placeholder="NAME">
                    <input type="number" name="price" placeholder="PRICE">
                    <input type="submit" name="Save">
                </form>
            </div>
        </div>
    </div>

@include('pos.layout.footer')