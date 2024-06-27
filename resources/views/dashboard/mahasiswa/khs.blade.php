@extends('dashboard.layout.main')
@section('isi')
    <div class="">

        <center>
            <h1
                class="mb-10 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Kartu Hasil Mahasiswa</h1>
        </center>
        <div class=" grid-cols-1 gap-4 mb-4 h-screen ">
            <!-- Content -->
            <form action="/khs/show" id="khs" class="" method="post">
                @csrf
                <div class="flex">
                    <select name="tahun" id="tahun"
                        class="block px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                        @if (request() == null)
                            <option disabled selected>{{ $tahun->tahun_ajaran }}</option>
                        @endif
                        @foreach ($khstahun as $data)
                            <option @if (request()->tahun == $data->id) selected @endif value="{{ $data->id }}">
                                {{ $data->tahun_ajaran }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Mata Kuliah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Dosen Pengampu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                SKS
                            </th>
                            <th scope="col" class="px-6 py-3">
                                UTS
                            </th>
                            <th scope="col" class="px-6 py-3">
                                UAS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($khs as $data)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->jadwal->matkul->nama_matkul }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $data->jadwal->dosen->nama_dosen }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $data->jadwal->matkul->sks }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $data->UTS }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $data->UAS }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('tahun').addEventListener('change', function() {
            document.getElementById('khs').submit();
        });
    </script>
@endsection
