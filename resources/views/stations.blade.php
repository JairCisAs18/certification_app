<x-app-layout>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Nueva estación</button>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva estación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <form action="{{ route('addStation') }}" method="POST">
                        <select name="area" id="">
                            @foreach ($areas as $a)
                                <option value="{{$a->id}}">{{$a->NAME}}</option>
                            @endforeach
                        </select>
                        <label for="certname">Nombre: </label>
                        @csrf
                        <input type="text" name="stationame" autocomplete="off">
                        <br><br>
                        <button class="btn btn-success">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    @foreach ($areas as $a)
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample{{$a->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$a->id}}">{{$a->NAME}}</a><br><br>
        <div class="collapse" id="collapseExample{{$a->id}}">
            <div class="card card-body">
                <table class="table">
                    <thead class="table-primary">
                        <th class="text-center fs-5">Estación</th>
                    </thead>
                    <tbody>
                        @foreach ($a->getStationsByArea() as $s)
                            <tr>
                                <td class="text-center align-middle fs-5"><a href="{{ route('stationInfoView', $s->id) }}">{{$s->NAME}}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</x-app-layout>