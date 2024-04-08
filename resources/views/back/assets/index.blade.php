@extends('back.layouts.app')
@section('title','Halaman Assets')
@section('subtitle','Menu Assets')

@section('content')

<div class="row">
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                   
                    @if ($message = Session::get('message'))
                    <div class="alert alert-success" role="alert">
                        {{ $message}}
                    </div> 
                    @endif

                    @if ($message = Session::get('messagehapus'))
                    <div class="alert alert-danger" role="alert">
                        {{ $message}}
                    </div> 
                    @endif
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr style="background-color: rgb(139, 132, 132); color:white">
                                <th style="color:white; text-align:center">No</th>
                                <th style="color:white; text-align:center">Nama</th>
                                {{-- <th style="color:white; text-align:center">Gambar</th> --}}
                                <th style="color:white; text-align:center">Gambar</th>
                                {{-- <th style="color:white; text-align:center">Aksi</th> --}}
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                                @foreach ($galeris as $p)
                                <tr>
                                    <td style="text-align:center">{{ $i }}</td>
                                    <td style="text-align:center">{{ $p->nama}}</td>
                                    {{-- <td style="text-align:center"><a href="/upload/{{ $p->gambar}}" target="_blank"><img style="max-width:250px; max-height:250px" src="/upload/{{ $p->gambar}}" alt=""></a></td> --}}
                                    <td style="text-align:center">
                                        <iframe src="{{$p->link}}" width="100%" height="100%" style="border:0;"></iframe>
                                    </td>
                                  
                                     
                                
                                    {{-- <td style="text-align:center">
                                        <a href="{{ route('galeris.edit',$p->id)}}" class="btn btn-sm btn-primary" style="color: rgb(251, 249, 249)"><i class="fas fa-download"></i> Unduh</a>
                                        <a href="{{ route('galeris.edit',$p->id)}}" class="btn btn-sm btn-success" style="color: rgb(247, 241, 241)"><i class="fas fa-print"></i> Cetak</a>
                                    </td> --}}
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                    </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Link</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
     
       
 
@endsection