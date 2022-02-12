<option value="" selected="selected" disabled="disabled" hidden>Please Select Your Qualification</option>

    @foreach ($qualifications as $qualification)
    <option value="{{$qualification->id}}">{{$qualification->name}}</option>
    @endforeach
