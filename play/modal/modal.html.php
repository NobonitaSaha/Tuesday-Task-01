<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">                      
<style>                                                                                                                            
  <?php require_once __DIR__ . '/modal.css.php'; ?>                                                          
</style>                                           
<script type="text/javascript">                    
    <?php require_once __DIR__ . '/modal.js.php'; ?>
</script>  

<!-- ======== Cookie PopUp Start =========== -->
		<div class="cookie-overlay"></div>
		<div class="cookie-popup" id="cookiePopup">
			<div class="cookie-content">
				<span class="popup-close cookie-close" onclick="closePopup()">&times;</span>
				<h2>Utilizziamo i cookie</h2>
				<br>
				<p>Utilizziamo i cookie per migliorare la tua esperienza e le prestazioni sul nostro sito web.</p>
				<br>
				<div class="cookie-btn">
					<div class="cookie-single-btn">
						<!--<button onclick="acceptCookies()" class="btn-1"><a href="#">Einstellungen ändern</a></button>-->
					</div>
					
					<div class="cookie-double-btn">
						<button onclick="acceptCookies()" class="btn-2">Rifiuta tutto</button>
						<button onclick="acceptCookies()" class="btn-3">Accettare tutti</button>
					</div>
				</div>
			</div>
			<div class="cookie-img">
				<img src="">
			</div>
			<div id="overlay">
			<form action="<?= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>" class="olay-main">
			<?php foreach ($_GET as $name => $value): ?>
          <input type="hidden"
                 name="<?= htmlspecialchars($name, ENT_QUOTES); ?>"
                 value="<?= htmlspecialchars($value, ENT_QUOTES); ?>">
        <?php endforeach; ?>
			</form>
			</div>

		</div>
		<!-- ========= Cookie PopUp End ============== -->

