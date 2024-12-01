const form = document.getElementById('imc-form'); // Obtém o formulário de IMC
const resultado = document.getElementById('imc-container'); // Contêiner de resultado para exibir o IMC calculado

form.addEventListener('submit', (e) => { // Adiciona um ouvinte de evento para o envio do formulário
  e.preventDefault(); // Impede o envio padrão do formulário
  
  // Obtém os valores de peso e altura digitados no formulário
  const peso = parseFloat(document.getElementById('peso').value);
  const altura = parseFloat(document.getElementById('altura').value);
  
  // Calcula o IMC (Índice de Massa Corporal)
  const imc = peso / (altura * altura);
  
  // Define a classificação do IMC com base no valor calculado
  let classificacao = '';

  if (imc < 18.5) { // IMC abaixo de 18,5
    classificacao = 'Abaixo do peso';
  } else if (imc < 25) { // IMC entre 18,5 e 24,9
    classificacao = 'Peso normal';
  } else if (imc < 30) { // IMC entre 25 e 29,9
    classificacao = 'Sobrepeso';
  } else if (imc < 35) { // IMC entre 30 e 34,9
    classificacao = 'Obesidade grau I';
  } else if (imc < 40) { // IMC entre 35 e 39,9
    classificacao = 'Obesidade grau II';
  } else { // IMC acima de 40
    classificacao = 'Obesidade grau III';
  }

  // Atualiza o conteúdo do contêiner de resultado com o IMC e a classificação
  resultado.innerHTML = `
    <h2>Resultado do IMC</h2>
    <p>Seu IMC é <strong>${imc.toFixed(2)}</strong> e você está com <strong>${classificacao}</strong></p>
  `;
});
