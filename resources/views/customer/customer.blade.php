@inject('S3','App\Services\S3\S3Service')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('顧客一覧') }}
        </h2>
        <div dir="rtl">
               <a href="{{ route('customer.edit', ['customer_id' => 0]) }}" class="font-semibold top-0 right-0  text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">新規作成</a>
        </div>
    </x-slot>


        <ul role="list">
            @foreach($customers as $customer)
            <li class="group/item relative flex items-center justify-between bg-white border border-gray-200 bg-white shadow-lg space-y-2 sm:space-y-0 sm:space-x-6 sm:py-4 p-4 hover:bg-slate-100">
                <div class="flex gap-4">
                  <div class="flex-shrink-0">
                    <img class="h-16 w-16 object-cover rounded-full" src="{{$S3->getS3FileTemporaryUrl($customer->image,10)}}" alt="">
                  </div>
                  <div class="w-full text-sm leading-6">
                    <a href="{{ route('customer.edit', ['customer_id' => $customer->id]) }}" class="font-semibold text-slate-900"><span class="absolute inset-0 rounded-xl" aria-hidden="true"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$customer->name}}</font></font></a>
                    <div class="text-slate-500"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$customer->age}}歳</font></font></div>
                  </div>
                </div>
                <div class="frex">
                    <form action="{{ route('customer.delete', ['customer_id' => $customer->id]) }}" method="POST" id="form{{$customer->id}}" name="form2">
                        @csrf
                <a href="javascript:void(0)" onClick="confirmFunction1({{$customer->id}})" class="group/edit invisible relative flex items-center whitespace-nowrap rounded-full py-1 pl-4 pr-3 text-sm text-red- transition hover:bg-red-200 group-hover/item:visible">
                    <span class="text-red-600 font-semibold transition group-hover/edit:text-red-700"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">削除</font></font></span>
                    <svg class="mt-px h-5 w-5 text-red-400 transition group-hover/edit:translate-x-0.5 group-hover/edit:text-red-500" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"></path>
                    </svg>
                  </a>
                </form>
                <a href="{{ route('customer.edit', ['customer_id' => $customer->id]) }}" class="group/edit invisible relative flex items-center whitespace-nowrap rounded-full py-1 pl-4 pr-3 text-sm text-sky-500 transition hover:bg-sky-200 group-hover/item:visible">
                  <span class="text-sky-600 font-semibold transition group-hover/edit:text-sky-700"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">編集</font></font></span>
                  <svg class="mt-px h-5 w-5 text-sky-400 transition group-hover/edit:translate-x-0.5 group-hover/edit:text-sky-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"></path>
                  </svg>
                </a>
                </div>
              </li>
              @endforeach
          </ul>
          {{ $customers->links() }}
          <script>
            function confirmFunction1(id) {
            //ret変数に確認ダイアログの結果を代入する。
            ret = confirm("本当に削除しますか？");
            //確認ダイアログの結果がOKの場合外部リンクを開く
            if (ret == true){
                $('#form'+id).submit();
            }
            }
            </script>
</x-app-layout>
