<div class="row mt-3 justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>{{ $answersCount }} Answsers</h3>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach ($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a 
                                onclick="event.preventDefault(); document.getElementById('frm-voteup-{{ $answer->id }}').submit();"
                                class="vote-up" title="This answer is useful">
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a>
                            <form id="frm-voteup-{{ $answer->id }}" action="{{route('answers.vote',[$answer,1])}}" method="post">
                                @csrf
                            </form>
                            <span class="votes-count">{{ $answer->countTotalVoters() }}</span>
                            <a
                                onclick="event.preventDefault(); document.getElementById('frm-votedown-{{ $answer->id }}').submit();"
                                href="" class="vote-down" title="This answer is not useful">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>
                            <form id="frm-votedown-{{ $answer->id }}" action="{{route('answers.vote',[$answer,-1])}}" method="post">
                                @csrf
                            </form>
                            @can('accept', $answer)
                            <a href="#" 
                                onclick="event.preventDefault(); document.getElementById('frm-mark-answer-{{$answer->id}}').submit()"
                                class=" {{ $answer->status }} mt-2"
                                title="Mark this as the best answer">
                                <i class="fas fa-check fa-3x"></i>
                            </a>
                            <form
                                id="frm-mark-answer-{{$answer->id}}"
                                action="{{route('questions.answers.accept', ['question' => $answer->question, 'answer' => $answer])}}"
                                method="post">
                                @csrf
                                @method('PATCH')
                            </form>

                            @else
                                @if($answer->is_best)
                                    <a href="#" 
                                        class=" {{ $answer->status }} mt-2"
                                        title="The question owner accepted this as the best answer ">
                                        <i class="fas fa-check fa-3x"></i>
                                    </a>
                                @endif
                            @endcan
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="d-flex">
                                <div class="">
                                    @can('update',$answer)
                                    <a href="{{route('questions.answers.edit',compact('question', 'answer'))}}" class="btn btn-sm btn-outline-info">Edit</a>
                                    @endcan
                                    @can('delete',$answer)
                                    <form style="display:inline;" onsubmit="return confirm('Are you sure ?')" action="{{route('questions.answers.destroy', compact('question', 'answer'))}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                    @endcan
                                </div>
                                <div class="ml-auto">
                                    <span class="text-muted">Answered {{ $answer->create_date }}</span>
                                    <div class="media">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="{{ $answer->user->name }}">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url }}" class="pr-2">
                                                {{ $answer->user->name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>