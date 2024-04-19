var ingredientes = ['Farinha', 'Açúcar', 'Ovos'];

// Adiciona um novo ingrediente
ingredientes.push('Leite');

// Itera sobre os ingredientes
ingredientes.forEach(function(ingrediente) {
    console.log(ingrediente);
});
// Armazena uma receita no armazenamento local
localStorage.setItem('receitaAtual', 'Bolo de Chocolate');

// Recupera a receita do armazenamento local
var receitaAtual = localStorage.getItem('receitaAtual');
