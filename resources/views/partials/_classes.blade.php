<form action="{{ route('calc') }}" method="post">
{{ csrf_field() }}
    @foreach ($classes as $class)
        <div class="row" style="margin: 2em;">
            <div class="col-xl-2 offset-xl-4 col-lg-3 offset-lg-3 col-6">
                <h1 style="text-align: center; font-size: 2.5em;">{{$class['name']}}</h1>
            </div>
            <div class="col-lg-2 col-4">
                <select id="grade{{$loop->index}}" name="grade{{$loop->index}}" class="form-control">
                    @foreach($grades as $grade)
                            <option style="text-align: center;" {{ isset($currentGrades) ? $grade == $currentGrades[$loop->parent->index] ? "selected" : "" : "" }}>{{$grade}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endforeach

<button type="submit" class="btn btn-primary btn-lg pop-up-button">Calculate</button>

</form>

<h2 style="font-family: Dialog; text-align: center; margin: 1em;">{{ isset($gpa) ? $gpa : "" }}</h2>
