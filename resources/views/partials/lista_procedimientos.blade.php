<!--<ul class="p-2 z-10  bg-orange-400 text-white">-->
<ul class=" z-50" style="background-color: #496063; color: white; border-radius:10px;">

    @foreach($procedimientos as $procedimiento)
        <li><a href="{{ route('ver_procedimiento', $procedimiento) }}">{{ $procedimiento->nombre }}</a></li>
    @endforeach
</ul>