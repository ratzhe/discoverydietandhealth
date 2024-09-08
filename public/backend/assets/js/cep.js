function buscaCep() {
    let cep = document.getElementById('cep').value.replace(/\D/g, ''); // Remove a máscara do CEP
    if (cep !== "" && cep.length === 8) { // Verifica se o CEP tem 8 dígitos
        console.log(cep);
        let url = "https://brasilapi.com.br/api/cep/v1/" + cep;

        let req = new XMLHttpRequest();
        req.open("GET", url);
        req.send();

        // Tratar a resposta da requisição
        req.onload = function () {
            if (req.status === 200) {
                let endereco = JSON.parse(req.response);
                console.log(endereco);
                // Preencher os campos com o resultado da API
                document.getElementById("street").value = endereco.street;
                document.getElementById("city").value = endereco.city;
                document.getElementById("neighborhood").value = endereco.neighborhood;
                document.getElementById("state").value = endereco.state;
            } else if (req.status === 404) {
                alert("CEP não encontrado!");
            } else {
                alert("Erro ao fazer a requisição!");
            }
        };
    } else {
        alert("Por favor, insira um CEP válido com 8 dígitos.");
    }
}

window.onload = function () {
    let cep = document.getElementById("cep");
    cep.addEventListener("change", buscaCep);
};
