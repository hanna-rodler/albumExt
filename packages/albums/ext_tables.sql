CREATE TABLE tx_albums_domain_model_album (
	name varchar(255) NOT NULL DEFAULT '',
	media int(11) unsigned NOT NULL DEFAULT '0',
	teaser text NOT NULL DEFAULT '',
	description text,
	release_date int(11) NOT NULL DEFAULT '0',
	spotify_available smallint(1) unsigned NOT NULL DEFAULT '0',
	apple_music_available smallint(1) unsigned NOT NULL DEFAULT '0',
	songs int(11) unsigned NOT NULL DEFAULT '0',
	ratings int(11) unsigned NOT NULL DEFAULT '0',
	genres int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_albums_domain_model_song (
	album int(11) unsigned DEFAULT '0' NOT NULL,
	name varchar(255) NOT NULL DEFAULT '',
	duration int(11) NOT NULL DEFAULT '0',
	explicit_content smallint(1) unsigned NOT NULL DEFAULT '0',
	interprets text NOT NULL
);

CREATE TABLE tx_albums_domain_model_interpret (
	name varchar(255) NOT NULL DEFAULT '',
	biography text,
	gallery int(11) unsigned NOT NULL DEFAULT '0',
	birthdate date DEFAULT NULL,
	nationality int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_albums_domain_model_rating (
	album int(11) unsigned DEFAULT '0' NOT NULL,
	name varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	stars int(11) NOT NULL DEFAULT '0',
	date int(11) NOT NULL DEFAULT '0',
	author varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_albums_domain_model_genre (
	name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_albums_domain_model_nationality (
	country_short_designation varchar(255) NOT NULL DEFAULT '',
	country_full_name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_albums_album_genre_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
