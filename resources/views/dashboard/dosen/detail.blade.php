@extends('dashboard.layout.main')
@section('isi')
    <div class="">
        <center>
            <h1
                class="mb-10 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                List Mahasiswa Kelas {{ $jadwal->matkul->nama_matkul }}</h1>
        </center>
        <p class="dark:text-white">
            {{-- Kenapa total() krn memakai paginate, kalau memakai count saat paginate akan membatasi sesuai dengan paginatenya --}}
            Jumlah Mahasiswa : {{ $krs->total() }}
        </p>
        <br>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Mahasiswa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NPM
                        </th>
                        <th scope="col" class="px-6 py-3">
                            UTS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            UAS
                        </th>
                        <th scope="col" class="px-6 py-3 flex justify-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($krs as $data)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->mahasiswa->nama_mahasiswa }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data->mahasiswa->npm }}
                            </td>
                            <td class="px-6 py-4 ">
                                {{ $data->UTS }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->UAS }}
                            </td>
                            <td class="px-6 py-4 flex justify-center">

                                @if ($tahun->status_nilai == 1)
                                    <a href="/dosen/detail/mhs/{{ $data->id }}">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                        </svg>
                                    </a>
                                @else
                                    ---
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{ $krs->links() }}
    </div>
@endsection
