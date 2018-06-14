<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Strapet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
        <link rel="stylesheet" href="_assets/_css/style.css">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

        <!-- PROCURA O ENDEREÇO PELO CEP INFORMADO -->
        <script type="text/javascript" >
            function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('iptRuaAssis').value=("");
                document.getElementById('iptBairroAssis').value=("");
                document.getElementById('iptCidadeAssis').value=("");
                document.getElementById('iptUfAssis').value=("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('iptRuaAssis').value=(conteudo.logradouro);
                    document.getElementById('iptBairroAssis').value=(conteudo.bairro);
                    document.getElementById('iptCidadeAssis').value=(conteudo.localidade);
                    document.getElementById('iptUfAssis').value=(conteudo.uf);
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }

            function pesquisacep(valor) {

                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('iptRuaAssis').value="...";
                        document.getElementById('iptBairroAssis').value="...";
                        document.getElementById('iptCidadeAssis').value="...";
                        document.getElementById('iptUfAssis').value="...";

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };
        </script>
    </head>
    <body>
    <div class="container-fluid corpo">
        
        <!-- MENU DO SITE-->
        <!--<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-gradient-primary">-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container mb-0 mt-0">

                <a href="#" class="navbar-brand h1 mb-0 mt-0" style="font-weight: bolder; font-size: 30px;"><i class="fas fa-box-open text-dark"></i>SANNYPACK</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSite">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="#empresa" class="nav-link">A Empresa</a></li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navDrop">Produtos</a>
                            <div class="dropdown-menu">
                                <a href="#produtos" class="dropdown-item" data-pill="tab1">Destaques</a>
                                <a href="#produtos" class="dropdown-item" data-pill="tab2">Fitas Adesivas</a>
                                <a href="#produtos" class="dropdown-item" data-pill="tab3">Fitas Gomadas</a>
                                <a href="#produtos" class="dropdown-item" data-pill="tab4">Cintas</a>
                                <a href="#produtos" class="dropdown-item" data-pill="tab5">Filme Stretch</a>
                                <a href="#produtos" class="dropdown-item" data-pill="tab6">Máquinas</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="#assTec" class="nav-link">Assistência</a></li>
                        <li class="nav-item"><a href="#faleConosco" class="nav-link">Fale Conosco</a></li>
                    </ul>
    <!--                <form action="" class="form-inline">-->
    <!--                    <input class="form-control ml-5 mr-2" type="search" placeholder="Buscar...">-->
    <!--                    <button class="btn btn-dark" type="submit">Ok</button>-->
    <!--                </form>-->
                </div>
            </div>
        </nav>
        <!-- FIM DO MENU DO SITE -->

        <!-- CABEÇALHO COM TELEFONE -->
        <div class="container-fluid cabecalho">
                <div class="row text-center">
                    <div class="col-lg-6 col-sm-12">
                        <h5 class=""><i class="fas fa-phone mr-3"></i>Telefone: (15) 5542-0793</h5>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h5 class=""><i class="fas fa-envelope mr-3"></i>E-mail: <a class="mail" href="mailto:contato@sannypack.com.br">contato@sannypack.com.br</a></h5>
                    </div>
                </div>
        </div>
        <!-- FIM DO CABEÇALHO -->

        <!-- CAROUSEL DE PRODUTOS DO SITE -->
        <div id="carouselSite" class="carousel slide d-none d-sm-block" data-ride="carousel" data-interval="4000">

            <!-- LISTA DE QUAL IMAGEM ESTÁ ATIVA NO MOMENTO NO CAROUSEL -->
            <ol class="carousel-indicators">
                <li data-target="carouselSite" data-slide-to="0" class="active"></li>
                <li data-target="carouselSite" data-slide-to="1"></li>
                <li data-target="carouselSite" data-slide-to="2"></li>
                <li data-target="carouselSite" data-slide-to="3"></li>
            </ol>

            <!-- BLOCO DE IMAGENS DO CAROUSEL -->
            <div class="carousel-inner">

                <!-- POLYMELT 400 IMAGEM E CAPTION -->
                <div class="carousel-item active">
                    <img src="_assets/_img/car01.png" alt="" class="img-fluid d-block">
                    <!--<div class="carousel-caption d-none d-md-block text-dark">
                        <h1>POLYMELT 400</h1>
                        <p class="lead">
                            Mattis nisi iaculis elit habitant quisque sem eu vulputate tristique, vehicula viverra quis velit.
                        </p>
                    </div>-->
                </div>
                <!-- FIM DA IMAGEM DO CAROUSEL -->

                <!-- POLYPACK 380 TR IMAGEM E CAPTION -->
                <div class="carousel-item">
                    <img src="_assets/_img/car02.png" alt="" class="img-fluid d-block">
                    <!--<img src="_assets/_img/polypack_380_tr2.jpg" alt="" class="img-fluid d-block">
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h1>POLYPACK 380 TR</h1>
                        <p class="lead">
                            Mattis nisi iaculis elit habitant quisque sem eu vulputate tristique, vehicula viverra quis velit.
                        </p>
                    </div>-->
                </div>
                <!-- FIM DA IMAGEM DO CAROUSEL -->

                <!-- POLYPACK 430 IMAGEM E CAPTION -->
                <div class="carousel-item">
                    <img src="_assets/_img/car03.png" alt="" class="img-fluid d-block">
                    <!--<img src="_assets/_img/polypack_4302.jpg" alt="" class="img-fluid d-block">
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h1>POLYPACK 430</h1>
                        <p class="lead">
                            Mattis nisi iaculis elit habitant quisque sem eu vulputate tristique, vehicula viverra quis velit.
                        </p>
                    </div>-->
                </div>
                <!-- FIM DA IMAGEM DO CAROUSEL -->

                <!-- POLYPRESS 430 TR IMAGEM E CAPTION -->
                <div class="carousel-item">
                    <img src="_assets/_img/car04.png" alt="" class="img-fluid d-block">
                    <!--<img src="_assets/_img/polypress_430_tr2.jpg" alt="" class="img-fluid d-block">
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h1>POLYPRESS 430 TR</h1>
                        <p class="lead">
                            Mattis nisi iaculis elit habitant quisque sem eu vulputate tristique, vehicula viverra quis velit.
                        </p>
                    </div>-->
                </div>
                <!-- FIM DA IMAGEM DO CAROUSEL -->
            </div>
            <!-- FIM DO BLOCO DE IMAGENS DO CAROUSEL -->

            <!-- CONTROLES PARA MUDAR AS IMAGENS DO CAROUSEL -->
            <a class="carousel-control-prev" href="#carouselSite" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselSite" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Proxima</span>
            </a>
            <!-- FIM DOS CONTROLES DE IMAGEM CAROUSEL -->

        </div>
        <!-- FIM DO CAROUSEL -->

        <!-- CONTEUDO DO SITE -->
        <div class="container" id="empresa">

            <!-- INICIO DA LINHA DE BOAS VINDAS -->
            <div class="row justify-content-center">
                <!-- TEXTO DE BOAS VINDAS  -->
                <div class="col-sm-12 text-center">
                    <hr>
                    <h1 class="display-3 mb-2 mt-xs-3 b tam-texto-1"><i class="fas fa-box-open text-primary"></i>SANNYPACK Embalagens</h1>
                    <h3 class="display-5 mb-5 text-muted tam-texto-2">
                        Embalamos o que sua empresa faz de melhor.
                    </h3>
                    <p class="lead text-justify">
                        A SANNYPACK é uma empresa que adquiriu a qualidade dos produtos Strapack, que tem mais de 40 anos de mercado, com alta qualidade, experiencia, atendimento de primeira linha e preços que atendendo a necessidade de cada cliente.
                    </p>
                    <p class="lead text-justify">
                        Localizado em Salto de Pirapora com unidade própria de 11000 m², estamos prontos para dar suporte e respaldo em todos os quesitos exigidos de uma grande empresa, contando com grandes colaboradores de fábrica e uma equipe preparada para atendimentos administrativos e comerciais.
                    </p>
                    <p class="lead text-justify">
                        Dentro de sua linha de Produtos estão as Fitas Adesivas e Fitas Gomadas, sendo referência nesse mercado muito exigido para fechamento de caixas de papelão e proteção de seu produto final.
                    </p>
                    <p class="lead text-justify">
                        Agregando a Venda de equipamentos apropriados e altamente qualificados para aplicações e alto rendimento desses produtos. 
                    </p>
                    <p class="lead text-justify">
                        Completando a Linha, temos Cintas de arqueação de PET e PP, Filme Stretch, finalizando a familia de unificação de embalagens finais, sendo a sua solução para proteção e tranquilidade do valor da sua empresa, seu produto.

                    </p>
                    <hr>
                </div>
            </div>
            <!-- FIM DA LINHA DE BOAS VINDAS-->

            
            <!-- PRODUTOS -->
            <div class="row justify-content-center">
                <!-- NOSSOS PRODUTOS  -->
                <div class="col-sm-12 text-center mt-1">
                    <h1 class="display-4 mb-4 b tam-texto-1">Conheça nossos produtos</h1>
                </div>
            </div>
            
            <div class="row justify-content-sm-center" id="produtos">
                
                <!-- TABS DOS PRODUTOS -->
                <ul class="nav nav-tabs nav-fill justify-content-center mb-4" id="prodNav" role="tablist">

                    <li class="nav-item"><a class="nav-link active tab1" id="nav-tabs-01" data-toggle="pill" href="#nav-prod-01" >Destaques</a></li>

                    <li class="nav-item"><a class="nav-link tab2" id="nav-tabs-02" data-toggle="pill" href="#nav-prod-02">Adesivas</a></li>

                    <li class="nav-item"><a class="nav-link tab3" id="nav-tabs-03" data-toggle="pill" href="#nav-prod-03">Gomadas</a></li>
                    
                    
                    <li class="nav-item"><a class="nav-link tab4" id="nav-tabs-04" data-toggle="pill" href="#nav-prod-04">Cintas</a></li>
                    
                    <li class="nav-item"><a class="nav-link tab5" id="nav-tabs-05" data-toggle="pill" href="#nav-prod-05">Stretch</a></li>

                    <li class="nav-item"><a class="nav-link tab6" id="nav-tabs-06" data-toggle="pill" href="#nav-prod-06">Máquinas</a></li>
                </ul>
                <!-- FIM TABS DOS PRODUTOS -->
                
                <!-- CONTEUDO DAS TABS DE PRODUTOS -->
                <div class="tab-content" id="nav-tab-content">
                    
                    <!-- TAB DE DESTAQUES -->
                    <div class="tab-pane fade show active" id="nav-prod-01" role="tabpanel">
                        <section id="cards-produtos-destaques" class="pb-5 cards-prod">
                            <div class="container">
                                <div class="row card-deck justify-content-center">
                                    
                                    <!-- Primeiro Card PACK 380 TR -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <p><img class=" img-fluid" src="_assets/_img/ade/polypack_380_ft_transparente_semimpressao.png" alt=""></p>
                                                            <!-- <p><img class=" img-fluid" src="_assets/_img/ade/polypack_380_transparente_semimpressao.JPG" alt=""></p> -->
                                                            <h4 class="card-title">Polypack 380 TR</h4>
                                                            <p class="card-text">Fita adesiva Polypack - Transparente.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Polypack 380 TR</h4>
                                                            <a class="card-text card-link" href="_pages/adesivas.php#polypack380" target="_blank">As fitas adesivas PolyPack 380 são fabricadas com filme de polipropileno biorientado (BOPP) de 18g/m² (20 microns) e adesivo acrílico (18g/m²). </a>
                                                            
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Polypack 380 TR')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Primeiro Card -->
                                    
                                    <!-- Segundo Card BAND SR -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <p><img class=" img-fluid" src="_assets/_img/gom/superband_semreforco.JPG" alt=""></p>
                                                            <h4 class="card-title">Superband</h4>
                                                            <p class="card-text">Fita gomada Superband - sem reforço.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Superband</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">Fabricada com papel KRAFT (80g/m²) cola de origem vegetal (36g/m²).</a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Superband SR')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Segundo Card -->
                                    
                                    <!-- Terceiro Card KFG 2 -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/kfg2_eletronic.jpg" alt=""></p>
                                                            <h4 class="card-title">KFG 2</h4>
                                                            <p class="card-text">Dispensador de Fita gomada.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Dispensador de Fita gomada</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">Dispensador eletrônico semi automático modelo “KFG-2 Electronic”, pedaços de fita já cortados e umedecidos.</a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('KFG 2')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Terceiro Card -->

                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- FIM TAB DE DESTAQUES -->
                    
                    <!-- TAB DE FITAS ADESIVAS -->
                    <div class="tab-pane fade" id="nav-prod-02" role="tabpanel">
                        <section id="cards-produtos-01" class="pb-5 cards-prod">
                            <div class="container">
                                <div class="row card-deck justify-content-center">
                                    
                                    <!-- Primeiro Card POLYPACK 380 TR-->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/ade/polypack_380_transparente_semimpressao.JPG" alt=""></p>
                                                            <h4 class="card-title">Polypack 380</h4>
                                                            <p class="card-text">Fita adesiva Polypack - Sem impressão.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Polypack 380</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">As fitas adesivas PolyPack 380 são fabricadas com filme de polipropileno biorientado (BOPP) de 18g/m² (20 microns) e adesivo acrílico (18g/m²). </a>
                                                            
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Polypack 380 TR/SI')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Primeiro Card -->
                                    
                                    <!-- Segundo Card POLYPACK 470 SI-->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <p><img class=" img-fluid" src="_assets/_img/ade/polypack_470_transparente_semimpressao.JPG" alt="" ></p>
                                                            <h4 class="card-title">Polypack 470</h4>
                                                            <p class="card-text">Fita adesiva Polypress - Sem impressão.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Polypack 470</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">PAs fitas Polypack 470 são fabricadas com filme de polipropileno biorientado (BOPP) de 27g/m² (30 microns) e adesivo acrílico (19/20 g/m²).</a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Polypack 470 TR/SI')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Segundo Card -->
                                    
                                    <!-- Terceiro Card POLYPACK 470 CI-->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <p><img class=" img-fluid" src="_assets/_img/ade/polypack_470_transparente_comimpressao.JPG" alt="" ></p>
                                                            <h4 class="card-title">Polypack 470</h4>
                                                            <p class="card-text">Fita adesiva Polypack - Com impressão.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Polypack 470</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">As fitas Polypack 470 são fabricadas com filme de polipropileno biorientado (BOPP) de 27g/m² (30 microns) e adesivo acrílico (19/20 g/m²).</a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Polypack 470 TR/CI')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Terceiro Card -->
                                    
                                </div>
                                <div class="row card-deck justify-content-center">
                                  
                                   <!-- Quarto Card POLYPRESS 470 CI-->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <p><img class=" img-fluid" src="_assets/_img/ade/polypress_470_transparente_comimpressao.JPG" alt="" ></p>
                                                            <h4 class="card-title">Polypress 470</h4>
                                                            <p class="card-text">Fita adesiva Polypress - Com impressão.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Polypress 470</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">As fitas Polypress 470 são fabricadas com filme de polipropileno biorientado (BOPP) de 27g/m² (30 microns) e adesivo acrílico (19/20 g/m²).</a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Polypress 470 TR/CI')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Quarto Card -->
                                    
                                    <!-- Quinto Card POLYPRESS 470 SI-->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <p><img class=" img-fluid" src="_assets/_img/ade/polypress_470_transparente_semimpressao.JPG" alt="" ></p>
                                                            <h4 class="card-title">Polypress 470</h4>
                                                            <p class="card-text">Fita adesiva Polypress - Sem impressão.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Polypress 470</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">As fitas Polypress 470 são fabricadas com filme de polipropileno biorientado (BOPP) de 27g/m² (30 microns) e adesivo acrílico (19/20 g/m²).</a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Polypress 470 TR/SI')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Quinto Card -->

                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- FIM DAS FITAS ADESIVAS -->

                    <!-- TAB DE FITAS GOMADAS -->
                    <div class="tab-pane fade" id="nav-prod-03" role="tabpanel">
                        <section id="cards-produtos-02" class="pb-5 cards-prod">
                            <div class="container">
                                
                                <div class="row card-deck justify-content-center">
                                    
                                    <!-- Primeiro Card SUPERBAND SR/SI -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/gom/superband_semreforco.JPG" alt=""></p>
                                                            <h4 class="card-title">Superband</h4>
                                                            <p class="card-text">Fita gomada Superband - Sem reforço - Sem impressão.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Superband</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Fabricada com papel KRAFT (80g/m²) cola de origem vegetal (36g/m²) - OPCIONAL: Papel KRAFT 60g/m².
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Superband SR/SI')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Primeiro Card -->
                                    
                                    <!-- Segundo Card SUPERBAND SR/CI -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/gom/superband_comimpressao.JPG" alt=""></p>
                                                            <h4 class="card-title">Superband</h4>
                                                            <p class="card-text">Fita gomada Superband - Sem reforço - Com impressão.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Superband</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Fabricada com papel KRAFT (80g/m²) cola de origem vegetal (36g/m²) - OPCIONAL: Papel KRAFT 60g/m².
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Superband SR/CI')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Segundo Card -->
                                    
                                </div>
                                <div class="row card-deck justify-content-center">
                                  
                                   <!-- Terceiro Card SUPERBAND CR/SI -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/gom/superband_comreforco.JPG" alt=""></p>
                                                            <h4 class="card-title">Superband</h4>
                                                            <p class="card-text">Fita gomada Superband - Com reforço - Sem impressão.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Superband</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Fabricada com papel KRAFT (80g/m²) cola de origem vegetal (36g/m²) - OPCIONAL: Papel KRAFT 60g/m².
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Superband CR/SI')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Terceiro Card -->
                                    
                                    <!-- Quarto Card SUPERBAND CR/CI -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/gom/superband_comimpressao.JPG" alt=""></p>
                                                            <h4 class="card-title">Superband</h4>
                                                            <p class="card-text">Fita gomada Superband - Com reforço - Com impressão.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Superband</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Fabricada com papel KRAFT (80g/m²) cola de origem vegetal (36g/m²) - OPCIONAL: Papel KRAFT 60g/m².
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Superband CR/CI')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Quarto Card -->
                                    
                                </div>
                            </div>
                            
                        </section>
                    </div>
                    <!-- FIM DAS FITAS GOMADAS -->
                   
                   
                    <!-- TAB DE CINTAS PLASTICAS -->
                    <div class="tab-pane fade" id="nav-prod-04" role="tabpanel">
                        <section id="cards-produtos-03" class="pb-5 cards-prod">
                            <div class="container">
                                
                                <div class="row card-deck justify-content-center">
                                    
                                    <!-- Primeiro Card Cinta Phoenix PP 200 Colorida -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/cin/phoenix_pp_200_colorido.png" alt=""></p>
                                                            <h4 class="card-title">Phoenix 200</h4>
                                                            <p class="card-text">Cinta plástica Phoenix PP 200 - Colorida.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Phoenix 200</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Cinta plástica Phoenix PP 200 Colorida.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Phoenix PP 200 Colorida')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Primeiro Card Cinta Phoenix PP 200 Colorida -->
                                    
                                    <!-- Segundo Card Cinta Plastpet -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/cin/plastpet.png" alt=""></p>
                                                            <h4 class="card-title">Plastpet</h4>
                                                            <p class="card-text">Cinta plástica Plastpet - Recartilhada ou Lisa.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Plastpet</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Cinta plástica Plastpet recartilhada ou lisa.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Plastpet')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Segundo Card Cinta Plastpet -->
                            
                                </div>
                            </div>
                            
                        </section>
                    </div>
                    <!-- FIM DAS CINTAS PLASTICAS -->

                    
                    <!-- TAB DE FILME STRETCH -->
                    <div class="tab-pane fade" id="nav-prod-05" role="tabpanel">
                        <section id="cards-produtos-04" class="pb-5 cards-prod">
                            <div class="container">
                                
                                <div class="row card-deck justify-content-center">
                                    
                                    <!-- Primeiro Card Filme Stretch DRK3 -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/flm/filme_drk3.jpg" alt=""></p>
                                                            <h4 class="card-title">Stretch DRK3</h4>
                                                            <p class="card-text">Filme Stretch DRK3 - Para uso manual.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Stretch DRK3</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Filme Stretch DRK3, tubete 3 polegadas para uso manual.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Stretch DRK3')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Primeiro Card Filme Stretch DRK3 -->
                                    
                                    <!-- Segundo Card Filme Stretch FPS -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/flm/stretch_fps.jpg" alt=""></p>
                                                            <h4 class="card-title">Stretch FPS</h4>
                                                            <p class="card-text">Filme Stretch FPS - Para uso automático.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Stretch FPS</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Filme Stretch para uso em máquinas 200% e 250% estiramento. Filme de pilietileno linear de baixa densidade.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Stretch FPS')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Segundo Card Filme Stretch FPS -->
                                    
                                </div>
                                
                            </div>
                            
                        </section>
                    </div>
                    <!-- FIM DA TAB DE FILME STRETCH -->
                    
                    
                    <!-- TAB DE MÁQUINAS -->
                    <div class="tab-pane fade" id="nav-prod-06" role="tabpanel">
                        <section id="cards-produtos-05" class="pb-5 cards-prod">
                            <div class="container">
                                
                                <div class="row card-deck justify-content-center">
                                    
                                    <!-- Primeiro Card Selca 1500 -->
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/Selca_1500.jpg" alt=""></p>
                                                            <h4 class="card-title">Selca 1500</h4>
                                                            <p class="card-text">Máquina aplicadora de fita adesiva Selca 1500.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Selca 1500</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                               A SELCA possui componentes e materiais de primeira linha, o que tornam o equipamento altamente confiável com uma performance superior.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Selca 1500')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Primeiro Card Selca 1500 -->
                                    
                                    <!-- Segundo Card Selca 1601 -->
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/Selca%201601.png" alt=""></p>
                                                            <h4 class="card-title">Selca 1601</h4>
                                                            <p class="card-text">Aplicadora de fita adesiva Selca 1601.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Selca 1601</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                A SELCA possui componentes e materiais de primeira linha, o que tornam o equipamento altamente confiável com uma performance superior.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Selca 1601')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Segundo Card Filme Selca 1601 -->
                                    
                                    <!-- Terceiro Card Aplicador WIT 336/510 -->
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/aplicador_wit_336-510.jpg" alt=""></p>
                                                            <h4 class="card-title">Aplicador WIT 336/510</h4>
                                                            <p class="card-text">Aplicador de fita adesiva WIT 336/510 - Para uso manual.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Aplicador WIT 336/510</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Aplicador manual de fitas adesivas.
                                                                Aplica fitas adesivas nas larguras de 25mm a 50mm (WIT 336) ou de 50 a 70mm (WIT 510).
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Aplicador WIT 336/510')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Terceiro Card Aplicador WIT 336/510 -->
                                    
                                </div>
                                
                                <div class="row card-deck justify-content-center">
                                    
                                    <!-- Primeiro Card TP 202 -->
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/tp_202.jpg" alt=""></p>
                                                            <h4 class="card-title">TP 202</h4>
                                                            <p class="card-text">Aplicador de cinta plástica TP 202.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">TP 202</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                A versatilidade da máquina TP 202 é um diferencial que a torna extremamente funcional e confiável, desenvolvida para trabalhar com diversas largura de cintas, permite a arqueação de vários tipos de volumes.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('TP 202')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Primeiro Card TP 202 -->
                                    
                                    <!-- Segundo Card TP 6000 -->
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/tp_6000_ft.png" alt=""></p>
                                                            <!-- <p><img class=" img-fluid" src="_assets/_img/maq/tp_6000.jpg" alt=""></p> -->
                                                            <h4 class="card-title">TP 6000</h4>
                                                            <p class="card-text">Aplicador de cinta plástica TP 6000.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">TP 6000</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Máquina automática para arqueação “PP”. Desenvolvida para trabalhar com diversos tamanhos de caixa em linha de produção, porém dentro das dimensões do arco.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('TP 6000')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Segundo Card TP 6000 -->
                                    
                                    <!-- Terceiro Card KFG2 Eletronic -->
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/kfg2_eletronic.jpg" alt=""></p>
                                                            <h4 class="card-title">KFG 2</h4>
                                                            <p class="card-text">Dispensador de Fita gomada.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Dispensador de Fita gomada</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">Dispensador eletrônico semi automático modelo “KFG-2 Electronic”, pedaços de fita já cortados e umedecidos.</a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('KFG 2')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Terceiro Card KFG2 Eletronic -->
                                    
                                </div>
                                
                                <div class="row card-deck justify-content-center">
                                    
                                    <!-- Primeiro Card Desenrolador H-84 -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/desenrolador_h-84.jpg" alt=""></p>
                                                            <h4 class="card-title">Desenrolador H-84</h4>
                                                            <p class="card-text">Desenrolador para cintas plásticas H-84.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Desenrolador H-84</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Desenrolador para cintas plásticas H-84.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('Desenrolador H-84')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Primeiro Card Desenrolador H-84 -->
                                    
                                    <!-- Segundo Card EPFS 1000 -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/epfs_1000_ft.png" alt=""></p>
                                                            <!-- <p><img class=" img-fluid" src="_assets/_img/maq/epfs_1000.jpg" alt=""></p> -->
                                                            <h4 class="card-title">EPFS 1000</h4>
                                                            <p class="card-text">Máquina para envolvimento de cargas paletizadas EPFS 1000.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">EPFS 1000</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                A linha EPFS foi desenvolvida com a mais moderna tecnologia disponível a fim de oferecer equipamentos confiáveis e eficientes. Estes equipamentos estão aptos a atender a maioria das aplicações onde seja necessária uma unitização rápida e econômica de cargas paletizadas num regime que pode variar entre 10 e 15 paletes por hora.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('EPFS 1000')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Segundo Card EPFS 1000 -->
                                    
                                </div>
                                
                                <div class="row card-deck justify-content-center">
                                    
                                    <!-- Primeiro Card STP 320 -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/stp_320.jpg" alt=""></p>
                                                            <h4 class="card-title">STP 320</h4>
                                                            <p class="card-text">Tensionador e selador para cintas plásticas “PET” e “PP”.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">STP 320</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Tensionador e selador para cintas plásticas “PET” e “PP”.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('STP 320')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Primeiro Card STP 320 -->
                                    
                                    <!-- Segundo Card STP 321 -->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                            <div class="mainflip">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center"  id="teste">
                                                            <p><img class=" img-fluid" src="_assets/_img/maq/stp_321.jpg" alt=""></p>
                                                            <h4 class="card-title">STP 321</h4>
                                                            <p class="card-text">Tensionador e selador para cintas plásticas “PET” e “PP”.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">STP 321</h4>
                                                            <a class="card-text card-link" href="https://www.google.com" target="_blank">
                                                                Tensionador e selador para cintas plásticas “PET” e “PP”.
                                                            </a>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#siteModalCaixa" onclick="setDadosModalCaixa('STP 321')">Cotação</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./Segundo Card STP 321 -->
                                    
                                </div>
                                
                            </div>
                            
                        </section>
                    </div>
                    <!-- FIM DA TAB DE MÁQUINAS -->
                    
                </div>
                <!-- FIM CONTEUDO DAS TABS DE PRODUTOS -->
                
            </div>
            <!-- FIM DOS PRODUTOS -->



        </div>
        <!-- FIM DO CONTEUDO DO SITE -->

        <!-- VIDEOS -->
        <div class="jumbotron jumbotron-fluid mb-0">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <h1 class="display-4 tam-texto-1"><i class="fas fa-video mr-3 text-primary"></i>Assista os nossos videos</h1>
                        <ul class="nav nav-pills justify-content-center mb-4" id="pills-nav" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="nav-pills-01" data-toggle="pill" href="#nav-item-01">Máquina TP 6000</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="nav-pills-02" data-toggle="pill" href="#nav-item-02">Máquina KFG 2 ROBOT</a>
                            </li>


                        </ul>

                        <div class="tab-content" id="nav-pills-content">
                            
                            <div class="tab-pane active" id="nav-item-01" role="tabpanel">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Q2mIOUJ92ko" frameborder="0"></iframe>

                                        </div>
                                    </div>

                                    <div class="col-sm-6 my-auto">
                                        <p>
                                            Máquina semi-automática para arqueação “PP”. Cinta 12mm, 9,5mm ou 8mm (sob encomenda) de largura,espessura 0,8 mm dimensões do arco 885mm de largura x 590 mm de altura.
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-item-02" role="tabpanel">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/U2fPkPgdsgc" frameborder="0"></iframe>

                                        </div>
                                    </div>

                                    <div class="col-sm-6 my-auto">
                                        <p>
                                            Dispensador eletrônico semi  automático modelo “KFG-2 Electronic”, a partir de bobinas de papel gomado, simples ou reforçados fornece em duas medidas, previamente ajustadas, pedaços de fita já cortados e umedecidos,bastando que se acione o botão correspondente ao tamanho desejado.
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DOS VIDEOS -->

        <!-- ASSINAR A NEWSLETTER -->
        <div class="jumbotron jumbotron-fluid mix mb-0">
            <div class="container">
                <!-- INICIO DO TEXTO DA NEWSLETTER -->
                <div class="row text-center justify-content-center">
                    <div class="col-12">
                        <h1 class="display-4 tam-texto-1"><i class="fas fa-paper-plane mr-3 text-primary"></i>Receba nossas novidades</h1>
                        <hr>
                    </div>
                </div>
                <!-- FIM DO TEXTO DA NEWSLETTER -->

                <!-- INICIO DO FORM -->
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <form action="_assets/_php/news.php" method="post" name="news" id="idNews">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="iptNome">Nome</label>
                                    <input class="form-control" type="text" id="iptNewsNome" placeholder="Informe o ser nome..." required name="newsNome">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="iptSobrenome">Sobrenome</label>
                                    <input class="form-control" type="text" id="iptNewsSobrenome" placeholder="Informe o seu sobrenome..." required name="newsSobrenome">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="iptEmpresa">Nome da sua empresa</label>
                                    <input type="text" class="form-control" id="iptNewsEmpresa" placeholder="Ex.: Strapet Embalagens..." required name="newsEmpresa">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="iptEmail">Informe seu E-mail</label>
                                    <input type="text" class="form-control" id="iptNewsEmail" placeholder="Ex.: email@email.com.br" required name="newsEmail">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <button class="btn btn-primary form-control d-block" type="submit" name="btnNews">Assinar</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                <!-- FIM DO FORM -->
                <hr>

            </div>
        </div>
        <!-- FIM DA NEWSLETTER -->

        <!-- FORM DA ASSISTENCIA -->
        <div class="jumbotron jumbotron-fluid mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mt-5">

                        <h1 class="display-4 tam-texto-1" id="assTec"><i class="fas fa-cogs"></i>Assistência Técnica</h1>
                        <h3 class="display-5 mb-5 text-muted tam-texto-2">
                            Não pare a sua produção por falta de manutenção em suas máquinas de embalagem!
                            Reduza seus custos solicitando uma manutenção preventiva!
                        </h3>
                        <h4 class="tam-texto-2">Preencha o formulário abaixo e entraremos em contato com você e sua empresa.</h4>
                        <hr>
                    </div>
                </div>
                <div class="row mt-2 justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <form action="_assets/_php/tech.php" method="post" name="frmTec" id="idTec">
                            <div class="form-row mb-4">
                                <div class="col-sm-12">
                                    <label for="iptTipoAssis">Selecione o tipo de serviço</label>
                                    <select class="form-control" name="tipoAssis" id="iptTipoAssis">
                                        <option value="-Selecione-">-Selecione-</option>
                                        <option value="Visita Técnica">Visita Técnica</option>
                                        <option value="Cotação de Peças">Cotação de Peças</option>
                                        <option value="Envio de Equipamento para Manutenção">Envio de Equipamento para Manutenção</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row esconder hide">
                                <div class="form-group col-sm-4">
                                    <label for="iptRazaoAssis">Razão Social</label>
                                    <input class="form-control" type="text" id="iptRazaoAssis" required placeholder="Ex.: Strapet Ltda" name="tecRazao">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="iptFantasiaAssis">Nome Fantasia</label>
                                    <input class="form-control" type="text" id="iptFantasiaAssis" required placeholder="Ex.: Strapet Embalagens" name="tecFantasia">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="iptCnpjAssis">CNPJ</label>
                                    <input class="form-control" type="text" id="iptCnpjAssis" required placeholder="Ex.: 11.111.111/1111-11" name="tecCNPJ">
                                </div>
                            </div>
                            <div class="form-row esconder hide">
                                <div class="form-group col-sm-12">
                                    <label for="iptCepAssis">CEP</label>
                                    <input class="form-control" type="text" id="iptCepAssis" required placeholder="Ex.: 18160000" onblur="pesquisacep(this.value);" name="tecCEP">
                                </div>
                            </div>
                            <div class="form-row esconder hide">
                                <div class="form-group col-sm-5">
                                    <label for="iptRuaAssis">Rua</label>
                                    <input class="form-control" type="text" id="iptRuaAssis" required placeholder="Ex.: Rua Maria" name="tecRua">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="iptNumeroAssis">Número</label>
                                    <input class="form-control" type="text" id="iptNumeroAssis" required placeholder="Ex.: 295" name="tecNumero">
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="iptBairroAssis">Bairro</label>
                                    <input class="form-control" type="text" id="iptBairroAssis" required placeholder="Ex.: Jardim Ana Guilherme" name="tecBairro">
                                </div>
                            </div>
                            <div class="form-row esconder hide">
                                <div class="form-group col-sm-6">
                                    <label for="iptCidadeAssis">Cidade</label>
                                    <input class="form-control" type="text" id="iptCidadeAssis" required placeholder="Ex.: Salto de Pirapora" name="tecCidade">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="iptUfAssis">Estado - UF</label>
                                    <select name="selUfAssis" id="iptUfAssis" class="form-control">
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP" selected>São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row esconder hide">
                                <div class="form-group col-sm-4">
                                    <label for="iptContatoAssis">Nome para contato</label>
                                    <input class="form-control" type="text" id="iptContatoAssis" required placeholder="Ex.: Bruno Garcia" name="tecContato">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="iptEmailAssis">E-mail</label>
                                    <input class="form-control" type="text" id="iptEmailAssis" required placeholder="Ex.: strapet@strapet.com.br" name="tecEmail">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="iptTelAssis">Telefone</label>
                                    <input class="form-control" type="text" id="iptTelAssis" required placeholder="Ex.: 1530420793" name="tecTel">
                                </div>
                            </div>
                            <div class="form-row esconder hide">
                                <div class="form-group col-sm-12">
                                    <label for="iptMaquinasAssis">Máquina/Modelo</label>
                                    <textarea class="form-control" type="text" id="iptMaquinasAssis" required placeholder="Ex.: Embaladora Fita/TP 6000" rows="5" name="tecMaquinas"></textarea>
                                </div>
                            </div>
                            <div class="form-row esconder hide">
                                <div class="form-group col-sm-12">
                                    <label for="iptQtdAssis">Quantidade de máquinas</label>
                                    <input class="form-control" type="number" min="1" value="1" id="iptQtdAssis" required name="tecQntd">
                                </div>
                            </div>
                            <div class="form-row esconder hide">
                                <div class="form-group col-sm-12">
                                    <label for="iptMsgAssis">Deixe uma mensagem</label>
                                    <textarea class="form-control" type="text" id="iptMsgAssis" placeholder="Ex.: Embaladora Fita/TP 6000" rows="5" name="tecMsg"></textarea>
                                </div>
                            </div>
                            <div class="form-row esconder hide">
                                <div class="form-group col-sm-12">
                                    <button class="btn btn-primary form-control d-block" type="submit">Enviar</button>
                                </div>
                            </div>
                        </form>
                        <h3 class="mb-5"><hr></h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DO FORM DA ASSISTENCIA -->

        <!--  FALE CONOSCO  -->
        <div class="jumbotron jumbotron-fluid mix mb-0" id="faleConosco">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <h3 class="display-4 tam-texto-1"><i class="fas fa-phone mr-3"></i>Fale Conosco</h3>
                        <h3 class="display-5 mb-2 text-muted tam-texto-2">
                            Quer entrar em contato, tirar suas duvidas, use um dos meios abaixo.
                        </h3>
                        <hr>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-6">
                        <h3 class="display-5">Telefone: (15) 3042-0793</h3>
                    </div>
                    <div class="col-sm-6">
                        <h3 class="display-5">E-mail: <a class="mail" href="mailto:contato@strapet.com.br">contato@strapet.com.br</a></h3>
                    </div>
                </div>
            </div>
        </div>
        <!--  FIM DO FALE CONOSCO  -->

        <!-- INICIO DO RODAPÉ -->
        <div class="jumbotron-fluid">
            <footer class="footer-bs">
                <div class="row">
                    <div class="col-md-6 footer-brand animated fadeInLeft">
                        <h2>STRAPET</h2>
                        <p>
                            Rua Maria Francisca dos Santos Marcello, nº 295
                            Jardim Ana Guilherme, Salto de Pirapora - SP
                            CEP 18160-000.
                        </p>
                        <p>
                            Telefone para contato:
                            (15) 3042-0793
                        </p>
                        <p>© 2018 Strapet Embalagens, Todos os direitos reservados</p>
                    </div>
                    <div class="col-md-3 footer-nav animated fadeInUp">
                        <h4>Menu —</h4>
                        <div class="col-md-6">
                            <ul class="list">
                                <li><a href="#">Home</a></li>
                                <li><a href="#empresa">A Empresa</a></li>
                                <li><a href="#produtos">Produtos</a></li>
                                <li><a href="#assTec">Assistência Técnica</a></li>
                                <li><a href="#faleConosco">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 footer-social animated fadeInDown">
                        <h4>Nos encontre</h4>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
            <section style="text-align:center; margin:-10px auto; padding: 0; font-size: 10px;"><p>Feito por Bruno Garcia Moura</p></section>
        </div>
        <!-- FIM DO RODAPÉ -->

        <!-- MODAL COTACAO QTDxCAIXA -->
        <div class="modal fade" id="siteModalCaixa" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Peça sua cotação</h5>
                        <button class="close" type="button" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="_assets/_php/cot.php" method="post" name="modCot" id="idCot">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="iptProduto">Produto</label>
                                    <input type="text" class="form-control" id="iptProdutoCaixa" readonly name="cotProduto">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="iptMedidaCaixa">Medidas do produto</label>
                                    <select name="cotMedidaCaixa" id="iptMedidaCaixa" class="form-control">
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="iptQtdPorCaixa" id="lblProduto">Quantidade/Rolos por Caixa</label>
                                    <input type="text" class="form-control" id="iptQtdPorCaixa" readonly name="cotQntPorCaixa" placeholder="-">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="iptQntdCaixas" id="lblQtndCaixas">Quantidade de caixas</label>
                                    <input type="number" class="form-control" id="iptQntdCaixas" name="cotQuantidade" placeholder="Informe a quantidade" min="0" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="iptEmpresaModal">Empresa</label>
                                    <input type="text" class="form-control" id="iptEmpresaModal" required placeholder="Ex.: Strapet Embalagens" name="cotEmpresa">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="iptCnpj">CNPJ</label>
                                    <input type="text" class="form-control" id="iptCnpj" required placeholder="Ex.: 11.111.111/1111-11" name="cotCNPJ">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="iptTelModal">Telefone</label>
                                    <input type="text" class="form-control" id="iptTelModal" required placeholder="Ex.: 1530420793" name="cotTel">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="iptEmail">E-mail</label>
                                    <input type="text" class="form-control" id="iptEmailCot" required placeholder="Ex.: strapet@strapet.com.br" name="cotEmail">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="iptmsg">Envie-nos uma mensagem</label>
                                    <textarea class="form-control" rows="5" id="iptMsg" placeholder="Informe sua mensagem aqui" name="cotMsg"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <button class="btn btn-primary form-control" type="submit">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">

                    </div>

                </div>
            </div>
        </div>
        <!-- FIM DO MODAL COTACAO QTDxCAIXA -->
        
        

        <!-- BOTÃO PARA VOLTAR AO TOPO -->
        <div class="smoothscroll-top">
            <span class="scroll-top-inner">
                <i class="fas fa-arrow-circle-up fa-2x"></i>
            </span>
        </div>
        <!-- FIM DO BOTÃO-->

        <!--  LOADER  -->
        <div class="loader" id="loader" style="display: none; width: 100%; height: 100%;">
            <img class="img-fluid" src="_assets/_img/ajax-loader.gif" alt="" style="position:fixed; top: 40%; left: 42%;">
        </div>
        <!--  FIM LOADER  -->

    </div>
    
    
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="node_modules/bootbox/bootbox.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#iptTelModal').mask('(00) 0000-00009');
        });

        //INCLUI DADOS DE UM ELEMENTO HTML PARA O MODAL CAIXAxQNTD
        function setDadosModalCaixa(name){
            document.getElementById('iptProdutoCaixa').value = name;
            
        }
        
        //INCLUI DADOS DE UM ELEMENTO HTML PARA O MODAL KGs
        function setDadosModalQuilo(name){
            document.getElementById('iptProdutoQuilo').value = name;
            
        }
        
        //INCLUI DADOS DE UM ELEMENTO HTML PARA O MODAL KGs
        function setDadosModalPeca(name){
            document.getElementById('iptProdutoPeca').value = name;
            
        }

        //BOTAO VOLTAR AO TOPO
        $(function(){

            $(document).on( 'scroll', function(){

                if ($(window).scrollTop() > 100) {
                    $('.smoothscroll-top').addClass('show');
                } else {
                    $('.smoothscroll-top').removeClass('show');
                }
            });

            $('.smoothscroll-top').on('click', scrollToTop);
        });

        function scrollToTop() {
            verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
            element = $('body');
            offset = element.offset();
            offsetTop = offset.top;
            $('html, body').animate({scrollTop: offsetTop}, 600, 'linear').animate({scrollTop:25},200).animate({scrollTop:0},150) .animate({scrollTop:0},50);
        }

        //Refresh sem sair da pagina NEWS
        $("#idNews").submit(function(e) {
            var url = "_assets/_php/news.php";
            $('#loader').show();
            var dialog;
            $.ajax({
                type: "POST",
                url: url,
                data: $("#idNews").serialize(),
                beforeSend: function () {
                },
                success: function(data)
                {
                    $('#loader').hide();
//                    alert(data);
                    dialog = bootbox.dialog({
                        message: '<p class="text-center">' + (data) + '</p>',
                        backdrop: true,
                    });
                    //utilizar o dado retornado para alterar algum dado da tela.
                    limpaForm('idNews');
                    dialog.modal('hide');
                },
                complete: function () {

                }
            });

            e.preventDefault();// esse comando serve para previnir que o form realmente realize o submit e atualize a tela.

        });

        //Refresh sem sair da pagina TECNICA
        $("#idTec").submit(function(e) {
            var url = "_assets/_php/tech.php";
            $('#loader').show();
            var dialog;
            $.ajax({
                type: "POST",
                url: url,
                data: $("#idTec").serialize(),
                beforeSend: function () {
                },
                success: function(data)
                {
                    $('#loader').hide();
//                    alert(data);
                    dialog = bootbox.dialog({
                        message: '<p class="text-center">' + (data) + '</p>',
                        backdrop: true,
                    });
                    //utilizar o dado retornado para alterar algum dado da tela.
                    limpaForm('idTec');
                    dialog.modal('hide');
                },
                complete: function () {
                    $('.hide').addClass('esconder');
                }
            });
            e.preventDefault();// esse comando serve para previnir que o form realmente realize o submit e atualize a tela.
        });

        //Refresh sem sair da pagina MODAL
        $("#idCot").submit(function(e) {
            var url = "_assets/_php/cot.php";
            $('#loader').show();
            var dialog;
            $.ajax({
                type: "POST",
                url: url,
                data: $("#idCot").serialize(),
                beforeSend: function () {
                },
                success: function(data)
                {
                    $('#loader').hide();
//                    alert(data);
                    dialog = bootbox.dialog({
                        message: '<p class="text-center">' + (data) + '</p>',
                        backdrop: true,
                    });
                    //utilizar o dado retornado para alterar algum dado da tela.
                    limpaForm('idCot');
                    dialog.modal('hide');
                    $('#siteModal').modal('hide');
                },
                complete: function () {
                }
            });
            e.preventDefault();// esse comando serve para previnir que o form realmente realize o submit e atualize a tela.
        });

        function limpaNews(){
            document.getElementById('idNews').reset();
        }
        function limpaTec(){
            document.getElementById('idTec').reset();
        }
        function limpaForm(idForm){
            document.getElementById(idForm).reset();
        }
        
        
        //EXIBIR OU NAO OS CAMPOS DO FORM DA ASSISTENCIA
        $('#iptTipoAssis').change(function(){
            var texto = $('#iptTipoAssis option:selected').val();
            if(texto !== "-Selecione-"){
               $('.hide').removeClass('esconder'); 
            } else {
                $('.hide').addClass('esconder');
            }
        });
        
        //CARREGAR MEDIDAS PARA OS PRODUTOS E CRIAR AS OPTIONS DO SELECT DE MEDIDA
        $('#siteModalCaixa').on('shown.bs.modal', function(){
            var text = $('#iptProdutoCaixa') .val();
            var medidas380 = new Array("48x50mm", "48x100mm", "70x100mm");
            var medidas470 = new Array("48x100mm", "70x100mm");
            var medidasPress = new Array("48x1200mm", "70x1200mm");
            var medidasBand = new Array("80mm", "70mm", "60mm");
            var medidasPhoenix = new Array("9,5mmX0,65mm", "9,5mmX0,8mm", "12mmX0,65mm", "12mmX0,8mm");
            var medidasPlastpet = new Array("13mmX0,8mm", "16mmX0,8mm", "19mmX1cm");
            var medidasStretch = new Array("500mmX25mic");
            
            $('#iptMedidaCaixa option').remove();
            $('#iptQtdPorCaixa').val('');
            $('#iptQntdCaixas').attr('step', '1');
            $('#iptQntdCaixas').val('0');
            
            $('#iptMedidaCaixa').append('<option value="">' + "-Selecione-" + '</option>'); 
            
            if(text.includes('Polypack 380')){
                medidas380.forEach(function(item){
                    $('#iptMedidaCaixa').append('<option value="' + item + '">' + item + '</option>'); 
                });  
            }
            if(text.includes('Polypack 470')){
                medidas470.forEach(function(item){
                    $('#iptMedidaCaixa').append('<option value="' + item + '">' + item + '</option>'); 
                });  
            }
            if(text.includes('Polypress 470')){
                medidasPress.forEach(function(item){
                    $('#iptMedidaCaixa').append('<option value="' + item + '">' + item + '</option>'); 
                });  
            }
            if(text.includes('Superband')){
                medidasBand.forEach(function(item){
                    $('#iptMedidaCaixa').append('<option value="' + item + '">' + item + '</option>'); 
                });  
            }
            if(text.includes('Phoenix')){
                medidasPhoenix.forEach(function(item){
                    $('#iptMedidaCaixa').append('<option value="' + item + '">' + item + '</option>'); 
                });  
            }
            if(text.includes('Plastpet')){
                medidasPlastpet.forEach(function(item){
                    $('#iptMedidaCaixa').append('<option value="' + item + '">' + item + '</option>'); 
                });  
            }
            if(text.includes('Stretch')){
                medidasStretch.forEach(function(item){
                    $('#iptMedidaCaixa').append('<option value="' + item + '">' + item + '</option>'); 
                });  
            }
            if(text.includes('Selca') || text.includes('Aplicador') || text.includes('TP') || text.includes('KFG') || text.includes('Desenrolador') || text.includes('EPFS') || text.includes('STP')){
                $('#iptMedidaCaixa').append('<option value="Peca">' + "Peça" + '</option>');
            }
        });
        
        //TEXTOS DOS PESOS E MEDIDAS DOS PRODUTOS
        $('#iptMedidaCaixa').change(function(){
            var selecionado = $('#iptMedidaCaixa option:selected').val();
            var text = $('#iptProdutoCaixa').val();
            $('#iptQntdCaixas').attr('min', '0');
            
            if(text.includes('Polypack 380')){
                $('#lblProduto').text('Quantidade/Rolos por Caixa');
                $('#lblQtndCaixas').text('Quantidade de caixas');
                if(selecionado == '48x50mm'){
                    $('#iptQtdPorCaixa').val('72 Rolos por Caixa');
                }
                if(selecionado == '48x100mm'){
                   $('#iptQtdPorCaixa').val('72 Rolos por Caixa');
                }
                if(selecionado == '70x100mm'){
                   $('#iptQtdPorCaixa').val('48 Rolos por Caixa');
                }
                
            }
            if(text.includes('Polypack 470')){
                $('#lblProduto').text('Quantidade/Rolos por Caixa');
                $('#lblQtndCaixas').text('Quantidade de caixas');
                if(selecionado == '48x100mm'){
                   $('#iptQtdPorCaixa').val('72 Rolos por Caixa');
                }
                if(selecionado == '70x100mm'){
                   $('#iptQtdPorCaixa').val('48 Rolos por Caixa');
                } 
            }
            if(text.includes('Polypress 470')){
                $('#lblProduto').text('Quantidade/Rolos por Caixa');
                $('#lblQtndCaixas').text('Quantidade de caixas');
                if(selecionado == '48x1200mm'){
                   $('#iptQtdPorCaixa').val('72 Rolos por Caixa');
                }
                if(selecionado == '70x1200mm'){
                   $('#iptQtdPorCaixa').val('48 Rolos por Caixa');
                }
            }
            if(text.includes('Superband')){
                $('#lblProduto').text('Peso aprox. por caixa');
                $('#lblQtndCaixas').text('Quantidade de Quilos');
                                
                
                if(selecionado == '80mm'){
                    $('#iptQtdPorCaixa').val('21Kgs por Caixa');
                    $('#iptQntdCaixas').attr('step', '21');
                }
                if(selecionado == '70mm'){
                    $('#iptQtdPorCaixa').val('23Kgs por Caixa');
                    $('#iptQntdCaixas').attr('step', '23');
                }
                if(selecionado == '60mm'){
                    $('#iptQtdPorCaixa').val('19Kgs por Caixa');
                    $('#iptQntdCaixas').attr('step', '19');
                }
            }
            if(text.includes('Phoenix')){
                $('#lblProduto').text('Quantidade/Rolos por Caixa');
                $('#lblQtndCaixas').text('Quantidade de caixas');
                $('#iptQtdPorCaixa').val('1 Rolo por Caixa');
            }
            if(text.includes('Plastpet')){
                $('#lblProduto').text('Quantidade/Rolos por Caixa');
                $('#lblQtndCaixas').text('Quantidade de caixas');
                $('#iptQtdPorCaixa').val('1 Rolo por Caixa');
            }
            if(text.includes('Stretch DRK3')){
                $('#lblProduto').text('Quilos por Rolo');
                $('#lblQtndCaixas').text('Quantidade de Quilos');
                $('#iptQtdPorCaixa').val('Quilos por Rolo 3Kg');
                $('#iptQntdCaixas').attr('step', '3');
            }
            if(text.includes('Stretch FPS')){
                $('#lblProduto').text('Quilos por Rolo');
                $('#lblQtndCaixas').text('Quantidade de Quilos');
                $('#iptQtdPorCaixa').val('Quilos por Rolo 10Kg');
                $('#iptQntdCaixas').attr('step', '10');
            }
            if(text.includes('Selca') || text.includes('Aplicador') || text.includes('TP') || text.includes('KFG') || text.includes('Desenrolador') || text.includes('EPFS') || text.includes('STP')){
                $('#lblProduto').text('Peças');
                $('#lblQtndCaixas').text('Vendido em jogos de peça');
                $('#iptQtdPorCaixa').val('1 Peça');
                $('#iptQntdCaixas').attr('step', '1');
            }
            
        });
        
        //TROCAR A TAB DOS PRODUTOS AO SELECIONAR ALGO NA NAVBAR
        $(document).on('click','.navbar-nav li a',function(){
            var tab = $(this).data('pill');
            $('.'+tab).trigger('click');
            console.log(tab);
        });
        
    </script>
        
    <!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'c89EBjDFV3';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
    </body>
</html>