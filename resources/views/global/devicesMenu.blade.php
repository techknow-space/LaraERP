
{{--
@foreach($types as $type)
    <li class="nav-item dropdown dropdown-mea">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $type->type }}
        </a>
        <div class="dropdown-menu mea" aria-labelledby="navbarDropdown">
            <ul class="nav flex-column">
                @foreach($type->devices as $device)
                    <li><a class="dropdown-item" href="/lookup/device/{{ $device->id }}"> {{ $device->brand->name }} {{ $device->model_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </li>
@endforeach
--}}

@foreach($deviceTypes as $deviceType)
    <li class="nav-item dropdown dropdown-mea">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{$deviceType['label']}}
        </a>
        <ul class="dropdown-menu">
            @foreach($deviceType['brands'] as $brand)
                <li class="dropdown-item dropdown-submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$brand['name']}}</a>
                        <ul class="dropdown-menu dropdown-device-list" style="display: none !important;">
                            @foreach($brand['devices'] as $device)
                                <li class="dropdown-item">
                                    <a href="/lookup/device/{{ $device->id }}">{{ $device->model_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                </li>
            @endforeach
        </ul>
    </li>
@endforeach
