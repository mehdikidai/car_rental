<x-layout-dashboard>
    <div class="content_home content">
        <livewire:charts />
        <x-space h="70" />


        @if (count($users) > 0)

            
            <x-tit txt="Lorem ipsum dolor sit"></x-tit>

            <x-space h="30" />
        

            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-1.5 text-start text-xs font-medium text-gray-500 uppercase">Id
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-1.5 text-start text-xs font-medium text-gray-500 uppercase">Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-1.5 text-start text-xs font-medium text-gray-500 uppercase">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-1.5 text-start text-xs font-medium text-gray-500 uppercase">
                                            Phone
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-1.5 text-start text-xs font-medium text-gray-500 uppercase">
                                            Address
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-1.5 text-start text-xs font-medium text-gray-500 uppercase">
                                            City
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-1.5 text-start text-xs font-medium text-gray-500 uppercase">
                                            Date
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-1.5 text-end text-xs font-medium text-gray-500 uppercase">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm font-medium text-gray-800">
                                                {{ $user->id }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-800">
                                                {{ $user->name }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-800">
                                                {{ $user->email }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-800">
                                                {{ $user->customer->phone }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-800">
                                                {{ $user->customer->address }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-800">
                                                {{ $user->customer->city }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-800">
                                                {{ $user->created_at->diffForHumans() }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-end text-sm font-medium">

                                                <form method="POST"
                                                    action="{{ route('backend.user.destroy', ['id' => $user->id]) }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit"
                                                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        @endif




    </div>
</x-layout-dashboard>
