<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>

    {{-- Handle jika user null (belum login) --}}
    @if(!$user)
        <p>User not logged in.</p>
    @else
        {{-- Menampilkan foto profil jika ada --}}
        @if($user->profile_pictures)
            <img src="{{ Storage::url($user->profile_pictures) }}" width="200">
        @else
            <p>No profile picture uploaded.</p>
        @endif

        <br><br>
        <a href="{{ route('profile.edit') }}">Edit Profile</a>
    @endif

</body>
</html>
