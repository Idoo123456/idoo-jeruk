<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>

<h1>Edit Profile</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

{{-- FOTO --}}
@if($user->profile_picture)
    <img src="{{ asset('storage/' . $user->profile_pictures) }}" width="200">
    <br><br>

    <form action="{{ route('profile.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Picture</button>
    </form>
@endif

<br>

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Upload New Picture:</label>
    <input type="file" name="profile_pictures" required>
    <br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('profile.pictures') }}">Back to Profile</a>

</body>
</html>
