<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar</title>
</head>
<body>

    <h1>Buat Account Baru!</h1>

    <h2>Sign Up Form</h2>

    <form action="/welcome" method="POST">
    @csrf
        <label>First name:</label><br>
        <input type="text" name="firstname"><br><br>

        <label>Last name:</label><br>
        <input type="text" name="lastname"><br><br>

        <label>Gender:</label><br>
        <input type="radio" name="gender" value="male"> Male <br>
        <input type="radio" name="gender" value="female"> Female <br>
        <input type="radio" name="gender" value="other"> Other <br><br>

        <label>Nationality:</label><br>
        <select name="nationality">
            <option>Indonesian</option>
            <option>Singaporean</option>
            <option>Malaysian</option>
            <option>Australian</option>
        </select>
        <br><br>

        <label>Language Spoken:</label><br>
        <input type="checkbox" name="language" value="indonesia"> Bahasa Indonesia <br>
        <input type="checkbox" name="language" value="english"> English <br>
        <input type="checkbox" name="language" value="other"> Other <br><br>

        <label>Bio:</label><br>
        <textarea name="bio" rows="5" cols="40"></textarea>
        <br><br>

        <input type="submit" value="Sign Up">
    </form>

</body>
</html>