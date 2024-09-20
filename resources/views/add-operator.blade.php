<x-app-layout>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin: 1% auto;">
        <form method="POST" action="{{ route('addOperator') }}" enctype="multipart/form-data">
            @csrf
            <select name="area" id="">
                @foreach ($areas as $a)
                    <option value="{{$a->id}}">{{$a->NAME}}</option>
                @endforeach
            </select>
            <div class="mt-4">
                <x-input-label for="employee_id" :value="__('Número de nómina')" />
                <x-text-input id="employee_id" class="block mt-1 w-full" type="number" name="employee_id" autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-input-label for="age" :value="__('Edad')"/>
                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" autocomplete="off"/>
            </div>
            <div class="mt-4">
                <x-input-label for="birthdate" :value="__('Fecha de nacimiento')"/>
                <input type="date" name="birthdate">
                <!-- <x-text-input id="birthdate" class="block mt-1 w-full" type="text" name="birthdate" autocomplete="off" placeholder="Ej. 2001-06-18"/> -->
            </div>
            <div class="mt-4">
                <x-input-label for="hiringdate" :value="__('Fecha de ingreso')"/>
                <input type="date" name="hiringdate">
                <!-- <x-text-input id="birthdate" class="block mt-1 w-full" type="text" name="birthdate" autocomplete="off" placeholder="Ej. 2001-06-18"/> -->
            </div>
            <div class="mt-4">
                <select name="category" id="">
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