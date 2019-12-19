$(function(){

    //Variaveis locais
    
    var _seletorLinkAbrir= $('.jmodalabrir');
    var _seletorLinkClose= $('.jmodalfechar');
    var _containerModal= $('.jmodal');

    //Abrindo janela modal
    $(_seletorLinkAbrir).click(function(){
        _containerModal.fadeToggle(1000);
        return false;
    });

    // Fechando janela modal
    $(_seletorLinkClose).click(function(){
        _containerModal.fadeToggle(500);
        return false;
    });
});