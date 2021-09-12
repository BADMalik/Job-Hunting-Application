@foreach ($skills as $skill)
    <option class="form-control form-control-alternative" value="{{(int)($skill->id)}}">{{$skill->name}}</option>
@endforeach
