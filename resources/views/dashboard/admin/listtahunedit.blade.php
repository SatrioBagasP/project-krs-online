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
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            <a href="/admin/listtahun">
                Kembali</a>
        </button>
        <h1 class="dark:text-white">
            Anda Mengedit Tahun : {{ $tahunedit->tahun_ajaran }}
        </h1>
        <form action="/tahun/{{ $tahunedit->id }}" method="post" class="p-4 md:p-5">
            @csrf
            @method('put')
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                        Tahun</label>
                    <input type="number" name="kode_tahun"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="212201" value="{{ $tahunedit->kode_tahun }}" required="">
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="2021/2022 Ganjil" value="{{ $tahunedit->tahun_ajaran }}" required="">
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Krs</label>
                    <input type="hidden" name="status_krs" value="0">
                    <input type="checkbox" name="status_krs" value="1"
                        @if ($tahunedit->status_krs == 1) checked @endif>
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Nilai</label>
                    <input type="hidden" name="status_nilai" value="0">
                    <input type="checkbox" name="status_nilai" value="1"
                        @if ($tahunedit->status_nilai == 1) checked @endif>
                </div>
            </div>
            <input type="submit" value="Update"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
        </form>
        {{-- {{ $krs->links() }} --}}
    </div>
@endsection
