<?php
include "config.php";
if(isset($_POST["goLocaleSubmit"])) {
  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
  }
  $str = $_POST["locale"];
  $locale = explode(",",$str);
  $city = strtolower(tirarAcentos(preg_replace('/\s+/', '', $locale[0])));
  $neighborhood = strtolower(tirarAcentos(preg_replace('/\s+/', '', $locale[1])));
  header("location: {$city}/{$neighborhood}/index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR" >
<head>
<meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover"/>
  <title>Rio para Todos - Lugares com acessibilidade no Rio de Janeiro pra você</title>
  <meta name="description" content="Os melhores lugares acessíveis no Rio de Janeiro nas modalidades: auditiva, cadeirante, intelectual ou mental, mobilidade reduzida, obesidade, pessoa com 60 anos ou mais e visual."/>
  <meta name="keywords" content="acessibilidade, auditivo, cadeirante, intelectual ou mental, mobilidade reduzida, obesidade, pessoa com 60 anos ou mais, visual"/>
  <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
  <link rel="canonical" href="https://rioparatodos.jusblog.com/"/>
  <script assync="">if('serviceWorker' in navigator){window.addEventListener('load',function(){navigator.serviceWorker.register('sw.js').then(function(){/*console.log("Service Worker Registered.")*/})})}</script>
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicon/android-chrome-192x192.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="manifest.json">
  <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#7b7b7b">
  <link rel="shortcut icon" href="assets/img/favicon/favicon.ico">
  <meta name="apple-mobile-web-app-title" content="Apollo 22">
  <meta name="application-name" content="Apollo 22">
  <meta name="msapplication-TileColor" content="#111827">
  <meta name="msapplication-TileImage" content="assets/img/favicon/mstile-144x144.png">
  <meta name="theme-color" content="#111827">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="msapplication-starturl" content="/index.php">
  <meta name="msapplication-config" content="assets/img/favicon/browserconfig.xml">
  <link href="assets/img/splashscreens/iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="assets/img/splashscreens/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="assets/img/splashscreens/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
  <link href="assets/img/splashscreens/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
  <link href="assets/img/splashscreens/iphonexr_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="assets/img/splashscreens/iphonexsmax_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
  <link href="assets/img/splashscreens/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="assets/img/splashscreens/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="assets/img/splashscreens/ipadpro3_splash.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="assets/img/splashscreens/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.1/css/bulma.min.css">
  <style>
    section {
      margin: 5% 0;
    }
    .footer {
      background-color: #fff;
      color: #666;
      font-family: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    }
    .m-auto {
	    margin: auto;
    }
    a,
    a:hover,
    a:visited,
    a:focus {
      color: #1a73e8;
      cursor: pointer;
      text-decoration: none;
    }
    .py-5 {
      padding-top: 1.5em;
      padding-bottom: 1.5em;
    }
  </style>
</head>
<body>
<section>
  <div class="container">
      <div class="column is-half is-offset-one-quarter">
          <h3 class="title title-jsx is-4"><i class="fa-solid fa-universal-access"></i> <span>RJ &bull; Acessível</span></h3>
          <figure class="image is-128x128 m-auto">
              <img src="assets/img/marker.gif" alt="Rio para Todos - Faça conexões no seu bairro com empresas e prestadores de serviços.">
          </figure>
          <p>Juntos podemos construir um mundo mais inclusivo de amor para todos. Então, junte-se a nós 🎉</p>
          <p class="has-text-weight-bold has-text-centered is-uppercase py-5">
            <a href="#"><i class="fa-solid fa-users"></i> Cadastrar estabelecimento</a>
          </p>
          <form name="goLocale" method="post" autocomplete="off" action="">
            <div class="control has-icons-left">
            <div class="select is-info is-fullwidth">
              <select name="locale" required oninvalid="this.setCustomValidity('Por favor, selecione um item na lista.')" oninput="setCustomValidity('')">
                <option selected disabled value="">Onde você deseja ir?</option>
                <?php
                    $sql = "SELECT * FROM `locale` WHERE 1";
                    $result = $mysqli->query($sql);
                    if ($result) {       
                        if($result->num_rows > 0) {
                            $dataTable = array();
                            while($dataTable = $result->fetch_assoc()) {
                                    echo "<option value='".$dataTable["city"].",".$dataTable["neighborhood"]."'>".$dataTable["neighborhood"]."</option>";
                            }
                        }
                    } else {
                        echo "Erro: " . $sql . "<br>" . $mysqli->error;
                    }
                ?>
              </select>
            </div>
            <span class="icon is-large is-left">
              <i class="fa-sharp fa-solid fa-location-dot"></i>
            </span>
            </div>
            <br>
            <div class="field">
              <div class="control">
                  <input
                      name="goLocaleSubmit"
                      type="submit"
                      class="button is-info is-fullwidth"
                      value="ENTRAR" />
              </div>
            </div>
          </form>
      </div>
    </div>
  </section>
  <footer class="footer">
    <div class="content has-text-centered">
        <p>&copy; 2022 Rio para Todos</p>
    </div>
</footer>
</body>
</html>
