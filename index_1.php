
<?php
//include_once 'includes/sessao.php';
include_once 'includes/sessaoX.php';
$usuario = $display[1];

include_once 'includes/conexao.php';
//include_once 'includes/validaLogin2.php';

//$objValida = new ValidaLogin2();
//$objValida->validaLogin($usuario);
?>
<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Portfolio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/cv.css">
        <link rel="stylesheet" href="css/css.css">
        <!--        <link rel="stylesheet" href="css/font-awesome.css">-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="css/portfolio.css">
        <style>
            body,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: "Raleway", sans-serif
            }
        </style>
    </head>

    <body class="w3-light-grey w3-content" style="max-width:1600px">

        <!-- menu lateral-->
        <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
            <div class="w3-container">
                <a href="index.php" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
                   title="close menu">
                    <i class="fa fa-remove"></i>
                </a>
                <img src="portfolio/avatar.jpeg" style="width:45%;" class="w3-round"><br><br>
                <h4><b>PROJETOS</b></h4>
                <p class="w3-text-grey">Thaís Meire Taborda</p>
            </div>
            <div class="w3-bar-block">
                <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal">
                    <img src="img/grid-fill.svg">&nbsp&nbsp&nbspPROJETOS</a>
                <div class="logo"></div>

                <!--projetos-->
                <a href="#carouselDashboard" onclick="w3_close()" class="w3-padding text-muted font-weight-light">Dashboard Triagem Digital I</a><br>
                <a href="#febraban" onclick="w3_close()" class="w3-padding text-muted font-weight-light">Encerramento Febraban</a><br><!-- comment -->
                <a href="#helpcard" onclick="w3_close()" class="w3-padding text-muted font-weight-light">Help Card Upload</a><br><!-- comment -->
                <a href="#carouselinclusao" onclick="w3_close()" class="w3-padding text-muted font-weight-light">Inclusão de Ofícios I</a><br>
                <a href="#cvm" onclick="w3_close()" class="w3-padding text-muted font-weight-light">Identificação CVM</a><br>
                <a href="#identificacaoT1" onclick="w3_close()" class="w3-padding text-muted font-weight-light">Identificação de Ofícios I</a><br>
                <a href="#inclusaooficios2" onclick="w3_close()" class="w3-padding text-muted font-weight-light">Inclusão de Ofícios II e III</a><br>
                
                <a href="#gsvmanual" onclick="w3_close()" class="w3-padding text-muted font-weight-light">GSV Manual</a><br>
                <a href="#tcu" onclick="w3_close()" class="w3-padding text-muted font-weight-light">Identificação TCU</a><br>
                <a href="#gen_cvm" onclick="w3_close()" class="w3-padding text-muted font-weight-light">Gerenciador CVM</a><br>
                <a href="#rtdnphp" onclick="w3_close()" class="w3-padding text-muted font-weight-light">RTDN (Web)</a><br>
                <a href="#rtdn" onclick="w3_close()" class="w3-padding text-muted font-weight-light">RTDN (Java)</a><br>
                <a href="#validacaoponto" onclick="w3_close()" class="w3-padding text-muted font-weight-light">Captura de Validação de Pontos</a><br>
            
                
                <!--fim projetos-->
                <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Sobre mim</a>
                <a href="#formacao" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Formação</a>
                <a href="#habilidades" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Habilidades Técnicas</a>
                <a href="#diagramas" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Diagramas</a>
           
                <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Feedbacks</a>
                </div>
        </nav>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
             title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px">

            <!-- Header -->
            <header id="portfolio">
                <a href="#"><img src="portfolio/avatar_g2.jpg" style="width:65px;"
                                 class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
                <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i
                        class="fa fa-bars"></i></span>
                <div class="w3-container">
                    <h1><b>Projetos</b></h1>
                    <div class="w3-section w3-bottombar w3-padding-16">                       
                        <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="bottom" 
                                data-content="DashboardS ajudam a consolidar o data-driven mindset: utilização estratégica de dados">
                            Dashboard
                        </button>
                      
                        <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="bottom" 
                                data-content="Todas as aplicações contém instruções de utilização. Disseminação da informação.">
                            Gestão do conhecimento
                        </button>
                        <br>
<!--                         <button class="w3-button w3-black">PROJETOS</button>-->
                        <button class="w3-button w3-white"><img src="img/file-earmark-text.svg"> Triagem Digital</button>
                        <button class="w3-button w3-white w3-hide-small"><img src="img/people-fill.svg"> Gestão de
                            Pessoas</button>
                         <button class="w3-button w3-white w3-hide-small"><img src="img/file-earmark-text.svg">Procon</button>
                         <button class="w3-button w3-white w3-hide-small"><img src="img/file-earmark-text.svg">Cadastramento de NPJ</button>
                         <button class="w3-button w3-white w3-hide-small"><img src="img/file-earmark-text.svg">Febraban</button>
                    </div>
                </div>
            </header>

            <!-- Dashboard T1-->
            <div class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <?php include_once 'carousel1.php'; ?>
                </div>
            </div>
            <!-- Dashboard T1-->
            
             <!--Febraban-->            

            <div id="febraban" class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <img src="portfolio/febraban.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Encerramento de NPJ Febraban</b></p>
                        <p><b>Esteira beneficiada:</b>Cálculos Febraban</p>
                        <p>Ferramenta para automatizar o encerramento de npj Febraban - Planilha DIJUR. Cerca de 5600 NPJs e
                            GSVs correspondentes encerrados.
                            <br> 
                            Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium
                            Webdriver.<br><!-- comment -->
                            <p>#compliance, #eficiência operacional</p>
                    </div>
                </div>

            </div>
             
            <!--Help Card-->            

            <div id="helpcard" class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <img src="portfolio/helpcard.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Help Card</b></p>
                        <p><b>Esteira beneficiada:</b>Cadastramento de NPJ</p>
                        <p>Ferramenta para automatizar a inclusão do Help card (arquivo com orientações aos escritórios)
                            nos processos terceirizados.
                            <br> 
                            Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium
                            Webdriver.<br><!-- comment -->
                            <p>#compliance, #eficiência operacional</p>
                    </div>
                </div>

            </div>
            
            <!-- Dashboard T1-->
            <div class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <?php include_once 'carouselinclusao.php'; ?>
                </div>
            </div>
            <!-- Dashboard T1-->
            

            <div id="cvm" class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <img src="portfolio/cvm.png" alt="TI" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Identificação de Ofícios CVM</b></p>
                        <p><b>Esteira beneficiada:</b> Triagem Digital II</p>
                        <p>Ferramenta de automação em Java desenvolvida para substituir módulo do gerenciador 
                            CVM que deixou de funcionar devido à alterações no código do Portal Jurídico.  
                            Gera GSV volumetria e pre-triagem via JSON.
                            Visa a trazer maior celeridade ao processo de tratamento de Documentos Judiciaisno Portal Jurídico.
                            <br> 
                            Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium
                            Webdriver, JSON.<br><!-- comment -->
                            <p>#compliance, #eficiência operacional</p>
                    </div>
                </div>

            </div>

            <!-- First Photo Grid-->
            
            <div id="identificacaoT1" class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <img src="portfolio/identificacao.png" alt="TI" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Identificação de Ofícios</b></p>
                        <p><b>Esteira beneficiada:</b> Triagem Digital I</p>
                        <p>Construção de Ferramenta de automação em Java para automatizar a identificação de documentos
                            jurídicos e preenchimento de outros dados .
                            Gera GSV volumetria correspondente/JSON para medir capacidade operacional.
                            Visa a trazer maior celeridade ao processo de tratamento de Documentos Judiciaisno Portal Jurídico. 
                            Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium
                            Webdriver, JSON.
                            <b>#eficiência operacional</b>
                            
                    </div>
                </div>

            </div>

            <!-- Second Photo Grid-->
            <div id="inclusaooficios2" class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <img src="portfolio/t2upload.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Inclusão de Ofícios</b></p>
                        <p><b>Esteira beneficiada:</b> Triagem Digital II e Procon</p>
                        <p>Ferramenta de automação em Java para fazer o upload em massa de documentos
                            jurídicos e abertura automática dos GSVs correspondentes via JSON .
                            Visa a trazer maior celeridade ao processo de tratamento de Documentos
                            Judiciais e Administrativos no Portal Jurídico.
                            Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium Webdriver, JSON.
                            <br>
                            <b>#eficiência operacional</b>
                        </p>
                    </div>
                </div>
            </div>

            <div id="gsvmanual" class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <img src="portfolio/manualCvm.png" alt="TI" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>GSV Manual</b></p>
                        <p><b>Esteira beneficiada:</b> Triagem Digital I , Triagem Digital II e PROCON</p>
                        <p>Ferramenta para abertura massificada de GSVs/JSON para AOF criadas ou identificadas 
                            manualmente. <br>
                            Visa a trazer maior eficiência e aumento da capacidade operacional. 
                            Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium Webdriver, JSON, Excel.
                            <b>#eficiência operacional</b>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Third Photo Grid-->
            <div id="tcu" class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <img src="portfolio/tcu.png" alt="TI" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Identificação de Ofícios TCU</b>
                        <p><b>Esteira beneficiada: </b>Triagem Digital I</p>
                        </p>Ferramenta em JAVA para identificação automática de ofícios do TCU. Gera GSV volumetria e pre-triagem via JSON.
                       <br>
                       <b>#compliance, #eficiência operacional</b>
                        </p>
                    </div>
                </div>
                <div id="gen_cvm" class="w3-threequarter w3-container w3-margin-bottom">
                    <img src="portfolio/cvm_sp.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Gerenciador CVM (Sistema legado)</b></p>
                        <p><b>Esteira beneficiada: </b>Triagem Digital II</p>
                        <p>Manutenção de ferramenta em VB6 para gerenciar o tratamento de documentos da CVM.
                             Ferramenta cedida pelo Cenop SP.
                            <br>
                            <b>#eficiência operacional</b> 
                    </div>
                </div>
            </div>
            <!--carousel RTDN-->
            <div id="rtdn" class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <?php include_once 'carouselRtdn.php'; ?>
                </div>
            </div>
            
            <!-- RTDN php-->
            <div id="rtdnphp" class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <img src="portfolio/rtdnphp.png" alt="TI" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>RTDN (PHP)</b>
                        <p><b>Esteira beneficiada: </b>Funcionalismo</p>
                        </p>Relatório web em PHP para exibição de dias não úteis trabalhados. Este relatório  
                        visa a substituir a ferramenta de captura em JAVA para atender às necessidades de reduzir a captura utilizando Sisbb<br>

                        Tecnologias utilizadas: PHP, javascript.                        
                        <br>
                            <b>#eficiência operacional, #compliance</b> 
                        </p>
                    </div>
                </div>
               
            </div>
            
            <!-- VALIDACAO DE PONTO-->
            <div id="validacaoponto" class="w3-row-padding">
                <div class="w3-threequarter w3-container w3-margin-bottom">
                    <img src="portfolio/validacaoponto.png" alt="TI" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Captura de Validação de Pontos</b>
                        <p><b>Esteira beneficiada: </b>Funcionalismo</p>
                        </p>Ferramenta em JAVA para acompanhamento de validação de pontos
                        eletrônicos do quadro funcional em D+1.  A validação diária do ponto 
                        permite ao gestor planejar as atividades, identificando irregularidades
                        que necessitem de acertos tempestivos e atualização das Horas Extras eventualmente
                         realizadas, a necessidade de acertos em folha de pagamento ou impedimento do fechamento do ponto do mês.

                        Tecnologias utilizadas: linguagem JAVA, JAVA FX interface,
                        banco de dados MYSQL, Java Database Connectivity (JDBC).                        
                        <br>
                            <b>#eficiência operacional, #compliance, #jornada do usuário</b> 
                        </p>
                    </div>
                </div>
               
            </div>


            <!-- SOBRE MIM -->
            <div class="w3-row-padding w3-padding-16" id="about">
                <div class="w3-col m6">
                    <img src="portfolio/me.jpg" alt="Me" style="width:100%">
                </div>
            </div>



            <div class="w3-row-padding" style="margin-bottom:32px">
                <h4><b>Sobre mim</b></h4>
                <div class="card" style="width: 60rem;">
                    <div class="card-body">

                        <h6 class="card-subtitle mb-2 text-muted"> Cordial, dinâmica e entusiasta de tecnologias.</h6>
                        <p class="card-text">

                        <p>Desenvolvo projetos informáticos para sistemas de processamento de transações (SPT) que visam
                            a aumentar a celeridade e eficiência na execução de processos, a propiciar controle/monitoramento 
                            da informação gerada nas esteiras. A utilização de automação e interfaces amigáveis ajudam a melhorar 
                            a jornada do funcionário das esteiras.<br>
                            <b>Monitorar para atingir com eficiência resultados</b><br>
                            Também desenvolvo projetos para Sistemas de informações gerenciais (SIG) que recebem insumos de dados destas
                            mesmas esteiras para gerar relatórios que permitem uma visualização geral dos processos da equipe</p><br>
                        <p><b>Importância das Tecnologias da Informação: </b><br>
                            No atual cenário, a informação se tornou
                            um ativo mais valioso que o petróleo, por isso as Big Techs são as empresas de maior impacto 
                            na sociedade buscando cada vez mais o setor financeiro para se capitalizar. <br>
                            A partir do modus operandi destas empresas, surgiu o chamado data-driven mindset,
                            o que significa utilizar dados de forma estratégica. Coletar dados, minerá-los, prover 
                            a visualização dos sistemas que eles compõe (dashboards) facilitam a análise e interpretação dos processos de uma empresa,
                             auxiliam na busca de soluções melhores e inovação.                          
                            

                        </p>

                    </div>
                </div>
                
               <hr>
              <p><h4 id="formacao"><b>Formação:</b></h4> </p>
       <div class="card" style="width: 60rem;">
                <div class="card-body">                   
                    <p class="card-text">
                    <p>Graduação em andamento em Tecnologia da informação</p>
                    <p>Pós-graduação: Arquitetura e Infraestrutura de TI.
                        TCC: <b>Design thinking aplicado à Engenharia de Software.</b>A partir de cases de sucesso de 
                        abordagens que utilizam o Design Thinking (DT) no processo de desenvolvimento de software, 
                        procurou-se analisar as características, 
                        princípios e instrumentos desta metodologia que a tornam uma facilitadora deste processo.</p>
                    <p>Pós-graduação: MBA Gestão de Pessoas. TCC: Mediação para Gestores</p>
                    <p><span style="background-color: #ffff99;"><b>Certificação avançada em Tecnologia de Construção de Aplicativos</b></span> <img src="portfolio/gold-icon.png" alt=""></p>
                    <p><span style="background-color: #ffff99;"><b>Certificação avançada em  TI Infraestrutura</b></span> <img src="portfolio/gold-icon.png" alt=""></p>
                    <hr>
                    </p>
                </div>
            </div>
     
            
            
               



                <h4 id="habilidades">Habilidades técnicas</h4>
                <!-- Progress bars / Skills -->
                <p>Java, JavaFX</p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:90%">90%</div>
                </div>
                <p>Web Design, Html5, JSON, PHP</p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:85%">85%</div>
                </div>
                <p>Banco de Dados MySql Workbench </p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
                </div>
                <p>SAS Statistical Analysis System</p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
                </div>
                <p>Relatório Spotfire</p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
                </div>
                <p>Engenharia de software</p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:85%">85%</div>
                </div>
                <p>Gestão de projetos, XP, Agile, FDD</p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
                </div>
                <p>Access VBA</p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:70%">70%</div>
                </div>
<!--                <p>
                    <button class="w3-button w3-dark-grey w3-padding-large w3-margin-top w3-margin-bottom">
                        <i class="fa fa-download w3-margin-right"></i>Download Resume
                    </button>
                </p>-->
                <hr>

                <h4 id="diagramas">Diagramas</h4>
                <!-- Diagramas -->
                <div class="w3-row-padding" style="margin:0 -16px">
                    <div class="w3-row-padding">
                        <div class="w3-threequarter w3-container w3-margin-bottom">
                            <?php include_once 'carouselDiagramas.php'; ?>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Feedback Sessão -->
            <div class="w3-container w3-padding-large">
                <h4 id="contact"><b>Feedbacks</b></h4>
                <!-- First Photo Grid-->
                <div class="w3-row-padding">
                    <div class="w3-container w3-margin-bottom">
                        <img src="img/feedbacks.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">

                    </div>
                </div>


            </div>


        </div>

        <!-- Footer -->
        <footer class="w3-container w3-padding-32 w3-dark-grey">





        </div>
    </footer>

    <div class="w3-teal w3-center w3-padding-24">
        <a href="https://humanograma.intranet.bb.com.br/F9307311" title="" target="_blank" class="w3-hover-opacity">Currículo Digital</a>
    </div>

    <!-- End page content -->
</div>

<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery-3.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script> //inicilizar popover
    $(function () {
  $('[data-toggle="popover"]').popover()
})
   </script>

<script>
                    // Script to open and close sidebar
                    function w3_open() {
                        document.getElementById("mySidebar").style.display = "block";
                        document.getElementById("myOverlay").style.display = "block";
                    }

                    function w3_close() {
                        document.getElementById("mySidebar").style.display = "none";
                        document.getElementById("myOverlay").style.display = "none";
                    }
</script>


</body>

</html>