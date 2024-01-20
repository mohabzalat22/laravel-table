<div class="w-full ms-2 mt-5 border-t-4 border-t-green-200">
    <h3 class="text-slate-400 text-xl ms-4 mt-3">Sign Up</h3>
    {{-- <p class="text-blue-600 m-5">Number of Users = {{$numberOfUsers}}</p> --}}
    <form action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="get">
        @csrf
        <input wire:model="name" type="text" placeholder="name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('name')
            <div class="text-red-400">{{$message}}</div>
        @enderror
        <input wire:model="email" type="email" placeholder="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-3">
        @error('email')
            <div class="text-red-400">{{$message}}</div>
        @enderror
        <input wire:model="password" type="password" placeholder="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-3">
        @error('password')
            <div class="text-red-400">{{$message}}</div>
        @enderror
        <input wire:model="image" type="file" accept="image/png , image/jpeg" class="mt-1">
        @error('image')
            <div class="text-red-400">{{$message}}</div>
        @enderror
        @if ($image)
            <img src="{{$image->temporaryUrl()}}" alt="" class="w-10 h-10 mt-1 block">
        @endif

        <div wire:loading wire:target="image" class="block"> 
            <p class="text-sm text-green-400">uploading ...</p>
        </div>

        <button wire:click.prevent="createNewUser" wire:loading.attr="disabled" class="w-full bg-green-400 mt-2 text-white p-1 text-lg">create</button>
        @if (session('success'))
            <div class="bg-green-100 text-green-500 mt-2">User Created Succesfully</div>
        @endif
    </form>
</div>
