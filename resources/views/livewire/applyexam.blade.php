
<div>


        <h6 style="margin-bottom: 20px">{{$question['question']}}</h6>
    <hr>
        <div class="row">

            @foreach($question->options as $x=>$option)
                <div class="col-xl">

                    <label for="options_q_{{$question->id}}_{{$x}}">{{$option}}</label> <input type="radio" name="{{$question->id}}" wire:model="answer" value="{{$option}}" id="options_q_{{$question->id}}_{{$x}}">
                </div>

            @endforeach

        </div>
        <br>

        {{--                            <div class="remember-checkbox mb-20">--}}
        {{--                                <input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios1" value="option1" checked>--}}
        {{--                                <label class="form-check-label mb-0" for="gridRadios1">First radio</label>--}}
        {{--                            </div>--}}

    <div class="col-xl"><button class="btn btn-danger" type="submit"  wire:click="next_question" >SAVE</button></div>

</div>

