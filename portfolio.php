<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Currículo</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="portfolio/cv.css">
  <link rel="stylesheet" href="portfolio/css.css">
  <link rel="stylesheet" href="portfolio/font-awesome.css">
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
      <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
        title="close menu">
        <i class="fa fa-remove"></i>
      </a>
      <img src="portfolio/avatar_g2.jpg" style="width:45%;" class="w3-round"><br><br>
      <h4><b>PROJETOS</b></h4>
      <p class="w3-text-grey">Thaís Meire Taborda</p>
    </div>
    <div class="w3-bar-block">
      <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal">
        <img src="imagens/quadrado3.png">&nbsp&nbsp&nbspPROJETOS</a>
      <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Sobre mim</a>
      <a href="#habilidades" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Habilidades Técnicas</a>
      <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Feedbacks</a>
      <a href="#diagramas" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Diagramas</a>
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
          <button class="w3-button w3-black">ALL</button>
          <button class="w3-button w3-white"><img src="portfolio/document.png"> Triagem Digital</button>
          <button class="w3-button w3-white w3-hide-small"><img src="portfolio/people.png"> Gestão de
            Pessoas</button>          
        </div>
      </div>
    </header>

       <!-- First Photo Grid-->
       <div class="w3-row-padding">
        <div class="w3-threequarter w3-container w3-margin-bottom">
          <img src="portfolio/mountains.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Dashboard Triagem Digital I</b></p>
            <p><b>Esteira beneficiada:</b> Triagem Digital I</p>
            <p>Dashboard em php para controle da produtividade da equipe. Combo de relatórios dinâmicos
              para dar visualizar a produtividade de AOFs e GSVs gerados. Visa a facilitar a tomada de decisão gerencial
              organização e produtividade da equipe.
              O funcionário também possui acesso a sua produção individual.
              <br>
              Tecnologias utilizadas: PHP, Banco de Dados MySQL, Bootstrap.
              <br>
              <b>Resultado: </b>Dar suporte à decisão gerencial.
            </p>
          </div>
        </div>
      </div>
      <div class="w3-row-padding">
        <div class="w3-threequarter w3-container w3-margin-bottom">
          <img src="portfolio/lights.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Identificação de Ofícios CVM</b></p>
            <p><b>Esteira beneficiada:</b> Triagem Digital II</p>
            <p>Ferramenta de automação em Java para automatizar a identificação de documentos
              jurídicos proveninentes.
              Gera GSV volumetria e pre-triagem para continuidade do processo JSON para medir capacidade operacional.
              Visa a trazer maior celeridade ao processo de tratamento de Documentos Judiciaisno Portal Jurídico.
              <br> 
              Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium
              Webdriver, JSON.
              Resultado: Aumento de celeridade e eficiência na execução de processos internos. Melhoria da medição da
              capacidade operacional. Melhoria da jornada do usuário</p>
          </div>
        </div>
  
      </div>

    <!-- First Photo Grid-->
    <div class="w3-row-padding">
      <div class="w3-threequarter w3-container w3-margin-bottom">
        <img src="portfolio/mountains.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Inclusão de Ofícios</b></p>
          <p><b>Esteira beneficiada:</b> Triagem Digital I, Triagem Digital II e Triagem Digital III</p>
          <p>Ferramenta de automação em Java para fazer o upload em massa de documentos
            jurídicos e abertura automática do GSV correspondente via JSON .
            Visa a trazer maior celeridade ao processo de tratamento de Ofícios
            Judiciais e Administrativos no Portal Jurídico.
            Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium Webdriver, JSON.
            <br>
            <b>Resultado: </b>Aumento de celeridade e eficiência na execução de processos internos.
          </p>
        </div>
      </div>
    </div>
    <div class="w3-row-padding">
      <div class="w3-threequarter w3-container w3-margin-bottom">
        <img src="portfolio/lights.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Identificação de Ofícios</b></p>
          <p><b>Esteira beneficiada:</b> Triagem Digital I</p>
          <p>Construção de Ferramenta de automação em Java para automatizar a identificação de documentos
            jurídicos e preenchimento de outros dados .
            Gera GSV volumetria correspondente/JSON para medir capacidade operacional.
            Visa a trazer maior celeridade ao processo de tratamento de Documentos Judiciaisno Portal Jurídico. 
            Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium
            Webdriver, JSON.
            Resultado: Aumento de celeridade e eficiência na execução de processos internos. Melhoria da medição da
            capacidade operacional.</p>
        </div>
      </div>

    </div>

    <!-- Second Photo Grid-->
    <div class="w3-row-padding">
      <div class="w3-threequarter w3-container w3-margin-bottom">
        <img src="portfolio/mountains.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Inclusão de Ofícios</b></p>
          <p><b>Esteira beneficiada:</b> Triagem Digital I e Triagem Digital II</p>
          <p>Ferramenta de automação em Java para fazer o upload em massa de documentos
            jurídicos e abertura automática do GSV correspondente via JSON .
            Visa a trazer maior celeridade ao processo de tratamento de Documentos
            Judiciais e Administrativos no Portal Jurídico.
            Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium Webdriver, JSON.
            <br>
            <b>Resultado: </b>Aumento de celeridade e eficiência na execução de processos internos.
          </p>
        </div>
      </div>
    </div>

      <div class="w3-row-padding">
      <div class="w3-threequarter w3-container w3-margin-bottom">
        <img src="portfolio/lights.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>GSV Manual</b></p>
          <p><b>Esteira beneficiada:</b> Triagem Digital I e Triagem Digital II</p>
          <p>Ferramenta para abertura massificada de GSVs/JSON para AOF criadas ou identificadas 
            manualmente. <br>
            Visa a trazer maior eficiência e aumento da capacidade operacional. 
            Tecnologias utilizadas: Java, JavaFX, Banco de Dados MySQL, Selenium Webdriver, JSON, Excel.
            <br>
            <b>Resultado: </b> Melhoria da eficiência, aumento de produtividade.
            </p>
        </div>
      </div>

    </div>

    <!-- Third Photo Grid-->
    <div class="w3-row-padding">
      <div class="w3-threequarter w3-container w3-margin-bottom">
        <img src="portfolio/p1.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Captura de Validação de Pontos</b>
          <p><b>Esteira beneficiada: </b>Funcionalismo</p>
          </p>Ferramenta em JAVA para acompanhamento de validação de pontos
          eletrônicos do quadro funcional. Este fato impacta diretamente em indicador do ATB.
          Habilidades requeridas: linguagem JAVA, JAVA FX interface,
          banco de dados MYSQL, Java Database Connectivity (JDBC).
          Resultado: Compliance. Acompanhamento de fato que impacta em indicador ATB.
          </p>
        </div>
      </div>
      <div class="w3-threequarter w3-container w3-margin-bottom">
        <img src="portfolio/p2.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Relatório de Trabalho em dia não útil</b></p>
          <p><b>Esteira beneficiada: </b>Funcionalismo</p>
          <p>Ferramenta em JAVA para gerar Relatório de controle de trabalho
            em dia-não-útil do quadro funcional. Este fato impacta diretamente em indicador do ATB.
            Habilidades requeridas: JAVA, JAVA FX interface, banco de dados MYSQL.
            <br>
            <b>Resultado:</b> Compliance. Acompanhamento de fato que impacta em indicador ATB.
        </div>
      </div>
    </div>

     <!-- Fourth Photo Grid-->
     <div class="w3-row-padding">
      <div class="w3-threequarter w3-container w3-margin-bottom">
        <img src="portfolio/p1.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Captura de Validação de Pontos</b>
          <p><b>Esteira beneficiada: </b>Funcionalismo</p>
          </p>Ferramenta em JAVA para acompanhamento de validação de pontos
          eletrônicos do quadro funcional. Este fato impacta diretamente em indicador do ATB.
          Habilidades requeridas: linguagem JAVA, JAVA FX interface,
          banco de dados MYSQL, Java Database Connectivity (JDBC).
          Resultado: Compliance. Acompanhamento de fato que impacta em indicador ATB.
          </p>
        </div>
      </div>
      <div class="w3-threequarter w3-container w3-margin-bottom">
        <img src="portfolio/p2.jpg" alt="TI" style="width:100%" class="w3-hover-opacity">
        <div class="w3-container w3-white">
          <p><b>Relatório de Trabalho em dia não útil</b></p>
          <p><b>Esteira beneficiada: </b>Funcionalismo</p>
          <p>Ferramenta em JAVA para gerar Relatório de controle de trabalho
            em dia-não-útil do quadro funcional. Este fato impacta diretamente em indicador do ATB.
            Habilidades requeridas: JAVA, JAVA FX interface, banco de dados MYSQL.
            <br>
            <b>Resultado:</b> Compliance. Acompanhamento de fato que impacta em indicador ATB.
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <div class="w3-center w3-padding-32">
      <div class="w3-bar">
        <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
        <a href="#" class="w3-bar-item w3-black w3-button">1</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
        <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
      </div>
    </div>

    <!-- Images of Me -->
    <div class="w3-row-padding w3-padding-16" id="about">
      <div class="w3-col m6">
        <img src="portfolio/avatar_g.jpg" alt="Me" style="width:100%">
      </div>
      <div class="w3-col m6">
        <img src="portfolio/me2.jpg" alt="Me" style="width:100%">
      </div>
    </div>

    <div class="w3-container w3-padding-large" style="margin-bottom:32px">
      <h4><b>Sobre mim</b></h4>
      <p>Cordial, dinâmica e entusiasta de tecnologias. </p>
      <p>Importância das tecnologias da informação: a informação se tornou
        o ativo mais importante para as empresas <br>
        Ciência de dados. Uitlização estratégica de dados 
      </p>
      <p>Formação: Graduação em andamento em Tecnologia da informação</p>
      <p>Pós-graduação: Arquitetura e Infraestrutura de TI.
        TCC: <b>Design thinking aplicado à Engenharia de Software.</b></p>
      <p>Pós-graduação: MBA Gestão de Pessoas. TCC: Mediação para Gestores</p>
      <p>Certificação avançada em Tecnologia de Construção de Aplicativos <img src="portfolio/gold-icon.png" alt=""></p>
      <p>Certificação avançada em infraestrutura <img src="portfolio/gold-icon.png" alt=""></p>
      <hr>

      <h4 id="habilidades">Habilidades técnicas</h4>
      <!-- Progress bars / Skills -->
      <p>Java, JavaFX</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">95%</div>
      </div>
      <p>Web Design, Html5, JSON</p>
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
        <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
      </div>
      <p>Gestão de projetos, XP, Agile</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
      </div>
      <p>Access VBA</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
      </div>
      <p>
        <button class="w3-button w3-dark-grey w3-padding-large w3-margin-top w3-margin-bottom">
          <i class="fa fa-download w3-margin-right"></i>Download Resume
        </button>
      </p>
      <hr>

      <h4 id="diagramas">Diagramas</h4>
      <!-- Diagramas -->
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-third w3-margin-bottom">
          <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
            <li class="w3-black w3-xlarge w3-padding-32">Basic</li>
            <li class="w3-padding-16">Web Design</li>
            <li class="w3-padding-16">Photography</li>
            <li class="w3-padding-16">1GB Storage</li>
            <li class="w3-padding-16">Mail Support</li>
            <li class="w3-padding-16">
              <h2>$ 10</h2>
              <span class="w3-opacity">per month</span>
            </li>
            <li class="w3-light-grey w3-padding-24">
              <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
            </li>
          </ul>
        </div>

        <div class="w3-third w3-margin-bottom">
          <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
            <li class="w3-teal w3-xlarge w3-padding-32">Pro</li>
            <li class="w3-padding-16">Web Design</li>
            <li class="w3-padding-16">Photography</li>
            <li class="w3-padding-16">50GB Storage</li>
            <li class="w3-padding-16">Endless Support</li>
            <li class="w3-padding-16">
              <h2>$ 25</h2>
              <span class="w3-opacity">per month</span>
            </li>
            <li class="w3-light-grey w3-padding-24">
              <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Contact Section -->
    <div class="w3-container w3-padding-large w3-grey">
      <h4 id="contact"><b>Feedbacks</b></h4>
     
     
      </div>
      <hr class="w3-opacity">
      <form action="/action_page.php" target="_blank">
        <div class="w3-section">
          <label>Name</label>
          <input class="w3-input w3-border" type="text" name="Name" required="">
        </div>
        <div class="w3-section">
          <label>Email</label>
          <input class="w3-input w3-border" type="text" name="Email" required="">
        </div>
        <div class="w3-section">
          <label>Message</label>
          <input class="w3-input w3-border" type="text" name="Message" required="">
        </div>
        <button type="submit" class="w3-button w3-black w3-margin-bottom"><i
            class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>
      </form>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-dark-grey">
     

    
       

      </div>
    </footer>

    <div class="w3-teal w3-center w3-padding-24">Currículo Digital<a href="https://www.w3schools.com/w3css/default.asp"
        title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

    <!-- End page content -->
  </div>

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