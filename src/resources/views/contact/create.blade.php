<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body class="antialiased">
        <section class="body-font relative">
            <div class="container py-5 mt-5 mx-auto">
                <div class="text-center w-full mb-12">
                    <h1 class="sm:text-3xl text-2xl title-font">お問合せ</h1>
                </div>
                @if ($errors->any())
                    <div class='text-red-600'>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('contact.store') }}">
                @csrf
                    <div class="lg:w-1/2 md:w-2/3 mx-auto px-6">
                        <div class=" -m-2">
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="department_id" class="leading-7 text-sm text-gray-600">部署名</label>
                                    <select name='department_id'>
                                        <option value="">選択してください</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" {{ old('department_id') == $loop->iteration ? 'selected' : '' }}>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                    <input type="email" id="email" value="{{ old('email') }}" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="content" class="leading-7 text-sm text-gray-600">お問合せ内容</label>
                                    <textarea id="content" name="content" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="age">
                                    年齢
                                </label>
                                <input value="{{ old('age') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" id="age" name="age" type="text">
                            </div>
                            <div class="p-2 w-full">
                            <div class="relative">
                                <label for="gender" class="leading-7 text-sm text-gray-600">性別</label><br />
                                <input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : "" }} >男性
                                <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : "" }}>女性
                                <input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : ""}}>未回答
                            </div>
                            </div>
                            <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">提出</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>