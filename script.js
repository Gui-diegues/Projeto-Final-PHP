var MenuItems = document.getElementById("MenuItems");
MenuItems.style.maxHeight = "0px";

function menutoggle() {
    if (MenuItems.style.maxHeight == "0px") {
        MenuItems.style.maxHeight = "200px";
    } else {
        MenuItems.style.maxHeight = "0px";
    }
}

function mostrarNotificacao(mensagem) {
    const notificacao = document.createElement('div');
    notificacao.style.position = 'fixed';
    notificacao.style.top = '20px';
    notificacao.style.right = '20px';
    notificacao.style.backgroundColor = '#ff523b';
    notificacao.style.color = '#fff';
    notificacao.style.padding = '15px 25px';
    notificacao.style.borderRadius = '5px';
    notificacao.style.boxShadow = '0 4px 15px rgba(0,0,0,0.2)';
    notificacao.style.zIndex = '9999';
    notificacao.style.transform = 'translateX(120%)';
    notificacao.style.transition = 'transform 0.4s ease';
    notificacao.innerText = mensagem;

    document.body.appendChild(notificacao);

    setTimeout(() => { notificacao.style.transform = 'translateX(0)'; }, 100);
    setTimeout(() => {
        notificacao.style.transform = 'translateX(120%)';
        setTimeout(() => { notificacao.remove(); }, 500);
    }, 3000);
}

const products = document.querySelectorAll('.col-4');

products.forEach(product => {
    product.style.transition = "all 0.3s ease";
    product.style.borderRadius = "10px";
    product.style.padding = "10px";

    product.addEventListener('mouseenter', () => {
        product.style.transform = "translateY(-10px) scale(1.02)";
        product.style.boxShadow = "0 15px 30px rgba(0,0,0,0.1)";
        product.style.borderBottom = "4px solid #ff523b";
    });

    product.addEventListener('mouseleave', () => {
        product.style.transform = "translateY(0) scale(1)";
        product.style.boxShadow = "none";
        product.style.borderBottom = "none";
    });

    product.addEventListener('click', () => {
        const nomeProduto = product.querySelector('h4').innerText;
        const precoTexto = product.querySelector('p').innerText;
        
        const novoPedido = {
            id: "#" + Math.floor(Math.random() * 9000 + 1000),
            data: new Date().toLocaleDateString('pt-BR'),
            produto: nomeProduto,
            status: "Processando",
            total: precoTexto
        };

        let listaPedidos = JSON.parse(localStorage.getItem('meusPedidos')) || [];

        listaPedidos.push(novoPedido);

        localStorage.setItem('meusPedidos', JSON.stringify(listaPedidos));

        mostrarNotificacao("Pedido " + novoPedido.id + " gerado! Veja em 'Meus Pedidos'.");
    });
});

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
});

const hiddenElements = document.querySelectorAll('.col-4, .offer, .testimonial .col-3');
hiddenElements.forEach((el) => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'all 0.6s ease-out';
    observer.observe(el);
});