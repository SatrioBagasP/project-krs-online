@extends('dashboard.layout.main')
@section('isi')
    <div class="">

        <center>
            <h1
                class="mb-10 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Edit Nilai Mahasiswa
        </center>
        <p class="dark:text-white white:text-gray-500">Nama : {{ $krs->mahasiswa->nama_mahasiswa }}</p>
        <p class="dark:text-white white:text-gray-500   ">
            Kelas : {{ $krs->jadwal->matkul->nama_matkul }}
        </p>
        <br>
        <form action="/dosen/nilai/store/{{ $krs->id }}" method="POST">
            @csrf
            <div>
                <label for="uts" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UTS</label>
                <input type="number" id="uts"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('UTS')
                        block w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer
                    @enderror "
                    placeholder="Masukan Nilai" name="UTS" arequired
                    @if ($krs->UTS != null) value="{{ $krs->UTS }}" @endif />
            </div>
            @error('UTS')
                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                        class="font-medium">Error!</span> {{ $message }}</p>
            @enderror
            <div class="mt-5">
                <label for="uas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UAS</label>
                <input type="number" id="uas"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan Nilai" name="UAS" required
                    @if ($krs->UAS != null) value="{{ $krs->UAS }}" @endif />
            </div>
            <button type="submit"
                class="mt-4 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Ubah
                Data</button>
        </form>
    </div>
@endsection
