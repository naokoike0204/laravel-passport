
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('顧客一覧') }}
        </h2>
    </x-slot>


        <ul role="list">
            @foreach($customers as $customer)
            <li class="group/item relative flex items-center justify-between rounded-xl p-4 hover:bg-slate-100">
                <div class="flex gap-4">
                  <div class="flex-shrink-0">
                    <img class="h-12 w-12 rounded-full" src="{{$customer->image}}?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                  </div>
                  <div class="w-full text-sm leading-6">
                    <a href="{{ route('customer.edit', ['customer_id' => $customer->id]) }}" class="font-semibold text-slate-900"><span class="absolute inset-0 rounded-xl" aria-hidden="true"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$customer->name}}</font></font></a>
                    <div class="text-slate-500"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$customer->age}}歳</font></font></div>
                  </div>
                </div>
                <a href="{{ route('customer.edit', ['customer_id' => $customer->id]) }}" class="group/edit invisible relative flex items-center whitespace-nowrap rounded-full py-1 pl-4 pr-3 text-sm text-slate-500 transition hover:bg-slate-200 group-hover/item:visible">
                  <span class="font-semibold transition group-hover/edit:text-gray-700"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">編集</font></font></span>
                  <svg class="mt-px h-5 w-5 text-slate-400 transition group-hover/edit:translate-x-0.5 group-hover/edit:text-slate-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"></path>
                  </svg>
                </a>
              </li>
              @endforeach
          </ul>

</x-app-layout>
