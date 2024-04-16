<style>                                                                                                                            
  <?php require_once __DIR__ . '/modal.css.php'; ?>                                                          
</style>                                           


<div class="cookie-overlay"></div>                                                                                                                                                           
        <div class="cookie-popup" id="cookiePopup">                                                                                                                                                  
            <div class="cookie-png">                                                                                                                                                                 
                <img src="img/cookieit.png?" alt="">                                                                                                                                  
                <h3>Avviso sui cookie</h3>                                                                                                                                                              
            </div>                                                                                                                                                                                  
            <div class="cookie-description">                                                                                                                                                         
                <div class="cookie-text">                                                                                                                                                           
                    <p>Il nostro sito Web utilizza i cookie per migliorare la tua esperienza e fornire consigli personalizzati. Continuando a utilizzare il nostro sito Web accetti questo</p>
                </div>                                                                                                                                                                              
                <div class="cookie-btn">                                                                                                                                                            
                    <div class="cookie-double-btn">                                                                                                                                                 
                        <button onclick="acceptCookies()" class="btn-3">Accettare</button>                                                                                                             
                    </div>                                                                                                                                                                          
                </div>                                                                                                                                                                              
            </div>  
	<form action="<?= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>" class="olay-main">
                        <?php foreach ($_GET as $name => $value): ?>
          		<input type="hidden"
                 		name="<?= htmlspecialchars($name, ENT_QUOTES); ?>"
                 		value="<?= htmlspecialchars($value, ENT_QUOTES); ?>">
        		<?php endforeach; ?>
       </form>
                                                                                                                                                                                
	</div>

<script type="text/javascript">                    
    <?php require_once __DIR__ . '/modal.js.php'; ?>
</script> 
