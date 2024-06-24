@props(['carInfo'])

<div class="box-car">
    <a href="{{ route('car.show',$carInfo->id) }}">
        <div class="div-img">
            <span class="name">{{ $carInfo->company->name }}</span>
            <span class="name name_tit">{{ $carInfo->model->name }}</span>
            
            <img src="{{ asset('uploads') . '/' . $carInfo->photo }}" alt="aa">
        </div>
        <div class="div-info">
            <div class="info">
                <span><i
                        class="material-symbols-outlined">auto_transmission</i>{{ Str::upper(Str::limit($carInfo->transmission, 2, '')) }}</span>
                <span><i class="material-symbols-outlined">directions_car</i>{{ $carInfo->year }}</span>
                <span><i class="material-symbols-outlined">door_open</i>{{ $carInfo->doors }}</span>
            </div>
            <div class="price">
                <span>{{ $carInfo->rental_price }} DH</span>
            </div>
        </div>
    </a>
</div>
