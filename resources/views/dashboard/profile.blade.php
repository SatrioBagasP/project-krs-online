@extends('dashboard.layout.main')
@section('isi')
    <div class="">
        <center>
            <h1
                class="mb-10 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Profile</h1>
        </center>
        <div class="grid-cols-1 gap-4 mb-4 h-screen ">
            <!-- Content -->
            <div class="grid grid-cols-1">
                <div class="flex justify-center image">
                    <img class="rounded-full w-96 h-96" src="Profile.jpg">
                </div>
                <div class="mt-3 flex justify-center text-3xl text-gray-900 dark:text-white">
                    <h1>
                        {{ $user }}
                    </h1>
                </div>
            </div>

        </div>
    </div>
@endsection
