
<x-slot name="header">

</x-slot>
<div class="container">
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif

            <div class="grid grid-cols-12">
                <div class="col-span-6 p-4">
                    <button wire:click="create1()" class="bg-blue-600 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded my-3">Create Data</button>
                </div>


                <div class="col-span-6 p-4 flex justify-end">

                    <form action="" method="GET">
                        <input type="text" name="" value="" placeholder="Search" class="px-4 py-2focus:ring-indigo-500 focus:border-indigo-500 rounded-none rounded-1-md sm:text-sm border-sm border-gray-300">
                        <button wire:click="#" class="rounded-r-md border border-1-0 px-4 py-1 border-gray-300 bg-gray-50 text-gray-500 text-blue-600 hover:text-white hover:bg-blue-600">Cari</button>
                    </form>
                </div>

            </div>

            <div class="col-span-6 p-4 flex justify-end">

            </div>
            @if($isModal)
            @include('livewire.create1')
            @endif

            <table class="table-fixed w-full text-center">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 uppercase">Category Buku</th>
                        <th class="px-4 py-2 uppercase">Judul Buku</th>
                        <th class="px-4 py-2 uppercase">Penulis</th>
                        <th class="px-2 py-1 uppercase">Tahun</th>
                        <th class="px-1 py-1 uppercase">Action</th>
                    </tr>
                </thead>

                <tbody>
                
                    @foreach($bukus as $row) 
                    <!-- forelse -->
                    <tr>
                        <td class="border text-left py-3 px-4">{{ $row->name_bk }}</td>
                        <td class="border text-left py-3 px-4">{{ $row->judul }}</td>
                        <td class="border text-left py-3 px-4">{{ $row->penulis }}</td>
                        <td class="border text-left py-18 px-16">{{ $row->tahun }}</td>
                        <td class="border text-left py-1 px-1">
                            <button wire:click="edit({{ $row->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $row->id }})" class="d-inline bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">Hapus</button>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
           
        </div>
    </div>
</div>
