<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'portifolio');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'N^Prb_^ y#z#Py@k,ZR1zRM^CI8~rdUv9)yEqwbQ(4HTXMheuck|j<UmfSQ+r8W?');
define('SECURE_AUTH_KEY',  'h#jnJ*Evt@kw8|/huz(5WA;Zf3Ekrwds%@mPoCUis,x8vix:K7%kh;UUO4rO]hd*');
define('LOGGED_IN_KEY',    'xg6sTB*bRONk6$I$%04ZdsmK%~!2VRr&R--LGdZ+k2ZBZh%Acvf:JvkFp4Ap>.Zb');
define('NONCE_KEY',        'P^mZVZAIUkPu(tY~sW$q}1s. ^P/bceW+c``[$v [S%w7yd)[g<UWP3!my<-5Rf-');
define('AUTH_SALT',        'qV ZpwYxak4,;PT)AgiU(2RV|beuVA`#OFrRt0>]cxTq3EOht76AZtT|B>zx9HI`');
define('SECURE_AUTH_SALT', 'vUQWe)vdhYgy}]PIfo#r;VmQ/B[+ujk.)Gd:QYP%&G$Z>O_[[^6MN~4M^BYo 0*K');
define('LOGGED_IN_SALT',   'J(e^2=s:m#rxql(a+]XyH&O;,yF[M8BIFF4pVbnP ?h2}]Ev^-zlP#%+I)(1n=iV');
define('NONCE_SALT',       'HB(N,|+^W|octeyD]F]]c(C5&AXDz_pTY}Z3c ~Var.}QKoD[XYZEM|tIq/8WWxu');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'WC_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
