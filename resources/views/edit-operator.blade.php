<x-app-layout>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin: 1% auto;">
        <form method="POST" action="{{ route('addOperator') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="operatorId" value="{{$operator->id}}">
            <select name="area" id="">
                <option value="{{$operator->AREA_ID}}" selected>{{$operator->getArea()}}</option>
                @foreach ($areas as $a)
                    <option value="{{$a->id}}">{{$a->NAME}}</option>
                @endforeach
            </select>
            <div class="mt-4">
                <x-input-label for="employee_id" :value="__('Número de nómina')" />
                <x-text-input id="employee_id" class="block mt-1 w-full" type="number" name="employee_id" autocomplete="off" value="{{$operator->EMPLOYEE_ID}}"/>
            </div>

            <div class="mt-4">
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autocomplete="off" value="{{$operator->NAME}}"/>
            </div>

            <div class="mt-4">
                <x-input-label for="age" :value="__('Edad')"/>
                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" autocomplete="off" value="{{$operator->AGE}}"/>
            </div>
            <div class="mt-4">
                <x-input-label for="birthdate" :value="__('Fecha de nacimiento')"/>
                <x-text-input id="birthdate" class="block mt-1 w-full" type="text" name="birthdate" autocomplete="off" value="{{$operator->BIRTHDATE}}"/>
            </div>

            <div class="mt-4">
                <select name="category" id="">
                    <option value="{{$operator->CATEGORY_ID}}">{{$operator->getCategory()}}</option>
                    @foreach ($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->CATEGORY}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">
                <x-input-label for="photo" :value="__('Foto')"/>
                <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo"/>
            </div>
            <input type="submit" name="input-button" value="Registrar" class="btn btn-success">
        </form>      
    </div>
</x-app-layout>