<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('顧客詳細') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="post" action="{{ route('customer.update', ['customer_id' => $customer->id??0]) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('名前')" />
                       @if ($customer->id==0)
                       <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                       :value="old('name')" required autofocus autocomplete="name" />
                       @else
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $customer->name ?? '')" required autofocus autocomplete="name" />
                        @endif
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="age" :value="__('年齢')" />
                        @if ($customer->id==0)
                        <x-text-input id="age" name="age" type="text" class="mt-1 block w-full"
                            :value="old('age')" required autofocus autocomplete="age" />
                            @else
                            <x-text-input id="age" name="age" type="text" class="mt-1 block w-full"
                            :value="old('age', $customer->age ?? '')" required autofocus autocomplete="age" />

                            @endif

                            <x-input-error class="mt-2" :messages="$errors->get('age')" />
                    </div>
                    <div>
                        <x-input-label for="gender_id" :value="__('性別')" />
                        @if ($customer->id==0)
                        <x-radio name="gender_id" :lists="$genders" :value="old('gender_id')??''"/>
                            @else
                            <x-radio name="gender_id" :lists="$genders" :value="old('gender_id', $customer->gender_id ?? '')"/>
                            @endif
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('住所')" />
                        @if ($customer->id==0)
                        <x-select name="prefecture_id" route="prefecture" :value="old('prefecture_id')??''" :valueName="$prefecture_name" style="width:100px;"/>
                        @else
                        <x-select name="prefecture_id" route="prefecture" :value="old('prefecture_id', $customer->prefecture_id ?? '')" :valueName="$prefecture_name" style="width:100px;"/>
                        @endif
                        <x-input-error class="mt-2" :messages="$errors->get('prefecture_id')" />
                            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                            :value="old('address', $customer->address??'')" required autofocus autocomplete="address" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('趣味')" />
                        @if ($customer->id==0)
                        <x-checkbox name="hobby_id[]" :lists="$hobbies" :value="old('hobby_id')??[]" name2="hobby_id" />
                        @else
                        <x-checkbox name="hobby_id[]" :lists="$hobbies" :value="old('hobby_id', $customer->hobby_id ?? [])" name2="hobby_id" />
                        @endif
                        <x-input-error class="mt-2" :messages="$errors->get('hobby_id')" />
                    </div>
                    <div>
                        <x-input-label for="pr_description" :value="__('自己紹介')" />
                        <x-text-input id="pr_description" name="pr_description" type="text" class="mt-1 block w-full"
                            :value="old('pr_description', $customer->pr_description ?? '')" required autofocus autocomplete="pr_description" />
                        <x-input-error class="mt-2" :messages="$errors->get('pr_description')" />
                    </div>


                    <div>
                        <x-input-label for="name" :value="__('写真')" />
                        <div class="flex items-center space-x-6">
                        <div class="shrink-0">
                            <img class="h-16 w-16 object-cover rounded-full"
                                src="{{$customer->image_url??''}}"
                                alt="Current profile photo" />
                        </div>
                        <label class="block">
                            <span class="sr-only">ファイルを選択</span>
                            <input type="hidden" name="image" value="{{$customer->image??''}}">
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />

                            <input name="image" type="file"
                                class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-violet-50 file:text-violet-700
                                hover:file:bg-violet-100
                                " /></div>
                        </label>
                    </div>

                    <div class="mt-6 text-right">
                        <a href="{{route('customer')}}"><button type="button" class="bg-sky-500 hover:bg-sky-700 px-5 py-2.5 text-sm leading-5 rounded-md font-semibold text-white"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            キャンセル
                          </font></font></button></a>
                        <button type="submit" class="bg-sky-500 hover:bg-sky-700 px-5 py-2.5 text-sm leading-5 rounded-md font-semibold text-white"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                          保存
                        </font></font></button>
                      </div>
                    </form>
            </div>
        </div>
    </div>

</x-app-layout>
