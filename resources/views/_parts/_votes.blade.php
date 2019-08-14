<a 
    onclick="event.preventDefault(); document.getElementById('frm-voteup-{{ $model->id }}').submit();"
    class="vote-up" title="This {{$label}} is useful">
    <i class="fas fa-caret-up fa-2x"></i>
</a>
<form id="frm-voteup-{{ $model->id }}" action="{{route($route,[$model,1])}}" method="post">
    @csrf
</form>
<span class="votes-count">{{ $model->countTotalVoters() }}</span>
<a
    onclick="event.preventDefault(); document.getElementById('frm-votedown-{{ $model->id }}').submit();"
    href="" class="vote-down" title="This {{$label}} is not useful">
    <i class="fas fa-caret-down fa-2x"></i>
</a>
<form id="frm-votedown-{{ $model->id }}" action="{{route($route,[$model,-1])}}" method="post">
    @csrf
</form>