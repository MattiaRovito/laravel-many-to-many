@extends('layouts.app')

@section('content')

<div class="container">
      {{-- primo metodo per visualizzare tutti gli errori --}}
      {{-- @if($errors->any())
      @dd($errors) 
      <div class="alert alert-warning">
      
        <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
        </ul>
      </div>
      @endif --}}

       {{-- secondo metodo per visualizzare tutti gli errori. Si inserisce direttamente all'interno della classe dell'input title e content --}}



   


    <form action="{{route('admin.posts.store')}}" method="post">
        @csrf
        <div class="mb-3">
          <label for="titolo" class="form-label">Titolo</label>
          {{-- old title consente di immagazzinare il valore precedentente --}}
          <input type="text" class="form-control
          @error('title')
          is-invalid
          @enderror"
          id="titolo" name="title" value="{{old('title')}}">
          @error('title')
          <div class="alert alert-warning">{{$message}}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="categorie" class="form-label">Categorie</label>
       
          <select name="categories_id" id="categorie" class="form-control">
            <option value="">Seleziona una categoria</option>
            @foreach($categories as $category)

            <option value="{{$category->id}}"
              @if($category->id == old('categories_id') ) selected 
              @endif>{{$category->name}}</option>


            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="descrizione" class="form-label">Descrizione</label>

          <textarea 
            name="content" id="descrizione" cols="30" rows="10" class="form-control
            @error('content')
            is-invalid
            @enderror">
            {{old('content')}}
          </textarea>
          @error('content')
          <div class="alert alert-warning">{{$message}}</div>
          @enderror
         
        </div>
        
     
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>










@endsection