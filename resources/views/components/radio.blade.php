@props(['value' => '','lists'=>[]])
<div>
    <fieldset class="mx-auto bg-white p-8 text-sm shadow">
        @foreach($lists as $list)
        <input {{ $value==$list->id ? 'checked' : '' }} class="form-radio mr-2 mb-0.5 border-slate-300 text-sky-400 focus:ring-sky-300" name={{$name}} type="radio" value="{{$list->id}}"><label class="peer-checked/draft:text-sky-500 font-medium"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$list->name}}</font></font></label>
        @endforeach
        </fieldset>
</div>
