@props(['value' => '','valueName' => ''])
<div>
    <select class="form-control" name={{$name}} id="search" {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
        <option value="{{$value}}" selected="selected">{{$valueName}}</option>
    </select>
</div>

<script type="text/javascript">
$(document).ready(function () {
    var path = "{{ route($route)}}";


    $('#search').select2({
        placeholder: 'Search',
        ajax: {
          url: path,
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });
});

</script>
