@include('partials._header', [$title])
<?php $array = array('title' => 'Student System'); ?>
<x-nav :data="$array"/>

<header class="max-w-lg mx-auto mt-8">
    <a href="">
        <h1 class="text-4xl font-bold text-white text-center">Edit {{ $student->first_name . ' ' . $student->last_name }}
        </h1>
    </a>
</header>

<main class="bg-white max-w-lg mx-auto p-8 my-8 rounded-lg shadow-2xl">

    <section>
        <form action="/student/{{ $student->id }}/update" method="POST" class="flex flex-col"
            enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="flex justify-center items-center my-4">
                @php
                    $default_profile =
                        'https://api.dicebear.com/8.x/initials/svg?seed=' .
                        $student->first_name .
                        ' ' .
                        $student->last_name;
                @endphp

                <img class="w-[100px] h-[100px] rounded-full" src="{{ $student->student_image ? asset('storage/student/thumbnail/' . $student->student_image) : $default_profile }}"
                    alt="">

            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">First Name
                </label>
                <input type="text" name="first_name" id=""
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                    autocomplete="off" value="{{ $student->first_name }}">
                @error('first_name')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Last Name
                </label>
                <input type="text" name="last_name" id=""
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                    autocomplete="off" value="{{ $student->last_name }}">
                @error('last_name')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Gender
                </label>
                <select type="text" name="gender" id=""
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                    <option value="" {{ $student->gender == '' ? 'selected' : '' }}></option>
                    <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="age" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Age
                </label>
                <input type="number" name="age" id=""
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                    autocomplete="off" value="{{ $student->age }}">
                @error('age')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email
                </label>
                <input type="email" name="email" id=""
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                    value="{{ $student->email }}">
                @error('email')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="student_image" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Student Image
                </label>
                <input type="file" name="student_image"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                    value="{{ $student->student_image }}">
                @error('student_image')
                    <p class="text-red-500 text-xs p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button
                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                type="submit">Update
            </button>

        </form>
        <form action="/student/{{ $student->id }}" method="POST">
            @method('delete')
            @csrf
            <button
                class="w-full mt-2 bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                type="submit">Delete
            </button>
        </form>

    </section>
</main>
@include('partials._footer')
