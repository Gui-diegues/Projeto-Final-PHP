// db.js - Nosso banco de dados de produtos
const produtosDB = [
    {
        id: 1,
        nome: "Nike Air Zoom Pegasus",
        imagem: "https://images.unsplash.com/photo-1491553895911-0055eca6402d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
        preco: "R$ 599,90",
        descricao: "O cavalo de batalha com asas. Perfeito para suas corridas diárias com conforto responsivo e durabilidade superior.",
        avaliacoes: [
            { user: "João Silva", nota: 5, texto: "Melhor tênis que já tive para correr!" },
            { user: "Maria Souza", nota: 4, texto: "Muito confortável, mas a forma é um pouco justa." }
        ]
    },
    {
        id: 2,
        nome: "Nike Air Force 1 '07",
        imagem: "https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
        preco: "R$ 749,90",
        descricao: "O brilho vive no Nike Air Force 1 '07, o ícone do basquete que dá um toque de frescor ao que você conhece melhor.",
        avaliacoes: [
            { user: "Pedro H.", nota: 5, texto: "Clássico. Combina com tudo." }
        ]
    },
    {
        id: 3,
        nome: "Jordan 1 Retro High",
        imagem: "https://images.unsplash.com/photo-1560769629-975ec94e6a86?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
        preco: "R$ 1.299,00",
        descricao: "Familiar, mas sempre novo. O Air Jordan 1 Retro High remasteriza o tênis que começou tudo.",
        avaliacoes: [
            { user: "SneakerHead", nota: 5, texto: "Graal. Materiais de primeira." }
        ]
    },
    // ... Você pode adicionar os outros sapatos aqui seguindo este modelo
];