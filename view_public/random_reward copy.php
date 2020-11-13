<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/js/random/random.css">
</head>

<body>
    <div class="wrapper">
        <div class="list-container">
            <label>List of names</label>
            <textarea id="txtList">

    </textarea>
        </div>
        <div class="spinner-container">

            <div class="name" id="divSelected">
                Start spinning
            </div>
            <button class="spinner-button" onclick="start()">Random Pick</button>
            <a href="#" onclick="toggleList()">Toggle List</a>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="../assets/js/random/random.js"></script>
</body>

</html>