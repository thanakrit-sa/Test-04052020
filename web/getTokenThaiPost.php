<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
    let promise_token = new Promise(resolve => {
        var options = {
            method: 'POST',
            uri: 'https://trackapi.thailandpost.co.th/post/api/v1/authenticate/token',
            strictSSL: false,
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Token ' + config.thaipost.token
            }
        };

        request(options, function(error, response, body) {
            resolve(JSON.parse(body));
        });
    });

    let access_token = await promise_token;
</script>

<body>

</body>

</html>