<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Contact:</h2>

        <div>
            <ul>
                <li>Name: {{$input['name'] ? $input['name']: ''}}</li>
                <li>Email: {{$input['email']}}</li>
                <li>Mobile: {{$input['phone'] ? $input['phone'] : ''}}</li>
                <li>Message: {{$input['message']}}</li>
            </ul>
        </div>

    </body>
</html>