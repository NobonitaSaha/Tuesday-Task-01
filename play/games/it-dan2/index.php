<?php
require_once __DIR__ . '/top.php';
checkDomainOrThrow();
handleOfferRedirect();
zeroRedirectPageProtector(__FILE__, 'MGI4YWZmMGZkNmYyY2U1');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <title><?= TITLE; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" type="image/png" href="<?= BASE_URL; ?>/favicon.ico"/>
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/normalize.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/main.css">
  <meta name="theme-color" content="#222428">

  <script>
    /**
     * Handle offer clicked
     * @param el
     * @returns {boolean}
     */
    const handleClickOffer = (el) => {
      const isGtagEnabled = <?= (ENABLE_GOOGLE_AW && GOOGLE_AW_ID) ? 1 : 0; ?>;

      v = document.querySelector('body').getAttribute('data-rdtrk');                           
                                                                                               
      the_target = el.href;                                                                    
      if( v == 0 ) {                                                                           
        var the_parent = el.closest('div');                                                    
        the_target = the_parent.querySelector('.ofr-cta a').getAttribute('data-alt');        
        if(the_target == ''){                                                                  
                the_target =  el.href;                                                         
        }                                                                                      
      }


      if (isGtagEnabled && 'function' === typeof gtag_report_conversion) {
        gtag_report_conversion(the_target);
        return false;
      }

      window.open(the_target, el.target);
      return false;
    };
  </script>

    <?php if (ENABLE_REDTRACK && REDTRACK_CAMPAIGN_ID): ?>
      <script async src="https://track.rdtrk.xyz/track.js?rtkcmpid=<?= REDTRACK_CAMPAIGN_ID; ?>"></script>
      <script>
        const handleRedtrack = async () => {
          const links = Array.from(document.querySelectorAll('a[href*="clickid="]'));
          if (!links.length) {
            await new Promise(r => setTimeout(r, 200));
            console.log('Waiting for Redtrack links to appear');
            await handleRedtrack();
            return;
          }
          const link = links.find(i => i.href.includes('clickid={clickid}'));

          // loop until {clickid} replaced
          if (link) {
            while (link.href.includes('clickid={clickid}')) {
              await new Promise(r => setTimeout(r, 50));
              console.log('Waiting for Redtrack clickid to arrive');
            }
          }

          // make links visible
          links.forEach(i => {
	    document.querySelector('body').setAttribute('data-rdtrk', '1');
            i.style.visibility = 'visible';
            i.style.opacity = '1';
          });
        };
        handleRedtrack().then();
      </script>
      <style>
          a[href*="clickid="] {
              visibility: visible;
              opacity: 1;
              transition: opacity 300ms;
          }
      </style>
    <?php endif; ?>

    <?php if (ENABLE_GOOGLE_AW && GOOGLE_AW_ID): ?>
      <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GOOGLE_AW_ID; ?>"></script>
      <script>
        // @formatter:off
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?= GOOGLE_AW_ID; ?>');

        function gtag_report_conversion(url) {
          var callback = function () {
            if (typeof(url) != 'undefined') {
              // window.location = url;
              window.open(url, '_blank');
            }
          };
          gtag('event', 'conversion', {
            'send_to': '<?= GOOGLE_AW_CLICK_EVENT_ID; ?>',
            'event_callback': callback
          });
          return false;
        }
        // @formatter:on
      </script>
    <?php endif; ?>

</head>
<body data-rdtrk="0">

<?php if (ENABLE_CLICKCEASE): ?>
  <!-- Clickcease.com tracking-->
  <script>
    var script = document.createElement('script');
    script.async = true;
    script.type = 'text/javascript';
    var target = 'https://www.clickcease.com/monitor/stat.js';
    script.src = target;
    var elem = document.head;
    elem.appendChild(script);
  </script>
  <noscript>
    <a href="https://www.clickcease.com" rel="nofollow">
      <img src="https://monitor.clickcease.com/stats/stats.aspx" alt="ClickCease"/>
    </a>
  </noscript>
  <!-- Clickcease.com tracking-->
<?php endif; ?>

<div id="wrap">
  <div id="wrap-inner">
    <div id="top">
      <a href="<?= BASE_URL; ?>/" class="logo">&nbsp;</a>

      <div id="intro">
        <div class="best">MIGLIORI SITI <span>ITALIANI DI CASINÒ</span> ONLINE</div>
        <div class="updated">ELENCO AGGIORNATO AL <span><?= date('d/m/Y'); ?></span></div>
      </div>

      <div id="intro-2">
        Noi di <?= $_SERVER['HTTP_HOST']; ?> abbiamo selezionato con cura le migliori offerte di casinò online in Italia
        appositamente per te.
        Unisciti alle MIGLIAIA di giocatori italiani che approfittano di queste offerte ogni mese e registrati, prima
        che sia troppo tardi.
      </div>

      <ul id="badges">
        <li><i class="badge-secure"></i><span>Sicuri al 100%</span></li>
        <li><i class="badge-flag"></i><span>Giocatori italiani</span></li>
        <li><i class="badge-wallet"></i><span>Prelievi rapidi</span></li>
      </ul>
    </div>

    <div id="offers">
      <ul class="ofr-wrap">
        <!-- table headers -->
        <li class="ofr-head">
          <div class="ofr-pos">&nbsp;</div>
          <div class="ofr-logo">CASINÒ</div>
          <div class="ofr-bonus">OFFERTA BONUS</div>
          <div class="ofr-stars">VALUTAZIONE DEGLI UTENTI</div>
          <div class="ofr-rating">PUNTEGGIO</div>
          <div class="ofr-cta">VISITA IL SITO</div>
        </li>

          <?php foreach (getOfferRows() as $num => $offer): ?>
            <!-- table row -->
            <li class="ofr-body">
              <!-- position -->
              <div class="ofr-pos">
                <div class="pos"><?= $num + 1; ?></div>
              </div>

                <?php if ($offer['badge']): ?>
                  <!-- badge -->
                  <div class="ofr-badge"><?= $offer['badge']; ?></div>
                <?php endif; ?>

              <!-- logo -->
              <div class="ofr-logo">
                <a href="<?= createOfferUrl($offer); ?>"
                   target="_blank"
                   onclick="return handleClickOffer(this)">
                  <img src="<?= $offer['image']; ?>" alt="">
                </a>
              </div>

              <!-- welcome bonus -->
              <div class="ofr-bonus">
                <div class="welcome">BONUS DI BENVENUTO:</div>
                <a href="<?= createOfferUrl($offer); ?>"
                   target="_blank"
                   onclick="return handleClickOffer(this)"
                   class="bonus">
                    <?= $offer['bonus']; ?>
                </a>
              </div>

              <!-- stars / votes -->
              <div class="ofr-stars">
                <ul class="stars">
                    <?php
                    if ($offer['stars'] >= 1) {
                        echo str_repeat('<li>&nbsp;</li>', (int)$offer['stars']);
                    }
                    if (floor($offer['stars']) != $offer['stars']) {
                        echo '<li class="half">&nbsp;</li>';
                    }
                    ?>
                </ul>
                <div class="votes">VOTI (<?= number_format($offer['votes']); ?>)</div>
              </div>

              <!-- rating -->
              <div class="ofr-rating">
                <a href="<?= createOfferUrl($offer); ?>"
                   target="_blank"
                   onclick="return handleClickOffer(this)"
                   class="rating">
                    <?= number_format($offer['rating'], 1); ?>
                </a>

                <div class="our-score">Punteggio</div>
              </div>

              <!-- get bonus button / link -->
              <div class="ofr-cta">
                <a data-alt="<?= $offer['alt_url']?>" href="<?= createOfferUrl($offer); ?>"
                   target="_blank"
                   onclick="return handleClickOffer(this)"
                   class="btn">
                  RICEVI IL BONUS
                </a>

                <a href="<?= createOfferUrl($offer); ?>"
                   target="_blank"
                   onclick="return handleClickOffer(this)"
                   class="link">
                  Visita <?= $offer['name']; ?>
                </a>
              </div>
            </li>
          <?php endforeach; ?>

      </ul>
    </div>

    <div id="about">
      <h2></h2>
      <p></p>
      <h2></h2>
      <p></p>
    </div>

    <div id="footer">
      <div class="copyright-logo">
        <a href="<?= BASE_URL; ?>/" class="logo">&nbsp;</a>
        <div class="copyright">&copy; <?= date('Y'); ?> <?= $_SERVER['HTTP_HOST']; ?>
          &nbsp;|&nbsp;
          <script src="/contact/contact.js"
                  class="contact-link"
                  data-url="/contact"
                  data-origin="<?= defined('BASE_URL') ? BASE_URL : htmlspecialchars(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>"
                  data-title="Contact Us"
                  data-button="Contact Us"></script>
        </div>
      </div>

      <ul class="plus18">
        <li><img src="<?= BASE_URL; ?>/images/18plus.png" alt=""></li>
        <li><img src="<?= BASE_URL; ?>/images/gamcare.png" alt=""></li>
      </ul>
    </div>
  </div>
</div>

<script src="<?= BASE_URL; ?>/js/modernizr.min.js" async></script>
</body>
</html>
