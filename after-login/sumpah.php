<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input File dengan Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #preview-container {
            max-width: 100%; /* Mengikuti lebar maksimum yang diperbolehkan */
            max-height: 100%; /* Mengikuti tinggi maksimum yang diperbolehkan */
            background: linear-gradient(to bottom, blue, orange, black);
            border: 1px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-radius: 10px; /* Mengatur pinggiran dengan radius 10px */
        }

        #file-input {
            display: none;
        }

        #select-button {
            background: linear-gradient(to bottom, blue, orange, black);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #select-button:hover {
            background: linear-gradient(to bottom, #0073e6, #ff8c00, #000000);
        }
    </style>
</head>
<body>
    <h1>Input File dengan Preview</h1>
    <input type="file" id="file-input" accept=".jpg, .jpeg, .png" onchange="previewImage(event)">
    <label for="file-input" id="select-button">Pilih gambar</label>

    <div id="preview-container">
        <img id="preview-image" src="#" alt="Preview">
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview-image');
            const fileInput = event.target;

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(fileInput.files[0]);
            }

            // Menyesuaikan ukuran kontainer berdasarkan ukuran gambar yang dipilih
            preview.onload = function () {
                const width = preview.width;
                const height = preview.height;

                // Mengatur ukuran maksimum kontainer berdasarkan ukuran gambar
                const container = document.getElementById('preview-container');
                container.style.maxWidth = width + 'px';
                container.style.maxHeight = height + 'px';
            }
        }
    </script>
</body>
</html>
