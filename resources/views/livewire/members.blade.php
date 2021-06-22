
<x-slot name="header">

</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                    <button wire:click="create()" class="bg-blue-600 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded my-3">Create Data</button>
                </div>

                <div class="col-span-6 p-4 flex justify-end">
                    <form action="" method="GET">
                        <input type="text" name="" value="" placeholder="Search" class="px-4 py-2focus:ring-indigo-500 focus:border-indigo-500 rounded-none rounded-1-md sm:text-sm border-sm border-gray-300">
                        <button type="submit" class="rounded-r-md border border-1-0 px-4 py-1 border-gray-300 bg-gray-50 text-gray-500 text-blue-600 hover:text-white hover:bg-blue-600">Cari</button>
                    </form>
                </div>

            </div>

            <div class="col-span-6 p-4 flex justify-end">

            </div>
            @if($isModal)
            @include('livewire.create')
            @endif

            <table class="table-fixed w-full text-center">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 uppercase">Nama</th>
                        <th class="px-4 py-2 uppercase">Email</th>
                        <th class="px-4 py-2 uppercase">Nomor Hp</th>
                        <th class="px-4 py-2 uppercase">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($members as $row)
                    <tr>

                        <td class="border text-left py-3 px-4">{{ $row->name }}</td>
                        <td class="border text-left py-3 px-14">{{ $row->email }}</td>
                        <td class="border text-left py-3 px-16">{{ $row-> phone_number }}</td>

                        <td class="border text-left py-2 px-16">
                            <button wire:click="edit({{ $row->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $row->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table> 
        </div>
    </div>
</div>  
