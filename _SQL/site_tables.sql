ALTER TABLE accounts ADD created_time int(11) DEFAULT NULL;

SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE site_balance (
  account varchar(16) NOT NULL,
  saldo int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE site_banners (
  bid int(10) NOT NULL AUTO_INCREMENT,
  imgurl_pt varchar(40) NOT NULL,
  imgurl_en varchar(40) DEFAULT NULL,
  imgurl_es varchar(40) DEFAULT NULL,
  pos tinyint(2) NOT NULL DEFAULT '1',
  link varchar(255) DEFAULT NULL,
  target tinyint(1) NOT NULL DEFAULT '1',
  vis tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (bid)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE site_donations (
  protocolo int(10) NOT NULL AUTO_INCREMENT,
  account varchar(30) NOT NULL,
  personagem int(11) DEFAULT NULL,
  quant_coins int(10) NOT NULL,
  coins_bonus int(10) NOT NULL DEFAULT '0',
  coins_entregues int(10) NOT NULL DEFAULT '0',
  valor decimal(11,2) NOT NULL,
  price decimal(11,2) NOT NULL,
  currency varchar(3) NOT NULL,
  metodo_pgto varchar(50) NOT NULL,
  status tinyint(1) NOT NULL DEFAULT '1',
  status_real varchar(40) DEFAULT NULL,
  data int(11) NOT NULL,
  ultima_alteracao int(11) DEFAULT NULL,
  transaction_code varchar(255) DEFAULT NULL,
  PRIMARY KEY (protocolo)
) ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;

CREATE TABLE site_emailchange (
  account varchar(30) NOT NULL,
  newemail varchar(100) NOT NULL,
  code varchar(32) NOT NULL,
  date int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE site_forgotpass (
  account varchar(120) NOT NULL,
  code varchar(32) NOT NULL,
  date int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE site_gallery (
  gid int(11) NOT NULL AUTO_INCREMENT,
  url varchar(40) NOT NULL,
  pos smallint(5) NOT NULL DEFAULT '1',
  isvideo tinyint(1) NOT NULL DEFAULT '0',
  vis tinyint(1) NOT NULL DEFAULT '1',
  sent_by varchar(50) DEFAULT NULL,
  sent_date int(11) DEFAULT NULL,
  PRIMARY KEY (gid)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE site_log_admin (
  log_value varchar(255) NOT NULL,
  log_ip varchar(20) NOT NULL,
  log_date datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE site_log_transfercoins (
  quantidade int(11) NOT NULL,
  remetente varchar(30) NOT NULL,
  destinatario varchar(30) NOT NULL,
  destinatario_char int(11) NOT NULL,
  tdata datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE site_log_convertcoins (
  quantidade int(11) NOT NULL,
  account varchar(50) NOT NULL,
  destinatario varchar(30) NOT NULL,
  cdata datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE site_log_convertcoins_online (
  quantidade int(11) NOT NULL,
  account varchar(50) NOT NULL,
  personagem int(11) NOT NULL,
  cdata datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE site_news (
  nid int(11) NOT NULL AUTO_INCREMENT,
  img varchar(40) DEFAULT NULL,
  post_date int(11) NOT NULL,
  vis tinyint(1) NOT NULL DEFAULT '0',
  title_pt varchar(150) NOT NULL,
  title_en varchar(150) DEFAULT NULL,
  title_es varchar(150) DEFAULT NULL,
  content_pt text NOT NULL,
  content_en text,
  content_es text,
  PRIMARY KEY (nid)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE site_reg_code (
  account varchar(30) NOT NULL,
  code varchar(32) NOT NULL,
  date int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE site_ucp_lastlogins (
  login varchar(45) NOT NULL,
  ip varchar(15) NOT NULL,
  logdate int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO site_banners VALUES ('1', '98a67ae9af1f9547003bc7b8ae33dd07.jpg', '98a67ae9af1f9547003bc7b8ae33dd07_en.jpg', '98a67ae9af1f9547003bc7b8ae33dd07_es.jpg', '2', '?page=register', '0', '1');
INSERT INTO site_gallery VALUES ('1', 'YGpZnIakNHE', '1', '1', '1', null, null);
INSERT INTO site_gallery VALUES ('2', '4K640l4ogK4', '2', '1', '1', null, null);
INSERT INTO site_gallery VALUES ('3', 'TQvDgJJ4D-s', '3', '1', '1', null, null);
INSERT INTO site_gallery VALUES ('4', 'i5NI2FvE6RQ', '4', '1', '1', null, null);
INSERT INTO site_gallery VALUES ('5', 'pnajfOQLW0g', '5', '1', '1', null, null);
INSERT INTO site_gallery VALUES ('6', 'gXEJ3FxOlic', '6', '1', '1', null, null);
INSERT INTO site_news VALUES ('1', '1.jpg', '1435654140', '1', 'Lorem ipsum dolor sit amet', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id justo sit amet turpis auctor iaculis quis vitae neque. Proin bibendum egestas felis nec facilisis. Morbi condimentum commodo pharetra. Morbi dictum tempus lacus sit amet dignissim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut sed arcu at arcu auctor tincidunt non non nisl. Nulla sit amet dui orci. Donec elementum maximus mattis. Vestibulum nec eleifend arcu. Sed molestie quis turpis vel placerat. Nam eu nisi vitae lorem imperdiet faucibus vitae id dolor. In porta ut nisi vel bibendum. Integer vitae turpis arcu. Integer ut nunc euismod, mollis magna a, tristique diam. Donec accumsan, eros sit amet varius iaculis, tortor purus tempor ipsum, ac feugiat turpis dui ac enim.', '', '');
INSERT INTO site_news VALUES ('2', '2.jpg', '1435654320', '1', 'Nunc tincidunt sapien erat',  '', '', 'Nulla commodo viverra lacus eget placerat. Donec ac imperdiet ex, ac aliquet metus. Pellentesque tempor ut neque quis finibus. Nulla sit amet diam posuere, varius libero in, tristique odio. Integer finibus commodo eros eu consequat. Maecenas orci mauris, ornare vel sollicitudin nec, accumsan viverra quam. Duis pharetra magna odio, vel pretium ligula pulvinar eget. Donec molestie efficitur metus, in accumsan risus. Ut arcu urna, imperdiet vitae pellentesque a, tincidunt ac tellus.', '', '');
INSERT INTO site_news VALUES ('3', '3.jpg', '1435654320', '1', 'Maecenas fermentum', '', '', 'Vivamus sit amet ornare arcu. Vivamus facilisis, dolor vitae placerat malesuada, sem purus fringilla purus, ac ultrices tortor est aliquam dui. Duis eget mollis nulla. Nam tincidunt tristique magna, vel egestas elit lacinia nec. Mauris feugiat neque ante, ut auctor metus sollicitudin vitae. Morbi ut vestibulum nisi, quis dictum metus. Pellentesque vel molestie purus, nec porttitor purus. Nunc vehicula tortor ac convallis euismod. Cras posuere dapibus velit. Aenean sed cursus metus, eget mollis augue. Praesent nec lobortis risus. Proin pharetra, lorem vitae mattis auctor, nisi lectus accumsan lectus, sit amet vulputate felis mi a mauris. Sed semper tortor ante, gravida euismod leo consectetur in.', '', '');