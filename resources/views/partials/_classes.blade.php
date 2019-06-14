<form action="{{ route('calc') }}" method="post">
    @foreach ($classes as $class)
        <div class="row" style="margin: 2em;">
            <div class="col-2 offset-4">
                <h1 style="text-align: center;">{{$class['name']}}</h1>
            </div>
            <div class="col-2">
                <select id="grade{{$loop->index}}" name="grade{{$loop->index}}" class="form-control">
                    @foreach($grades as $grade)
                            <option style="text-align: center;">{{$grade}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endforeach

<button type="submit" class="btn btn-primary btn-lg pop-up-button">Calculate</button>

</form>
