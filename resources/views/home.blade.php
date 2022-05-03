@extends('layouts.app')

@section('content')

   

    <div class="questions">

        @foreach ($questions as $question)
            <div class="questions-item">
                <div class="questions-item-wrap">
                    <div class="questions-item-user-icon">
                        <div>
                            <form action="route('r.store')">
                                <input type="hidden" name="question_id" value="{{ $question->id }}"> 
                                <input type="hidden" name="tally" value="1" >
                                <button><i class="fa-solid fa-sort-up"></i></button>
                            </form>
                        </div>
                        <div>5</div>
                        <div>
                            <button><i class="fa-solid fa-sort-down"></i></button>
                        </div>
                    </div>
                    <a class="questions-item-title" href="{{ route('q.show', $question->id) }}">
                        {{ $question->title }}
                    </a>
                </div>
                <div class="questions-item-wrap">
                    <div class="questions-item-votes"></div>
                    <div class="questions-item-description">
                        {{ $question->description }}
                    </div>
                </div>
                <div class="questions-item-wrap">
                    <div></div>
                    <div class="questions-item-reactions"></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
