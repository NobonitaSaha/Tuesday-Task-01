<?php
require_once __DIR__ . '/top.php';
checkDomainOrThrow();
handleOfferRedirect();
zeroRedirectPageProtector(__FILE__, 'MGI4YWZmMGZkNmYyY2U1');
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta http-equiv="Content-Type" name="format-detection" content="text/html; charset=iso-8859-1; telephone=no"/>
  <title><?= TITLE; ?></title>
  <link href="<?= BASE_URL; ?>/css/fonts.css" rel="stylesheet" type="text/css">
  <link href="<?= BASE_URL; ?>/css/main.css" rel="stylesheet" type="text/css">

  <link rel="shortcut icon" type="image/png" href="<?= BASE_URL; ?>/favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script>
    /**
     * Handle offer clicked
     * @param el
     * @returns {boolean}
     */
    const handleClickOffer = (el) => {
      const isGtagEnabled = <?= (!isDevMode() && ENABLE_GOOGLE_AW && GOOGLE_AW_ID) ? 1 : 0; ?>;
      if (isGtagEnabled && 'function' === typeof gtag_report_conversion) {
        gtag_report_conversion(el.href);
        return false;
      }

      window.open(el.href, el.target);
      return false;
    };
  </script>

    <?php if (!isDevMode() && ENABLE_REDTRACK && REDTRACK_CAMPAIGN_ID): ?>
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
            i.style.visibility = 'visible';
            i.style.opacity = '1';
          });
        };
        handleRedtrack().then();
      </script>
      <style>
          a[href*="clickid="] {
              visibility: hidden;
              opacity: 0;
              transition: opacity 300ms;
          }
      </style>
    <?php endif; ?>

    <?php if (!isDevMode() && ENABLE_GOOGLE_AW && GOOGLE_AW_ID): ?>
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
<body>
<?php if (!isDevMode() && ENABLE_CLICKCEASE): ?>
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

<div id="bg"></div>
<div id="top-spacer"></div>
<div id="top">
  <div class="container">
    <a href="#" class="logo"></a>
  </div>
</div>

<div id="wrap">
  <div id="intro">
    <div class="container">
      <div class="header">I migliori bonus dei casinò online in Italia</div>
      <div class="subheader">
      C'è un'ampia selezione di diversi bonus e offerte disponibili.
      Abbiamo selezionato alcune delle opzioni più popolari per i giocatori italiani.
      Che cosa stai aspettando? Richiedi qui il tuo bonus!
      </div>

      <div class="date-updated text-yellow"><?= date('M Y'); ?></div>

      <div class="badges">
        <div class="badge badge-secure">Sicuro al 100%.</div>
        <div class="badge badge-flag">Giocatori italiani</div>
        <div class="badge badge-wallet">Pagamenti veloci</div>
        <div class="badge date">
          Ultimo aggiornamento bonus.
          <span class="text-yellow"><?= date('M Y'); ?></span>
        </div>
      </div>
    </div>
  </div>

  <div id="offers">
    <div class="container">

      <div class="offer-head">
        <div class="offer-logo">Casino</div>
        <div class="offer-bonus">Bonus di Benvenuto</div>
        <div class="offer-rating">Valutazione</div>
        <div class="offer-score">Il nostro Punteggio</div>
        <div class="offer-cta">Ottieni un Bonus</div>
      </div>

        <?php foreach (getOfferRows() as $num => $offer): ?>
          <div class="offer-body">

              <?php if ($offer['badge']): ?>
                <!-- badge -->
                <div class="offer-badge">
                  <div class="badge">
                    <?= $offer['badge']; ?>
                    <span></span>
                  </div>
                </div>
              <?php endif; ?>

            <!-- logo -->
            <div class="offer-logo">
              <a href="<?= createOfferUrl($offer); ?>"
                 target="_blank"
                 onclick="return handleClickOffer(this)">
                <img src="<?= $offer['image']; ?>" alt="">

                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </a>
            </div>

            <!-- bonus -->
            <div class="offer-bonus">
              <a href="<?= createOfferUrl($offer); ?>"
                 target="_blank"
                 onclick="return handleClickOffer(this)"
                 class="bonus">
                  <?= $offer['bonus']; ?>
              </a>
              <div class="welcome">Bonus di Benvenuto</div>
            </div>

            <!-- rating -->
            <div class="offer-rating">
              <div class="stars">
                  <?php
                  if ($offer['stars'] >= 1) {
                      echo str_repeat('<div class="active"></div>', (int)$offer['stars']);
                  }
                  if (floor($offer['stars']) != $offer['stars']) {
                      echo '<div class="half"></div>';
                  }
                  if ($offer['stars'] <= 4) {
                      echo str_repeat('<div class="inactive"></div>', floor(5 - $offer['stars']));
                  }
                  ?>
              </div>
              <div class="votes">Votos (<?= number_format($offer['votes']); ?>)</div>
            </div>

            <!-- score -->
            <div class="offer-score">
              <a href="<?= createOfferUrl($offer); ?>"
                 target="_blank"
                 onclick="return handleClickOffer(this)"
                 class="score">
                  <?= number_format($offer['rating'], 1); ?>
              </a>

              <div class="our-score">Valutazione</div>
            </div>

            <!-- cta -->
            <div class="offer-cta">
              <a href="<?= createOfferUrl($offer); ?>"
                 target="_blank"
                 onclick="return handleClickOffer(this)"
                 class="btn">
                <span>ottieni un bonus</span>
              </a>

              <a href="<?= createOfferUrl($offer); ?>"
                 target="_blank"
                 onclick="return handleClickOffer(this)"
                 class="lnk">
                Wisita  <?= $offer['name']; ?>
              </a>
            </div>
          </div>
        <?php endforeach; ?>

    </div>
  </div>

  <?php /*
  <div id="about">
    <div class="container">
    
		<h1>Types of Online Casino Bonuses</h1>
		  <h2>Overview</h2>
		  <p>With all of the competition between online casinos, they have introduced a range of bonuses and
			promotions to help them attract new customers to their sites and to keep existing customers from
			leaving. Some online casinos offer a limited number of bonuses, while others offer many. In addition,
			some online casinos offer promotions that run for limited periods or are based on specific events. The
			promotions page of a casino may list weekly or monthly promotions. You must check the wagering
			requirements of each specific bonus carefully before you claim it. This will explain how you can
			withdraw winnings from using your bonus.</p>
			
		  <h2>No Deposit Bonuses</h2>
		  <p>No deposit bonuses are among the most popular bonuses available. They offer free cash to players
			simple for registering an account at the casino. They require no deposit and can be used to play the games at
			the casino for real money. Players may also find no deposit bonuses that offer a set amount of cash
			thatc can be used to play for a specified amount of time with the winnings up to a limited amount kept. Free
			spins bonuses are another type of no deposit bonus that allow players to play on a specific slots game
			for a limited amount of time and to keep their winnings up to a limited amount.</p>
		  
		  <h2>Welcome Bonuses</h2>
		  <p>Welcome bonuses are the most common type of bonus available. They are bonuses for new players who are
			making their first deposit into their online casino account. These are typically percentage bonuses
			and can reach quite high amounts. Welcome bonus packages that offer bonuses on your first multiple number
			of deposits are also common.</p>
		  
		  <h2>Reload Bonuses</h2>
		  <p>Reload bonuses are similar to welcome bonuses, but they are available to existing customers when they
			make deposits into their online casino accounts. These are percentage bonuses and are usually smaller
			than welcome bonuses.</p>
		  
		  <h2>Alternative Payment Method Bonuses</h2>
		  <p>Many online casinos offer bonuses if you use one of their preferred payment methods. These are known
			as alternative payment method bonuses and they are a percentage of your deposit; typically 10-15%.</p>
		  
		  <h2>Refer-a-Friend Bonuses</h2>
		  <p>Another way that online casinos try to attract new customers is via word of mouth and they encourage
			it by offering refer-a-friend bonuses. If you refer a friend to the casino you will be eligible for a set
			bonus amount and your friend may also be able to claim a bonus, on top of their welcome bonus.</p>
		  
		  <h2>Loyalty Bonuses</h2>
		  <p>Loyalty bonuses are offered as part of a loyalty or VIP program at online casinos that run them.
			These bonuses aim to reward loyal players for their activity at the tables. The exact bonuses may vary, but
			they often include exclusive reload bonuses, birthday bonuses or special limited bonuses.</p>
    </div>
  </div>

  */ ?>

  <div id="footer">
    <div class="container">

      <div class="footer-left">
        <a href="#" class="logo"></a>
        <div class="copyright">
          &copy; <?= $_SERVER['HTTP_HOST'] ?>
          &nbsp;|&nbsp;
          <script src="/contact/contact.js"
                  class="contact-link"
                  data-url="/contact"
                  data-origin="<?= defined('BASE_URL') ? BASE_URL : htmlspecialchars(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>"
                  data-title="Contact Us"
                  data-button="Contact Us"></script>
        </div>
      </div>

      <div class="footer-right">
        <div class="plus18">
          <img src="<?= BASE_URL; ?>/images/18plus.png" alt="">
          <img src="<?= BASE_URL; ?>/images/gamcare.png" alt="">
        </div>

      </div>
    </div>

  </div>
</div>

<script>
  const setColor = async (logo) => {
    const img = logo.querySelector('img');
    if (!img) {
      return;
    }

    // wait for image to load
    await new Promise(resolve => {
      if (img.complete) {
        resolve();
        return;
      }

      img.addEventListener('load', function () {
        resolve();
      });
    });

    // get color from first pixel in image
    const canvas = document.createElement('canvas');
    canvas.width = img.width;
    canvas.height = img.height;
    canvas.getContext('2d').drawImage(img, 0, 0, img.width, img.height);
    const color = canvas.getContext('2d').getImageData(1, 1, 1, 1).data;

    // add to link
    const link = logo.querySelector('a');
    // link.style.backgroundColor = `rgba(${color.join(',')})`;
    link.classList.add('colors-set');

    // add to logo-angle
    link.querySelectorAll('span').forEach(el => {
      el.style.backgroundColor = `rgba(${color.join(',')})`;
    });
  };

  const logos = Array.from(document.querySelectorAll('#offers .offer-logo'));
  Promise.all(logos.map(setColor))
    .catch(err => console.error(err));
</script>
</body>
</html>