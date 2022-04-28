@extends('layouts.app')

@section('content')
    <div class="question">
        <div class="question-wrap question-content">
            <div class="question-content-user-icon"></div>
            <h1 class="question-content-title">
                {{ $question->title }}
            </h1>
        </div>
        <div class="question-wrap question-content">
            <div class="question-content-votes"></div>
            <div class="question-content-description">
                {{ $question->description }}
            </div>
        </div>
        <div class="question-wrap">
            <div></div>
            <div class="question-content-recation d-flex justify-content-between">
                <div class="question-content-recation-stats"></div>
               
                <div class="question-content-recation-actions d-flex">

                    @if ($question->is_author)
                        <a class="btn btn-primary me-2" title="Edit" href="{{ route('q.edit', $question->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('q.destroy', $question->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    @endif
                </div>

            </div>
        </div>

        <hr>

        <div class="comment-wrap">
            

            @if($comments->isEmpty())
                <div></div>

                
            @else

                @foreach ($comments as $comment)
                    <div class="question-wrap question-content">
                        <div class="question-content-votes"></div>
                        <div class="question-content-description">
                            {{ $comment->comment }}
                        </div>
                    </div>

                @endforeach
                
            @endif
            <hr>

        
            <div class="comment-form-holder">
                {{-- <button type="button" id="formButton">
                <a class="btn btn-secondary me-2 comment" title="Comment" href="{{route('q.comment')}}">
                    <i class="fa-solid fa-comment-dots"></i>
                </a>
                </button> --}}

                <form action="{{ route('comment') }}" method="POST" >
                    @csrf
                    <div>
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment" rows="3" class="form-control"
                            placeholder="Comment Here"></textarea>
                    </div>
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    <div><input type="submit" value="Comment" class="btn btn-primary"></div>
                </form>
            </div>
        </div>

        <hr>

        @foreach ($question->answers as $answer)
            <div class="question-wrap question-content">
                <div class="question-content-votes"></div>
                <div class="question-content-description">
                    {{ $answer->description }}
                
                </div>
            </div>
        @endforeach

        

        <div class="question-wrap">
            <div></div>
            <div class="question-content-recation d-flex justify-content-between">
                <div class="question-content-recation-stats"></div>
               
                <div class="question-content-recation-actions d-flex">

                    @if ($question->is_author)
                        <a class="btn btn-primary me-2" title="Edit" href="{{ route('q.edit', $question->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('q.destroy', $question->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    @endif
                </div>

            </div>
        </div>
        

        <hr>
        

        <div class="question-answer">
            <form action="{{ route('q.answer') }}" method="POST">
                @csrf
                <div>
                    <label for="description">Answer</label>
                    <textarea name="description" id="description" rows="5" class="form-control"
                        placeholder="Enter your answer"></textarea>
                </div>
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <div><input type="submit" value="Answer" class="btn btn-primary"></div>
            </form>
        </div>
        {{-- <div class="question-answer">
            <form action="{{ route('q.answer.id', $question->id) }}" method="POST">
                @csrf
                <div>
                    <label for="description">Answer</label>
                    <textarea name="description" id="description" rows="5" class="form-control"
                        placeholder="Enter your answer"></textarea>
                </div>
                <div><input type="submit" value="Answer" class="btn btn-primary"></div>
            </form>
        </div> --}}

    </div>
@endsection
