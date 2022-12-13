#
# Add SQL definition of database tables
#
CREATE TABLE tt_content (
    tx_amcham_sitepackage_timeline_item int(11) unsigned DEFAULT '0',
    space_in_top varchar(255) DEFAULT '' NOT NULL,
    space_in_bottom varchar(255) DEFAULT '' NOT NULL,
    header_spacing varchar(255) DEFAULT '' NOT NULL,
    space_before_class varchar(255) DEFAULT '' NOT NULL,
    space_after_class varchar(255) DEFAULT '' NOT NULL,
    image_position varchar(255) DEFAULT '' NOT NULL,
    background_color varchar(255) DEFAULT '' NOT NULL,
    block_style varchar(255) DEFAULT '' NOT NULL,
    link varchar(1024) DEFAULT '' NOT NULL,
    title varchar(1024) DEFAULT '' NOT NULL,
    link_text varchar(1024) DEFAULT '' NOT NULL,
    text_on_img varchar(1024) DEFAULT '' NOT NULL,
    media_file varchar(1024) DEFAULT '' NOT NULL,
    categories int(11) DEFAULT '0' NOT NULL,
    category int(11) DEFAULT '0',
);
CREATE TABLE fe_users (
    bnsr varchar(255) DEFAULT '',
);
