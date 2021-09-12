<label for="qualification" class="register-inputs col-md-4 col-form-label text-md-right">Qualification : </label>
<div class="col-md-8">
<select required class="form-control dropdown" id="qualification" name="qualification">
    <option value="" selected="selected" disabled="disabled" hidden>Please select one</option>
    @foreach ($qualifications as $qualification)
    <option value="{{$qualification->id}}">{{$qualification->name}}</option>
    @endforeach
</select>
@error('qualification')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
{{-- {{dd($qualifications)}} --}}
