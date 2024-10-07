<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
    aria-controls="sidebar-multi-level-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="sidebar-multi-level-sidebar"
    class="fixed top-0 left-0 bottom-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-blue-500 dark:bg-gray-800">
        <h1 class="text-lg text-center text-white font-semibold">Admin AmpuStudio</h1>
        <hr class="mb-5">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/admin/dashboard"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-950 dark:hover:bg-gray-700 group">

                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/dataproduk"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-950 dark:hover:bg-gray-700 group">

                    <span class="flex-1 ms-3 whitespace-nowrap">Data Produk</span>
                </a>
            </li>
            <li>
                <a href="/admin/kontak"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-blue-950 dark:hover:bg-gray-700 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Kontak Edit</span>
                </a>
            </li>
            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="flex w-full items-center p-2 text-white rounded-lg hover:bg-blue-950"
                        type="submit"><span class="ms-3">Logout</span></button>
                </form>
            </li>
        </ul>
    </div>
</aside>
