
@props(['carInfo'])

<div class="box-car">
    <a href="#">
        <div class="div-img">
            <span class="name">{{ $carInfo['id'] }}</span>
            <img src="{{ asset('images/cars/car1.jpg') }}" alt="aa">
        </div>
        <div class="div-info">
            <div class="info">
                <span><i class="material-symbols-outlined">auto_transmission</i>7</span>
                <span><i class="material-symbols-outlined">directions_car</i>2010</span>
                <span><i class="material-symbols-outlined">door_open</i>7</span>
            </div>
            <div class="price">
                <span>120 DH<small>/day</small></span>
            </div>
        </div>
    </a>
</div>
