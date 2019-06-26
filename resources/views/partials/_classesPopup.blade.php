<form action="{{ route('submit') }}" method="post">
    {{ csrf_field() }}
    <div class="pop-up col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12">
        <div>
            @foreach ($classNum as $class)
                <div class="row" style="margin: 3em;">
                    <div class="col-4">
                        <input value="{{ isset($classes) ? $classes[$class]['name'] : "" }}" placeholder="Class Name" type="text" id="className{{ $class }}" name="className{{ $class }}" class="custom-input">
                    </div>

                    <div class="col-6 offset-1">
                        <div class="row">
                            <div class="col-6 form-group">
                                <select id="classType{{ $class }}" name="classType{{ $class }}" class="custom-select">
                                    @foreach ($classTypes as $classType)
                                        <option {{ isset($classes) ? $classes[$class]['type'] == $classType ? "selected" : "" : "" }}>{{$classType}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <select id="classLength{{ $class }}" name="classLength{{ $class }}" class="custom-select">
                                    @foreach ($classLengths as $classLength)
                                        <option {{ isset($classes) ? $classes[$class]['length'] == $classLength ? "selected" : "" : "" }}>{{$classLength}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div style="z-index: 4; position: absolute; top: 76vh; background-color: lightcyan;" class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12">
        <div class="row">
            <div class="col-lg-1 col-sm-2 col-3" style="padding-right: 0;">
                <a href="{{ route('addClass') }}" class="btn btn-success btn-lg pop-up-button">+</a>
            </div>
            <div class="col-lg-10 col-sm-8 col-6 form-group">
                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Save Classes</button>
            </div>
            <div class="col-lg-1 col-sm-2 col-3" style="padding-left: 0;">
                <a href="{{ route('removeClass') }}" class="btn btn-danger btn-lg pop-up-button">-</a>
            </div>
        </div>
    </div>

</form>
