@if (isset($display) && $display === 'inline')
{{$label}} <a href="{{$model->user->url}}">{{$model->user->name}}</a> - {{ $model->create_date }}
@else
    <span class="text-muted">{{$label}} {{ $model->create_date }}</span>
    <div class="media">
        <a href="{{ $model->user->url }}" class="pr-2">
            <img src="{{ $model->user->avatar }}" alt="{{ $model->user->name }}">
        </a>
        <div class="media-body mt-1">
            <a href="{{ $model->user->url }}" class="pr-2">
                {{ $model->user->name }}
            </a>
        </div>
    </div>
@endif