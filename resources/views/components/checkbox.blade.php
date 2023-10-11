@props(['value' => [],'lists'=>[],'name'=>''])
<div>
    <fieldset class="mx-auto bg-white p-8 text-sm shadow">
        @foreach($lists as $list)
        <input {{ in_array((int)$list->id, $value ?? [])  ? 'checked' : '' }} class="mr-2 mb-0.5 border-slate-300 text-sky-400 focus:ring-sky-300" name={{$name}} type="checkbox" value="{{$list->id}}">
        <label class="peer-checked/draft:text-sky-500 font-medium">
            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$list->name}}</font></font>
        </label>

        @endforeach
        </fieldset>
</div>
