        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        <script>
                function previewImagemProduto() {
                        var imagem = document.querySelector('input[name=imagem').files[0];
                        var preview = document.querySelector('#preview-produto');

                        var reader = new FileReader();
                        reader.onloadend = function() {
                                preview.src = reader.result;
                        };
                        if (imagem) {
                                reader.readAsDataURL(imagem);
                        } else {
                                preview.src = "";
                        }
                }
        </script>
        </body>

        </html>