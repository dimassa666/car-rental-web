<!-- resources/views/prompt.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Prompt Input</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        <form id="promptForm">
            <label for="prompt">Enter Prompt:</label>
            <input type="text" id="prompt" name="prompt">
            <button type="submit">Submit</button>
        </form>
        <div id="response"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('promptForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const prompt = document.getElementById('prompt').value;
            axios.post('/api/send-prompt', { prompt: prompt })
                .then(function(response) {
                    document.getElementById('response').innerText = response.data.result;
                })
                .catch(function(error) {
                    console.error(error);
                    document.getElementById('response').innerText = 'Error: ' + error.message;
                });
        });
    </script>
</body>
</html>
