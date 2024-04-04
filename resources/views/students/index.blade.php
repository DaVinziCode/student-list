
@include('partials._header')
<?php $array = array('title' => 'Student System'); ?>
<x-nav :data="$array"/>


<header class="max-w-lg mx-auto mt-5">
    <a href="">
        <h1 class="text-4xl font-bold text-white text-center">Student List</h1>
    </a>
</header>
<section class="mt-10">
    <div class="overflow-x-auto relative">
        <table class="w-4 mx-auto w-full text-sm text-left text-gray-500">
            <thead class="text-xs text gray-700 uppercase bg-gray-50">
                <x-items />
            </thead>

            <tbody>
                @foreach ($students as $student)
                <tr class="bg-gray-800 border-b text-white">
                    @php
                      $default_profile = "https://api.dicebear.com/8.x/initials/svg?seed=".$student->first_name.' '.$student->last_name
                    @endphp
                    <td>
                       <img src="{{ $student->student_image ? asset('storage/student/thumbnail/'.$student->student_image) : $default_profile}}" alt="">
                    </td>
                    <td class="py-4 px-6">
                        {{$student->first_name}}
                    </td>
                    <td class="py-4 px-6">
                        {{$student->last_name}}
                    </td>
                    <td class="py-4 px-6">
                        {{$student->email}}
                    <td class="py-4 px-6">
                        {{$student->age}}
                    </td>
                    <td class="py-1 px-6">
                        {{-- <a href="{{ route('student.edit', ['student' => $student->id]) }}" class="bg-sky-600 text-white px-4 py-2 rounded">view</a> --}}
                       <a href="/student/{{$student->id}}/show" class="bg-sky-600 text-white px-4 py-2 rounded">view</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto max-w-lg pt-6 p-4">
            {{$students->links()}}
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
