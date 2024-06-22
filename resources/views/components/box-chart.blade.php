@props(['n','icon'])

<div class="box">
    <div class="icon">
        <i class="material-symbols-rounded">{{$icon}}</i>
    </div>
    <div class="content_text">
        <span>Bookings</span>
        <span>{{$n}}</span>
        <span>Lorem, ipsum.</span>
    </div>
</div>