<div class="relative overflow-x-auto mt-5">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
            </tr>
        </thead>
        @foreach ($records as $record)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $record->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $record->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $record->email }}
                    </td>
                </tr>
            </tbody>      
        @endforeach
    </table>
    <div class="w-full mt-2">
        {{$records->links()}}
    </div>
</div>
