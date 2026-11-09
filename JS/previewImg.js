
document.addEventListener("DOMContentLoaded", function () {

    const inputImagem = document.getElementById("imagem");
    const previewImagem = document.getElementById("previewImagem");
    const textoImagem = document.getElementById("textoImagem");

    if (!inputImagem || !previewImagem || !textoImagem) {
        return;
    }

    let imagemAnterior = null;

    inputImagem.addEventListener("change", function () {

        const arquivo = this.files[0];

        // Se nenhum arquivo foi selecionado
        if (!arquivo) {

            previewImagem.style.display = "none";
            textoImagem.style.display = "block";

            return;
        }

        // Validar formato
        const formatosPermitidos = [
            "image/jpeg",
            "image/png",
            "image/webp"
        ];

        if (!formatosPermitidos.includes(arquivo.type)) {

            alert("Formato inválido! Utilize JPG, PNG ou WEBP.");

            this.value = "";

            previewImagem.style.display = "none";
            textoImagem.style.display = "block";

            return;
        }

        // Validar tamanho máximo de 5 MB
        if (arquivo.size > 5 * 1024 * 1024) {

            alert("A imagem deve ter no máximo 5 MB.");

            this.value = "";

            previewImagem.style.display = "none";
            textoImagem.style.display = "block";

            return;
        }

        // Remover URL anterior
        if (imagemAnterior) {
            URL.revokeObjectURL(imagemAnterior);
        }

        // Criar visualização da imagem
        imagemAnterior = URL.createObjectURL(arquivo);

        previewImagem.src = imagemAnterior;

        previewImagem.style.display = "block";
        textoImagem.style.display = "none";

    });

    // Liberar memória ao sair da página
    window.addEventListener("beforeunload", function () {

        if (imagemAnterior) {
            URL.revokeObjectURL(imagemAnterior);
        }

    });

});
