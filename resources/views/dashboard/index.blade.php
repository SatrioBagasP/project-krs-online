@extends('dashboard.layout.main')
@section('isi')
    <center>
        <h1
            class="mb-10 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Dashboard</h1>
    </center>
    <div class="grid-cols-1 gap-4 mb-4  ">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4 ">
            @can('mhs')
                <a href="/khs"
                    class=" bg-white border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600 h">
                    <div
                        class="py-1 px-1 hover:bg-gray-100 dark:hover:bg-gray-500 flex flex-wrap items-center justify-center h rounded bg-gray-50 dark:bg-gray-800">
                        <div class="mt-2 mr-2 ml-2 icon  h-20 w-full flex items-center justify-center">
                            <svg class="h-14  text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 12v4m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4ZM8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 0v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V8m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            </svg>
                        </div>
                        <div
                            class="mr-2 ml-2 w-full flex items-center justify-center text mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            KRS
                        </div>
                    </div>
                </a>
                <a href="/khs/show"
                    class=" bg-white border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600 h">
                    <div
                        class="py-1 px-1 hover:bg-gray-100 dark:hover:bg-gray-500 flex flex-wrap items-center justify-center h rounded bg-gray-50 dark:bg-gray-800">
                        <div class="mt-2 mr-2 ml-2 icon  h-20 w-full flex items-center justify-center">
                            <svg class="h-14  text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4" />
                            </svg>
                        </div>
                        <div
                            class="mr-2 ml-2 w-full flex items-center justify-center text mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            KHS
                        </div>
                    </div>
                </a>
                <a href="/riwayat"
                    class=" bg-white border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600 h">
                    <div
                        class="py-1 px-1 hover:bg-gray-100 dark:hover:bg-gray-500 flex flex-wrap items-center justify-center h rounded bg-gray-50 dark:bg-gray-800">
                        <div class="mt-2 mr-2 ml-2 icon  h-20 w-full flex items-center justify-center">
                            <svg class="h-14  text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                            </svg>
                        </div>
                        <div
                            class="mr-2 ml-2 w-full flex items-center justify-center text mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Riwayat
                        </div>
                    </div>
                </a>
            @endcan
            @can('dosen')
                <a href="/dosen/kelas"
                    class=" bg-white border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600 h">
                    <div
                        class="py-1 px-1 hover:bg-gray-100 dark:hover:bg-gray-500 flex flex-wrap items-center justify-center h rounded bg-gray-50 dark:bg-gray-800">
                        <div class="mt-2 mr-2 ml-2 icon  h-20 w-full flex items-center justify-center">
                            <svg class="h-14 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M5.024 3.783A1 1 0 0 1 6 3h12a1 1 0 0 1 .976.783L20.802 12h-4.244a1.99 1.99 0 0 0-1.824 1.205 2.978 2.978 0 0 1-5.468 0A1.991 1.991 0 0 0 7.442 12H3.198l1.826-8.217ZM3 14v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5h-4.43a4.978 4.978 0 0 1-9.14 0H3Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div
                            class="mr-2 ml-2 w-full flex items-center justify-center text mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Kelas Anda
                        </div>
                    </div>
                </a>
            @endcan
            @can('admin')
                test
            @endcan

        </div>
    </div>
@endsection
