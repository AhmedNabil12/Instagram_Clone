<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="registeration_form_style.css">
    <title>Instagram - Upload</title>
</head>
    <body>
        
    <div class="container">
            <div class="title">Upload</div>

            <form method="POST" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <p class="details">Photo caption</p>
                        <input type="text" placeholder="Enter caption" name="caption" required>
                    </div>
                </div>
                <input type="file" name="filepath" value="Upload">
                <div class="button">
                    <input type="submit" value="Upload">
                </div>
            </form>
        </div>

    </body>
</html>