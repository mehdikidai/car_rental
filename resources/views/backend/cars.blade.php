<x-layout-dashboard>
    <div class="content_cars content">
        <div class="cars_list">
            <div class="btns">
                <x-tit txt="Lorem ipsum dolor sit"></x-tit>
                <a href="{{ route('backend.car.create') }}">
                    <i class="material-symbols-rounded">
                        add
                        </i>
                    add car
                </a>
                
            </div>
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-2 text-start text-xs font-medium text-gray-500 uppercase">Id
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-2 text-start text-xs font-medium text-gray-500 uppercase">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-2 text-start text-xs font-medium text-gray-500 uppercase">
                                            Model
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-2 text-start text-xs font-medium text-gray-500 uppercase">
                                            Year
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-2 text-start text-xs font-medium text-gray-500 uppercase">
                                            Price
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-2 text-start text-xs font-medium text-gray-500 uppercase">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-2 text-end text-xs font-medium text-gray-500 uppercase">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300">
                                    @foreach ($cars as $car)
                                        <tr>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $car->id }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-900">
                                                {{ $car->model->company->name }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-900">
                                                {{ $car->model->name }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-900">
                                                {{ $car->year }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-900">
                                                {{ $car->rental_price }}</td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-sm text-gray-900">
                                                @if (count($car->rentals))
                                                    <span class="">Outside</span>
                                                @else
                                                    <span class="">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-1.5 whitespace-nowrap text-end text-sm font-medium flex gap-x-3 justify-end">
                                                <a href="{{ route('backend.car.edit',$car->id) }}" class="text-blue-500">Edit</a>
                                                
                                                <form method="POST" action="{{ route('backend.car.destroy', $car->id) }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit"
                                                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-500  disabled:opacity-50 disabled:pointer-events-none">Delete</button>
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
            @if ($cars->hasPages())

             <x-space h="30" />


                <ul class="pagination_ul ul_page_search">
                    @for ($i = max(1, $cars->currentPage() - 2); $i <= min($cars->lastPage(), $cars->currentPage() + 2); $i++)
                        <li class="@if ($cars->currentPage() == $i) active @endif">
                            <a href="{{ $cars->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>

            @endif
        </div>
    </div>
</x-layout-dashboard>
