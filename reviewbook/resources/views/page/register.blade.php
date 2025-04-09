<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Buat Account baru</h1>

    <form action="/welcome" method="POST">
        @csrf
        <label>First Name:</label><br>
        <input type="text" name="first_name"><br><br>

        <label>Last Name:</label><br>
        <input type="text" name="last_name"><br><br>

        <p>Gender:</p>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>

        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>

        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label><br><br>

        <label for="nationality">Nationality:</label><br>
        <select id="nationality" name="nationality">
            <option value="indonesian">Indonesian</option>
            <option value="malaysian">Malaysian</option>
            <option value="singaporean">Singaporean</option>
            <option value="other">Other</option>
        </select><br><br>

        <p>Language Spoken:</p>
        <input type="checkbox" id="bahasa" name="language[]" value="Bahasa Indonesia">
        <label for="bahasa">Bahasa Indonesia</label><br>

        <input type="checkbox" id="english" name="language[]" value="English">
        <label for="english">English</label><br>

        <input type="checkbox" id="other_language" name="language[]" value="Other">
        <label for="other_language">Other</label><br><br>

        <label for="bio">Bio:</label><br>
        <textarea id="bio" name="bio" rows="6" cols="40"></textarea><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
