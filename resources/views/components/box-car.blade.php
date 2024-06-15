
@props(['carInfo'])

<div class="box-car">
    <a href="#">
        <div class="div-img">
            <span class="name">{{ $carInfo['id'] }}</span>
            <img src="{{ $carInfo->photo }}" alt="aa">
        </div>
        <div class="div-info">
            <div class="info">
                <span><i class="material-symbols-outlined">auto_transmission</i>7</span>
                <span><i class="material-symbols-outlined">directions_car</i>{{ $carInfo->year }}</span>
                <span><i class="material-symbols-outlined">door_open</i>7</span>
            </div>
            <div class="price">
                <span>{{ $carInfo->rental_price }} DH</span>
            </div>
        </div>
    </a>
</div>
