<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor Example - {{ $title }}</title>

    <!-- Load CKEditor script -->
    <script src="/asset/ckeditor/ckeditor.js"></script>
</head>
<body>
    <!-- Your HTML content here -->
    <textarea name="content" id="template" cols="30" rows="10"></textarea>
    <!-- Initialize CKEditor -->
    
    <script>
        CKEDITOR.replace('content');
    </script>
</body>
</html>
