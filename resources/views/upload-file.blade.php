<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload million records</title>
</head>
<body>
<form action="/upload" method="post" enctype="multipart/form-data">
@csrf
    <input type="file" name="mycsv" id="mycsv">
    <input type="submit" value="upload">
</form>
</body>
</html>
