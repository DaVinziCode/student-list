
@include('partials._header')
<?php $array = array('title' => 'Product'); ?>
<x-nav :data="$array"/>


<header class="max-w-lg mx-auto mt-5">
    <a href="">
        <h1 class="text-4xl font-bold text-white text-center">Product List</h1>
    </a>
</header>
<section class="mt-10">
    <div class="overflow-x-auto relative">
        <table class="w-9 mx-auto w-full text-sm text-left text-gray-500">
            <thead class="text-xs text gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Product Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Quantity
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Price
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Description
                    </th>
                    <th scope="col" class="py-3 px-6">

                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                <tr class="bg-gray-800 border-b text-white">
                    <td class="py-4 px-6">
                        {{$product->product_name}}
                    </td>
                    <td class="py-4 px-6">
                        {{$product->qty}}
                    </td>
                    <td class="py-4 px-6">
                        {{$product->price}}
                    <td class="py-4 px-6">
                        {{$product->description}}
                    </td>
                    <td class="py-1 px-6">

                       <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="bg-sky-600 text-white px-4 py-2 rounded">Edit</a>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto max-w-lg pt-6 p-4">
            {{$products->links()}}
        </div>

    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"
    integrity="sha512-zMfrMAZYAlNClPKjN+JMuslK/B6sPM09BGvrWlW+cymmPmsUT1xJF3P4kxI3lOh9zypakSgWaTpY6vDJY/3Dig=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("body").niceScroll();
</script>

@include('partials._footer')
