<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Article List</title>
</head>

<body>
  <h1>Article List</h1>

  <p>This is Paragraph.</p>
  <ul>
    @foreach ($articles as $article)
    <li>{{ $article['title'] }}</li>
    <li>{{ $article['paragraph'] }}</li>
    <br>
    @endforeach
  </ul>
</body>

</html>