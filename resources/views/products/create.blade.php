
@include('partials._header', [$title])
<header class="max-w-lg mx-auto">
    <a href="">
        <h1 class="text-4xl font-bold text-white text-center">Add New Product</h1>
    </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
        <section class="mt-5">
            <form action="{{route('product.store')}}" method="POST" class="flex flex-col">
                @csrf
                @method('post')
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Product Name
                    </label>
                    <input type="text" name="product_name" id="" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" />
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="qty" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Quantity
                    </label>
                    <input type="text" name="qty" id="" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" />

                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Price</label>
                    <input type="number" name="price" id="price" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" step="0.01" onblur="formatPrice(this)" />
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Description
                    </label>
                    <input type="description" name="description" id="" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" />

                </div>
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Save a New Product</button>
            </form>
        </section>
    </main>
@include('partials._footer')

<script>
    function formatPrice(input) {
        // Get the value of the input
        let value = input.value;

        // Check if the value contains a decimal point
        if (!value.includes('.')) {
            // If no decimal point is present, append .00 to the value
            input.value = parseFloat(value).toFixed(2);
        }
    }
</script>
