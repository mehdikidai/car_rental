@props(['n','icon','txt','color'])

<div class="box">
    <div class="icon" style="background-color: {{ $color }}">
        <i class="material-symbols-rounded">{{$icon}}</i>
    </div>
    <div class="content_text">
        <span>{{$txt}}</span>
        <span>{{$n}}</span>
        
    </div>
</div>