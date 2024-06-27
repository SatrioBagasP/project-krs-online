@extends('dashboard.layout.main')
@section('isi')
    <div class="">
        <center>
            <h1
                class="mb-10 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                List Tahun Ajaran <h1>
        </center>
        <br>
        <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tambah
            Tahun</button>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode Tahun
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tahun Ajaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Krs
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Nilai
                        </th>
                        <th scope="col" class="px-6 py-3 flex justify-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listtahun as $data)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->kode_tahun }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data->tahun_ajaran }}
                            </td>
                            <td class="px-6 py-4 ">
                                {{-- {{ $data->status_krs }} --}}
                                @if ($data->status_krs == 1)
                                    Online
                                @else
                                    Offline
                                @endif

                            </td>
                            <td class="px-6 py-4">
                                {{-- {{ $data->status_nilai }} --}}
                                @if ($data->status_nilai == 1)
                                    Online
                                @else
                                    Offline
                                @endif
                            </td>
                            <td class="px-6 py-4 flex justify-center">
                                <a href="/tahun/{{ $data->id }}/edit"
                                    class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                    </svg>
                                </a>
                                <form action="/tahun/{{ $data->id }}" method="post">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit"
                                        class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                        <svg class="w-6
                                        h-6 text-gray-800 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{-- {{ $krs->links() }} --}}
    </div>


    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Tahun Ajaran Baru
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form action="/tahun" method="post" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                Tahun</label>
                            <input type="number" name="kode_tahun"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="212201" required="">
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="2021/2022 Ganjil" required="">
                        </div>
                    </div>
                    <input type="submit" value="Add New Tahun"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                </form>
            </div>
        </div>
    </div>
@endsection
