@extends('back.layouts.app')
@section('title','Halaman FAQ')
@section('subtitle','Menu FAQ')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form FAQ</b></h5>
                <br>
                <hr>
               
                <form action="{{ route('faq.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @error('pertanyaan')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Pertanyaan <small class="text-muted">(Cth : Bagaimana Caranya ?)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="pertanyaan"
                            placeholder="Masukan Pertanyaan" value="{{ $data->pertanyaan }}">
                    </div>
                    
                    @error('jawaban')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Jawaban <small class="text-muted">(Cth : Langkahnya adalah seperti berikut)</small></label>
                        <textarea class="form-control" name="jawaban" rows="3">{{ $data->jawaban }}</textarea>
                    </div>
                   
                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan <small class="text-muted">(Cth : fas fa-edit.)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan urutan" value="{{ $data->urutan }}">
                    </div>
                   
                    
                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                        <a href="/faq" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection