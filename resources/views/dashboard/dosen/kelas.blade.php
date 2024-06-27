@extends('dashboard.layout.main')
@section('isi')
    <h1 class="mt-3 text-gray-900 dark:text-white">Tahun ini Anda Mengajar {{ $kelas->count() }} Kelas</h1>
    <div class="mt-10 grid lg:grid-cols-3 gap-4">
        @foreach ($kelas as $data)
            <a href="/dosen/detail/{{ $data->kode_jadwal }}"
                class=" bg-white border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600 h">
                <div
                    class="py-1 px-1 hover:bg-gray-100 dark:hover:bg-gray-500 flex flex-wrap items-center justify-center h rounded bg-gray-50 dark:bg-gray-800">
                    <div class="mt-2 mr-2 ml-2 icon  h-20 w-full flex items-center justify-center">
                        <svg class="h-14 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.024 3.783A1 1 0 0 1 6 3h12a1 1 0 0 1 .976.783L20.802 12h-4.244a1.99 1.99 0 0 0-1.824 1.205 2.978 2.978 0 0 1-5.468 0A1.991 1.991 0 0 0 7.442 12H3.198l1.826-8.217ZM3 14v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5h-4.43a4.978 4.978 0 0 1-9.14 0H3Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div
                        class="mr-2 ml-2 w-full flex items-center justify-center text mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $data->matkul->nama_matkul }}
                    </div>
                </div>
            </a>
        @endforeach

    </div>
@endsection
