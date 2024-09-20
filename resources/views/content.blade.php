<x-app-layout>
    <h1>Certificación: {{$certInfo->NAME}}</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Subir archivo</button>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <form action="{{ route('addFile') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$certInfo->id}}">
                        @csrf
                        <input type="file" name="file-input" autocomplete="off">
                        <br><br>
                        <button class="btn btn-success">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($files as $f)
        <iframe src="{{asset ('storage/files/'. $f->FILE_NAME)}}" type="" width="800" height="500" style="margin: auto;"></iframe>
        <br><br><br>
        <!-- <a href="{{asset ('storage/files/'. $f->FILE_NAME)}}" target="_blank">Ver PDF</a> -->
    @endforeach
</x-app-layout>