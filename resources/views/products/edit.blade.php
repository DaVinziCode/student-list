
@include('partials._header', [$title])
<header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-white text-center">Edit Product</h1>
    </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
        <section class="mt-5">
            {{-- <form action="{{route(product.update, ['product' => $product])}}" method="POST" class="flex flex-col"> --}}
                <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST" class="flex flex-col">

                @csrf
                @method('put')
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Product Name
                    </label>
                    <input type="text" name="product_name" placeholder="Product Name" value="{{$product->product_name}}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" />
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="qty" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Quantity
                    </label>
                    <input type="text" name="qty" value="{{$product->qty}}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" />

                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Price
                    </label>
                    <input type="text" name="price" value="{{$product->price}}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" />

                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Description
                    </label>
                    <input type="description" name="description" value="{{$product->description}}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" />

                </div>
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Update</button>
            </form>
        </section>
    </main>
@include('partials._footer')
