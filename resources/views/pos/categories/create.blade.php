@include('pos.layout.header')

    <div class="content">
        <div class="main">
            <div class="heading">
                Create Product Category
            </div>
            <div class="content">
                <form method="post" action="{{route('categories.store')}}">
                    @csrf
                    <input type="text" name="name">
                    <input type="submit" name="Save">
                </form>
            </div>
        </div>
    </div>

@include('pos.layout.footer')