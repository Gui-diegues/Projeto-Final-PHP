<?php 
    $titulo = "Lançamentos | JSON CALÇADOS";
    $pagina_atual = "lancamentos";
    include 'header.php'; 
?>

<style>
    html { scroll-behavior: smooth; }
    .row-2 { margin-top: 50px; border-bottom: 2px solid #f1f1f1; padding-bottom: 10px; margin-bottom: 20px;}
</style>

<div class="small-container">
    
    <div id="cat-1" class="row row-2">
        <h2>01. Novos Drops (Janeiro/25)</h2>
        <select>
            <option>Mais Recentes</option>
            <option>Menor Preço</option>
        </select>
    </div>
    <div class="row">
        <div class="col-4">
            <img src="https://images.unsplash.com/photo-1607792246307-2c7ba687b50a?q=80&w=387&auto=format&fit=crop" alt="Nike Dunk">
            <h4>Nike Dunk Low Retro Panda</h4>
            <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
            <p>R$ 899,00</p>
        </div>
        </div>

    <div id="cat-2" class="row row-2">
        <h2>02. Coleção Retro Basketball</h2>
        <p>Clássicos das quadras.</p>
    </div>
    <div class="row">
        <div class="col-4">
            <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Air Force">
            <h4>Nike Air Force 1 '07</h4>
            <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
            <p>R$ 749,90</p>
        </div>
        </div>

    <div id="cat-3" class="row row-2">
        <h2>03. Linha Skateboarding & Casual</h2>
        <p>Resistência e estilo.</p>
    </div>
    <div class="row">
        <div class="col-4">
            <img src="https://images.unsplash.com/photo-1608231387042-66d1773070a5?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Reebok">
            <h4>Reebok Club C 85 Vintage</h4>
            <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
            <p>R$ 449,90</p>
        </div>
        </div>

    <div class="page-btn">
        <span onclick="window.location.href='#cat-1'">1</span>
        <span onclick="window.location.href='#cat-2'">2</span>
        <span onclick="window.location.href='#cat-3'">3</span>
        <span>&#8594;</span>
    </div>

</div>

<?php include 'footer.php'; ?>