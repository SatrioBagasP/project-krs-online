@extends('dashboard.layout.main')
@section('isi')
    <div class="">
        <center>
            <h1
                class="mb-10 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Kartu Rencana Siswa</h1>
        </center>
        <div class="grid-cols-1 gap-4 mb-4 ">
            <!-- Content -->
            <div class="mb-4">
                @if ($tahun->status_krs == 1)
                    <form action="/khs/store" method="POST">
                        @csrf
                        <label for="Jadwal" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Pilih
                            Jadwal</label>
                        <div class="flex">
                            <select id="jadwal_id"
                                class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-2"
                                name="jadwal_id">
                                <option selected disabled>Pilih Jadwal Kelas</option>
                                @foreach ($jadwal as $data)
                                    <option value="{{ $data->id }}">{{ $data->kode_jadwal }}
                                        {{ $data->matkul->nama_matkul }} {{ $data->dosen->nama_dosen }}</option>
                                @endforeach
                            </select>
                            <button
                                class="py-2.5 px-5 me-2  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="submit">Submit Jadwal</button>
                        </div>
                        @error('jadwal_id')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">Oh, snapp!</span> {{ $message }}</p>
                        @enderror


                    </form>
                @else
                    <div id="alert-1"
                        class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            Maaf Periode KRS Belum dibuka
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-1" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif

            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Kode Jadwal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Matkul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                SKS
                            </th>
                            @if ($tahun->status_krs == 1)
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            @else
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($khs as $data)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->jadwal->kode_jadwal }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $data->jadwal->matkul->nama_matkul }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $data->jadwal->matkul->sks }}
                                </td>
                                @if ($tahun->status_krs == 1)
                                    <td class="px-6 py-4 flex">
                                        <form action="/khs/destroy/{{ $data->id }}" method="post">
                                            @csrf
                                            @method('Delete')
                                            <button type="submit"
                                                class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                                <svg class="w-6
                                                        h-6 text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                @else
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h1 class="text-white">
                Sks yang Boleh anda ambil
                <span class="font-bold">
                </span>
            </h1>
            <h1 class="text-white">
                Sks yang anda ambil
                <span class="font-bold">
                    {{ $khs->sum(function ($krs) {
                        return $krs->jadwal->matkul->sks;
                    }) }}</span>
            </h1>
        </div>
    </div>
@endsection
