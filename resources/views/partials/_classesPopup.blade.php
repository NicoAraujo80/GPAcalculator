<form action="{{ route('submit') }}" method="post">
    {{ csrf_field() }}
    <div class="pop-up col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12">
        <h1 style="text-align: center; font-size: 1em; margin-top: .8em; color: #494949; font-family: Trebuchet;">Choose Classes</h1>
        <div>
            @foreach ($classNum as $class)
                <div class="row" style="margin: 1.5em;">
                    <div class="col-xl-3 col-lg-4 offset-lg-1 col-5">
                        <input value="{{ isset($classes) ? isset($classes[$class]['name']) ? $classes[$class]['name'] : "" : "" }}" placeholder="Class Name" type="text" id="className{{ $class }}" name="className{{ $class }}" class="custom-input">
                    </div>

                    <div class="col-xl-6 col-lg-5 offset-1 col-6">
                        <div class="row">
                            <div class="col-6 form-group" style="padding-left: 0;">
                                <select id="classType{{ $class }}" name="classType{{ $class }}" class="custom-select">
                                    @foreach ($classTypes as $classType)
                                        <option {{ isset($classes) ? isset($classes[$class]['type']) ? $classes[$class]['type'] == $classType ? "selected" : "" : "" : "" }}>{{$classType}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 form-group" style="padding-left: 0;">
                                <select id="classLength{{ $class }}" name="classLength{{ $class }}" class="custom-select">
                                    @foreach ($classLengths as $classLength)
                                        <option {{ isset($classes) ? isset($classes[$class]['length']) ? $classes[$class]['length'] == $classLength ? "selected" : "" : "" : "" }}>{{$classLength}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div style="z-index: 4; position: absolute; top: 75vh; background-color: lightcyan; margin-top: .5em; margin-bottom: .5em;" class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12">
        <div class="row">
            <div class="col-lg-1 col-sm-2 col-3" style="padding-right: 0;">
                <a href="{{ route('addClass') }}" class="btn btn-success btn-lg pop-up-button">+</a>
            </div>
            <div class="col-lg-10 col-sm-8 col-6">
                <button type="submit" class="btn btn-primary btn-lg pop-up-button" style="width: 100%;">Save Classes</button>
            </div>
            <div class="col-lg-1 col-sm-2 col-3" style="padding-left: 0;">
                <a href="{{ route('removeClass') }}" class="btn btn-danger btn-lg pop-up-button">-</a>
            </div>
        </div>
    </div>

</form>
