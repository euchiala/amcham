#
# Add SQL definition of database tables
#
CREATE TABLE tx_events_domain_model_event (
    title  int(11) UNSIGNED NOT NULL DEFAULT '0',
    address varchar(255) DEFAULT '' NOT NULL,
    description varchar(1024) DEFAULT '' NOT NULL,
    program  varchar(1024) DEFAULT '' NOT NULL,
  	date date DEFAULT NULL,
	startime time DEFAULT NULL,
	endtime time DEFAULT NULL,
    file int(11) unsigned NOT NULL DEFAULT '0',
	speaker text NOT NULL
);
CREATE TABLE tx_events_domain_model_speaker (
    image int(11) unsigned NOT NULL DEFAULT '0',
	position varchar(255) NOT NULL DEFAULT '',
	address varchar(255) NOT NULL DEFAULT '',
	email varchar(255) NOT NULL DEFAULT '',
	tel int(11) unsigned NOT NULL DEFAULT '0',
	social varchar(255) NOT NULL DEFAULT ''
);