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
                <form action="{{ route('faq.store') }}"  method="post" >
                    @csrf
                    @error('pertanyaan')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Pertanyaan <small class="text-muted">(Cth : Bagaimana Caranya ?)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="pertanyaan"
                            placeholder="Masukan Pertanyaan" value="{{ old('pertanyaan')}}">
                    </div>
                    
                    @error('jawaban')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Jawaban <small class="text-muted">(Cth : Langkahnya adalah seperti berikut)</small></label>
                        <textarea class="form-control" name="jawaban" rows="3">{{ old('jawaban')}}</textarea>
                    </div>
                   
                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>urutan <small class="text-muted">(Cth : 1)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan urutan FAQ" value="{{ old('urutan')}}">
                    </div>
                   
                    

                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/faq" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection