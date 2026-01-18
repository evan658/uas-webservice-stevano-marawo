<h1>Edit Lagu</h1>

<form action="{{ route('lagu.update', $lagu->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="judul" value="{{ $lagu->judul }}"><br><br>
    <input type="text" name="penyanyi" value="{{ $lagu->penyanyi }}"><br><br>
    <input type="file" name="file_audio"><br><br>

    <button type="submit">Update</button>
</form>
