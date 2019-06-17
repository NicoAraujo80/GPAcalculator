<div style="z-index: 2; height: 100vh; width: 100vw; position: fixed; top: -50vh; filter: blur(8px);">

</div>

<div class="pop-up">
    <form action="{{ route('submit') }}" method="post">
        {{ csrf_field() }}
        @foreach ($classNum as $class)
            <div class="row" style="margin: 3em;">
                <div class="col-4">
                    <input value="{{ isset($classes) ? $classes[$class]['name'] : "" }}" placeholder="Class Name" type="text" id="className{{ $class }}" name="className{{ $class }}" class="custom-input">
                </div>

                <div class="col-6 offset-1">
                    <div class="row">
                        <div class="col-6 form-group">
                            <select id="classType{{ $class }}" name="classType{{ $class }}" class="form-control">
                                @foreach ($classTypes as $classType)
                                    <option {{ isset($classes) ? $classes[$class]['type'] == $classType ? "selected" : "" : "" }}>{{$classType}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 form-group">
                            <select id="classLength{{ $class }}" name="classLength{{ $class }}" class="form-control">
                                @foreach ($classLengths as $classLength)
                                    <option {{ isset($classes) ? $classes[$class]['length'] == $classLength ? "selected" : "" : "" }}>{{$classLength}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div style="margin: 1em;">
            <a href="{{ route('addClass') }}" class="btn btn-success pop-up-button">+</a>
        </div>
        <div style="margin: 1em;">
            <a href="{{ route('removeClass') }}" class="btn btn-danger pop-up-button">-</a>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg pop-up-save">Save Classes</button>
        </div>
    </form>
</div>

