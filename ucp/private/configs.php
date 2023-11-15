<?php require_once('../private/configs.php'); $siteVinculed = 1;

###########################################################
##                  Configuraciones                      ##
###########################################################
$panel_url = 'www.L2Dandiarena.com/ucp'; // Escriba exactamente la URL donde se encuentra este panel (ejemplo: www.l2encounter.com/ucp)
$themeColor = 'default'; // ¿Cuál es la tonalidad de color predominante en la template? (Elija: default, black, blue, red, green ou purple)
$defaultLang = 'EN'; // Idioma estándar del panel (Elija entre: PT, EN o ES) - El panel cuenta con un sistema inteligente que detecta el idioma del navegador del usuario y muestra todo en ese idioma, pero si no podemos detectar o si el navegador está en un idioma diferente tres citados anteriormente, el idioma establecido aquí será el mostrado
$gmt = '0'; // Si los scripts del panel están en una hora temprana o retrasada, cambie el GMT. Ejemplo: -1 (-1 hora), +3 (+3 horas), etc


###########################################################
##                 Control de funciones                  ##
###########################################################
// ¿Qué funciones están disponibles para los jugadores? (1 = Disponible | 0 = No disponible)
$funct['regist'] = 1; // Si se registra a través del panel
$funct['forgot'] = 1; // Recuperar cuenta a través del panel
$funct['donate'] = 1; // Hacer donaciones/adquirir monedas
$funct['trnsf1'] = 1; // Transferir monedas online a un personaje in-game - Posibilita convertir su saldo a monedas/ticket in-game          
$funct['trnsf2'] = 1; // Transferir monedas online a otra cuenta                                                                            
$funct['trnsf3'] = 0; // Transferir monedas de un personaje in-game a saldo online - Posibilita añadir saldo quitando monedas/ticket in-game
$funct['gamst1'] = 1; // Game Stats - Top PvP
$funct['gamst2'] = 1; // Game Stats - Top PK
$funct['gamst3'] = 1; // Game Stats - Top Clan
$funct['gamst4'] = 1; // Game Stats - Top Online
$funct['gamst5'] = 1; // Game Stats - Grand Olympiad
$funct['gamst6'] = 1; // Game Stats - Boss Status
$funct['gamst7'] = 1; // Game Stats - Castle & Siege
$funct['gamst8'] = 1; // Game Stats - Top Level
$funct['gamst9'] = 1; // Game Stats - Top Adena
$funct['gams10'] = 1; // Game Stats - Boss Jewels Control
$funct['config'] = 1; // Configuración (cambiar datos de la cuenta)                                                                           


###########################################################
##                Registro y Recuperación                ##
###########################################################
// Puede insertar abajo links externos para que los jugadores puedan registrarse o recuperar sus cuentas en una página externa (si deja en blanco, las opciones desaparecer)
$link_regist = "http://opcional"; // Link de la página externa de registro
$link_forgot = "http://opcional"; // Link de la página externa de recuperar


###########################################################
##                 Adquisición de Saldo                  ##
###########################################################
$coinName = 'Online Coin'; // Nombre de la moneda online que representa el saldo (utilizado sólo en el panel de usuario)
$coinName_mini = 'Coin'; // Nombre resumido de la moneda
$coinQntV = 1; // ¿Cuál es la cantidad comercializada? Usted definirá el valor de esa cantidad justo debajo. (por ejemplo, si se define 10 aquí y en las configuraciones de los "Módulos de donación" abajo definimos 1.00 como valor, el usuario podrá adquirir 10 por $ 1,00, 20 por $ 2,00, etc)

// Bonos en porcentaje al adquirir moneda online en altas cantidades (Ejemplo: cada 100 monedas compradas, gana el 10%, es decir, paga por las 100, pero recibe 110)
$bonusActived = 1; // ¿Desea habilitar la bonificación por compra en cantidad? (1 = Sí | 0 = No)

// Usted puede insertar hasta 3 bonificaciones! Si no quiere usar alguna, basta con fijar los valores como '0' que será desconsiderada.

// bonificación 1:
$buyCoins['bonus_count'][1] = '100'; // ¿A partir de qué cantidad se da lo bonos abajo?
$buyCoins['bonus_percent'][1] = '10'; // ¿Cuál es el porcentaje de bonificación?

// bonificación 2:
$buyCoins['bonus_count'][2] = '400'; // ¿A partir de qué cantidad se da lo bonos abajo?
$buyCoins['bonus_percent'][2] = '15'; // ¿Cuál es el porcentaje de bonificación?

// bonificación 3:
$buyCoins['bonus_count'][3] = '1000'; // ¿A partir de qué cantidad se da lo bonos abajo?
$buyCoins['bonus_percent'][3] = '20'; // ¿Cuál es el porcentaje de bonificación?

// Exclusión de factura
$delFatura = 1; // El usuario puede eliminar una factura? (1 = Sí | 0 = No) - OBS: Una factura nunca se elimina, se oculta, pero siempre permanecerá en la base de datos.


###########################################################
##        Transferencia por coin / ticket in-game        ##
###########################################################
// Si está habilitada la función "Transferir monedas online a un personaje in-game", el jugador podrá convertir su saldo online a monedas in-game! Necesitamos definir algunas informaciones...
$coinGame = 'Donate Coin'; // Nombre de la moneda donate in-game (generalmente Coin, Ticket o Gold)
$coinID = 123456; // ID de la moneda


###########################################################
##                  Módulos de donación                  ##
###########################################################

$autoDelivery = 1; // ¿Desea que la entrega del saldo se haga de forma automática? (1 = Sí | 0 = No) (si opta de forma manual, las donaciones pagadas quedarán con status "Paga". Usted tendrá que ir hasta el panel admin y completarlas haciendo clic en el botón "Entregar". se añadirá y el status pasará a ser "Entregado")
$donateEmail = 'su@email.com'; // Correo electrónico que recibirá los comprobantes de pago para las transacciones bancarias y los módulos de confirmación manual

// PAYPAL CONFIGS:
$PayPal['actived'] = 1; // Opción activa? (1 = Sí / 0 = No)
$PayPal['business_email'] = 'seu@email.com'; // E-mail de la cuenta que recibirá las donaciones
$PayPal['USD']['coin_price'] = '0.40'; // Valor de la cantidad comercializada (en Dolar)
$PayPal['BRL']['coin_price'] = '1.00'; // Valor de la cantidad comercializada (en Reais)
$PayPal['EUR']['coin_price'] = '0.30'; // Valor de la cantidad comercializada (en Euros)
$PayPal['testando'] = 0; // ¿Está probando el sistema a través de PayPal Sandbox? (1 = Sí | 0 = No)

// MERCADOPAGO CONFIGS:
$MercadoPago['actived'] = 1; // Opción activa? (1 = Sí / 0 = No)
$MercadoPago['client_id'] = '___CLIENT_ID___'; // "CLIENT_ID" presente en la página https://www.mercadopago.com/mlb/account/credentials?type=basic
$MercadoPago['client_secret'] = '___CLIENT_SECRET___'; // "CLIENT_SECRET" presente en la página https://www.mercadopago.com/mlb/account/credentials?type=basic
$MercadoPago['currency'] = 'ARS'; // Código de la moneda
$MercadoPago['symbol'] = '$'; // Symbol moneda
$MercadoPago['coin_price'] = '1.00'; // Valor de la cantidad comercializada (en Reais)
$MercadoPago['testando'] = 0; // ¿Está probando el sistema a través de MercadoPago Sandbox? (1 = Sí | 0 = No)

// TRANSACCION BANCARIA:
$Banking['actived'] = 1; // Opción activa? (1 = Sí / 0 = No)
$Banking['currency'] = 'ARS'; // Código de la moneda
$Banking['coin_price'] = '1.00'; // Valor de la cantidad comercializada
$Banking['bank_dados'] = '
<b>CAIXA ECONÔMICA FEDERAL OU CASAS LOTÉRICAS</b><br />
<b>AGÊNCIA:</b> 0000<br />
<b>OPERAÇÃO:</b> 013<br />
<b>CONTA POUPANÇA:</b> 000-1<br />
<b>TITULAR:</b> ADMIN NAME';
